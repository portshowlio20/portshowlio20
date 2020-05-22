"use strict";

var windowSize;

function getWindowSize() {
  var w = window.innerWidth;
  var h = window.innerHeight;
  windowSize = {
    w: w,
    h: h,
  };
  return windowSize;
}
