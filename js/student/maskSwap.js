function maskSwap() {
  var gradient = document.querySelector(".bio-grid .gradient");
  var headshot = document.querySelector(".bio-grid .headshot");
  gradient.addEventListener("mouseenter", function () {
    headshot.classList.add("mask-time");
  });
  gradient.addEventListener("mouseleave", function () {
    headshot.classList.remove("mask-time");
  });
}

maskSwap();
