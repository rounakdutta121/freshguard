<?php
/**
 * FreshGuard Elementor section widgets — every text/image editable.
 *
 * @package FreshGuard
 */

namespace FreshGuard\Elementor;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared helpers for widgets.
 */
trait Fg_Widget_Helpers {
	protected function media_url( $settings, $key, $fallback_file ) {
		if ( ! empty( $settings[ $key ]['url'] ) ) {
			return $settings[ $key ]['url'];
		}
		return fg_img( $fallback_file );
	}

	protected function media_control( $id, $label, $file ) {
		$this->add_control(
			$id,
			array(
				'label'   => $label,
				'type'    => Controls_Manager::MEDIA,
				'default' => array( 'url' => fg_img( $file ) ),
			)
		);
	}

	protected function wrap_open() {
		echo '<div class="fg-el-wrap">';
	}

	protected function wrap_close() {
		echo '</div>';
	}
}

abstract class Fg_Base_Widget extends Widget_Base {
	use Fg_Widget_Helpers;

	public function get_categories() {
		return array( 'freshguard', 'general' );
	}

	public function get_keywords() {
		return array( 'freshguard', 'section' );
	}
}

/* ───────── HERO ───────── */
class Widget_Hero extends Fg_Base_Widget {
	public function get_name() { return 'fg_hero'; }
	public function get_title() { return 'FG: Hero'; }
	public function get_icon() { return 'eicon-banner'; }

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Hero content' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '01 — Specialists' ) );
		$this->add_control( 'title_em', array( 'label' => 'Title accent (green)', 'type' => Controls_Manager::TEXT, 'default' => 'Your' ) );
		$this->add_control( 'title', array( 'label' => 'Title rest', 'type' => Controls_Manager::TEXT, 'default' => 'Space, Our Priority.' ) );
		$this->add_control( 'text', array( 'label' => 'Paragraph', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Accredited advanced mold remediation and moisture specialists. Welcome to FreshGuard — expert mold removal, indoor air protection and professional biocidal sanitization.' ) );
		$this->add_control( 'cta1', array( 'label' => 'Primary button', 'type' => Controls_Manager::TEXT, 'default' => 'Get Quote' ) );
		$this->add_control( 'cta1_link', array( 'label' => 'Primary link', 'type' => Controls_Manager::URL, 'default' => array( 'url' => '#contact' ) ) );
		$this->add_control( 'cta2', array( 'label' => 'Secondary button', 'type' => Controls_Manager::TEXT, 'default' => 'Learn More' ) );
		$this->add_control( 'cta2_link', array( 'label' => 'Secondary link', 'type' => Controls_Manager::URL, 'default' => array( 'url' => '#services' ) ) );
		$chips = new Repeater();
		$chips->add_control( 'label', array( 'label' => 'Chip', 'type' => Controls_Manager::TEXT ) );
		$this->add_control(
			'chips',
			array(
				'label'   => 'Chips',
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $chips->get_controls(),
				'default' => array(
					array( 'label' => 'Mold remediation' ),
					array( 'label' => 'Moisture assessment' ),
					array( 'label' => 'Biocidal sanitization' ),
					array( 'label' => 'Ventilation' ),
				),
				'title_field' => '{{{ label }}}',
			)
		);
		$this->end_controls_section();

		$this->start_controls_section( 'images', array( 'label' => 'Background images' ) );
		$this->media_control( 'img_pc', 'Desktop background', 'hero-banner.jpg' );
		$this->media_control( 'img_laptop', 'Laptop background', 'hero-banner-laptop.jpg' );
		$this->media_control( 'img_mobile', 'Mobile background', 'hero-banner-mobile.jpg' );
		$this->end_controls_section();
	}

	protected function render() {
		$s  = $this->get_settings_for_display();
		$pc = $this->media_url( $s, 'img_pc', 'hero-banner.jpg' );
		$lp = $this->media_url( $s, 'img_laptop', 'hero-banner-laptop.jpg' );
		$mb = $this->media_url( $s, 'img_mobile', 'hero-banner-mobile.jpg' );
		$c1 = ! empty( $s['cta1_link']['url'] ) ? $s['cta1_link']['url'] : '#contact';
		$c2 = ! empty( $s['cta2_link']['url'] ) ? $s['cta2_link']['url'] : '#services';
		$this->wrap_open();
		?>
		<section class="hero" id="home">
			<img class="hero-bg hero-pc" src="<?php echo esc_url( $pc ); ?>" alt="" />
			<img class="hero-bg hero-laptop" src="<?php echo esc_url( $lp ); ?>" alt="" />
			<img class="hero-bg hero-mobile" src="<?php echo esc_url( $mb ); ?>" alt="" />
			<div class="hero-copy"><div class="inner">
				<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
				<h1><em><?php echo esc_html( $s['title_em'] ); ?></em> <?php echo esc_html( $s['title'] ); ?></h1>
				<p><?php echo esc_html( $s['text'] ); ?></p>
				<div class="hero-actions">
					<a class="btn btn-leaf" href="<?php echo esc_url( $c1 ); ?>"><?php echo esc_html( $s['cta1'] ); ?></a>
					<a class="btn btn-ghost" href="<?php echo esc_url( $c2 ); ?>"><?php echo esc_html( $s['cta2'] ); ?></a>
				</div>
				<div class="chips">
					<?php foreach ( (array) $s['chips'] as $chip ) : ?>
						<span class="chip"><?php echo esc_html( $chip['label'] ); ?></span>
					<?php endforeach; ?>
				</div>
			</div></div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── WELCOME ───────── */
class Widget_Welcome extends Fg_Base_Widget {
	public function get_name() { return 'fg_welcome'; }
	public function get_title() { return 'FG: Welcome'; }
	public function get_icon() { return 'eicon-info-box'; }

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Welcome content' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '02 — Welcome' ) );
		$this->add_control( 'title', array( 'label' => 'Title (HTML allowed)', 'type' => Controls_Manager::TEXT, 'default' => 'Welcome to Fresh<b>Guard</b>' ) );
		$this->add_control( 'lead', array( 'label' => 'Lead', 'type' => Controls_Manager::TEXTAREA, 'default' => 'FreshGuard Mold Remediation, Indoor Air Protection & Professional Biocidal Sanitization' ) );
		$this->add_control( 'p1', array( 'label' => 'Paragraph 1', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We treat bathrooms, bedrooms, basements, crawl spaces, garages, and rental properties using a structured two-stage remediation process. Our advanced dry fogging treatment targets mold at its root, eliminates airborne spores, and kills up to 99.9999% of harmful bacteria, viruses, and fungi. Unlike bleach-based cleaning, our approach goes beyond surface stains to help prevent regrowth. We also offer odor neutralization and hygiene fogging for residential and commercial environments.' ) );
		$this->add_control( 'p2', array( 'label' => 'Paragraph 2', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Alongside biocidal sanitization, we provide professional oxidation-based fogging for odor control, disinfection, and whole-space hygiene — effectively treating air, surfaces, and hard-to-reach areas that conventional cleaning cannot reach.' ) );
		$stats = new Repeater();
		$stats->add_control( 'value', array( 'label' => 'Value', 'type' => Controls_Manager::TEXT ) );
		$stats->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT ) );
		$this->add_control(
			'stats',
			array(
				'label'   => 'Stats',
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $stats->get_controls(),
				'default' => array(
					array( 'value' => '99.9999%', 'label' => 'bacteria, viruses and fungi killed' ),
					array( 'value' => 'Two-stage', 'label' => 'structured remediation process' ),
					array( 'value' => '3 countries', 'label' => 'Netherlands, France, Portugal' ),
				),
				'title_field' => '{{{ value }}}',
			)
		);
		$this->media_control( 'image', 'Side image', 'welcome-3d.jpg' );
		$this->add_control( 'show_leaves', array( 'label' => 'Show leaf decorations', 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$s   = $this->get_settings_for_display();
		$img = $this->media_url( $s, 'image', 'welcome-3d.jpg' );
		$this->wrap_open();
		?>
		<section class="welcome has-leaves" id="about">
			<?php if ( 'yes' === $s['show_leaves'] ) { get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); } ?>
			<div class="inner">
				<div class="welcome-head">
					<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
					<h2><?php echo wp_kses_post( $s['title'] ); ?></h2>
				</div>
				<div class="welcome-split">
					<div class="welcome-body">
						<p><strong><?php echo esc_html( $s['lead'] ); ?></strong></p>
						<p><?php echo esc_html( $s['p1'] ); ?></p>
						<p><?php echo esc_html( $s['p2'] ); ?></p>
						<div class="stats">
							<?php foreach ( (array) $s['stats'] as $st ) : ?>
								<div><strong><?php echo esc_html( $st['value'] ); ?></strong><span><?php echo esc_html( $st['label'] ); ?></span></div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="welcome-visual"><img src="<?php echo esc_url( $img ); ?>" alt="" /></div>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── SERVICES ───────── */
class Widget_Services extends Fg_Base_Widget {
	public function get_name() { return 'fg_services'; }
	public function get_title() { return 'FG: Services'; }
	public function get_icon() { return 'eicon-gallery-grid'; }

	protected function register_controls() {
		$this->start_controls_section( 'head', array( 'label' => 'Header' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '03 — Our Services' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Four disciplines. One indoor standard.' ) );
		$this->add_control( 'lead', array( 'label' => 'Lead', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Pick the service you need, or combine them. Every property is different — we start by understanding the cause.' ) );
		$this->add_control( 'show_leaves', array( 'label' => 'Show leaf decorations', 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();

		$this->start_controls_section( 'cards', array( 'label' => 'Service cards' ) );
		$rep = new Repeater();
		$rep->add_control( 'n', array( 'label' => 'Number', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXTAREA ) );
		$rep->add_control( 'image', array( 'label' => 'Image', 'type' => Controls_Manager::MEDIA ) );
		$this->add_control(
			'items',
			array(
				'label'   => 'Services',
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $rep->get_controls(),
				'default' => array(
					array( 'n' => '01', 'title' => 'Leak Detection & Moisture Assessment', 'text' => 'Moisture meters and infrared thermal imaging to find hidden moisture, cold bridges and leaks — including non-destructive detection with BA-MAH Totaaltechniek.', 'image' => array( 'url' => fg_img( 'service-thermal.jpg' ) ) ),
					array( 'n' => '02', 'title' => 'Odor Control, Sanitization & Disinfection', 'text' => 'Oxidation-based dry and wet fogging for odor control, disinfection and whole-space hygiene — air, surfaces and hard-to-reach areas.', 'image' => array( 'url' => fg_img( 'service-fogging.jpg' ) ) ),
					array( 'n' => '03', 'title' => 'Mold Removal & Prevention', 'text' => 'A two-stage process that removes visible mold and kills up to 99.9999% of harmful bacteria, viruses and fungi. Built to prevent regrowth.', 'image' => array( 'url' => fg_img( 'service-mold.jpg' ) ) ),
					array( 'n' => '04', 'title' => 'Ventilation & Humidity Control', 'text' => 'Ongoing indoor monitoring of humidity, temperature and moisture to reduce recurrence and keep the indoor climate healthy.', 'image' => array( 'url' => fg_img( 'service-ventilation.jpg' ) ) ),
				),
				'title_field' => '{{{ title }}}',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="services has-leaves" id="services">
			<?php if ( 'yes' === $s['show_leaves'] ) { get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'dark' ) ); } ?>
			<div class="inner">
				<div class="services-head">
					<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
					<h2><?php echo esc_html( $s['title'] ); ?></h2>
					<p class="lead"><?php echo esc_html( $s['lead'] ); ?></p>
				</div>
			</div>
			<div class="svc-grid">
				<?php foreach ( (array) $s['items'] as $item ) :
					$img = ! empty( $item['image']['url'] ) ? $item['image']['url'] : '';
					?>
					<article class="svc">
						<?php if ( $img ) : ?><img src="<?php echo esc_url( $img ); ?>" alt=""><?php endif; ?>
						<div class="pad">
							<div class="n"><?php echo esc_html( $item['n'] ); ?></div>
							<h3><?php echo esc_html( $item['title'] ); ?></h3>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── EUROPE ───────── */
class Widget_Europe extends Fg_Base_Widget {
	public function get_name() { return 'fg_europe'; }
	public function get_title() { return 'FG: Europe'; }
	public function get_icon() { return 'eicon-google-maps'; }

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Europe content' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '04 — Across Europe' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Smart protection. Built for the long term.' ) );
		$this->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'FreshGuard applies ongoing indoor condition monitoring, assessing humidity, temperature, and moisture levels to reduce the risk of mold recurrence and support lasting indoor health.' ) );
		$places = new Repeater();
		$places->add_control( 'label', array( 'label' => 'Place', 'type' => Controls_Manager::TEXT ) );
		$this->add_control( 'places', array( 'label' => 'Places', 'type' => Controls_Manager::REPEATER, 'fields' => $places->get_controls(), 'default' => array( array( 'label' => 'The Netherlands' ), array( 'label' => 'South of France' ), array( 'label' => 'Portugal' ) ), 'title_field' => '{{{ label }}}' ) );
		$this->media_control( 'map_pc', 'Map (PC)', 'europe-map-pc.jpg' );
		$this->media_control( 'map_laptop', 'Map (Laptop)', 'europe-map-laptop.jpg' );
		$this->media_control( 'map_mobile', 'Map (Mobile)', 'europe-map-mobile.jpg' );
		$this->add_control( 'note1_title', array( 'label' => 'Note 1 title', 'type' => Controls_Manager::TEXT, 'default' => 'Supporting homes & businesses across Europe' ) );
		$this->add_control( 'note1_text', array( 'label' => 'Note 1 text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Solutions for private clients and businesses across The Netherlands, the South of France, and Portugal — consistent quality, compliance, and professional standards in every market.' ) );
		$this->add_control( 'note2_title', array( 'label' => 'Note 2 title', 'type' => Controls_Manager::TEXT, 'default' => 'A cleaner, drier, healthier space starts here.' ) );
		$this->add_control( 'note2_text', array( 'label' => 'Note 2 text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'From the first contact: transparent advice and clearly defined solutions for a healthier, cleaner, safer indoor environment.' ) );
		$this->add_control( 'show_leaves', array( 'label' => 'Show leaf decorations', 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="europe has-leaves">
			<?php if ( 'yes' === $s['show_leaves'] ) { get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); } ?>
			<div class="inner">
				<div class="europe-head">
					<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
					<h2><?php echo esc_html( $s['title'] ); ?></h2>
					<p><?php echo esc_html( $s['text'] ); ?></p>
					<div class="places">
						<?php foreach ( (array) $s['places'] as $p ) : ?>
							<span><?php echo esc_html( $p['label'] ); ?></span>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="europe-stage">
				<div class="map">
					<img class="map-pc" src="<?php echo esc_url( $this->media_url( $s, 'map_pc', 'europe-map-pc.jpg' ) ); ?>" alt="">
					<img class="map-laptop" src="<?php echo esc_url( $this->media_url( $s, 'map_laptop', 'europe-map-laptop.jpg' ) ); ?>" alt="">
					<img class="map-mobile" src="<?php echo esc_url( $this->media_url( $s, 'map_mobile', 'europe-map-mobile.jpg' ) ); ?>" alt="">
				</div>
				<div class="split-notes">
					<article>
						<h3><?php echo esc_html( $s['note1_title'] ); ?></h3>
						<p><?php echo esc_html( $s['note1_text'] ); ?></p>
					</article>
					<article>
						<h3><?php echo esc_html( $s['note2_title'] ); ?></h3>
						<p><?php echo esc_html( $s['note2_text'] ); ?></p>
					</article>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── ASSESS ───────── */
class Widget_Assess extends Fg_Base_Widget {
	public function get_name() { return 'fg_assess'; }
	public function get_title() { return 'FG: Assessment'; }
	public function get_icon() { return 'eicon-image-box'; }

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Assessment' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '05 — Leak Detection & Moisture Assessment' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Find the cause. Then treat the space.' ) );
		$this->add_control( 'p1', array( 'label' => 'Paragraph 1', 'type' => Controls_Manager::TEXTAREA, 'default' => 'At FreshGuard, we deliver tailored moisture and indoor environmental remediation solutions designed around your specific situation. Every property is different, which is why we begin with a careful intake and assessment to understand the underlying causes of mold, moisture issues, and persistent odors before recommending the most effective treatment approach.' ) );
		$this->add_control( 'p2', array( 'label' => 'Paragraph 2', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Where appropriate, FreshGuard carries out professional on-site inspections using a professional-grade moisture meter and infrared thermal imaging camera. These tools detect hidden moisture, cold bridges and problem areas behind walls, floors and ceilings.' ) );
		$this->add_control( 'p3', array( 'label' => 'Paragraph 3 (HTML ok)', 'type' => Controls_Manager::TEXTAREA, 'default' => 'When leak detection expertise is required, we work in close partnership with <strong>BA-MAH Totaaltechniek</strong>, specialists in non-destructive leak detection, ensuring fast and accurate identification of both visible and hidden leaks without unnecessary damage.' ) );
		$this->media_control( 'bg', 'Desktop background banner', 'assess-banner.jpg' );
		$this->media_control( 'mobile_img', 'Mobile image', 'service-thermal.jpg' );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="assess">
			<img class="assess-bg" src="<?php echo esc_url( $this->media_url( $s, 'bg', 'assess-banner.jpg' ) ); ?>" alt="">
			<div class="assess-grid">
				<img class="assess-mobile-img" src="<?php echo esc_url( $this->media_url( $s, 'mobile_img', 'service-thermal.jpg' ) ); ?>" alt="">
				<div class="assess-copy">
					<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
					<h2><?php echo esc_html( $s['title'] ); ?></h2>
					<p><?php echo esc_html( $s['p1'] ); ?></p>
					<p><?php echo esc_html( $s['p2'] ); ?></p>
					<p><?php echo wp_kses_post( $s['p3'] ); ?></p>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── PARTNERS ───────── */
class Widget_Partners extends Fg_Base_Widget {
	public function get_name() { return 'fg_partners'; }
	public function get_title() { return 'FG: Partners'; }
	public function get_icon() { return 'eicon-person'; }

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Partners' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '06 — Our Trusted Partners' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Specialists we work with' ) );
		$rep = new Repeater();
		$rep->add_control( 'title', array( 'label' => 'Name', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXTAREA ) );
		$this->add_control(
			'items',
			array(
				'label'   => 'Partners',
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $rep->get_controls(),
				'default' => array(
					array( 'title' => 'BA-MAH Totaaltechniek', 'text' => 'Non-destructive leak detection for houses, apartments, commercial properties and new-builds — thermography, acoustic detection, smoke testing, endoscopy and UV dye tracing.' ),
					array( 'title' => 'Professional biocidal partners', 'text' => 'Trusted partners for professional mold removal and dry fogging. FreshGuard uses products listed under Article 95 of the ECHA list, compliant with the EU Biocidal Products Regulation.' ),
				),
				'title_field' => '{{{ title }}}',
			)
		);
		$this->add_control( 'show_leaves', array( 'label' => 'Show leaf decorations', 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="partners has-leaves">
			<?php if ( 'yes' === $s['show_leaves'] ) { get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); } ?>
			<div class="inner">
				<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
				<h2><?php echo esc_html( $s['title'] ); ?></h2>
				<div class="partner-grid">
					<?php foreach ( (array) $s['items'] as $item ) : ?>
						<div>
							<h3><?php echo esc_html( $item['title'] ); ?></h3>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── CONTACT ───────── */
class Widget_Contact extends Fg_Base_Widget {
	public function get_name() { return 'fg_contact'; }
	public function get_title() { return 'FG: Contact'; }
	public function get_icon() { return 'eicon-form-horizontal'; }

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Contact copy' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '07 — Get in touch' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Ready for a Fresh Start?' ) );
		$this->add_control( 'lead', array( 'label' => 'Lead', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Tell us about the impacted space. We reply with transparent advice and a clearly defined next step.' ) );
		$this->add_control( 'phone', array( 'label' => 'Phone', 'type' => Controls_Manager::TEXT, 'default' => '+31 (0)6 25133975' ) );
		$this->add_control( 'phone_link', array( 'label' => 'Phone tel:', 'type' => Controls_Manager::TEXT, 'default' => '+31625133975' ) );
		$this->add_control( 'meta2', array( 'label' => 'Meta line 2', 'type' => Controls_Manager::TEXT, 'default' => 'Call Us · Mail Us' ) );
		$this->add_control( 'meta3', array( 'label' => 'Meta line 3', 'type' => Controls_Manager::TEXT, 'default' => 'The Netherlands · South of France · Portugal' ) );
		$this->add_control( 'upload_label', array( 'label' => 'Upload label', 'type' => Controls_Manager::TEXT, 'default' => 'Upload image(s) or take photo(s) of the impacted space' ) );
		$this->add_control( 'fine', array( 'label' => 'Fine print', 'type' => Controls_Manager::TEXT, 'default' => 'We never share your details with third parties.' ) );
		$this->add_control( 'submit', array( 'label' => 'Submit button', 'type' => Controls_Manager::TEXT, 'default' => 'Submit' ) );
		$this->add_control( 'success', array( 'label' => 'Success message', 'type' => Controls_Manager::TEXT, 'default' => 'Thank you. FreshGuard will contact you shortly.' ) );
		$this->add_control( 'show_leaves', array( 'label' => 'Show leaf decorations', 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="quote has-leaves" id="contact">
			<?php if ( 'yes' === $s['show_leaves'] ) { get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'dark' ) ); } ?>
			<div class="inner quote-grid">
				<div class="quote-copy">
					<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
					<h2><?php echo esc_html( $s['title'] ); ?></h2>
					<p class="lead"><?php echo esc_html( $s['lead'] ); ?></p>
					<div class="meta">
						<a href="tel:<?php echo esc_attr( $s['phone_link'] ); ?>"><?php echo esc_html( $s['phone'] ); ?></a>
						<span><?php echo esc_html( $s['meta2'] ); ?></span>
						<span><?php echo esc_html( $s['meta3'] ); ?></span>
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
							<?php echo esc_html( $s['upload_label'] ); ?>
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
						<span class="fine"><?php echo esc_html( $s['fine'] ); ?></span>
						<button class="btn btn-leaf" type="submit"><?php echo esc_html( $s['submit'] ); ?></button>
					</div>
					<div class="ok" id="formOk"><?php echo esc_html( $s['success'] ); ?></div>
				</form>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── ARTICLES ───────── */
class Widget_Articles extends Fg_Base_Widget {
	public function get_name() { return 'fg_articles'; }
	public function get_title() { return 'FG: Articles'; }
	public function get_icon() { return 'eicon-posts-grid'; }

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Articles' ) );
		$this->add_control( 'idx', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => '08 — Recommended for you' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Articles about mold & moisture' ) );
		$rep = new Repeater();
		$rep->add_control( 'n', array( 'label' => 'Number', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'image', array( 'label' => 'Image', 'type' => Controls_Manager::MEDIA ) );
		$this->add_control(
			'items',
			array(
				'label'   => 'Featured articles',
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $rep->get_controls(),
				'default' => array(
					array( 'n' => '01', 'title' => 'How Moisture Affects Your Home: A Hidden Threat to Health and Property', 'image' => array( 'url' => fg_img( 'article-moisture.jpg' ) ) ),
					array( 'n' => '02', 'title' => 'Everything You Wanted to Know About Mold, Even If You Were Hesitant to Ask', 'image' => array( 'url' => fg_img( 'article-mold.jpg' ) ) ),
					array( 'n' => '03', 'title' => 'The Role of Proper Ventilation in Preventing Mold', 'image' => array( 'url' => fg_img( 'article-ventilation.jpg' ) ) ),
				),
				'title_field' => '{{{ title }}}',
			)
		);
		$this->add_control( 'show_leaves', array( 'label' => 'Show leaf decorations', 'type' => Controls_Manager::SWITCHER, 'default' => 'yes' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="articles has-leaves" id="articles">
			<?php if ( 'yes' === $s['show_leaves'] ) { get_template_part( 'template-parts/leaves', 'decor', array( 'variant' => 'light' ) ); } ?>
			<div class="inner">
				<div class="idx"><?php echo esc_html( $s['idx'] ); ?></div>
				<h2><?php echo esc_html( $s['title'] ); ?></h2>
				<div class="art-grid">
					<?php foreach ( (array) $s['items'] as $item ) :
						$img = ! empty( $item['image']['url'] ) ? $item['image']['url'] : '';
						?>
						<article class="art">
							<?php if ( $img ) : ?><img src="<?php echo esc_url( $img ); ?>" alt=""><?php endif; ?>
							<div class="t"><div class="n"><?php echo esc_html( $item['n'] ); ?></div><h3><?php echo esc_html( $item['title'] ); ?></h3></div>
						</article>
					<?php endforeach; ?>
				</div>
				<div class="art-list" id="artMore"></div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}
