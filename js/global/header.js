function header() {
  const header = document.querySelector("#masthead");
  const remInPx = getComputedStyle(document.body)
    .getPropertyValue("font-size")
    .replace(/\D/g, "");

  window.addEventListener("scroll", function () {
    if (window.scrollY >= 3 * remInPx) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });
}

header();
