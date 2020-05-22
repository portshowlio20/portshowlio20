"use strict";

function getScrollPercent() {
  var h = document.documentElement,
    b = document.body,
    footer = document.getElementById("our-planets"),
    st = "scrollTop",
    sh = "scrollHeight";
  var scrollPercent =
    ((h[st] || b[st]) /
      ((h[sh] || b[sh]) - h.clientHeight - footer.clientHeight)) *
    100;
  return scrollPercent;
}
