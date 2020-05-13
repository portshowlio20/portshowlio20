// YT#1: https://www.youtube.com/watch?v=lz-daH9ZajU
// YT#2: https://www.youtube.com/watch?v=Z0Jw226QKAM (nonce for security??)
// Loading state: https://makitweb.com/display-loading-image-when-ajax-call-is-in-progress/
(function ($) {
  $(document).ready(function () {
    var toggle;
    $("#filter").on("change", "input[type=radio]", function (e) {
      e.preventDefault();

      if ($(this).val() == "works") {
        toggle = "works";
      } else if ($(this).val() == "students") {
        toggle = "students";
      }

      // console.log(toggle);

      $.ajax({
        url: wp_ajax.ajax_url,
        data: {
          action: "toggle",
          toggle: toggle,
          security: wp_ajax.security,
        },
        type: "post",
        beforeSend: function () {
          $("#response").css("background", "red");
        },
        success: function (result) {
          $("#response").html(result);
        },
        error: function (result) {
          console.warn(result.status, result.statusText);
        },
        complete: function () {
          $("#response").css("background", "white");
        },
      });
    });
  });
})(jQuery);
