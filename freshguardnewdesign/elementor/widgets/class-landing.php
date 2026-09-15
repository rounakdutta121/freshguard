<?php
namespace FreshGuardNew\Elementor;
use Elementor\Widget_Base;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class Landing_Widget extends Widget_Base {
	public function get_name() {
		return 'freshguard_landing';
	}
	public function get_title() {
		return 'FreshGuard Full Landing';
	}
	public function get_icon() {
		return 'eicon-site-logo';
	}
	public function get_categories() {
		return array( 'freshguard', 'general' );
	}
	protected function register_controls() {
		$this->start_controls_section( 'n', array( 'label' => 'FreshGuard' ) );
		$this->add_control(
			'i',
			array(
				'type'             => \Elementor\Controls_Manager::RAW_HTML,
				'raw'              => 'Renders the complete homepage (exact freshguard.html layout, images, colors). Use FG section widgets to edit individual sections.',
				'content_classes'  => 'elementor-panel-alert elementor-panel-alert-info',
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		echo '<div class="fg-el-wrap">';
		get_template_part( 'template-parts/content', 'home' );
		echo '</div>';
	}
}
