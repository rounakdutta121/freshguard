<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$variant = isset( $args['variant'] ) ? $args['variant'] : 'light';
?>
<div class="leaves-decor leaves-<?php echo esc_attr( $variant ); ?>" aria-hidden="true">
<?php foreach ( range( 'a', 'i' ) as $letter ) : ?>
  <span class="leaf leaf-<?php echo esc_attr( $letter ); ?>"><?php echo fg_leaf_svg(); // phpcs:ignore ?></span>
<?php endforeach; ?>
</div>
