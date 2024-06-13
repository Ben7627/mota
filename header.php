<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<?php wp_body_open(); ?>
    <header id="masthead" class="site-header" itemscope itemtype="https://schema.org/WPHeader">
        <div class="site-header-first">
            <div class="site-header-logo">  
                  <?php echo the_custom_logo(); ?>
            </div>
           
            <div class="site-header-menu">
                <?php if (has_nav_menu('main-menu')) : ?>
                    <nav id="site-navigation" class="main-navigation">
                        <?php 
                        wp_nav_menu(
                            [
                                'theme_location' => 'main-menu',
                            ]
                        ); 
                        ?>
                    </nav>
                <?php endif; ?>

            </div>




        </div>

    </header>

    <?php get_template_part('templates-part/contact');