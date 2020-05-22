"use strict";

function narrativeAnime() {
  var dur = 4000;
  var del = 2000;
  var initAnimation = anime({
    targets: ".one .char",
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
    targets: ".one .char",
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
        targets: ".two .char",
        translateY: [100, 0],
        opacity: [0, 1],
        easing: "easeOutBack",
      },
      dur
    )
    .add({
      targets: ".two .char",
      translateY: [0, -100],
      opacity: [1, 0],
      easing: "easeInBack",
    })
    .add({
      targets: ".three .char",
      translateY: [100, 0],
      opacity: [0, 1],
      easing: "easeOutBack",
    })
    .add({
      targets: ".three .char",
      translateY: [0, -100],
      opacity: [1, 0],
      easing: "easeInBack",
    })
    .add({
      targets: ".shape",
      scale: [2, 1],
      easing: "easeOutQuad",
      delay: anime.stagger(500),
    });

  // var ourPlanets = document.getElementById("our-planets");

  window.addEventListener("scroll", () => {
    const scrollPercent = getScrollPercent();
    // if (scrollPercent > 106) {
    //   ourPlanets.style.zIndex = 100;
    // } else {
    //   ourPlanets.style.zIndex = -10;
    // }
    animation.seek((scrollPercent / 100) * 4 * animation.duration);
    animation2.seek((scrollPercent / 100) * animation2.duration);
  });
}
