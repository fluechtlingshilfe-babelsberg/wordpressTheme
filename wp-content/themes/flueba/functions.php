<?php

define('ACF_LITE', true);

require_once('lib/wp_bootstrap_navwalker.php');
require("help-functions.php");
require_once('include/taxonomies.php');
require_once('include/post-types.php');
include_once('advanced-custom-fields/acf.php');

/* THEME ASSETS */
function flueba_register_assets() {
  wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_register_style('custom', get_template_directory_uri() . '/css/custom.css');
  wp_register_script('jquery.min', get_template_directory_uri() . '/js/jquery-2.1.4.min.js');
  wp_register_script('bootstrap.min', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', 'jquery.min');

  wp_enqueue_script('jquery.min');
  wp_enqueue_script('bootstrap.min');
  wp_enqueue_style('bootstrap.min');
  wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts', 'flueba_register_assets');
add_theme_support('post-thumbnails');


/* SETUP */
function flueba_setup() {  
  register_nav_menu('primary', 'Primary navigation');
  load_theme_textdomain('flueba', get_template_directory() . '/locale');
}
add_action('after_setup_theme', 'flueba_setup' );

/* DASHBOARD WIDGET FOR NEWS TEXT */
function flueba_add_news_widget() {
  wp_add_dashboard_widget(
    'flueba_news_widget',
    'News Homepage',
    'flueba_news_widget_function'
  );	
}
function flueba_news_widget_function() {
?>
  <form onsubmit="flueba_news_save(event, this)">
<?php wp_editor(html_entity_decode(get_option('flueba_news')), 'flueba_news', array(
  'textarea_rows' => 20
)); ?>
    <br>
    <input type="submit" name="save" class="button button-primary" value="News aktualisieren">
  </form>
  <script>
  function flueba_news_save(event, form) {
    event.preventDefault();
    tinyMCE.triggerSave();

    jQuery.post(ajaxurl, {
    action: 'flueba_news_save',
      flueba_news: form.elements['flueba_news'].value
    }, function(res) {
      // TODO get us some form of feedback to that user
    });
  }
  </script>
<?php
}
add_action('wp_dashboard_setup', 'flueba_add_news_widget');

/* REPLY TO SAVING NEWS TEXT */
function flueba_news_save() {
  if (!isset($_POST['flueba_news']))
    return wp_die();

  //	update_option('flueba_news', $_POST['flueba_news']);
  update_option('flueba_news', htmlentities(stripslashes($_REQUEST['flueba_news'])));

  wp_die();
}
add_action('wp_ajax_flueba_news_save', 'flueba_news_save');

/* REPLY TO SETTING SACHSPENDEN DONE */
function flueba_set_sachspende_done() {
  if (!isset($_POST['sachspende_id']))
    return wp_die();

  print_r($_POST['sachspende_id']);
  print_r(update_field('done', '1', $_POST['sachspende_id']));
  wp_die();
}
add_action('wp_ajax_nopriv_flueba_set_sachspende_done', 'flueba_set_sachspende_done');

/* OUTPUT A TERMIN POST, NEEDS TO BE CALLED IN THE LOOP */
function the_termin($full = true) { ?>
  <em class="pull-right text-muted">
    <?php echo date_i18n("l, j. F Y", strtotime(get_field('date'))) ?>
  </em>
  <a href="<?php the_permalink(); ?>">
    <h3><?php the_title(); ?></h3>
  </a>

  <h5 class="text-muted"><?php the_field("subscript"); ?></h5>
<?php if ($full) {
the_field("description");
$terms = get_the_terms($post->ID, 'ag');
if ($terms) {
  foreach ($terms as &$term) { ?>
    <a href="<?php echo get_term_link($term) ?>" class="label label-info"><?php echo $term->name; ?></a>
<?php }
}
}
}

add_filter('locale', 'set_my_locale');
function set_my_locale($lang) {
  return 'en';
}
