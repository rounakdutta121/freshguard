<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<section class="services has-leaves" id="services">
<?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'dark' ) ); ?>
<div class="inner">
      <div class="services-head">
        <div class="idx">03 — Our Services</div>
        <h2>Four disciplines. One indoor standard.</h2>
        <p class="lead">Pick the service you need, or combine them. Every property is different — we start by understanding the cause.</p>
      </div>
    </div>
    <div class="svc-grid">
      <article class="svc">
        <img src="<?php echo esc_url( fg_img( 'service-thermal.jpg' ) ); ?>" alt="Thermal imaging camera">
        <div class="pad">
          <div class="n">01</div>
          <h3>Leak Detection & Moisture Assessment</h3>
          <p>Moisture meters and infrared thermal imaging to find hidden moisture, cold bridges and leaks — including non-destructive detection with BA-MAH Totaaltechniek.</p>
        </div>
      </article>
      <article class="svc">
        <img src="<?php echo esc_url( fg_img( 'service-fogging.jpg' ) ); ?>" alt="Sanitization fogging">
        <div class="pad">
          <div class="n">02</div>
          <h3>Odor Control, Sanitization & Disinfection</h3>
          <p>Oxidation-based dry and wet fogging for odor control, disinfection and whole-space hygiene — air, surfaces and hard-to-reach areas.</p>
        </div>
      </article>
      <article class="svc">
        <img src="<?php echo esc_url( fg_img( 'service-mold.jpg' ) ); ?>" alt="Mold on an interior wall">
        <div class="pad">
          <div class="n">03</div>
          <h3>Mold Removal & Prevention</h3>
          <p>A two-stage process that removes visible mold and kills up to 99.9999% of harmful bacteria, viruses and fungi. Built to prevent regrowth.</p>
        </div>
      </article>
      <article class="svc">
        <img src="<?php echo esc_url( fg_img( 'service-ventilation.jpg' ) ); ?>" alt="Ventilation unit">
        <div class="pad">
          <div class="n">04</div>
          <h3>Ventilation & Humidity Control</h3>
          <p>Ongoing indoor monitoring of humidity, temperature and moisture to reduce recurrence and keep the indoor climate healthy.</p>
        </div>
      </article>
    </div>
  </section>
