<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<section class="hero" id="home">
    <img class="hero-bg hero-pc" src="<?php echo esc_url( fg_img( 'hero-banner.jpg' ) ); ?>" alt="FreshGuard specialist with branded protective suit" />
    <img class="hero-bg hero-laptop" src="<?php echo esc_url( fg_img( 'hero-banner-laptop.jpg' ) ); ?>" alt="FreshGuard specialist with branded protective suit" />
    <img class="hero-bg hero-mobile" src="<?php echo esc_url( fg_img( 'hero-banner-mobile.jpg' ) ); ?>" alt="FreshGuard specialist with branded protective suit" />
    <div class="hero-copy">
      <div class="inner">
        <div class="idx">01 — Specialists</div>
        <h1><em>Your</em> Space, Our Priority.</h1>
        <p>Accredited advanced mold remediation and moisture specialists. Welcome to FreshGuard — expert mold removal, indoor air protection and professional biocidal sanitization.</p>
        <div class="hero-actions">
          <a class="btn btn-leaf" href="#contact">Get Quote</a>
          <a class="btn btn-ghost" href="#services">Learn More</a>
        </div>
        <div class="chips">
          <span class="chip">Mold remediation</span>
          <span class="chip">Moisture assessment</span>
          <span class="chip">Biocidal sanitization</span>
          <span class="chip">Ventilation</span>
        </div>
      </div>
    </div>
  </section>

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

  <section class="europe has-leaves">
<?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); ?>
<div class="inner">
      <div class="europe-head">
        <div class="idx">04 — Across Europe</div>
        <h2>Smart protection. Built for the long term.</h2>
        <p>FreshGuard applies ongoing indoor condition monitoring, assessing humidity, temperature, and moisture levels to reduce the risk of mold recurrence and support lasting indoor health.</p>
        <div class="places">
          <span>The Netherlands</span>
          <span>South of France</span>
          <span>Portugal</span>
        </div>
      </div>
    </div>
    <div class="europe-stage">
      <div class="map">
        <img class="map-pc" src="<?php echo esc_url( fg_img( 'europe-map-pc.jpg' ) ); ?>" alt="Map of FreshGuard locations across Europe">
        <img class="map-laptop" src="<?php echo esc_url( fg_img( 'europe-map-laptop.jpg' ) ); ?>" alt="Map of FreshGuard locations across Europe">
        <img class="map-mobile" src="<?php echo esc_url( fg_img( 'europe-map-mobile.jpg' ) ); ?>" alt="Map of FreshGuard locations across Europe">
      </div>
      <div class="split-notes">
        <article>
          <h3>Supporting homes & businesses across Europe</h3>
          <p>Solutions for private clients and businesses across The Netherlands, the South of France, and Portugal — consistent quality, compliance, and professional standards in every market.</p>
        </article>
        <article>
          <h3>A cleaner, drier, healthier space starts here.</h3>
          <p>From the first contact: transparent advice and clearly defined solutions for a healthier, cleaner, safer indoor environment.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="assess">
    <img class="assess-bg" src="<?php echo esc_url( fg_img( 'assess-banner.jpg' ) ); ?>" alt="">
    <div class="assess-grid">
      <img class="assess-mobile-img" src="<?php echo esc_url( fg_img( 'service-thermal.jpg' ) ); ?>" alt="Infrared moisture inspection">
      <div class="assess-copy">
        <div class="idx">05 — Leak Detection & Moisture Assessment</div>
        <h2>Find the cause. Then treat the space.</h2>
        <p>At FreshGuard, we deliver tailored moisture and indoor environmental remediation solutions designed around your specific situation. Every property is different, which is why we begin with a careful intake and assessment to understand the underlying causes of mold, moisture issues, and persistent odors before recommending the most effective treatment approach.</p>
        <p>Where appropriate, FreshGuard carries out professional on-site inspections using a professional-grade moisture meter and infrared thermal imaging camera. These tools detect hidden moisture, cold bridges and problem areas behind walls, floors and ceilings.</p>
        <p>When leak detection expertise is required, we work in close partnership with <strong>BA-MAH Totaaltechniek</strong>, specialists in non-destructive leak detection, ensuring fast and accurate identification of both visible and hidden leaks without unnecessary damage.</p>
      </div>
    </div>
  </section>

  <section class="partners has-leaves">
<?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); ?>
<div class="inner">
      <div class="idx">06 — Our Trusted Partners</div>
      <h2>Specialists we work with</h2>
      <div class="partner-grid">
        <div>
          <h3>BA-MAH Totaaltechniek</h3>
          <p>Non-destructive leak detection for houses, apartments, commercial properties and new-builds — thermography, acoustic detection, smoke testing, endoscopy and UV dye tracing.</p>
        </div>
        <div>
          <h3>Professional biocidal partners</h3>
          <p>Trusted partners for professional mold removal and dry fogging. FreshGuard uses products listed under Article 95 of the ECHA list, compliant with the EU Biocidal Products Regulation.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="quote has-leaves" id="contact">
<?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'dark' ) ); ?>
<div class="inner quote-grid">
      <div class="quote-copy">
        <div class="idx">07 — Get in touch</div>
        <h2>Ready for a Fresh Start?</h2>
        <p class="lead">Tell us about the impacted space. We reply with transparent advice and a clearly defined next step.</p>
        <div class="meta">
          <a href="tel:+31625133975">+31 (0)6 25133975</a>
          <span>Call Us · Mail Us</span>
          <span>The Netherlands · South of France · Portugal</span>
        </div>
      </div>
      <form id="quoteForm">
        <div class="field"><label>First Name *</label><input name="firstName" required></div>
        <div class="field"><label>Last Name *</label><input name="lastName" required></div>
        <div class="field"><label>Email *</label><input type="email" name="email" required></div>
        <div class="field"><label>Phone *</label><input name="phone" required></div>
        <div class="field"><label>Address *</label><input name="address" required></div>
        <div class="field"><label>Post code *</label><input name="postcode" required></div>
        <div class="field full"><label>City *</label><input name="city" required></div>
        <div class="field full"><label>Message</label><textarea name="message" placeholder="Describe the moisture or mold issue"></textarea></div>
        <div class="field full">
          <label class="upload" id="uploadBox">
            <input id="photos" type="file" accept="image/jpeg,image/png,image/webp" multiple hidden>
            Upload image(s) or take photo(s) of the impacted space
            <div id="fileList" style="margin-top:8px;font-size:12px;color:#fff"></div>
          </label>
        </div>
        <div class="field full">
          <label>How did you find us?</label>
          <select name="source">
            <option>Internet Search</option>
            <option>Facebook / Instagram</option>
            <option>Flyer</option>
            <option>Referral</option>
          </select>
        </div>
        <div class="form-foot">
          <span class="fine">We never share your details with third parties.</span>
          <button class="btn btn-leaf" type="submit">Submit</button>
        </div>
        <div class="ok" id="formOk">Thank you. FreshGuard will contact you shortly.</div>
      </form>
    </div>
  </section>

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

  
