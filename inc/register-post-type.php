<?php 

function mota_register_post_types() {
	
    // CPT Photo
    $labels = array(
        'name' => 'Photo',
        'all_items' => 'Toutes les photos',
        'singular_name' => 'Photos',
        'add_new_item' => 'Ajouter une photo',
        'add_new' => 'Ajouter une photo',
        'edit_item' => 'Modifier la photo',
        'menu_name' => 'Photos'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-format-image',
	);

	register_post_type( 'photo', $args );
}
add_action( 'init', 'mota_register_post_types' );


add_action( 'init', 'mota_add_taxonomies', 0 );


//2 taxonomies catégorie et format de photo

function mota_add_taxonomies() {
	
	// Taxonomie Format

	$labels_format = array(
		'name'              			=> _x( 'Formats', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Format', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher un format'),
		'all_items'        				=> __( 'Tous les formats'),
		'edit_item'         			=> __( 'Editer le format'),
		'update_item'       			=> __( 'Mettre à jour le format'),
		'add_new_item'     				=> __( 'Ajouter un nouveau format'),
		'new_item_name'     			=> __( 'Valeur du nouveau format'),
		'menu_name'                     => __( 'Formats'),
	);

	$args_format = array(
		'hierarchical'      => false,
		'labels'            => $labels_format,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'format' ),
	);

	register_taxonomy( 'format', 'photo', $args_format );

	
	// Taxonomie Catégorie

	$labels_cat_photo = array(
		'name'                       => _x( 'Catégories de photo', 'taxonomy general name'),
		'singular_name'              => _x( 'Catégories de photo', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une catégorie'),
		'popular_items'              => __( 'Catégories populaires'),
		'all_items'                  => __( 'Toutes les catégories'),
		'edit_item'                  => __( 'Editer une catégorie'),
		'update_item'                => __( 'Mettre à jour une catégorie'),
		'add_new_item'               => __( 'Ajouter une nouvelle catégorie'),
		'new_item_name'              => __( 'Nom de la nouvelle catégorie'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une catégorie'),
		'choose_from_most_used'      => __( 'Choisir parmi les catégories les plus utilisées'),
		'not_found'                  => __( 'Pas de catégories trouvées'),
		'menu_name'                  => __( 'Catégories de photo'),
	);

	$args_cat_photo = array(
		'hierarchical'          => true,
		'labels'                => $labels_cat_photo,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'categories-photos' ),
	);

	register_taxonomy( 'categoriesphotos', 'photo', $args_cat_photo );
}