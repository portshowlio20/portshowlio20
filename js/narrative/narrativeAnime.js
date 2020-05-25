"use strict";

function narrativeAnime() {
  var dur = 4000;
  anime({
    targets: ".headline.one .char",
    translateY: [
      {
        value: [100, 0],
        duration: dur,
        easing: "easeOutBack",
      },
    ],
    opacity: [
      {
        value: [0, 1],
        duration: dur,
        easing: "easeOutBack",
      },
    ],
    delay: anime.stagger(25),
    begin: function begin(anim) {
      disableScroll();
    },
    complete: function complete(anim) {
      enableScroll();
    },
  });
  var animation = anime.timeline({
    delay: anime.stagger(25),
    autoplay: false,
  });
  animation.add({
    targets: ".headline.one .char",
    translateY: [0, -100],
    opacity: [1, 0],
    easing: "easeInBack",
  });
  var animation2 = anime.timeline({
    delay: anime.stagger(25),
    autoplay: false,
  });
  animation2
    .add(
      {
        targets: ".headline.two .char",
        translateY: [100, 0],
        opacity: [0, 1],
        easing: "easeOutBack",
      },
      dur
    )
    .add({
      targets: ".headline.two .char",
      translateY: [0, -100],
      opacity: [1, 0],
      easing: "easeInBack",
    })
    .add({
      targets: ".headline.three .char",
      translateY: [100, 0],
      opacity: [0, 1],
      easing: "easeOutBack",
    })
    .add({
      targets: ".headline.three .char",
      translateY: [0, -100],
      opacity: [1, 0],
      easing: "easeInBack",
      duration: 2000,
    })
    .add(
      {
        targets: ".shape.animate",
        scale: [1.5, 1],
        translateY: ["0%", "-100vh"],
        easing: "easeOutSine",
        delay: anime.stagger(1000),
        duration: 6000,
      },
      "-=2000"
    );
  window.addEventListener("scroll", function () {
    var scrollPercent = getScrollPercent();
    var revealMe = document.getElementById("reveal-me");

    if (scrollPercent > 75) {
      revealMe.style.display = "none";
    } else {
      revealMe.style.display = "block";
    }

    animation.seek((scrollPercent / 100) * 4 * animation.duration);
    animation2.seek((scrollPercent / 100) * animation2.duration);
  });
}

Splitting();
narrativeAnime();
