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
                        <?php
                        $categories = get_terms( array(
                        'taxonomy' => 'categoriesphotos',
                        'hide_empty' => false,
                        ) );

                        if ( ! is_wp_error( $categories ) ) :
                        ?>
                        <div class="filters-categories">
                                <p class="title-filters-categories">Catégories :<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron.svg');?></p>
                                <ul class="select-categories filtrage">
                                <li class="all-categories">Catégories :</li>
                                <?php
                                foreach ( $categories as $category ) {
                                        echo '<li data-slug="'. esc_html($category->slug) .'">' . esc_html( $category->name ) . '</li>';
                                }
                                ?>
                                </ul>
                        </div>
                        <?php endif;?>
                        <?php
                        $formats = get_terms( array(
                        'taxonomy' => 'format',
                        'hide_empty' => false, 
                        ) );

                        if ( ! is_wp_error( $formats ) ) :
                        ?>
                        <div class="filters-formats">
                                <p class="title-filters-formats">Formats :<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron.svg');?></p>
                                <ul class="select-filters filtrage">
                                <li class="all-formats">Formats :</li>
                                <?php
                                foreach ( $formats as $format ) {
                                        echo '<li data-format="'. esc_html($format->slug) .'">' . esc_html( $format->name ) . '</li>';
                                }
                                ?>
                                </ul>
                        </div>
                        <?php endif;?>
                </div>
                <div class="filters-right">
                        <div class ="filters-tri">
                                <p class="title-filters-tri">Trier par :<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron.svg');?></p>
                                <ul class="select-tri filtrage">
                                        <li class="tri-croissant">Du plus récent au plus ancien</li>
                                        <li class="tri-decroissant">Du plus ancien au plus récent</li>
                                </ul>                   
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