<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
define( 'FG_VERSION', '2.3.0' );
define( 'FG_DIR', get_template_directory() );
define( 'FG_URI', get_template_directory_uri() );
require_once FG_DIR . '/inc/helpers.php';
require_once FG_DIR . '/inc/setup.php';
require_once FG_DIR . '/inc/assets.php';
require_once FG_DIR . '/inc/demo.php';
add_action( 'elementor/init', static function () {
  require_once FG_DIR . '/inc/elementor.php';
} );
add_action( 'after_setup_theme', static function () {
  if ( class_exists( '\Elementor\Plugin' ) && ! function_exists( 'fg_register_elementor' ) ) {
    require_once FG_DIR . '/inc/elementor.php';
  }
}, 20 );
