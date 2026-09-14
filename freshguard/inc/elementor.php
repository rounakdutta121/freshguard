<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'fg_register_elementor' ) ) {
	/**
	 * Register Elementor category + all FreshGuard widgets.
	 */
	function fg_register_elementor() {
		static $done = false;
		if ( $done ) {
			return;
		}
		$done = true;

		add_action(
			'elementor/elements/categories_registered',
			static function ( $m ) {
				$m->add_category(
					'freshguard',
					array(
						'title' => 'FreshGuard',
						'icon'  => 'fa fa-leaf',
					)
				);
			}
		);

		add_action(
			'elementor/widgets/register',
			static function ( $wm ) {
				require_once FG_DIR . '/elementor/widgets/class-sections-all.php';
				require_once FG_DIR . '/elementor/widgets/class-landing.php';

				$wm->register( new \FreshGuard\Elementor\Widget_Hero() );
				$wm->register( new \FreshGuard\Elementor\Widget_Welcome() );
				$wm->register( new \FreshGuard\Elementor\Widget_Services() );
				$wm->register( new \FreshGuard\Elementor\Widget_Europe() );
				$wm->register( new \FreshGuard\Elementor\Widget_Assess() );
				$wm->register( new \FreshGuard\Elementor\Widget_Partners() );
				$wm->register( new \FreshGuard\Elementor\Widget_Contact() );
				$wm->register( new \FreshGuard\Elementor\Widget_Articles() );
				$wm->register( new \FreshGuard\Elementor\Landing_Widget() );
			}
		);
	}

	fg_register_elementor();
}
