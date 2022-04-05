<div class="offer">
<div class="uk-card uk-card-small">
  <?php if (get_field('video_url')) : ?>
    <div class="responsive-embed">
      <iframe src="<?php the_field('video_url') ?>" frameborder="0" allowfullscreen></iframe>
    </div>
  <?php elseif (has_post_thumbnail()) : ?>
    <div class="uk-card-media-top">
      <?php the_post_thumbnail('thumbnail'); ?>
    </div>
  <?php endif; ?>
  <div class="uk-card-body uk-padding-remove">
    <a href="<?php the_permalink(); ?>">
      <h3 class="uk-card-title"><?php the_title(); ?></h3>
    </a>
    <div class="offer-excerpt"><?php the_excerpt(); ?></div>
    <a href="<?php the_permalink(); ?>" class="more-link">
      weiterlesen
    </a>
  </div>
</div>
</div>
