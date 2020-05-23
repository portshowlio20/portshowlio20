(function ($) {
  $(document).ready(function () {
    var filters = $('#aof-filters input[type="checkbox"]');
    var filterHeading = $("#filter-heading");
    var filterContent = $(".filter-content");
    var filterActive = $("#filter-active");
    var filterActiveGlyph = $("#filter-active-glyph");
    var filterDropdownToggle = $("#filter-dropdown-toggle");
    var checked, toggle;
    var activeFilters = [];

    function checkboxStatus() {
      checked = [];
      filters.each(function () {
        if ($(this).prop("checked")) {
          checked.push($(this));
        }
      });
    }

    // on load, check if filters are set, if so update the filter heading!
    checkboxStatus();
    // if any checkboxes are check
    if (checked.length > 0) {
      // update heading and make sure it's interactive
      handleFilterHeading(true);
    }

    filters.each(function () {
      $(this).change(function () {
        checkboxStatus();

        // if any checkboxes are check
        if (checked.length > 0) {
          // update heading and make sure it's interactive
          handleFilterHeading(true);
        }

        // if all other checkboxes were checked..
        if (checked.length === filters.length - 1) {
          // ..uncheck all filters..
          filters.each(function () {
            $(this).prop("checked", false);
          });
          // ..and check the one that was clicked
          $(this).prop("checked", true);

          // update heading and make sure it's interactive
          handleFilterHeading(true);
        }

        // if no checkboxes were checked, reset all to checked:
        if (checked.length === 0) {
          filters.each(function () {
            $(this).prop("checked", true);
          });
          // update heading
          handleFilterHeading(false);
        }

        // update the displays (plural) of active checked
        checkboxStatus();
        handleActiveChecked();
      });
    });

    // on form change, send ajax
    $("#filter").change(function () {
      handleFormChange();

      // TODO: append class to .grid that states the active toggle
      // then ONLY add spacer divs to .grid if it is in works state
    });

    filterDropdownToggle.on("click", function () {
      // TODO: potentially handle roation of chevron with css animation (aka adding/removing a class here)
      handleToggleSlide();
    });

    $(document).click(function (e) {
      //if you click on anything except the modal itself or the "open modal" link, close the modal
      if (
        !$(e.target).closest("#filter").length &&
        filterContent.is(":visible")
      ) {
        handleToggleSlide();
      }
    });

    function handleFormChange() {
      checkboxStatus();
      activeFilters = [];
      checked.forEach(function (check) {
        activeFilters.push(check.val());
      });
      toggle = $("#works-students-toggle input:checked").val();

      ajaxRequest();
    }

    function handleFilterHeading(clearAllFilters) {
      // clearAllFilters is a boolean:
      // true = display "clear all filters"
      // false = display "select a discipline..."

      if (!clearAllFilters) {
        filterHeading.html("Select a discipline to apply a filter");
      } else {
        filterHeading.html("Clear all filters");

        filterHeading.on("click", function () {
          checkboxStatus();

          filters.each(function () {
            $(this).prop("checked", true);
          });

          handleFilterHeading(false);

          // update the displays (plural) of active checked
          checkboxStatus();
          handleActiveChecked();
          handleFormChange();
        });
      }
    }

    function handleActiveChecked() {
      if (checked.length === filters.length) {
        filterActive.html("");
        filterActiveGlyph.html("");
      } else {
        var activeList = [];
        checked.forEach(function (checkbox) {
          activeList.push(checkbox.val());
        });
        filterActive.html(activeList);
        filterActiveGlyph.html(activeList);
      }
    }

    function handleToggleSlide() {
      // TODO: custom easing + different easing + duration on close by redefining options in each if statement
      // var options = { duration: 400, easing: easing.speedInOut };
      filterContent.slideToggle(400, function () {
        if (filterContent.is(":visible")) {
          filterDropdownToggle.children().last().html("/\\");
          // TODO: remove "clear filters" from filter-header
        } else {
          filterDropdownToggle.children().last().html("\\/");
          // TODO: add "clear filters" from filter-header
          // TODO: will need to code functionailty for that fucker
        }
      });
    }

    function ajaxRequest() {
      $.ajax({
        url: wp_ajax.ajax_url,
        data: {
          action: "filter",
          toggle: toggle,
          filters: activeFilters,
          security: wp_ajax.security,
        },
        type: "post",
        beforeSend: function () {
          // TODO: add animtion instead of "background: red"
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
          canvasNoise();
          $("#response").css("background", "white");
          // TODO: these two commented out functions should be handled by PHP?
          // https://stackoverflow.com/questions/5459011/php-random-reorder-of-elements
          // addSpacerDivs(document.querySelector("#index .grid"));
          // shuffleElements(document.querySelectorAll("#index .project-card"));
          const placeholders = document.querySelectorAll("#index .placeholder");
          placeholders.forEach((element) => placeholderFade(element));
        },
      });
    }

    handleFormChange();
    ajaxRequest();
  });
})(jQuery);
