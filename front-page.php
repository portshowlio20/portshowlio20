<?php
// 🚨 IF YOU UPDATE $liveDate YOU MUST FIND ALL INSTANCES (I.E. REDIRECT-TO-SPLASH.PHP)
$date = new DateTime("now", new DateTimeZone('America/Los_Angeles'));
$liveDate = new DateTime(
  '17-06-2020 00:00:00',
  new DateTimeZone('America/Los_Angeles')
);

if ($liveDate <= $date) {
  get_template_part('components/static-pages/narrative', 'index');
} else {
  // get_template_part('components/static-pages/narrative', 'index');
  get_template_part('components/static-pages/splash', 'index');
}
