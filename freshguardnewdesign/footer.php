<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
  <footer>
    <div class="shell">
      <div class="foot-top">
        <a class="logo" href="#home" aria-label="FreshGuard">
          <img src="<?php echo esc_url( fgn_logo() ); ?>" alt="FreshGuard" width="130" height="36" />
        </a>
        <div class="foot-links">
          <a href="#home">Home</a>
          <a href="#services">Services</a>
          <a href="#about">About Us</a>
          <a href="#articles">Articles</a>
          <a href="#contact">Contact</a>
        </div>
        <div>Call Us · Mail Us</div>
      </div>
      <div class="foot-bottom">
        <span>FreshGuard B.V. | KVK 95689443 | 2025</span>
        <span>The Netherlands · France · Portugal</span>
      </div>
    </div>
  </footer>

  <div class="fabs" aria-label="Quick actions">
    <button type="button" class="fab fab-top" id="backTop" aria-label="Back to top">
      <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14M5 12l7-7 7 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </button>
    <a class="fab fab-wa" href="https://api.whatsapp.com/send/?phone=31625133975&text=_Homepage_%0A%0A%2AMessage%3A%2A+%0A%0AHI%0A&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
      <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.5 3.5A11.8 11.8 0 0 0 12.05 0C5.5 0 .2 5.3.2 11.85c0 2.09.55 4.13 1.6 5.94L0 24l6.4-1.67a11.8 11.8 0 0 0 5.64 1.44h.01c6.55 0 11.85-5.3 11.85-11.85 0-3.16-1.23-6.14-3.4-8.42zM12.05 21.2h-.01a9.8 9.8 0 0 1-5-1.37l-.36-.21-3.8 1 1.01-3.7-.24-.38a9.8 9.8 0 0 1-1.5-5.24C1.15 6.4 6.05 1.5 12.05 1.5c2.62 0 5.08 1.02 6.93 2.87a9.74 9.74 0 0 1 2.87 6.93c0 6-4.9 10.9-9.8 10.9zm5.68-7.34c-.31-.16-1.84-.91-2.12-1.01-.28-.1-.49-.16-.7.16-.21.31-.8 1.01-.98 1.22-.18.21-.36.23-.67.08-.31-.16-1.31-.48-2.5-1.54-.92-.82-1.54-1.84-1.72-2.15-.18-.31-.02-.48.14-.63.14-.14.31-.36.47-.54.16-.18.21-.31.31-.52.1-.21.05-.39-.03-.54-.08-.16-.7-1.68-.96-2.3-.25-.6-.5-.52-.7-.53h-.6c-.21 0-.54.08-.82.39-.28.31-1.08 1.05-1.08 2.56s1.1 2.97 1.26 3.18c.16.21 2.16 3.3 5.24 4.62.73.32 1.3.5 1.75.64.73.23 1.4.2 1.93.12.59-.09 1.84-.75 2.1-1.48.26-.72.26-1.34.18-1.48-.08-.13-.28-.21-.59-.36z"/></svg>
    </a>
  </div>
<?php wp_footer(); ?>
</body>
</html>
