function secretCode() {
  document.addEventListener("DOMContentLoaded", () => {
    "use strict";

    const options = {
      eventType: "keydown",
      keystrokeDelay: 1000,
    };

    keyMapper([handleSecretCode], options);
  });

  function keyMapper(callbackList, options) {
    const eventType = (options && options.eventType) || "keydown";
    const keystrokeDelay = (options && options.keystrokeDelay) || 1000;

    let state = {
      buffer: [],
      lastKeyTime: Date.now(),
    };

    document.addEventListener(eventType, (event) => {
      const key = event.key;
      const currentTime = Date.now();
      let buffer = [];

      if (currentTime - state.lastKeyTime > keystrokeDelay) {
        buffer = [key];
      } else {
        buffer = [...state.buffer, key];
      }

      state = { buffer: buffer, lastKeyTime: currentTime };

      callbackList.forEach((callback) => callback(buffer));
    });
  }

  function handleSecretCode(keySequence) {
    const bg = document.getElementById("background");

    const validKeys = keySequence.every(
      (key) => !isNaN(parseInt(key)) || key.toLowerCase() !== key.toUpperCase()
    );
    if (!validKeys) return;

    const userSequence = keySequence.join("");
    if (userSequence == "boom") {
      runAsteroids();
    }
  }
}

secretCode();
