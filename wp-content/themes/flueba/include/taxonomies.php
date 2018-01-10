<?php

add_action( 'init', 'cptui_register_my_taxes' );
function cptui_register_my_taxes() {

	$labels = array(
		"name" => "AGs",
		"label" => "AGs",
		"menu_name" => "AG",
		"all_items" => "Alle AGs",
		"edit_item" => "AG bearbeiten",
		"view_item" => "AG ansehen",
		"update_item" => "AG aktualisieren",
		"add_new_item" => "Neue AG hinzufügen",
		"new_item_name" => "Name der neuen AG",
		"add_or_remove_items" => "AGs hinzufügen oder entfernen",
		"not_found" => "Keine AGs gefunden",
		);

	$args = array(
		"labels" => $labels,
		"hierarchical" => false,
		"label" => "AGs",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'ag', 'with_front' => true ),
		"show_admin_column" => true,
	);
	register_taxonomy( "ag", array( "post", "sachspende" ), $args );

// End cptui_register_my_taxes()
}

