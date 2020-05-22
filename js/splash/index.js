window.addEventListener("load", function () {
  interactiveGradients();
  canvasNoise();
  countdownTimer();
  setInterval(countdownTimer, 1000);
});

window.addEventListener("resize", function () {
  interactiveGradients();
});
