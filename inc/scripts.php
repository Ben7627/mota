<?php 

function mota_scripts () 
{
    // Register styles & scripts.
	wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('contact-script', get_stylesheet_directory_uri() . '/assets/js/script-contact.js');
}

add_action('wp_enqueue_scripts','mota_scripts');
