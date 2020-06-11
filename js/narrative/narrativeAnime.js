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
    duration: dur,
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
      // dur - 1500
      dur
    )
    .add({
      targets: ".headline.two .char",
      translateY: [0, -100],
      opacity: [1, 0],
      easing: "easeInBack",
    });
  window.addEventListener("scroll", function () {
    var scrollPercent = getScrollPercent();

    animation.seek((scrollPercent / 100) * 4 * animation.duration);
    animation2.seek((scrollPercent / 100) * 1.25 * animation2.duration);
  });
}

Splitting();
narrativeAnime();
