// YT#1: https://www.youtube.com/watch?v=lz-daH9ZajU
// YT#2: https://www.youtube.com/watch?v=Z0Jw226QKAM (nonce for security??)
// Loading state: https://makitweb.com/display-loading-image-when-ajax-call-is-in-progress/
(function ($) {
  $(document).ready(function () {
    var values = [];

    $("#filter")
      .find("input[type=checkbox]")
      .each(function () {
        values.push($(this).val());
      });

    console.log("values", values);

    $("#filter").on("change", "input[type=checkbox]", function (e) {
      e.preventDefault();

      var $this = $(this);

      if ($this.is(":checked")) {
        values.push($this.val());
      } else {
        values = values.filter((x) => x != $this.val());
      }

      console.log("values", values);

      var categories = values;

      $.ajax({
        url: wp_ajax.ajax_url,
        data: {
          action: "filter",
          categories: categories,
          security: wp_ajax.security,
        },
        type: "post",
        beforeSend: function () {
          $("#work").css("background", "red");
        },
        success: function (result) {
          $("#work").html(result);
        },
        error: function (result) {
          console.warn(result);
        },
        complete: function () {
          $("#work").css("background", "white");
        },
      });
    });
  });
})(jQuery);
