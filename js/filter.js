// YT#1: https://www.youtube.com/watch?v=lz-daH9ZajU
// YT#2: https://www.youtube.com/watch?v=Z0Jw226QKAM (nonce for security??)
// Loading state: https://makitweb.com/display-loading-image-when-ajax-call-is-in-progress/
(function ($) {
  $(document).ready(function () {
    // 1. init variables
    var toggle = $("#works-student-toggle input:checked").val(); // initial state set here
    var worksFilters = [];
    var studentsFilters = [];

    // #?. fix for checkbox state misalignment
    $("#filter #works-toggle").on("click", function () {
      $("#filter #works-filters")
        .find("input[type=checkbox]")
        .each(function () {
          if ($(this).is(":checked")) {
            worksFilter.push($(this).val());
          }
        });
    });

    $("#filter #students-toggle").on("click", function () {
      $("#filter #students-filters")
        .find("input[type=checkbox]")
        .each(function () {
          if ($(this).is(":checked")) {
            studentsFilter.push($(this).val());
          }
        });
    });

    // 2. set state of listed/dynamic variables
    // 2a. worksFilters
    $("#filter #works-filters")
      .find("input[type=checkbox]")
      .each(function () {
        if ($(this).is(":checked")) {
          worksFilters.push($(this).val());
        }
      });

    // 2b. studentsFilters
    $("#filter #students-filters")
      .find("input[type=checkbox]")
      .each(function () {
        if ($(this).is(":checked")) {
          studentsFilters.push($(this).val());
        }
      });

    // 3. listen to any <input> change on our form
    $("#filter").on("change", "input", function (e) {
      e.preventDefault();

      // 4a. update toggle state
      if ($(this).val() == "works") {
        toggle = "works";
      } else if ($(this).val() == "students") {
        toggle = "students";
      }

      // 4a. update worksFilters state
      var parentDivId = $(this).parents()[1].id; // 🚨 brittle!!

      if (parentDivId == "works-filters" && $(this).is(":checked")) {
        worksFilters.push($(this).val());
      } else {
        worksFilters = worksFilters.filter((x) => x != $(this).val());
      }

      // 4a. update studentsFilters state
      if (parentDivId == "students-filters" && $(this).is(":checked")) {
        studentsFilters.push($(this).val());
      } else {
        studentsFilters = studentsFilters.filter((x) => x != $(this).val());
      }

      // console.log("toggle", toggle);
      // console.log("worksFilters", worksFilters);
      // console.log("studentsFilters", studentsFilters);

      $.ajax({
        url: wp_ajax.ajax_url,
        data: {
          action: "filter",
          toggle: toggle,
          worksFilters: worksFilters,
          studentsFilters: studentsFilters,
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
          // console.warn(result);
          console.warn(result.status, result.statusText);
        },
        complete: function () {
          $("#response").css("background", "white");
        },
      });
    });

    // ajax call on load to load the the current filters!
    $.ajax({
      url: wp_ajax.ajax_url,
      data: {
        action: "filter",
        toggle: toggle,
        worksFilters: worksFilters,
        studentsFilters: studentsFilters,
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
        // console.warn(result);
        console.warn(result.status, result.statusText);
      },
      complete: function () {
        $("#response").css("background", "white");
      },
    });
  });
})(jQuery);
