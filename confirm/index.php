﻿<!DOCTYPE html>
<html lang="en">

<head>
	<title>Thanks for your order!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <link href="css2.css?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <style>
body{height:100%;width:100%;margin:0;position:absolute;font-family:Roboto,sans-serif;font-weight:300;color:#141011}h1{text-transform:uppercase}h2{text-transform:uppercase;font-size:25px;margin:0}a{text-decoration:none;color:#141011}ul{padding-inline-start:0}canvas{width:100%;height:100%;position:absolute}#particles-js{position:fixed;width:100%;height:100%;padding:0;background-color:#f2f2f2;background-image:url("");background-repeat:no-repeat;z-index:999}#wrapper{width:100%;height:100%;display:table;position:absolute}#content{display:table-cell;vertical-align:middle}.success-page{width:500px;margin:0 auto;position:relative;box-sizing:border-box;padding:50px 30px;z-index:9999999;text-align:center;background-color:rgba(255,255,255,.5)}.list-info__list{list-style:none}.list-info__item{display:flex;flex-direction:column;text-align:center}.list-info__text{padding-top:10px}.list-info__info{font-size:20px}.success-page__text{padding-bottom:10px}.success-page__message_fail{padding-top:15px}.success-page_back_button{display:flex;align-items:center;justify-content:center;width:50%;height:50px;background-color:#ff6c34;margin:0 auto;border-radius:25px;text-transform:uppercase;transition:.5s ease}.success-page_back_button:hover{background-color:#fab296}.success-page_back_button a{color:#fff;font-weight:300}.success_icon{border-radius:300px;display:table;margin:20px auto 20px auto}.success_icon p{display:table-cell;vertical-align:middle;font-size:50px;color:#fff;width:100px;height:100px;background-color:#549127;border-radius:300px;animation-name:twist;animation-delay:.2s;animation-duration:1s;animation-iteration-count:1;transform:scale(1)}dir,menu,ul{text-align:left}@keyframes twist{0%{transform:scale(0)}60%{transform:scale(1.2)}70%{transform:scale(.9)}85%{transform:scale(1.1)}100%{transform:scale(1)}}@media (max-width:490px){.success-page{width:95%;padding:20px 5px}}
    </style>
</head>

<body>
	<iframe width="1" height="1" alt="" style="display:none" src="pixel.php?px=<?php echo $_GET['uc'];?>"></iframe>
    <div id="particles-js"></div>
    <div id="wrapper">
        <div id="content">
            <div class="mod success-page">
                <h2 class="success-page__title">Thanks for your order!</h2>
                <div class="success_icon">
                    <p>&#10003;</p>
                </div>
                <h2>OUR SPECIALIST WILL CONTACT YOU IN THE NEAREST TIME!</h2>
                
                <p class="success-page__message_fail">
                    <a class="success-page__message_fail__link" href="javascript:history.back()">
                        If you made a mistake when filling out the form, please fill it in again.
                    </a>
                </p>
                
            </div>
        </div>
    </div>
    <script src="particles.js/2.0.0/particles.min.js"></script>
    <script src="examples/js/libs/stats.min.js"></script>
    <script type="text/javascript" src="_assets/jquery.min.js"></script>
    <script src="_assets/main.js"></script>


</body>

</html>