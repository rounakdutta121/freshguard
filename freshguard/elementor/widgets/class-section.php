<?php
namespace FreshGuard\Elementor;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Section_Widget extends Widget_Base {
  public function get_name() { return 'freshguard_section'; }
  public function get_title() { return 'FreshGuard Section'; }
  public function get_icon() { return 'eicon-section'; }
  public function get_categories() { return array( 'freshguard', 'general' ); }

  protected function register_controls() {
    $this->start_controls_section( 'sec', array( 'label' => 'Section' ) );
    $this->add_control( 'section', array(
      'label' => 'Which section?',
      'type' => Controls_Manager::SELECT,
      'default' => 'hero',
      'options' => array(
        'hero' => 'Hero',
        'welcome' => 'Welcome',
        'services' => 'Services',
        'europe' => 'Europe',
        'assess' => 'Assessment',
        'partners' => 'Partners',
        'contact' => 'Contact',
        'articles' => 'Articles',
      ),
    ) );
    $this->end_controls_section();

    // Hero
    $this->start_controls_section( 'hero', array( 'label' => 'Hero', 'condition' => array( 'section' => 'hero' ) ) );
    $this->add_control( 'hero_idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '01 — Specialists' ) );
    $this->add_control( 'hero_em', array( 'label' => 'Title accent', 'type' => Controls_Manager::TEXT, 'default' => 'Your' ) );
    $this->add_control( 'hero_title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Space, Our Priority.' ) );
    $this->add_control( 'hero_text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Accredited advanced mold remediation and moisture specialists. Welcome to FreshGuard — expert mold removal, indoor air protection and professional biocidal sanitization.' ) );
    $this->add_control( 'hero_cta1', array( 'label' => 'CTA 1', 'type' => Controls_Manager::TEXT, 'default' => 'Get Quote' ) );
    $this->add_control( 'hero_cta2', array( 'label' => 'CTA 2', 'type' => Controls_Manager::TEXT, 'default' => 'Learn More' ) );
    $this->add_control( 'hero_pc', array( 'label' => 'Desktop BG', 'type' => Controls_Manager::MEDIA, 'default' => array( 'url' => fg_img( 'hero-banner.jpg' ) ) ) );
    $this->add_control( 'hero_lp', array( 'label' => 'Laptop BG', 'type' => Controls_Manager::MEDIA, 'default' => array( 'url' => fg_img( 'hero-banner-laptop.jpg' ) ) ) );
    $this->add_control( 'hero_mb', array( 'label' => 'Mobile BG', 'type' => Controls_Manager::MEDIA, 'default' => array( 'url' => fg_img( 'hero-banner-mobile.jpg' ) ) ) );
    $this->end_controls_section();

