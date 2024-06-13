<div class="popup">

    <div class="popup-header">
    <?php 
    $image_url = get_field('header_contact', 'option');
        if( !empty( $image_url ) ): 
        $image_id = attachment_url_to_postid( $image_url );
        $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        ?>

        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" />
        
    <?php endif; ?>
    </div>

    <div class="popup-formulaire">
    <?php
    $form_url = get_field('formulaire_de_contact_modale', 'option');
    if($form_url) {
        // Extraire l'ID de l'URL
        $url_parts = parse_url($form_url);
        parse_str($url_parts['query'], $query_params);
        $form_id = isset($query_params['p']) ? $query_params['p'] : null;

        if($form_id) {
            echo do_shortcode('[contact-form-7 id="' . esc_attr($form_id) . '" html_class="wpcf7-form--inverse"]');
        } else {
            echo '<p>Impossible d\'extraire l\'ID du formulaire de l\'URL.</p>';
        }
    }
    ?>


    </div>

</div>