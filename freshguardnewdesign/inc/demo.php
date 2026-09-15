<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function fgn_shortcode_home() {
	ob_start();
	echo '<div class="fg-el-wrap">';
	get_template_part( 'template-parts/content', 'home' );
	echo '</div>';
	return ob_get_clean();
}
add_shortcode( 'freshguard_home', 'fgn_shortcode_home' );
add_shortcode( 'fgn_home', 'fgn_shortcode_home' );

/**
 * Create / repair Home with stacked Elementor section widgets.
 *
 * @param bool $force Force reseed.
 * @return int
 */
function fgn_seed_home( $force = false ) {
	$id = (int) get_option( 'fgn_home_id' );

	if ( ! $id || ! get_post( $id ) ) {
		$ex = get_page_by_path( 'home' );
		if ( $ex ) {
			$id = (int) $ex->ID;
		} else {
			$id = wp_insert_post(
				array(
					'post_title'   => 'Home',
					'post_name'    => 'home',
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				),
				true
			);
			if ( is_wp_error( $id ) ) {
				return 0;
			}
		}
		update_option( 'fgn_home_id', $id );
	}

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $id );
	update_post_meta( $id, '_wp_page_template', 'page-templates/landing.php' );

	if ( class_exists( '\Elementor\Plugin' ) ) {
		if ( $force || get_option( 'fgn_seeded' ) !== FGN_VERSION ) {
			fgn_seed_elementor( $id );
		}
	}

	update_option( 'fgn_seeded', FGN_VERSION );
	return $id;
}

/**
 * One full-width container per section widget.
 *
 * @param int $id Page ID.
 */
function fgn_seed_elementor( $id ) {
	$widgets = array(
		'fgn_hero',
		'fgn_welcome',
		'fgn_services',
		'fgn_europe',
		'fgn_assess',
		'fgn_partners',
		'fgn_contact',
		'fgn_articles',
	);

	$data = array();
	foreach ( $widgets as $type ) {
		$cid    = substr( md5( 'fgn-c-' . $type . $id . FGN_VERSION ), 0, 7 );
		$wid    = substr( md5( 'fgn-w-' . $type . $id . FGN_VERSION ), 0, 7 );
		$data[] = array(
			'id'       => $cid,
			'elType'   => 'container',
			'isInner'  => false,
			'settings' => array(
				'content_width'  => 'full',
				'flex_direction' => 'column',
				'padding'        => array(
					'unit'     => 'px',
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => true,
				),
				'margin'         => array(
					'unit'     => 'px',
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => true,
				),
			),
			'elements' => array(
				array(
					'id'         => $wid,
					'elType'     => 'widget',
					'widgetType' => $type,
					'settings'   => array(),
					'elements'   => array(),
				),
			),
		);
	}

	update_post_meta( $id, '_elementor_edit_mode', 'builder' );
	update_post_meta( $id, '_elementor_template_type', 'wp-page' );
	update_post_meta( $id, '_elementor_version', defined( 'ELEMENTOR_VERSION' ) ? ELEMENTOR_VERSION : '3.16.0' );
	update_post_meta( $id, '_elementor_data', wp_slash( wp_json_encode( $data ) ) );
	update_post_meta( $id, '_wp_page_template', 'elementor_header_footer' );
	wp_update_post(
		array(
			'ID'           => $id,
			'post_content' => '',
		)
	);

	delete_post_meta( $id, '_elementor_css' );
	if ( class_exists( '\Elementor\Plugin' ) && isset( \Elementor\Plugin::$instance->files_manager ) ) {
		\Elementor\Plugin::$instance->files_manager->clear_cache();
	}
}

add_action(
	'after_switch_theme',
	static function () {
		fgn_seed_home( true );
		flush_rewrite_rules();
	}
);

add_action(
	'init',
	static function () {
		if ( get_option( 'fgn_seeded' ) === FGN_VERSION ) {
			return;
		}
		fgn_seed_home( true );
	},
	20
);

add_action(
	'admin_init',
	static function () {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( isset( $_GET['fgn_setup'] ) && check_admin_referer( 'fgn_setup' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			fgn_seed_home( true );
			wp_safe_redirect( admin_url( 'post.php?post=' . (int) get_option( 'fgn_home_id' ) . '&action=elementor' ) );
			exit;
		}
		$id = (int) get_option( 'fgn_home_id' );
		if ( $id && get_post( $id ) ) {
			if ( 'page' !== get_option( 'show_on_front' ) || (int) get_option( 'page_on_front' ) !== $id ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $id );
			}
		}
	}
);

add_action(
	'admin_notices',
	static function () {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$id    = (int) get_option( 'fgn_home_id' );
		$setup = wp_nonce_url( admin_url( 'themes.php?fgn_setup=1' ), 'fgn_setup' );
		echo '<div class="notice notice-success is-dismissible"><p><strong>FreshGuard New Design</strong> — ';
		echo '<a class="button button-primary" href="' . esc_url( $setup ) . '">Setup / Repair Homepage</a> ';
		if ( class_exists( '\Elementor\Plugin' ) && $id ) {
			echo '<a class="button" href="' . esc_url( admin_url( 'post.php?post=' . $id . '&action=elementor' ) ) . '">Edit with Elementor</a>';
		}
		echo ' <span style="opacity:.85">Repair rebuilds 8 editable section containers matching freshguard.html (Hero → Articles).</span>';
		echo '</p></div>';
	}
);
