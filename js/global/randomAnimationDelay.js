"use strict";

function randomAnimationDelay(elms) {
  var prop, styl, cur, i;
  var delay = 2;

  if (!elms.length) {
    return;
  }

  styl = window.getComputedStyle(elms[0]);

  if (styl.getPropertyValue("animation-delay")) {
    prop = "animation-delay";
  } else if (styl.getPropertyValue("-webkit-animation-delay")) {
    prop = "-webkit-animation-delay";
  } else if (styl.getPropertyValue("-moz-animation-delay")) {
    prop = "-moz-animation-delay";
  } else {
    console.log("unable to find prop");
    return;
  }

  for (i = 0; i < elms.length; i++) {
    styl = window.getComputedStyle(elms[i]);
    cur = styl.getPropertyValue(prop);
    cur = Number(cur.replace(/[^\d\.]/g, ""));
    var value = delay * -1 * i;
    elms[i].style.setProperty(prop, value + "s");
  }
}

console.log(document.links);
randomAnimationDelay(document.links);
