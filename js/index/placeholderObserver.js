"use strict";

var options = {
  root: null,
  rootMargin: "0px 0px -33% 0px",
  threshold: 0.5,
};

var placeholderFade = function placeholderFade(target) {
  var io = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
      // would require getWindowSize.js 🚨
      // // if placeholder is past the height of the window
      // if (entry.boundingClientRect.top >= windowSize.h) {
      // } // pause canvas animation
      // // console.log(entry.target.childNodes);
      // // https://stackoverflow.com/questions/32097659/play-pause-any-canvas-animation
      // // if placeholder is real close to the bottom of the window

      // if (entry.boundingClientRect.top >= windowSize.h - 200) {
      // } // start canvas animation
      // // console.log(entry.target.childNodes);
      // // https://stackoverflow.com/questions/32097659/play-pause-any-canvas-animation
      // // if placeholder has passed the 33% threshold

      if (entry.isIntersecting) {
        var placeholder = entry.target; // fade with CSS animation (when "visible" is added to classList)

        placeholder.classList.add("visible"); // after animation finished (2s) remove node

        setTimeout(function () {
          var placeholder = entry.target;
          placeholder.remove();
        }, 2000); // same length as CSS opacity animation on .placeholder

        observer.disconnect();
      }
    });
  }, options);
  io.observe(target);
};

const placeholders = document.querySelectorAll("#index .placeholder");
placeholders.forEach(placeholderFade);
