<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
<?php wp_head(); ?>
</head>
<body <?php body_class( 'theme-freshguard theme-freshguard-new freshguard-fullbleed' ); ?>>
<?php wp_body_open(); ?>
  <div class="mold-grow" aria-hidden="true">
    <div class="mold-stain"></div>
    <div class="mold-stain-dark"></div>
    <span class="mold-leaf-wrap ml-tl"><span class="mold-leaf-flip flip-y"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-corner.png' ) ); ?>" alt="" /></span></span>
    <span class="mold-leaf-wrap ml-tr"><span class="mold-leaf-flip flip-xy"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-corner.png' ) ); ?>" alt="" /></span></span>
    <span class="mold-leaf-wrap ml-bl"><span class="mold-leaf-flip"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-corner.png' ) ); ?>" alt="" /></span></span>
    <span class="mold-leaf-wrap ml-br"><span class="mold-leaf-flip flip-x"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-corner.png' ) ); ?>" alt="" /></span></span>
    <span class="mold-leaf-wrap ml-top"><span class="mold-leaf-flip"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-edge-h.png' ) ); ?>" alt="" /></span></span>
    <span class="mold-leaf-wrap ml-bot"><span class="mold-leaf-flip flip-y"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-edge-h.png' ) ); ?>" alt="" /></span></span>
    <span class="mold-leaf-wrap ml-side-l"><span class="mold-leaf-flip"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-edge-v.png' ) ); ?>" alt="" /></span></span>
    <span class="mold-leaf-wrap ml-side-r"><span class="mold-leaf-flip flip-x"><img src="<?php echo esc_url( fgn_img( 'mold-leaf-edge-v.png' ) ); ?>" alt="" /></span></span>
  </div>
  <div class="flyers" aria-hidden="true">
    <span class="flyer flyer-leaf f1">
      <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M52 8C28 10 12 28 12 48c12-2 28-14 36-36 2 14-2 28-12 38 18-8 28-24 16-42z" fill="currentColor" opacity=".9"/><path d="M20 46c10-8 20-22 24-34" stroke="currentColor" stroke-width="2" opacity=".45"/></svg>
    </span>
    <span class="flyer flyer-leaf f2">
      <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M52 8C28 10 12 28 12 48c12-2 28-14 36-36 2 14-2 28-12 38 18-8 28-24 16-42z" fill="currentColor" opacity=".9"/><path d="M20 46c10-8 20-22 24-34" stroke="currentColor" stroke-width="2" opacity=".45"/></svg>
    </span>
    <span class="flyer flyer-leaf f3">
      <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M52 8C28 10 12 28 12 48c12-2 28-14 36-36 2 14-2 28-12 38 18-8 28-24 16-42z" fill="currentColor" opacity=".9"/><path d="M20 46c10-8 20-22 24-34" stroke="currentColor" stroke-width="2" opacity=".45"/></svg>
    </span>
    <span class="flyer flyer-leaf f4">
      <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M52 8C28 10 12 28 12 48c12-2 28-14 36-36 2 14-2 28-12 38 18-8 28-24 16-42z" fill="currentColor" opacity=".9"/><path d="M20 46c10-8 20-22 24-34" stroke="currentColor" stroke-width="2" opacity=".45"/></svg>
    </span>
  </div>

  <header class="nav">
    <div class="nav-row">
      <a class="logo" href="#home" aria-label="FreshGuard">
        <img src="<?php echo esc_url( fgn_logo() ); ?>" alt="FreshGuard" width="168" height="46" />
      </a>
      <nav class="nav-links">
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About Us</a>
        <a href="#articles">Articles</a>
        <a href="#contact">Contact</a>
        <a href="#home">Casebook</a>
      </nav>
      <div class="nav-right">
        <a class="phone" href="tel:+31625133975">+31 (0)6 25133975</a>
        <a class="btn btn-aqua" href="#contact">Get Quote</a>
        <button class="menu" id="menuBtn" aria-label="Menu">☰</button>
      </div>
    </div>
  </header>

  <div class="drawer" id="drawer">
    <button type="button" id="closeMenu">Close</button>
    <a href="#home">Home</a>
    <a href="#services">Services</a>
    <a href="#about">About Us</a>
    <a href="#articles">Articles</a>
    <a href="#contact">Contact</a>
  </div>
