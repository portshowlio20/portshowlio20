"use strict";
// https://stackoverflow.com/questions/22003491/animating-canvas-to-look-like-tv-noise
// ☝️ only worked in Firefox... 👇 works everywhere!
// https://stackoverflow.com/questions/56470604/why-does-my-canvas-noise-function-always-only-appear-red
// https://codepen.io/IbeVanmeenen/pen/vZzgvg

function canvasNoise() {
  // responsive canvas element for each gradient on page
  var gradients = document.querySelectorAll(
    ".planet, .placeholder, .student, .stewdent-bio .gradient"
  );

  // const observer = new ResizeObserver((entries) => {
  //   entries.forEach((entry) => {
  //     var width = entry.target.clientWidth;
  //     var height = entry.target.clientHeight;
  //     var canvas = entry.target.lastChild;
  //     canvas.width = width;
  //     canvas.height = height;
  //   });
  // });
  // gradients.forEach((gradient) => {
  //   observer.observe(gradient);
  // });

  gradients.forEach(function (gradient, index) {
    if (gradient.querySelector("canvas")) {
      return;
    }
    var canvas = document.createElement("canvas");
    canvas.id = index;
    canvas.classList.add("noise");
    gradient.appendChild(canvas);
    drawStuff(gradient, canvas);
  });

  function drawStuff(gradient, canvas) {
    // Init vars
    var ctx = canvas.getContext("2d");
    var width, height;
    var noiseData = [];
    var frame = 0;
    var loopTimeout;

    // Setup
    function setup() {
      var width = gradient.clientWidth;
      var height = gradient.clientHeight;
      canvas.width = width;
      canvas.height = height;

      for (var i = 0; i < 10; i++) {
        createNoise(width, height);
      }

      loop();
    }

    // Create Noise
    var createNoise = function createNoise(width, height) {
      var idata = ctx.createImageData(width, height);
      var buffer32 = new Uint32Array(idata.data.buffer);
      var len = buffer32.length;

      for (var i = 0; i < len; i++) {
        if (Math.random() < 0.5) {
          buffer32[i] = 0xff000000;
        }
      }

      noiseData.push(idata);
    };

    // Loop
    var loop = function loop() {
      paintNoise(frame);
      loopTimeout = window.setTimeout(function () {
        window.requestAnimationFrame(loop);
      }, 1000 / 25); // FPS
    };

    // Paint Noise
    var paintNoise = function paintNoise() {
      if (frame === 9) {
        frame = 0;
      } else {
        frame++;
      }

      ctx.putImageData(noiseData[frame], 0, 0);
    };

    // Init
    var init = (function () {
      setup();
    })();

    var resizeThrottle;
    var reset = function reset() {
      window.addEventListener(
        "resize",
        function () {
          window.clearTimeout(resizeThrottle);
          resizeThrottle = window.setTimeout(function () {
            window.clearTimeout(loopTimeout);
            setup();
          }, 200);
        },
        false
      );
    };
  }
}

canvasNoise();
