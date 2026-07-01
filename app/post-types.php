<?php

/*--- CPT - Materiały ---*/

add_action('init', function () {
	register_post_type('materials', [
		'label'         => 'Materiały',
		'labels'        => [
			'name'               => 'Materiały',
			'singular_name'      => 'Materiał',
			'menu_name'          => 'Materiały',
			'all_items'          => 'Wszystkie materiały',
			'add_new'            => 'Dodaj nowy',
			'add_new_item'       => 'Dodaj nowy materiał',
			'edit_item'          => 'Edytuj materiał',
			'new_item'           => 'Nowy materiał',
			'view_item'          => 'Zobacz materiał',
			'view_items'         => 'Zobacz materiały',
			'search_items'       => 'Szukaj materiałów',
			'not_found'          => 'Nie znaleziono materiałów',
			'not_found_in_trash' => 'Brak materiałów w koszu',
			'parent_item_colon'  => 'Materiał nadrzędny:',
		],
		'public'        => true,
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-cart',
		'menu_position' => 20,
		'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
		'show_in_rest'  => true,
		'rewrite'       => ['slug' => 'materialy', 'with_front' => false],
	]);
});

add_action('init', function () {
	register_taxonomy('materials_category', ['materials'], [
		'label'        => 'Kategorie materiałów',
		'labels'       => [
			'name'              => 'Kategorie materiałów',
			'singular_name'     => 'Kategoria materiału',
			'search_items'      => 'Szukaj kategorii materiałów',
			'all_items'         => 'Wszystkie kategorie materiałów',
			'parent_item'       => 'Kategoria nadrzędna',
			'parent_item_colon' => 'Kategoria nadrzędna:',
			'edit_item'         => 'Edytuj kategorię',
			'update_item'       => 'Aktualizuj kategorię',
			'add_new_item'      => 'Dodaj nową kategorię',
			'new_item_name'     => 'Nazwa nowej kategorii',
			'menu_name'         => 'Kategorie',
		],
		'hierarchical' => true,
		'public'       => true,
		'show_in_rest' => true,
		'rewrite'      => ['slug' => 'kategoria-materialu', 'with_front' => false],
	]);
});
