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

</div>
<?php 
get_footer(); ?>