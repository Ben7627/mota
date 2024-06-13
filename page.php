<?php

/**
 * Default template for pages.
 *
 */

get_header(); ?>

<div id="primary" class="primary primary--default-page">

  <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry entry--page'); ?>>
      
      <div class="entry__content blocks">
        <?php the_content(); ?>
      </div>

    </article>
  <?php endwhile; ?>

</div>

<?php
get_footer();