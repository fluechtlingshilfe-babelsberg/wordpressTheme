<?php
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => __( 'Sachspenden', '' ),
		"singular_name" => __( 'Sachspende', '' ),
		"menu_name" => __( 'Sachspenden', '' ),
		"all_items" => __( 'Alle Sachspenden', '' ),
		"add_new" => __( 'Neue Sachspende', '' ),
		"add_new_item" => __( 'Neue Sachspenden hinzufügen', '' ),
		"edit" => __( 'Bearbeiten', '' ),
		"edit_item" => __( 'Sachspende bearbeiten', '' ),
		"new_item" => __( 'Neue Sachspende', '' ),
		"view" => __( 'Ansehen', '' ),
		"view_item" => __( 'Sachspende ansehen', '' ),
		"search_items" => __( 'Sachspenden suchen', '' ),
		"not_found" => __( 'Keine Sachspenden gefunden', '' ),
		"not_found_in_trash" => __( 'Keine Sachspenden im Papierkorb gefunden', '' ),
		);

	$args = array(
		"label" => __( 'Sachspenden', '' ),
		"labels" => $labels,
		"description" => "Sachspende nach denen gesucht wird",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "sachspende", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title", "editor", "custom-fields" ),		
		"taxonomies" => array( "post_tag", "ag" ),
			);
	register_post_type( "sachspende", $args );

	$labels = array(
		"name" => __( 'Termine', '' ),
		"singular_name" => __( 'Termin', '' ),
		);

	$args = array(
		"label" => __( 'Termine', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "termin", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title" ),		
		"taxonomies" => array( "ag" ),
			);
	register_post_type( "termin", $args );

	$labels = array(
		"name" => __( 'Pressemitteilungen', '' ),
		"singular_name" => __( 'Pressemitteilung', '' ),
		"menu_name" => __( 'Pressemitteilungen', '' ),
		"all_items" => __( 'Alle Pressemitteilungen', '' ),
		"add_new" => __( 'Neue hinzufügen', '' ),
		"add_new_item" => __( 'Neue Pressemitteilunge hinzufügen', '' ),
		"edit_item" => __( 'Pressemitteilung bearbeiten', '' ),
		"new_item" => __( 'Neue Pressemitteilung', '' ),
		"view" => __( 'ANz', '' ),
		"view_item" => __( 'Pressemitteilung anzeigen', '' ),
		"search_items" => __( 'Pressemitteilung suchen', '' ),
		"not_found" => __( 'Keine Pressemitteilungen gefunden', '' ),
		"not_found_in_trash" => __( 'Keine Pressemitteilungen im Papierkorb gefunden', '' ),
		);

	$args = array(
		"label" => __( 'Pressemitteilungen', '' ),
		"labels" => $labels,
		"description" => "Pressemitteilungen",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "pressemitteilung", "with_front" => true ),
		"query_var" => true,
							);
	register_post_type( "pressemitteilung", $args );

	$labels = array(
		"name" => __( 'Kontaktpersonen', '' ),
		"singular_name" => __( 'Kontaktperson', '' ),
		);

	$args = array(
		"label" => __( 'Kontaktpersonen', '' ),
		"labels" => $labels,
		"description" => "Unsere Ansprechpartner",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "contact", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title", "thumbnail" ),					);
	register_post_type( "contact", $args );

// End of cptui_register_my_cpts()
}
?>
