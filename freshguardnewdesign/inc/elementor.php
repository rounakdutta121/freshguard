<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'fgn_register_elementor' ) ) {
	function fgn_register_elementor() {
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
				require_once FGN_DIR . '/elementor/widgets/class-sections-all.php';
				require_once FGN_DIR . '/elementor/widgets/class-landing.php';

				$wm->register( new \FreshGuardNew\Elementor\Widget_Hero() );
				$wm->register( new \FreshGuardNew\Elementor\Widget_Welcome() );
				$wm->register( new \FreshGuardNew\Elementor\Widget_Services() );
				$wm->register( new \FreshGuardNew\Elementor\Widget_Europe() );
				$wm->register( new \FreshGuardNew\Elementor\Widget_Assess() );
				$wm->register( new \FreshGuardNew\Elementor\Widget_Partners() );
				$wm->register( new \FreshGuardNew\Elementor\Widget_Contact() );
				$wm->register( new \FreshGuardNew\Elementor\Widget_Articles() );
				$wm->register( new \FreshGuardNew\Elementor\Landing_Widget() );
			}
		);
	}

	fgn_register_elementor();
}
