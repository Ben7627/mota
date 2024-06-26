<div class="img-container">
    <a href="<?php echo get_permalink( $post->ID ); ?>">
        <?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'thumbnail-photos' ) ); ?>
    </a>
    <div class="img-overlay">
        <div class="header-overlay">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-fullscreen.png' ); ?>">
        </div>
         <div class="middle-overlay">
            <a href="<?php echo get_permalink( $post->ID ); ?>">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-eye.png' ); ?>">
            </a>
        </div>
        <div class="footer-overlay">
            <p class="ref-overlay"><?php $reference = get_field( 'reference', $post->ID ); echo esc_html( $reference ); ?></p>
            <p class="categ-overlay">
                <?php                       
                $post_terms = get_the_terms( $post->ID, 'categoriesphotos' );
                $category_name = '';
                if ( $post_terms && ! is_wp_error( $post_terms ) ) {
                $category_name = $post_terms[0]->name; 
                } 
                echo esc_html( $category_name ); ?>
            </p>
        </div>
    </div>
</div>