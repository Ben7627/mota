<?php
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

<div class="header-photo">
    <div class="column-left">
        <h1 class="title-single-photo"><?php the_title(); ?></h1>
        <p><?php echo get_field('reference'); ?></p>
        <p><?php echo get_field('type'); ?></p>
    </div>
    <div class="column-right">
        <?php the_post_thumbnail();?>   
    </div>
</div>
        <div><?php the_content(); ?></div>
    <?php endwhile;
endif;

get_footer();
