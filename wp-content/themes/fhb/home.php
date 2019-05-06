<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-collapse" uk-grid>

  <div>
    <div class="news-container">
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

  <div>
    <div class="events-container">
      <h2>Aktuelle Termine</h2>
      <?php $events = new WP_Query(['post_type' => 'termine', 'meta_key' => 'date', 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => -1]); ?>
      <?php while ($events->have_posts()) : ?>
        <?php $events->the_post(); ?>
        <?php if (date('Y-m-d') <= get_field('date', $post->ID)): ?>
          <div class="event">
            <a href="<?php echo get_permalink(); ?>">
              <h3><?php echo date('d.m.Y', strtotime(get_field('date', $post->ID))) . ' ' . get_field('time') . (get_field('time_end') ? '-' . get_field('time_end') : '') ?><br><?php the_title(); ?></h3>
            </a>
            <?php the_content('weiterlesen'); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <p>
        <a href="termine" class="more-link">zur Archiv...</a>
      </p>
      </div>
    </div>

  <div class="uk-section-primary text uk-width-expand@s">
    <div class="content-container">
      <?php the_field('content'); ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
