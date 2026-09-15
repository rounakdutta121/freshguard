<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_enqueue_scripts',
	static function () {
		wp_enqueue_style(
			'fgn-fonts',
			'https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap',
			array(),
			null
		);
		wp_enqueue_style( 'fgn-main', FGN_URI . '/assets/css/main.css', array( 'fgn-fonts' ), FGN_VERSION );
		wp_enqueue_style( 'fgn-style', get_stylesheet_uri(), array( 'fgn-main' ), FGN_VERSION );
		wp_enqueue_script( 'fgn-i18n', FGN_URI . '/assets/js/i18n.js', array(), FGN_VERSION, true );
		wp_enqueue_script( 'fgn-main', FGN_URI . '/assets/js/main.js', array( 'fgn-i18n' ), FGN_VERSION, true );
	}
);

function fgn_enqueue_wp_fix() {
	$deps = array( 'fgn-main' );
	if ( wp_style_is( 'elementor-frontend', 'registered' ) || wp_style_is( 'elementor-frontend', 'enqueued' ) ) {
		$deps[] = 'elementor-frontend';
	}
	wp_enqueue_style( 'fgn-wp', FGN_URI . '/assets/css/wp-fix.css', $deps, FGN_VERSION );
}
function fgn_enqueue_editor_css() {
	wp_enqueue_style( 'fgn-editor', FGN_URI . '/assets/css/editor.css', array( 'fgn-wp' ), FGN_VERSION );
}

add_action( 'wp_enqueue_scripts', 'fgn_enqueue_wp_fix', 999 );
add_action( 'elementor/frontend/after_enqueue_styles', 'fgn_enqueue_wp_fix' );
add_action( 'elementor/preview/enqueue_styles', 'fgn_enqueue_wp_fix' );
add_action( 'elementor/preview/enqueue_styles', 'fgn_enqueue_editor_css' );
add_action(
	'wp_enqueue_scripts',
	static function () {
		if ( isset( $_GET['elementor-preview'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			fgn_enqueue_editor_css();
		}
	},
	1000
);
