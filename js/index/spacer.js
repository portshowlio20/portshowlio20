"use strict";

function addSpacerDivs(element) {
  // TODO: add "factor" that can be passed in
  element.childNodes.forEach(function (child, index) {
    if (index % 2 == 0) return;
    var spacer = document.createElement("div");
    spacer.classList.add("spacer");
    element.insertBefore(spacer, child);
  });
}
