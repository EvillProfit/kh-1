$(document).ready(function () {
  $(".toform").click(function (e) {
    $("html, body").animate(
      {
        scrollTop: $("form").offset().top,
      },
      2000
    );
    return false;
  });

  var $timer = $(".js-timer");

  $timer.countdown({
    until: "+0d +1h 35m ",
    format: "HMS",
    compact: true,
    layout:
      '<li class="item hours">{h10}{h1}</li>' +
      '<li class="item minutes">{m10}{m1}</li>' +
      '<li class="item seconds">{s10}{s1}</li>',
  });
});
$(document).ready(function () {
  $(".change-package-selector2").on("change", function () {
    $(".item-gift").hide();
    $("#" + $(this).val()).show();

    var package_id = $(this).val();
    set_package_prices(package_id);
  });
});
$(document).ready(function () {
  $(".feedback").click(function () {
    $(".popup-window").show();
  });
  $(".close-popup").click(function () {
    $(".popup-window").hide();
  });
});
      (function (m, e, t, r, i, k, a) {
        m[i] =
          m[i] ||
          function () {
            (m[i].a = m[i].a || []).push(arguments);
          };
        m[i].l = 1 * new Date();
        (k = e.createElement(t)),
          (a = e.getElementsByTagName(t)[0]),
          (k.async = 1),
          (k.src = r),
          a.parentNode.insertBefore(k, a);
      })(
        window,
        document,
        "script",
        "https://mc.yandex.ru/metrika/tag.js",
        "ym"
      );
      ym(88879997, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true,
      });