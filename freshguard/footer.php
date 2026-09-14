<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<footer class="has-leaves">
<?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'dark' ) ); ?>
<div class="inner">
      <div class="foot">
        <a class="brand" href="#home" aria-label="FreshGuard">
          <img class="brand-logo footer-logo" src="<?php echo esc_url( fg_logo() ); ?>" alt="FreshGuard" width="160" height="44" />
        </a>
        <nav>
          <a href="#home">Home</a>
          <a href="#services">Services</a>
          <a href="#about">About Us</a>
          <a href="#articles">Articles</a>
          <a href="#contact">Contact</a>
        </nav>
        <div>Call Us · Mail Us</div>
      </div>
      <div class="legal">
        <span>FreshGuard B.V. | KVK 95689443 | 2025</span>
        <span>The Netherlands · France · Portugal</span>
      </div>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>
</html>
