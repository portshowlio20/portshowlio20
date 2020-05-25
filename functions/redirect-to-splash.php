<?php

add_action('template_redirect', 'redirect_to_splash');
function redirect_to_splash()
{
  // 🚨 IF YOU UPDATE $liveDate YOU MUST FIND ALL INSTANCES (I.E. FRONT-PAGE.PHP)
  $date = new DateTime("now", new DateTimeZone('America/Los_Angeles'));
  $liveDate = new DateTime(
    '17-06-2020 00:00:00',
    new DateTimeZone('America/Los_Angeles')
  );
  if ($liveDate >= $date && !is_front_page() && !is_user_logged_in()) {
    wp_redirect(home_url(), 302);
    exit();
  }
}
