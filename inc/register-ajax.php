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


    // Règle ajax bouton homepage
  
  function mota_load_more() {
    $paged = $_POST['paged'];
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
    );
    $posts = new WP_Query($args);

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            get_template_part('templates-part/latest-photos');
        }
        wp_die();
    } else {
        wp_die();
    }
}
add_action('wp_ajax_mota_load_more', 'mota_load_more');
add_action('wp_ajax_nopriv_mota_load_more', 'mota_load_more');