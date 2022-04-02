<div class="offer">
  <?php if (get_field('video_url')) { ?>
    <div class="responsive-embed">
      <iframe src="<?php the_field('video_url') ?>" frameborder="0" allowfullscreen></iframe>
    </div>
  <?php } else {
    the_post_thumbnail('thumbnail');
  } ?>
  <a href="<?php the_permalink(); ?>">
    <h3><?php the_title(); ?></h3>
  </a>
  <div class="offer-excerpt"><?php the_excerpt(); ?></div>
  <a href="<?php the_permalink(); ?>" class="button">
    Weiterlesen
  </a>
</div>
