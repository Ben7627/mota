<?php


function setup()
{

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /**
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support('title-tag');

  /**
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');

  // Register navigation menus.
  register_nav_menus(
    [
      'main-menu' => esc_html__('Menu principal ', 'mota'),
      'footer-menu'  => esc_html__('Menu du pied de page ', 'mota'),
    ]
  );

  /**
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support(
    'html5',
    [
      'gallery',
      'caption',
    ]
  );

  // Yoast Breadcrumbs support
  add_theme_support('yoast-seo-breadcrumbs');

  // Custom image sizes :
  add_image_size( 'post-slider', 9999, 730, false );
  add_image_size('home-featured', 2000, 900, true);
  add_image_size('full-width', 1920, 1080, false);


  // Ajout logo dans personnaliser menu
  add_theme_support( 'custom-logo' );
}


add_action('after_setup_theme', __NAMESPACE__ . '\setup');
