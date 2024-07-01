<?php 

function mota_request_references() {
    $args = array( 'post_type' => 'photo' ); $query = new WP_Query($args);
    if($query->have_posts()) {
    $response = $query;
    } else {
    $response = false;
    }
    
    wp_send_json($response);
    wp_die();
    }

    add_action( 'wp_ajax_request_references', 'mota_request_references' ); 
    add_action( 'wp_ajax_nopriv_request_references', 'mota_request_references' );