<?php
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => "Sachspenden",
		"singular_name" => "Sachspende",
		"menu_name" => "Sachspenden",
		"all_items" => "Alle Sachspenden",
		"add_new" => "Neue Sachspende",
		"add_new_item" => "Neue Sachspenden hinzufügen",
		"edit" => "Bearbeiten",
		"edit_item" => "Sachspende bearbeiten",
		"new_item" => "Neue Sachspende",
		"view" => "Ansehen",
		"view_item" => "Sachspende ansehen",
		"search_items" => "Sachspenden suchen",
		"not_found" => "Keine Sachspenden gefunden",
		"not_found_in_trash" => "Keine Sachspenden im Papierkorb gefunden",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Sachspende nach denen gesucht wird",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
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
		"name" => "Termine",
		"singular_name" => "Termin",
		);

	$args = array(
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
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
		"name" => "Pressemitteilungen",
		"singular_name" => "Pressemitteilung",
		"menu_name" => "Pressemitteilungen",
		"all_items" => "Alle Pressemitteilungen",
		"add_new" => "Neue hinzufügen",
		"add_new_item" => "Neue Pressemitteilunge hinzufügen",
		"edit_item" => "Pressemitteilung bearbeiten",
		"new_item" => "Neue Pressemitteilung",
		"view" => "ANz",
		"view_item" => "Pressemitteilung anzeigen",
		"search_items" => "Pressemitteilung suchen",
		"not_found" => "Keine Pressemitteilungen gefunden",
		"not_found_in_trash" => "Keine Pressemitteilungen im Papierkorb gefunden",
		);

	$args = array(
		"labels" => $labels,
		"description" => "Pressemitteilungen",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
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

// End of cptui_register_my_cpts()
}

