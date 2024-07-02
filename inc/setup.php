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

  // Règles ajax bouton homepage
  
  function mota_load_more() {
    $paged = $_POST['paged'];
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
    );
    $posts = new WP_Query($args);

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            get_template_part('templates-part/latest-photos');
        }
    } else {
        wp_send_json_error('No more posts');
    }
    wp_die();
}
add_action('wp_ajax_mota_load_more', 'mota_load_more');
add_action('wp_ajax_nopriv_mota_load_more', 'mota_load_more');

}



add_action('after_setup_theme', __NAMESPACE__ . '\setup');