    // Welcome
    $this->start_controls_section( 'welcome', array( 'label' => 'Welcome', 'condition' => array( 'section' => 'welcome' ) ) );
    $this->add_control( 'w_idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '02 — Welcome' ) );
    $this->add_control( 'w_title', array( 'label' => 'Title HTML', 'type' => Controls_Manager::TEXT, 'default' => 'Welcome to Fresh<b>Guard</b>' ) );
    $this->add_control( 'w_lead', array( 'label' => 'Lead', 'type' => Controls_Manager::TEXTAREA, 'default' => 'FreshGuard Mold Remediation, Indoor Air Protection & Professional Biocidal Sanitization' ) );
    $this->add_control( 'w_p1', array( 'label' => 'Paragraph 1', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We treat bathrooms, bedrooms, basements, crawl spaces, garages, and rental properties using a structured two-stage remediation process. Our advanced dry fogging treatment targets mold at its root, eliminates airborne spores, and kills up to 99.9999% of harmful bacteria, viruses, and fungi. Unlike bleach-based cleaning, our approach goes beyond surface stains to help prevent regrowth. We also offer odor neutralization and hygiene fogging for residential and commercial environments.' ) );
    $this->add_control( 'w_p2', array( 'label' => 'Paragraph 2', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Alongside biocidal sanitization, we provide professional oxidation-based fogging for odor control, disinfection, and whole-space hygiene — effectively treating air, surfaces, and hard-to-reach areas that conventional cleaning cannot reach.' ) );
    $this->add_control( 'w_img', array( 'label' => 'Image', 'type' => Controls_Manager::MEDIA, 'default' => array( 'url' => fg_img( 'welcome-3d.jpg' ) ) ) );
    $this->end_controls_section();

    // Other sections: bundled exact markup
    $this->start_controls_section( 'bundled', array( 'label' => 'Bundled section', 'condition' => array( 'section!' => array( 'hero', 'welcome' ) ) ) );
    $this->add_control( 'b_info', array(
      'type' => Controls_Manager::RAW_HTML,
      'raw' => 'This section uses the exact bundled markup and images from the original design. Swap media via the Media Library after importing theme images, or edit the PHP template in template-parts/sections/.',
      'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
    ) );
    $this->end_controls_section();
  }

  protected function render() {
    $s = $this->get_settings_for_display();
    $section = $s['section'];
    echo '<div class="fg-el-wrap">';

    if ( 'hero' === $section ) {
      $pc = ! empty( $s['hero_pc']['url'] ) ? $s['hero_pc']['url'] : fg_img( 'hero-banner.jpg' );
      $lp = ! empty( $s['hero_lp']['url'] ) ? $s['hero_lp']['url'] : fg_img( 'hero-banner-laptop.jpg' );
      $mb = ! empty( $s['hero_mb']['url'] ) ? $s['hero_mb']['url'] : fg_img( 'hero-banner-mobile.jpg' );
      ?>
      <section class="hero" id="home">
        <img class="hero-bg hero-pc" src="<?php echo esc_url( $pc ); ?>" alt="" />
        <img class="hero-bg hero-laptop" src="<?php echo esc_url( $lp ); ?>" alt="" />
        <img class="hero-bg hero-mobile" src="<?php echo esc_url( $mb ); ?>" alt="" />
        <div class="hero-copy"><div class="inner">
          <div class="idx"><?php echo esc_html( $s['hero_idx'] ); ?></div>
          <h1><em><?php echo esc_html( $s['hero_em'] ); ?></em> <?php echo esc_html( $s['hero_title'] ); ?></h1>
          <p><?php echo esc_html( $s['hero_text'] ); ?></p>
          <div class="hero-actions">
            <a class="btn btn-leaf" href="#contact"><?php echo esc_html( $s['hero_cta1'] ); ?></a>
            <a class="btn btn-ghost" href="#services"><?php echo esc_html( $s['hero_cta2'] ); ?></a>
          </div>
          <div class="chips">
            <span class="chip">Mold remediation</span>
            <span class="chip">Moisture assessment</span>
            <span class="chip">Biocidal sanitization</span>
            <span class="chip">Ventilation</span>
          </div>
        </div></div>
      </section>
      <?php
      echo '</div>';
      return;
    }

    if ( 'welcome' === $section ) {
      $img = ! empty( $s['w_img']['url'] ) ? $s['w_img']['url'] : fg_img( 'welcome-3d.jpg' );
      ?>
      <section class="welcome has-leaves" id="about">
        <?php get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); ?>
        <div class="inner">
          <div class="welcome-head">
            <div class="idx"><?php echo esc_html( $s['w_idx'] ); ?></div>
            <h2><?php echo wp_kses_post( $s['w_title'] ); ?></h2>
          </div>
          <div class="welcome-split">
            <div class="welcome-body">
              <p><strong><?php echo esc_html( $s['w_lead'] ); ?></strong></p>
              <p><?php echo esc_html( $s['w_p1'] ); ?></p>
              <p><?php echo esc_html( $s['w_p2'] ); ?></p>
              <div class="stats">
                <div><strong>99.9999%</strong><span>bacteria, viruses and fungi killed</span></div>
                <div><strong>Two-stage</strong><span>structured remediation process</span></div>
                <div><strong>3 countries</strong><span>Netherlands, France, Portugal</span></div>
              </div>
            </div>
            <div class="welcome-visual"><img src="<?php echo esc_url( $img ); ?>" alt="" /></div>
          </div>
        </div>
      </section>
      <?php
      echo '</div>';
      return;
    }

    $file = FG_DIR . '/template-parts/sections/' . sanitize_file_name( $section ) . '.php';
    if ( file_exists( $file ) ) include $file;
    echo '</div>';
  }
}
