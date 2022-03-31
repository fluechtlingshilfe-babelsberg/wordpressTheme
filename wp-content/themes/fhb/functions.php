<?php

include('acf.php');
include('post-type-news.php');
include('post-type-offers.php');

// Remove useless stuff...
wp_deregister_script('jquery');
wp_register_script('jquery', '', '', '', true);
add_action( 'wp_footer', function() { wp_deregister_script( 'wp-embed' ); });
remove_action('wp_head', 'print_emoji_detection_script', 7); // no php needed above it
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles'); // php is not closed in the last line

add_action('admin_menu', function() {
  if (!current_user_can('manage_options')) {
    remove_menu_page('tools.php');
    remove_menu_page('wpcf7');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
    remove_menu_page('edit-comments.php');
    remove_menu_page('themes.php');
  } else {
    acf_add_options_page();
  }
});

add_action( 'wp_before_admin_bar_render', function() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('customize');
});

add_filter('manage_termine_posts_columns', 'fhb_termine_add_columns');
function fhb_termine_add_columns($columns) {
  unset($columns['date']);
  $columns['datum'] = 'Termin Datum';
  $columns['uhrzeit'] = 'Termin Uhrzeit';

  return $columns;
}

add_action('manage_termine_posts_custom_column' , 'fhb_termine_add_columns_data', 10, 2);
function fhb_termine_add_columns_data($column, $post_id) {
  switch ($column) {
    case 'datum':
      if (date('Y-m-d') <= get_field('date', $post_id)) {
        echo get_field('date', $post_id);
      } else {
        echo '<s>' . get_field('date', $post_id) . '</s>';
      }
      break;
    case 'uhrzeit':
      echo get_field('time', $post_id) . (get_field('time_end') ? '-' . get_field('time_end') : '');
      break;
  }
}

add_filter( 'manage_edit-termine_sortable_columns', 'fhb_termine_sortable_columns' );
function fhb_termine_sortable_columns($columns) {
  $columns['datum'] = 'datum';
  return $columns;
}

add_action('pre_get_posts', 'fhb_termine_orderby');
function fhb_termine_orderby($query) {
  if (! is_admin())
    return;
  $orderby = $query->get('orderby');
  if ('datum' == $orderby) {
    $query->set('meta_key', 'date');
    $query->set('orderby', 'meta_value');
  }
}

// Theme config
define('DISALLOW_FILE_EDIT', true);
add_theme_support('post-thumbnails');
add_theme_support('nav-menus');
register_nav_menus(array('primary' => __('Primary Menu', 'Theme Name'),));

// Menu generator
function wp_get_menu_array($current_menu) {
  $array_menu = wp_get_nav_menu_items($current_menu);
  $menu = array();
  foreach ($array_menu as $m) {
    if (empty($m->menu_item_parent)) {
      $menu[$m->ID]             = array();
      $menu[$m->ID]['ID']       = $m->ID;
      $menu[$m->ID]['title']    = $m->title;
      $menu[$m->ID]['url']      = $m->url;
      $menu[$m->ID]['children'] = array();
    }
  }
  $submenu = array();
  foreach ($array_menu as $m) {
    if ($m->menu_item_parent) {
      $submenu[$m->ID]                                = array();
      $submenu[$m->ID]['ID']                          = $m->ID;
      $submenu[$m->ID]['title']                       = $m->title;
      $submenu[$m->ID]['url']                         = $m->url;
      $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
    }
  }
  return $menu;
}

add_filter('excerpt_more', function($more) {
  return '... <a href="'.get_the_permalink().'" rel="nofollow">weiterlesen</a>';
});

add_filter('excerpt_length', function($length) { return 30; }, 999);

function fhb_title() {
  echo esc_html((get_the_title() != 'Home' && get_the_title() != '' ? get_the_title() . ' - ' : '') . get_bloginfo());
}


add_action('admin_head', 'fhb_backend_custom_css');
function fhb_backend_custom_css() {
  echo '<style>
  #taxonomy-category #category-adder {
    display: none;
  }
  </style>';
}


add_action('login_enqueue_scripts', 'fhb_add_login_stylesheet');
function fhb_add_login_stylesheet() {
  wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/css/style.css');
}

function fhb_register_sidebars() {
  register_sidebar(
    array(
      'name'          => 'Home Top Sidebar',
      'id'            => 'home-top-sidebar',
      'description'   => 'Add widgets here to appear at the top of the home page.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '',
      'after_title'   => '',
    )
  );
  register_sidebar(
    array(
      'name'          => 'Home Activities Top Description',
      'id'            => 'home-top-activities',
      'description'   => 'Add widgets here to appear just above the activities list on the home page.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '',
      'after_title'   => '',
    )
  );
} 
add_action( 'widgets_init', 'fhb_register_sidebars' );
