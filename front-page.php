<?php 

/* Homepage template */

get_header(); ?>


<div id="primary" class="primary primary--home">

        <div class="home-slider">
                <div class="home-header-title">
                   <h1 class="title-home"><?php the_title(); ?></h1>
                </div>
                <div class="home-header-img">
                        <?php
                        if( function_exists('get_field') ) {
                                $slider_homepage = get_field('slider_homepage', 'option');

                                if ( $slider_homepage == 'imagemea' ) {
                                if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('home-featured');
                                } else {
                                        echo '<p>Aucune image mise en avant trouvée sur la page d\'accueil.</p>';
                                        }
                                } elseif ( $slider_homepage == 'imageal' ) {
                                        $args = array(
                                        'post_type' => 'photo',
                                        'posts_per_page' => 1,
                                        'post_status' => 'publish',
                                        'orderby' => 'rand', 
                                        'meta_query' => array(
                                                array(
                                                'key' => '_thumbnail_id', 
                                                'compare' => 'EXISTS'
                                                )
                                        )
                                        );

                                        $random_photo_query = new WP_Query($args);

                                        if ( $random_photo_query->have_posts() ) {
                                        while ( $random_photo_query->have_posts() ) {
                                                $random_photo_query->the_post();
                                                echo get_the_post_thumbnail(get_the_ID(), 'home-featured');
                                        }
                                        } else {
                                        echo '<p>Aucune image mise en avant trouvée dans les posts "photo".</p>';
                                        }

                                        wp_reset_postdata();
                                }
                                }
                        ?>
                </div>

        </div>
        <div class="entry__content blocks">
                <?php the_content(); ?>
        </div>

        <div class="filters-photos">
                <div class="filters-left">
                        <div class ="filters-categories">
                                <select name="categories" class="select-categories">
                                </select>
                        </div>
                        <div class ="filters-formats">
                                <select name="filters" class="select-filters">
                                </select>                
                        </div>
                </div>
                <div class="filters-right">
                        <div class ="filters-tri">
                                <select name="filters" class="select-tri">
                                </select>                   
                        </div>
                </div>
        </div>

        <div class="latest-photos">
                <?php 
                $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 8,
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

                wp_reset_postdata(); 
                } else {
                echo 'Aucun post trouvé.';
                }
                ?>
        </div>
        <div class="load-button">
                <p class="load-button-photos">Charger plus</p>
        </div>
</div>
<?php 
get_footer(); ?>