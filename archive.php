<?php 

/* Archive template */

get_header(); ?>

<h1 class="title-single-photo">
    <?php 
    $post_terms = get_the_terms( get_the_ID(), 'categoriesphotos' ); 
    echo $post_terms[0]->name; ?>
</h1>

<div class="latest-photos">
    <?php 
        if (is_post_type_archive('photo')) {
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
            );
        } elseif (is_tax('categoriesphotos')) {
            $current_term = get_queried_object();
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoriesphotos',
                        'field' => 'slug', 
                        'terms' => $current_term->slug,
                    ),
                ),
            );
        } else {
            echo 'Aucun post trouvé.';
            return;
        }

        $posts = get_posts($args);

        if ($posts) {
            foreach ($posts as $post) {
                setup_postdata($post); ?>
                <?php get_template_part('templates-part/latest-photos'); ?>
            <?php }
            wp_reset_postdata(); 
        } else {
            echo 'Aucun post trouvé.';
        }
    ?>
</div>
<div class="load-button">
    <p class="load-button-photos">Charger plus</p>
</div>

<?php 
get_footer(); ?>