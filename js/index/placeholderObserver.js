"use strict";

var options = {
  root: null,
  rootMargin: "0px 0px -33% 0px",
  threshold: 0.5,
};

function placeholderFade(target) {
  var io = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
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
}

const placeholders = document.querySelectorAll(".works-grid .placeholder");
placeholders.forEach((element) => placeholderFade(element));
