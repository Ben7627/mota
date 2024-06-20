<div class="latest-photos">
    <?php
$current_photo_id = get_the_ID();
$terms = get_the_terms( $current_photo_id, 'categoriesphotos' ); // Remplacez 'nom_de_votre_taxonomy' par le nom de la taxonomie associée à votre custom post type

// Vérifier si des termes sont trouvés
if ( $terms && ! is_wp_error( $terms ) ) {
    $term_ids = array(); 

    foreach ( $terms as $term ) {
        $term_ids[] = $term->term_id; 
    }

    // Arguments pour la requête de posts
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

    // Vérifier s'il y a des posts
    if ( $posts ) {
        $count = 0; // Compteur pour le nombre de photos affichées
        foreach ( $posts as $post ) {
            if ( $count >= 2 ) break; // Arrêter la boucle après avoir affiché 2 photos

            setup_postdata( $post );

            // Vérifier si le post actuel est différent de la photo actuelle
            if ( $post->ID != $current_photo_id ) {
                echo '<div>' . get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'thumbnail-photos' ) ) . '</div>';
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