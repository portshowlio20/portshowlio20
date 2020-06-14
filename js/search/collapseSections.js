(function ($) {
  var studentToggle = $(".student-results .subhead");
  var workToggle = $(".work-results .subhead");
  var studentContent = $('.student-results [data-active="students"]');
  var workContent = $(".work-results .works-grid");
  var studentChevron = $(".student-results .chevron");
  var workChevron = $(".work-results .chevron");

  studentToggle.click(handleStudentToggle);
  workToggle.click(handleWorkToggle);

  function handleStudentToggle() {
    studentContent.slideToggle(400, function () {
      if (studentContent.is(":visible")) {
        studentChevron.addClass("up");
      } else {
        studentChevron.removeClass("up");
      }
    });
  }

  function handleWorkToggle() {
    workContent.slideToggle(400, function () {
      if (workContent.is(":visible")) {
        workChevron.addClass("up");
      } else {
        workChevron.removeClass("up");
      }
    });
  }
})(jQuery);
