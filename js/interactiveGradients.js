"use strict";

// interactive gradient
function interactiveGradients() {
  var interactiveGradients = document.querySelectorAll(".interactive-gradient");
  interactiveGradients.forEach(function (gradient) {
    var gradientHeight = gradient.offsetHeight;
    var gradientWidth = gradient.offsetWidth;
    gradient.addEventListener("mousemove", handleMouseMove);
    gradient.addEventListener("mouseleave", handleMouseLeave);
    // touch events?

    function handleMouseMove(e) {
      var mouseX = e.offsetX;
      var mouseY = e.offsetY;
      var yPercentage = Math.round((mouseY / gradientHeight) * 100);
      var xPercentage = Math.round((mouseX / gradientWidth) * 100);
      gradient.style.background = "radial-gradient(at "
        .concat(xPercentage, "% ")
        .concat(
          yPercentage,
          "% , var(--orange), var(--blue), var(--orangered))"
        );
    }
  });

  function handleMouseLeave(e) {
    e.target.style.background =
      "radial-gradient(var(--orange), var(--blue), var(--orangered))";
  }
}
