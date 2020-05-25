"use strict";

function gradientFeather() {
  var can = document.getElementById("gradient-feather");
  var ctx = can.getContext("2d");
  var win = {
    w: window.innerWidth,
    h: window.innerHeight,
  };
  can.width = win.w;
  can.height = win.h;
  var img = new Image();
  img.src =
    "https://res.cloudinary.com/fartinmartin/image/upload/f_auto,g_center,q_auto/v1588362303/artboard1.png";
  can.addEventListener(
    "mousemove",
    function (e) {
      var mouse = {
        x: e.clientX,
        y: e.clientY,
      };
      redraw(mouse);
    },
    false
  );

  function redraw(mouse) {
    // can.width = can.width;
    ctx.clearRect(0, 0, win.w, win.h);
    coverImg(img, "cover");
    clipArc(ctx, mouse.x, mouse.y, 50, 400);
  }

  function clipArc(ctx, x, y, r, f) {
    /// context, x, y, radius, feather size
    /// create off-screen temporary canvas where we draw in the shadow
    var temp = document.createElement("canvas"),
      tx = temp.getContext("2d");
    temp.width = ctx.canvas.width;
    temp.height = ctx.canvas.height; /// offset the context so shape itself is drawn outside canvas

    tx.translate(-temp.width * 1000, 0); /// offset the shadow to compensate, draws shadow only on canvas

    tx.shadowOffsetX = temp.width * 1000;
    tx.shadowOffsetY = 0; /// black so alpha gets solid

    tx.shadowColor = "#000"; /// "feather"

    tx.shadowBlur = f; /// draw the arc, only the shadow will be inside the context

    tx.beginPath();
    tx.arc(x, y, r, 0, 2 * Math.PI);
    tx.closePath();
    tx.fill(); /// now punch a hole in main canvas with the blurred shadow

    ctx.save();
    ctx.globalCompositeOperation = "destination-in";
    ctx.drawImage(temp, 0, 0);
    ctx.restore();
  }

  function coverImg(img, type) {
    var imgRatio = img.height / img.width;
    var winRatio = win.h / win.h;

    if (
      (imgRatio < winRatio && type === "contain") ||
      (imgRatio > winRatio && type === "cover")
    ) {
      var h = win.h * imgRatio;
      ctx.drawImage(img, 0, (win.h - h) / 2, win.h, h);
    }

    if (
      (imgRatio > winRatio && type === "contain") ||
      (imgRatio < winRatio && type === "cover")
    ) {
      var w = (win.h * winRatio) / imgRatio;
      ctx.drawImage(img, (win.w - w) / 2, 0, w, win.h);
    }
  }

  window.addEventListener("resize", function resize() {
    win.w = window.innerWidth;
    win.h = window.innerHeight;
    can.width = win.w;
    can.height = win.h;
    can.style.width = "".concat(win.w, "px");
    can.style.height = "".concat(win.h, "px");
  });
}

gradientFeather();
