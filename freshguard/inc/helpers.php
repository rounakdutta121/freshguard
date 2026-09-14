<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function fg_img( $file ) {
  return trailingslashit( FG_URI ) . 'assets/images/' . ltrim( $file, '/' );
}
function fg_logo() {
  return apply_filters( 'fg_logo_url', 'https://backend.freshguard.nl/assets/ad051085-a0b8-416a-af8d-76220dfc087b' );
}
function fg_leaf_svg() {
  static $svg = null;
  if ( null !== $svg ) return $svg;
  $path = FG_DIR . '/assets/images/leaves-2.svg';
  if ( ! file_exists( $path ) ) { $svg = ''; return $svg; }
  $raw = file_get_contents( $path );
  $raw = preg_replace( '/<\?xml.*?\?>/', '', $raw );
  $raw = preg_replace( '/<!--.*?-->/s', '', $raw );
  $raw = str_replace( array( 'width="800px"', 'height="800px"', 'class="icon"' ), array( '', '', 'class="deco-leaf"' ), $raw );
  $raw = str_replace( 'fill="#73C69A"', 'class="leaf-fill" fill="#73C69A"', $raw );
  $raw = str_replace( 'fill="#00757F"', 'class="leaf-vein" fill="#00757F"', $raw );
  $svg = trim( $raw );
  return $svg;
}
