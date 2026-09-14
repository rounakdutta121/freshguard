<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<section class="articles has-leaves" id="articles">
<?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); ?>
<div class="inner">
      <div class="idx">08 — Recommended for you</div>
      <h2>Articles about mold & moisture</h2>
      <div class="art-grid">
        <article class="art">
          <img src="<?php echo esc_url( fg_img( 'article-moisture.jpg' ) ); ?>" alt="">
          <div class="t"><div class="n">01</div><h3>How Moisture Affects Your Home: A Hidden Threat to Health and Property</h3></div>
        </article>
        <article class="art">
          <img src="<?php echo esc_url( fg_img( 'article-mold.jpg' ) ); ?>" alt="">
          <div class="t"><div class="n">02</div><h3>Everything You Wanted to Know About Mold, Even If You Were Hesitant to Ask</h3></div>
        </article>
        <article class="art">
          <img src="<?php echo esc_url( fg_img( 'article-ventilation.jpg' ) ); ?>" alt="">
          <div class="t"><div class="n">03</div><h3>The Role of Proper Ventilation in Preventing Mold</h3></div>
        </article>
      </div>
      <div class="art-list" id="artMore"></div>
    </div>
  </section>
