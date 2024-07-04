<?php 
    // Règle ajax bouton homepage
  
    function mota_load_more() {
        $paged = $_POST['paged'];
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 8,
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
        );
        $posts = new WP_Query($args);
    
        ob_start(); // Démarrer le tampon de sortie
    
        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();
                get_template_part('templates-part/latest-photos');
            }
            wp_reset_postdata();
            $html = ob_get_clean(); // Récupérer le contenu du tampon et le nettoyer

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
    
    
add_action('wp_ajax_mota_load_more', 'mota_load_more');
add_action('wp_ajax_nopriv_mota_load_more', 'mota_load_more');