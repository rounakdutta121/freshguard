<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function fgn_img( $file ) {
	return trailingslashit( FGN_URI ) . 'assets/images/' . ltrim( $file, '/' );
}

function fgn_logo() {
	return apply_filters( 'fgn_logo_url', fgn_img( 'freshguard-logo.svg' ) );
}
