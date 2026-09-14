<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
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
