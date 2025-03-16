<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<!-- LINKHERE <?php get_post_type_archive_link( 'angebot' ) ?> -->

<section class="uk-container">
  <?php get_template_part('templates/home-top-sidebar'); ?>

  <div class="uk-grid uk-margin-medium-top">
    <div class="offer-container dark-theme uk-width-2-3@m uk-width-1-2@s">
      <?php $offers = new WP_Query(['post_type' => 'offers', 'posts_per_page' => -1]); ?>
      <?php dynamic_sidebar('home-top-activities'); ?>
      <hr>
      <div class="uk-child-width-1-2@m" uk-grid>
        <?php while ($offers->have_posts()) : ?>
          <?php $offers->the_post(); ?>
          <?php get_template_part('templates/offer'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>

    <?php
    $events = get_posts(['post_type' => 'termine', 'meta_key' => 'date', 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => -1]);
    $events = array_filter($events, function ($post) {
      $now = date('Y-m-d');
      $end_date = get_field('date_end', $post->ID);
      return $now <= get_field('date', $post->ID) || (!empty($end_date) && $now <= $end_date);
    });
    function show_events($events)
    {
      global $post;
    ?>
      <h2>Aktuelle Termine</h2>
      <?php foreach ($events as $post) : ?>
        <?php
        if (true) : ?>
          <div class="event">
            <a href="<?php echo get_permalink(); ?>">
              <h3><?php echo date('d.m.Y', strtotime(get_field('date', $post->ID))) . ' ' . get_field('time') . (get_field('date_end') || get_field('time_end') ? ' - ' . (get_field('date_end') ? date('d.m.Y', strtotime(get_field('date_end'))) : '') . ' ' . get_field('time_end') : '') ?><br><?php the_title(); ?></h3>
            </a>
            <?php the_content('weiterlesen'); ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
      <p>
        <a href="termine" class="more-link">zum Archiv...</a>
      </p>
    <?php } ?>

    <div class="events-container uk-width-1-3@m uk-width-1-2@s">
      <?php if (!empty($events)) show_events($events); ?>
      <h2>Aktuelles</h2>
      <?php foreach (get_posts(array("posts_per_page" => 8)) as $post) : setup_postdata($post); ?>
        <div class="news">
          <a href="<?php echo get_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>
          <?php the_content('weiterlesen'); ?>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>

