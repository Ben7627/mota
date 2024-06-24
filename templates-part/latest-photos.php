<div class="latest-photos">
    <?php
$current_photo_id = get_the_ID();
$terms = get_the_terms( $current_photo_id, 'categoriesphotos' );

if ( $terms && ! is_wp_error( $terms ) ) {
    $term_ids = array(); 

    foreach ( $terms as $term ) {
        $term_ids[] = $term->term_id; 
    }

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 5,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'categoriesphotos', 
                'field' => 'term_id',
                'terms' => $term_ids,
            ),
        ),
    );

    $posts = get_posts( $args );

    if ( $posts ) {
        $count = 0; 
        foreach ( $posts as $post ) {
            if ( $count >= 2 ) break; 
            setup_postdata( $post );

            // Vérifier si le post actuel est différent de la photo actuelle
            if ( $post->ID != $current_photo_id ) {
                echo '<div><a href="' . get_permalink( $post->ID ) . '">' . get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'thumbnail-photos' ) ) . '</a></div>';
                $count++;
            }
        }
        wp_reset_postdata();
    } else {
        echo 'Aucun post trouvé.';
    }
} else {
    echo 'Aucune catégorie trouvée pour cette photo.';
}
?>


</div>