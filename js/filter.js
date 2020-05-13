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
        data: { action: "filter", categories: categories },
        type: "post",
        success: function (result) {
          $("#work").html(result);
        },
        error: function (result) {
          console.warn(result);
        },
      });
    });
  });
})(jQuery);
