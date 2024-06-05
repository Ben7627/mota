<?php
/**
 * Include PHP files, nothing else.
 *
 * All the functions, hooks and setup should be on their own
 * filer organized at /inc/. The names of files should describe
 * what the file does as following:
 */


/**
 * Configuration
 */
// require_once 'inc/_conf/register-assets.php';
// require_once 'inc/_conf/register-blocks.php';
require_once 'inc/register-acf.php';
// require_once 'inc/_conf/register-post-type.php';


/**
 * Hooks and setup
 */
require_once 'inc/setup.php';
require_once 'inc/scripts.php';
// require_once 'inc/setup-classic-editor.php';
// require_once 'inc/setup-fallbacks.php';
// require_once 'inc/setup-gutenberg.php';
// require_once 'inc/hooks-menu.php';
// require_once 'inc/setup-theme-support.php';
// require_once 'inc/filters.php';
// require_once 'inc/hooks-global.php';
require_once 'inc/wordpress-cleanup.php';

