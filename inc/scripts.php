<?php 

function mota_scripts () 
{
    // Register styles & scripts.
	wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/css/main.css');
}

add_action('wp_enqueue_scripts','mota_scripts');
