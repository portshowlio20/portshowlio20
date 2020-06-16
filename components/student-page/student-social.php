<?php if (have_rows('social_media')): ?>
  <?php while (have_rows('social_media')):
    the_row(); ?>

    <?php if (get_sub_field('instagram')): ?>
    <li class="social-network">
      <a href="https://www.instagram.com/<?php echo the_sub_field(
        'instagram'
      ); ?>" target="_blank" rel="noopener noreferrer">Instagram</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('facebook')): ?>
    <li class="social-network">
      <a href="https://www.facebook.com/<?php echo the_sub_field(
        'facebook'
      ); ?>" target="_blank" rel="noopener noreferrer">Facebook</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('youtube')): ?>
    <li class="social-network">
      <a href="https://www.youtube.com/channel/<?php echo the_sub_field(
        'youtube'
      ); ?>" target="_blank" rel="noopener noreferrer">YouTube</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('dribbble')): ?>
    <li class="social-network">
      <a href="https://www.dribbble.com/<?php echo the_sub_field(
        'dribbble'
      ); ?>" target="_blank" rel="noopener noreferrer">Dribbble</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('linkedin')): ?>
    <li class="social-network">
      <a href="https://www.linkedin.com/in/<?php echo the_sub_field(
        'linkedin'
      ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('twitter')): ?>
    <li class="social-network">
      <a href="https://www.twitter.com/<?php echo the_sub_field(
        'twitter'
      ); ?>" target="_blank" rel="noopener noreferrer">Twitter</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('behance')): ?>
    <li class="social-network">
      <a href="https://www.behance.net/<?php echo the_sub_field(
        'behance'
      ); ?>" target="_blank" rel="noopener noreferrer">Behance</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('vimeo')): ?>
    <li class="social-network">
      <a href="https://www.vimeo.com/<?php echo the_sub_field(
        'vimeo'
      ); ?>" target="_blank" rel="noopener noreferrer">Vimeo</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('flickr')): ?>
    <li class="social-network">
      <a href="https://www.flickr.com/photos/<?php echo the_sub_field(
        'flickr'
      ); ?>" target="_blank" rel="noopener noreferrer">Flickr</a>
    </li>
    <?php endif; ?>

    <?php if (get_sub_field('github')): ?>
    <li class="social-network">
      <a href="https://github.com/<?php echo the_sub_field(
        'github'
      ); ?>" target="_blank" rel="noopener noreferrer">GitHub</a>
    </li>
    <?php endif; ?>

  <?php
  endwhile; ?>
<?php endif; ?>
