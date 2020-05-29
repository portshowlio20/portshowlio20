function proximityFun() {
  (function ($) {
    $(document).on("mousemove", function (ev) {
      var mouseX = ev.originalEvent.pageX;
      var mouseY = ev.originalEvent.pageY;

      $(".student-card").each(function () {
        var studentWidth = $(this).width();
        var studentHeight = $(this).height();
        var studentX = $(this).position().left + studentWidth / 2;
        var studentY = $(this).position().top + studentHeight / 2;

        var diffX = mouseX - studentX;
        var diffY = mouseY - studentY;

        var hypot = Math.hypot(diffX, diffY);
        var range = 100;
        var factor = 10;

        // if you're within the range:
        if (hypot < range) {
          let newX = hypot;
          let newY = hypot;

          if (mouseX < studentX) {
            // mouse is to the left of student
            newX = newX * -1;
          }

          if (mouseY < studentY) {
            // mouse is above the student
            newY = newY * -1;
          }

          anime({
            targets: this,
            translateX: newX / factor,
            translateY: newY / factor,
            duration: 100,
            easing: "easeOutSine",
          });
        }

        // if you're out of the range:
        else if (hypot > range) {
          anime({
            targets: this,
            translateX: 0,
            translateY: 0,
            duration: 50,
            easing: "easeOutSine",
          });
        }
      });
    });
  })(jQuery);
}
// proximityFun();
