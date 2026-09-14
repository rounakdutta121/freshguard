<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<section class="welcome has-leaves" id="about">
<?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); ?>
<div class="inner">
      <div class="welcome-head">
        <div class="idx">02 — Welcome</div>
        <h2>Welcome to Fresh<b>Guard</b></h2>
      </div>
      <div class="welcome-split">
        <div class="welcome-body">
          <p><strong>FreshGuard Mold Remediation, Indoor Air Protection & Professional Biocidal Sanitization</strong></p>
          <p>We treat bathrooms, bedrooms, basements, crawl spaces, garages, and rental properties using a structured two-stage remediation process. Our advanced dry fogging treatment targets mold at its root, eliminates airborne spores, and kills up to 99.9999% of harmful bacteria, viruses, and fungi. Unlike bleach-based cleaning, our approach goes beyond surface stains to help prevent regrowth. We also offer odor neutralization and hygiene fogging for residential and commercial environments.</p>
          <p>Alongside biocidal sanitization, we provide professional oxidation-based fogging for odor control, disinfection, and whole-space hygiene — effectively treating air, surfaces, and hard-to-reach areas that conventional cleaning cannot reach.</p>
          <div class="stats">
            <div><strong>99.9999%</strong><span>bacteria, viruses and fungi killed</span></div>
            <div><strong>Two-stage</strong><span>structured remediation process</span></div>
            <div><strong>3 countries</strong><span>Netherlands, France, Portugal</span></div>
          </div>
        </div>
        <div class="welcome-visual">
          <img src="<?php echo esc_url( fg_img( 'welcome-3d.jpg' ) ); ?>" alt="3D visualization of a healthy indoor climate" />
        </div>
      </div>
    </div>
  </section>
