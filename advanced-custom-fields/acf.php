<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_ag-informationen',
		'title' => 'AG Informationen',
		'fields' => array (
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'ag',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_frontpage',
		'title' => 'Frontpage',
		'fields' => array (
			array (
				'key' => 'field_565b06e586a36',
				'label' => 'Seitentext',
				'name' => 'flueba_aside_text',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_kontaktdaten',
		'title' => 'Kontaktdaten',
		'fields' => array (
			array (
				'key' => 'field_581b4f32867a1',
				'label' => 'Funktion',
				'name' => 'function',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_581b4e2af3c7c',
				'label' => 'Adresse',
				'name' => 'address',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_581b4e5cf3c7d',
				'label' => 'Aufgaben',
				'name' => 'tasks',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_581b52a770e1f',
				'label' => 'Detailierte Beschreibung',
				'name' => 'description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'contact',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_sachspende',
		'title' => 'Sachspende',
		'fields' => array (
			array (
				'key' => 'field_565043e1113c3',
				'label' => 'Erfüllt',
				'name' => 'done',
				'type' => 'true_false',
				'instructions' => 'Markiert die Suche nach dieser Sachspende als erfüllt.',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'sachspende',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_termindetails',
		'title' => 'Termindetails',
		'fields' => array (
			array (
				'key' => 'field_566214d5ca43f',
				'label' => 'Beschreibung',
				'name' => 'description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'termin',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



?>
