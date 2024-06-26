<?php 

/* Homepage template */

get_header(); ?>


<div id="primary" class="primary primary--home">

        <div class="home-slider">
                <div class="home-header-title">
                   <h1 class="title-home"><?php the_title(); ?></h1>
                </div>
                <div class="home-header-img">
                        <?php the_post_thumbnail('home-featured');?>   
                </div>
        </div>
        <div class="entry__content blocks">
                <?php the_content(); ?>
        </div>
        <div class="latest-photos">
                <?php 
                                $args = array(
                                        'post_type' => 'photo',
                                        'posts_per_page' => 20,
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'post_status' => 'publish',
                                    );
                                    $posts = get_posts($args);

if ($posts) {
    foreach ($posts as $post) {
        setup_postdata($post);?>
        <?php get_template_part('templates-part/latest-photos');
    }

    wp_reset_postdata(); // Réinitialisation des données des posts
} else {
    echo 'Aucun post trouvé.';
}
?>
        </div>
</div>
<?php 
get_footer(); ?>