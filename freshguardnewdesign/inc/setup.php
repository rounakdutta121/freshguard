<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'after_setup_theme',
	static function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 240, 'flex-height' => true, 'flex-width' => true ) );
		add_theme_support( 'elementor' );
		add_theme_support( 'align-wide' );
		register_nav_menus(
			array(
				'primary' => __( 'Primary', 'freshguardnewdesign' ),
				'footer'  => __( 'Footer', 'freshguardnewdesign' ),
			)
		);
	}
);

add_filter(
	'body_class',
	static function ( $c ) {
		$c[] = 'theme-freshguard';
		$c[] = 'theme-freshguard-new';
		$c[] = 'freshguard-fullbleed';
		return $c;
	}
);

add_action(
	'elementor/theme/register_locations',
	static function ( $m ) {
		$m->register_all_core_location();
	}
);
