<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Termine.
	 */

	$labels = array(
		"name" => __( "Termine", "" ),
		"singular_name" => __( "Termin", "" ),
	);

	$args = array(
		"label" => __( "Termine", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "termine", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-calendar-alt",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "termine", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

