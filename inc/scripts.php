<?php 

function mota_scripts () 
{
    // Register styles & scripts.
	wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('contact-script', get_stylesheet_directory_uri() . '/assets/js/script-contact.js');
    wp_enqueue_script('menu-mobile-script', get_stylesheet_directory_uri() . '/assets/js/menu-mobile.js');
    wp_enqueue_script('ajax-contact-script', get_stylesheet_directory_uri() . '/assets/js/ajax-contact.js', array('jquery'), '1.0.0', true);
    wp_localize_script('ajax-contact-script', 'mota_js', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts','mota_scripts', 20);

