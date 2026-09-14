<?php
/**
 * Front page — Elementor sections when present, else PHP landing.
 */
get_header();

$printed = false;

if ( have_posts() ) {
	the_post();
	$page_id = get_the_ID();

	if ( class_exists( '\Elementor\Plugin' ) ) {
		$document = \Elementor\Plugin::$instance->documents->get( $page_id );
		if ( $document && $document->is_built_with_elementor() ) {
			$content = \Elementor\Plugin::$instance->frontend->get_builder_content( $page_id );
			if ( is_string( $content ) && (
				false !== strpos( $content, 'class="hero"' )
				|| false !== strpos( $content, 'fg-el-wrap' )
				|| false !== strpos( $content, 'hero-bg' )
			) ) {
				echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				$printed = true;
			}
		}
	}
}

if ( ! $printed ) {
	get_template_part( 'template-parts/content', 'home' );
}

get_footer();
