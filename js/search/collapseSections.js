(function ($) {
  var studentToggle = $(".student-results .subhead");
  var workToggle = $(".work-results .subhead");
  var studentContent = $('.student-results [data-active="students"]');
  var workContent = $(".work-results .works-grid");

  studentToggle.click(handleStudentToggle);
  workToggle.click(handleWorkToggle);

  function handleStudentToggle() {
    studentContent.slideToggle(400, function () {
      if (studentContent.is(":visible")) {
        studentToggle.children().last().html("/\\");
      } else {
        studentToggle.children().last().html("\\/");
      }
    });
  }

  function handleWorkToggle() {
    workContent.slideToggle(400, function () {
      if (workContent.is(":visible")) {
        workToggle.children().last().html("/\\");
      } else {
        workToggle.children().last().html("\\/");
      }
    });
  }
})(jQuery);
