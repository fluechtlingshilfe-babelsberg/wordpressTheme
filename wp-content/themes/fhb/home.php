<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<div class="uk-grid-collapse" uk-grid>

  <div class="uk-width-2-3@m uk-width-1-2@s">
    <?php get_template_part('templates/home-top-sidebar'); ?>
    <div class="uk-grid-collapse uk-child-width-1-2@m uk-child-width-1-1@s" uk-grid>
      <?php $offers = new WP_Query(['post_type' => 'offers', 'posts_per_page' => -1]); ?>
      <?php if ($offers->post_count) {?>
      <div class="news-container">
        <h2>Aktuelle Angebote</h2>
        <?php while ($offers->have_posts()) : ?>
          <?php $offers->the_post(); ?>
            <div class="offer uk-clearfix">
              <?php if (get_field('video_url')) { ?>
              <div class="responsive-embed">
                <iframe
                  src="<?php echo get_field('video_url') ?>"
                  frameborder="0"
                  allowfullscreen></iframe>
              </div>
              <br>
              <?php } else {
                the_post_thumbnail('thumbnail');
              } ?>
              <a href="<?php echo get_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
              </a>
              <?php the_excerpt(); ?>
              <a href="<?php echo get_permalink(); ?>" class="button">
                Weiterlesen
              </a>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
      <?php } ?>

      <div>
        <div class="events-container">
          <h2>Aktuelle Termine</h2>
          <?php $events = new WP_Query(['post_type' => 'termine', 'meta_key' => 'date', 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => -1]); ?>
          <?php while ($events->have_posts()) : ?>
            <?php $events->the_post(); ?>
            <?php
            $now = date('Y-m-d');
            $end_date = get_field('date_end', $post->ID);
            if ($now <= get_field('date', $post->ID) || (!empty($end_date) && $now <= $end_date)): ?>
              <div class="event">
                <a href="<?php echo get_permalink(); ?>">
                  <h3><?php echo date('d.m.Y', strtotime(get_field('date', $post->ID))) . ' ' . get_field('time') . (get_field('date_end') || get_field('time_end') ? ' - ' . (get_field('date_end') ? date('d.m.Y', strtotime(get_field('date_end'))) : '') . ' ' . get_field('time_end') : '') ?><br><?php the_title(); ?></h3>
                </a>
                <?php the_content('weiterlesen'); ?>
              </div>
            <?php endif; ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <p>
            <a href="termine" class="more-link">zum Archiv...</a>
          </p>

          <h2>Neuigkeiten</h2>
          <?php foreach(get_field('news') as $post): setup_postdata($post); ?>
            <div class="news">
              <a href="<?php echo get_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
              <?php the_content('weiterlesen'); ?>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php endforeach; ?>

          </div>
        </div>
      </div>
  </div>

  <div class="uk-section-primary text uk-width-expand@s uk-width-1-3@m uk-width-1-1@s">
    <div class="content-container">
      <?php the_field('content'); ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
