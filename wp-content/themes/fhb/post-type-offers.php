<?php

add_action('init', function() {

	$labels = array(
		"name" => __( "Angebote", "" ),
		"singular_name" => __( "Angebot", "" ),
	);

	$args = array(
		"label" => __( "Angebote", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "angebote", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-megaphone",
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
	);

	register_post_type( "offers", $args );
});
