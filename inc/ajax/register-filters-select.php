<?php 
    // Règle ajax filtres select homepage

    function mota_filters_select() {
        $paged = $_POST['paged'];
        $category = $_POST['category'];
        $format = $_POST['format'];
    
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
            'order' => 'DESC',
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