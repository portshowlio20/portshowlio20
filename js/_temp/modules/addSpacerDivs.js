"use strict";

function addSpacerDivs(element) {
  element.childNodes.forEach(function (child, index) {
    if (index % 2 == 0) return;
    var spacer = document.createElement("div");
    spacer.classList.add("spacer");
    element.insertBefore(spacer, child);
  });
}
