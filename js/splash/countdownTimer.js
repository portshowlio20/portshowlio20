"use strict";

// TODO: set time to PDT (-7hours? before calculations?)
function countdownTimer() {
  var difference = +new Date("2020-06-17T00:00:00") - +new Date();
  var parts = "Time's up!";

  if (difference > 0) {
    parts = {
      days: Math.floor(difference / (1000 * 60 * 60 * 24)),
      hours: Math.floor((difference / (1000 * 60 * 60)) % 24),
      minutes: Math.floor((difference / 1000 / 60) % 60),
      seconds: Math.floor((difference / 1000) % 60),
    };
  } // console.log(parts);

  document.getElementById("days").innerHTML = parts.days;
  document.getElementById("hours").innerHTML = parts.hours;
  document.getElementById("minutes").innerHTML = parts.minutes;
  document.getElementById("seconds").innerHTML = parts.seconds;
}

countdownTimer();
setInterval(countdownTimer, 1000);
