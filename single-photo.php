<?php
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

    <div class="header-photo">
        <div class="row-photo">
            <div class="column-left">
                <h1 class="title-single-photo"><?php the_title(); ?></h1>
                <p>Référence : <?php echo get_field('reference'); ?></p>
                <p>
                Catégorie : 
                <?php 
                $post_terms = get_the_terms( get_the_ID(), 'categoriesphotos' ); 
                echo $post_terms[0]->name;
                ?>
                </p>
                <?php $post_terms = get_the_terms( get_the_ID(), 'categoriesphotos' ); ?>
                <p>
                Format : 
                <?php 
                $post_terms = get_the_terms( get_the_ID(), 'format' ); 
                echo $post_terms[0]->name;
                ?>
                </p>
                <p>Type : <?php echo get_field('type'); ?></p>
                <p>Année : <?php the_time('Y'); ?></p>

            </div>
            <div class="column-right">
                <?php the_post_thumbnail();?>   
            </div>
        </div>
        <div class="row-cta">
            <div class="column-left">
                <?php 
                $question_single = get_field('question_single', 'option');
                if( !empty( $question_single ) ): 
                ?>
                <p><?php echo $question_single; ?></p>
                <?php endif; ?>
                <?php 
                $bouton_single = get_field('bouton_contact_single', 'option');
                if( !empty( $bouton_single ) ): 
                ?>
                <button class="bouton-single" type="button"><?php echo $bouton_single; ?></button>         
            <?php endif; ?>
            </div>
            <div class="column-right">
                <div class="small-photos-header">
                <?php
                $previous_post = get_previous_post();
                $next_post = get_next_post();

                if ( ! empty( $next_post ) ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                        <?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail', array( 'class' => 'previous-img-photo' ) ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( ! empty( $previous_post ) ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>">
                        <?php echo get_the_post_thumbnail( $previous_post->ID, 'thumbnail', array( 'class' => 'next-img-photo' ) ); ?>
                    </a>
                <?php endif; ?>
                    <div class="arrow-small-photos">
                        <?php if ( ! empty( $next_post ) ) : ?>
                            <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow-left.png' ); ?>" alt="arrow left" class="arrow-left-photo-single">
                            </a>
                        <?php endif; ?>

                        <?php if ( ! empty( $previous_post ) ) : ?>
                            <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arrow-right.png' ); ?>" alt="arrow right" class="arrow-right-photo-single">
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div><?php the_content(); ?></div>
    
    <p class="title-lated-posts">Vous aimerez aussi</p>

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
                    'order' => 'ASC',
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

                        if ( $post->ID != $current_photo_id ) {
                            ?>
                            <?php
                            get_template_part('templates-part/latest-photos');
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
    
        <?php endwhile;?>
    <?php endif;?>

<?php get_footer();
