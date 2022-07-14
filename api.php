<?php
// Version 19-11-22 18:00
const API_URL = "https://api.skylead.pro/wm/push.json?id=328-825182c571942782060f6438d10506e1";
const OFFER_ID = '20'; // ID выбранного оффера
const FLOW = '271'; 
const FIO_FIELD = 'name'; // Как называется поле на ленде с именем/фио
const PHONE_FIELD = 'phone'; // Как называется поле на ленде с телефоном

// Поля ниже желательно редиректить обратно на ленд
// Куда редиректим если это не пост запрос с формой
$urlForNotPost = 'index.php';
// Куда редиректим если имя или телефон не заполнены
$urlForEmptyRequiredFields = 'index.php';
// Куда редиректим если сервер ответил что-то непонятное
$urlForNotJson = 'index.php';
// Куда редиректим если всё хорошо
$urlSuccess = 'confirm/index.php';


//------------------------------- Дальше трогать нежелательно -----------------------------------------------------


function writeToLog(array $data, $response) {
    $log  = date("F j, Y, g:i a").PHP_EOL.
        "----------- DATA -------------".PHP_EOL.
        print_r($data, true) .PHP_EOL.
        "----------- RESPONSE ---------".PHP_EOL.
        $response .PHP_EOL.
        "----------- END --------------".PHP_EOL;

    file_put_contents('./log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
}
function getUserIP() {
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

// Проверки
$isCurlEnabled = function(){
    return function_exists('curl_version');
};

if (!$isCurlEnabled) {
    echo "<pre>";
    echo "pls install curl\n";
    echo "For *unix open terminal and type this:\n";
    echo 'sudo apt-get install curl && apt-get install php-curl';
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверка если поля не заполнены уводим и ничего не отправляем
    if (empty($_POST[FIO_FIELD]) || empty($_POST[PHONE_FIELD])) {
        header('Location: '.$urlForEmptyRequiredFields);
        exit;
    }

    $args = array(
		'flow' => FLOW,
        'offer' => OFFER_ID,
        'fio' => $_POST[FIO_FIELD],
        'phone' => $_POST[PHONE_FIELD],
        'ip' => getUserIp(),
        'us' => key_exists('us', $_POST) ? $_POST['us'] : null,
		'un' => key_exists('un', $_POST) ? $_POST['un'] : null,
		'um' => key_exists('um', $_POST) ? $_POST['um'] : null,
		'uc' => key_exists('uc', $_POST) ? $_POST['uc'] : null,
        'subid' => key_exists('subid', $_POST) ? $_POST['subid'] : null,

    );

    $data = json_encode($args);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => API_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data),
            'X-Token: '.WEBMASTER_TOKEN,
        ),
    ));

    $result = curl_exec($curl);
    curl_close($curl);
    writeToLog($args, $result);

    $result = json_decode($result, true);

    if ($result === null) {
        header('Location: '.$urlForEmptyRequiredFields);
        exit;
    } else {
        $parameters = [
            'uc' => $args['uc'],
            'fio' => $args['fio'],
            'phone' => $args['phone']
        ];

        $urlSuccess .= '?' . http_build_query($parameters);

        header('Location: '.$urlSuccess);
        exit;
    }
}
?>

