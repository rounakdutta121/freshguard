<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'FGN_VERSION', '1.0.26' );
define( 'FGN_DIR', get_template_directory() );
define( 'FGN_URI', get_template_directory_uri() );
require_once FGN_DIR . '/inc/helpers.php';
require_once FGN_DIR . '/inc/setup.php';
require_once FGN_DIR . '/inc/assets.php';
require_once FGN_DIR . '/inc/demo.php';
add_action(
	'elementor/init',
	static function () {
		require_once FGN_DIR . '/inc/elementor.php';
	}
);
add_action(
	'after_setup_theme',
	static function () {
		if ( class_exists( '\Elementor\Plugin' ) && ! function_exists( 'fgn_register_elementor' ) ) {
			require_once FGN_DIR . '/inc/elementor.php';
		}
	},
	20
);
