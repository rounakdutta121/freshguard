<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
add_action( 'wp_enqueue_scripts', static function () {
  wp_enqueue_style( 'fg-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap', array(), null );
  wp_enqueue_style( 'fg-main', FG_URI . '/assets/css/main.css', array( 'fg-fonts' ), FG_VERSION );
  wp_enqueue_style( 'fg-motion', FG_URI . '/assets/css/motion.css', array( 'fg-main' ), FG_VERSION );
  wp_enqueue_style( 'fg-wp', FG_URI . '/assets/css/wp-fix.css', array( 'fg-motion' ), FG_VERSION );
  wp_enqueue_style( 'fg-style', get_stylesheet_uri(), array( 'fg-wp' ), FG_VERSION );
  wp_enqueue_script( 'fg-main', FG_URI . '/assets/js/main.js', array(), FG_VERSION, true );
} );
