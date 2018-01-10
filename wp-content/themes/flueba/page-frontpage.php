<?php get_header(); ?>
<?php
while (have_posts()) {
  the_post();

  $assetsDir = get_stylesheet_directory_uri();
?>

<div class="container">

  <div class="row">
    <div class="col-md-4 p-4">
      <h2>Neuigkeiten</h2>
    </div>

    <div class="col-md-4 p-4">
      <h2>Aktuelle Termine</h2>
<?php
  $the_query = new WP_Query(array(
    'numberposts' => -1,
    'post_type' => 'termin',
    'meta_key' => 'date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
      array(
	'key'     => 'show_on_start_page',
	'value'   => '1',
	'compare' => '=='
      ),
      array(
	'key'     => 'date',
	'value'   => date('Ymd'),
	'compare' => '>='
      )
    )
  ));

  $count = 0;
  while ($the_query->have_posts()) {
    $count++;
    $the_query->the_post(); ?>
  <h3><?php the_title(); ?></h3>
  <?php the_field('subscript'); ?><br>
  <a href="<?php the_permalink(); ?>">Mehr ....</a>
<?php
  }
  wp_reset_query();
?>
<?php
  if ($count == 0){
    echo "<p>". __("Im Moment gibt es keine aktuellen Termine.", 'flueba') ."<br>";
    ?><a href="<?php echo get_page_link(238);?>"><?= __('Zum Archiv ...', 'flueba') ?></a></p><?php
  } else {
?>
  <br><br>
  <a href="<?php echo get_page_link(134);?>"><?= __('Alle Termine ...', 'flueba') ?></a>
  <?php } ?>
</div>

<div class="col-md-4 help-needed p-4">
  <h2><?= __('Sachspenden / Hilfe gesucht', 'flueba') ?></h2>
  <ul>
<?php
  $the_query = new WP_Query(array(
    'numberposts' => -1,
    'post_type' => 'sachspende',
    'meta_key' => 'done',
    'meta_query' => array(array(
      'key'   => 'done',
      'value' => '0',
      'compare'    => '=='
    ))
  ));

  // TODO show notice if no spenden are to be displayed

  while ($the_query->have_posts()) {
    $the_query->the_post(); ?>
  <li>
    <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
  </li>
<?php
    }
    wp_reset_query();
?>
      </ul>
    </div>
  </div>

<?php } ?>
</div>

<?php get_footer(); ?>
