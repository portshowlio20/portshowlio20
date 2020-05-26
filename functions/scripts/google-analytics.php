<?php
add_action('wp_head', 'wpb_add_googleanalytics');
function wpb_add_googleanalytics()
{
  ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146010961-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-146010961-2');
</script>

<?php
} ?>
