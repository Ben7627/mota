<?php

// Fonction pour sauvegarder les champs ACF
function mota_acf_save_json( $path ) {
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}
add_filter( 'acf/settings/save_json', 'mota_acf_save_json' );
