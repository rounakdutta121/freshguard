<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php wp_head(); ?>
</head>
<body <?php body_class( 'theme-freshguard freshguard-fullbleed' ); ?>>
<?php wp_body_open(); ?>
<header>
    <div class="head">
      <a class="brand" href="#home" aria-label="FreshGuard">
        <img class="brand-logo" src="<?php echo esc_url( fg_logo() ); ?>" alt="FreshGuard" width="180" height="49" />
      </a>
      <nav>
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About Us</a>
        <a href="#articles">Articles</a>
        <a href="#contact">Contact</a>
        <a href="#home">Casebook</a>
      </nav>
      <div class="head-right">
        <a class="phone" href="tel:+31625133975">+31 (0)6 25133975</a>
        <a class="btn btn-leaf" href="#contact">Get Quote</a>
        <button class="menu" id="menuBtn" aria-label="Menu">☰</button>
      </div>
    </div>
  </header>
<div class="drawer" id="drawer">
    <button class="btn btn-white" id="closeMenu">Close</button>
    <a href="#home">Home</a>
    <a href="#services">Services</a>
    <a href="#about">About Us</a>
    <a href="#articles">Articles</a>
    <a href="#contact">Contact</a>
  </div>

  
