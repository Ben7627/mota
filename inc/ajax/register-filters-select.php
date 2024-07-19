<?php 
    // Règle ajax filtres select homepage

    function mota_filters_select() {
        $paged = $_POST['paged'];
        $category = $_POST['category'];
        $format = $_POST['format'];
        $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';
    
        $tax_query = array('relation' => 'AND');
    
        if (!empty($category)) {
            $tax_query[] = array(
                'taxonomy' => 'categoriesphotos',
                'field'    => 'slug',
                'terms'    => $category,
            );
        }
    
        if (!empty($format)) {
            $tax_query[] = array(
                'taxonomy' => 'format',
                'field'    => 'slug',
                'terms'    => $format,
            );
        }
    
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 8,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => $order,
            'post_status' => 'publish',
            'tax_query' => $tax_query,
        );
    
        $posts = new WP_Query($args);
    
        ob_start();
    
        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();
                get_template_part('templates-part/latest-photos');
            }
            wp_reset_postdata();
            $html = ob_get_clean();
    
            $more_posts = $posts->max_num_pages > $paged;
            echo json_encode(array(
                'html' => $html,
                'more_posts' => $more_posts
            ));
        } else {
            echo json_encode(array(
                'html' => '',
                'more_posts' => false
            ));
        }
        wp_die();
    }

add_action('wp_ajax_mota_filters_select', 'mota_filters_select');
add_action('wp_ajax_nopriv_mota_filters_select', 'mota_filters_select');

//  AJAX pour récupérer le SVG
function get_chevron_svg() {
    $svg_path = get_stylesheet_directory() . '/assets/images/chevron.svg';
    if (file_exists($svg_path)) {
        echo file_get_contents($svg_path);
    }
    wp_die(); 
}
add_action('wp_ajax_get_chevron_svg', 'get_chevron_svg');
add_action('wp_ajax_nopriv_get_chevron_svg', 'get_chevron_svg');