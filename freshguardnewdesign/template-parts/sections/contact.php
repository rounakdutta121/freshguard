<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
  <section class="contact" id="contact">
    <div class="shell contact-grid">
      <div class="contact-copy">
        <div class="label fx">Get in touch</div>
        <h2 class="fx" style="--d:1">Ready for a Fresh Start?</h2>
        <p class="lead fx" style="--d:2">Tell us about the impacted space. We reply with transparent advice and a clearly defined next step.</p>
        <div class="contact-meta fx" style="--d:3">
          <a href="tel:+31625133975">+31 (0)6 25133975</a>
          <span>Call Us · Mail Us</span>
          <span>The Netherlands · South of France · Portugal</span>
        </div>
      </div>
      <div class="form fx" style="--d:2">
        <form id="quoteForm">
          <label>First Name *<input name="first" required /></label>
          <label>Last Name *<input name="last" required /></label>
          <label>Email *<input type="email" name="email" required /></label>
          <label>Phone *<input type="tel" name="phone" required /></label>
          <label class="full">Address *<input name="address" required /></label>
          <label>Post code *<input name="postcode" required /></label>
          <label>City *<input name="city" required /></label>
          <label class="full">Message<textarea name="message"></textarea></label>
          <div class="upload full" id="uploadBox">
            Upload image(s) or take photo(s) of the impacted space
            <input type="file" id="photos" accept="image/*" multiple hidden />
            <div id="fileList" class="fine" style="margin-top:8px"></div>
          </div>
          <label class="full">How did you find us?
            <select name="source">
              <option>Internet Search</option>
              <option>Facebook / Instagram</option>
              <option>Flyer</option>
              <option>Referral</option>
            </select>
          </label>
          <div class="form-bottom full">
            <span class="fine">We never share your details with third parties.</span>
            <button class="btn btn-aqua" type="submit">Submit</button>
          </div>
          <p id="formOk" class="full">Thank you. FreshGuard will contact you shortly.</p>
        </form>
      </div>
    </div>
  </section>
