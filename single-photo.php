<?php
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="header-photo">
    <div class="row-photo">
        <div class="column-left">
            <h1 class="title-single-photo"><?php the_title(); ?></h1>
            <p><?php echo get_field('reference'); ?></p>
            <p><?php echo get_field('type'); ?></p>
            <?php $post_terms = get_the_terms( get_the_ID(), 'categoriesphotos' ); ?>
            <p>
            <?php 
            $post_terms = get_the_terms( get_the_ID(), 'format' ); 
            echo $post_terms[0]->name;
            ?>
            </p>
            <p>
            <?php 
            $post_terms = get_the_terms( get_the_ID(), 'categoriesphotos' ); 
            echo $post_terms[0]->name;
            ?>
            </p>
            <p><?php the_time('Y'); ?></p>

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
        </div>
    </div>
</div>
        <div><?php the_content(); ?></div>
    <?php endwhile;
endif;

get_footer();
