<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Nathalie Mota</title>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

    <header id="masthead" class="site-header" itemscope itemtype="https://schema.org/WPHeader">
        <div class="site-header-first">
            <div class="site-header-logo">
                
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php
                    $logo_menu = get_field('logo_menu');
                    if ($logo_menu) {
                        echo '<img src="' . esc_url($logo_menu['url']) . '" alt="' . esc_attr($logo_menu['alt']) . '">';
                    }
                    ?>
                  <?php echo the_custom_logo(); ?>

                </a>

            </div>
           
            <div class="site-header-menu">
                
                <nav id="site-navigation" class="main-navigation">
                    <?php 
                    wp_nav_menu(
                        [
                            'theme_location' => 'main-menu',
                        ]
                    ); 
                    ?>
                </nav>

            </div>




        </div>

    </header>