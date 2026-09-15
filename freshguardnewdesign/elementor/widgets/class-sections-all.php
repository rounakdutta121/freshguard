<?php
/**
 * FreshGuard New Design Elementor section widgets — markup matches freshguard.html.
 *
 * @package FreshGuardNew
 */

namespace FreshGuardNew\Elementor;

use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Fgn_Widget_Helpers {
	protected function media_url( $settings, $key, $fallback_file ) {
		if ( ! empty( $settings[ $key ]['url'] ) ) {
			return $settings[ $key ]['url'];
		}
		return fgn_img( $fallback_file );
	}

	protected function media_control( $id, $label, $file ) {
		$this->add_control(
			$id,
			array(
				'label'   => $label,
				'type'    => Controls_Manager::MEDIA,
				'default' => array( 'url' => fgn_img( $file ) ),
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

abstract class Fgn_Base_Widget extends Widget_Base {
	use Fgn_Widget_Helpers;

	public function get_categories() {
		return array( 'freshguard', 'general' );
	}

	public function get_keywords() {
		return array( 'freshguard', 'section' );
	}
}

/* ───────── HERO ───────── */
class Widget_Hero extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_hero';
	}
	public function get_title() {
		return 'FG: Hero';
	}
	public function get_icon() {
		return 'eicon-banner';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Hero content' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'FreshGuard · Specialists' ) );
		$this->add_control( 'title_em', array( 'label' => 'Title accent', 'type' => Controls_Manager::TEXT, 'default' => 'Your' ) );
		$this->add_control( 'title', array( 'label' => 'Title rest', 'type' => Controls_Manager::TEXT, 'default' => 'Space, Our Priority.' ) );
		$this->add_control( 'text', array( 'label' => 'Paragraph', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Accredited advanced mold remediation and moisture specialists. Welcome to FreshGuard — expert mold removal, indoor air protection and professional biocidal sanitization.' ) );
		$this->add_control( 'cta1', array( 'label' => 'Primary button', 'type' => Controls_Manager::TEXT, 'default' => 'Get Quote' ) );
		$this->add_control( 'cta1_link', array( 'label' => 'Primary link', 'type' => Controls_Manager::URL, 'default' => array( 'url' => '#contact' ) ) );
		$this->add_control( 'cta2', array( 'label' => 'Secondary button', 'type' => Controls_Manager::TEXT, 'default' => 'Learn More' ) );
		$this->add_control( 'cta2_link', array( 'label' => 'Secondary link', 'type' => Controls_Manager::URL, 'default' => array( 'url' => '#services' ) ) );
		$tags = new Repeater();
		$tags->add_control( 'label', array( 'label' => 'Tag', 'type' => Controls_Manager::TEXT ) );
		$this->add_control(
			'tags',
			array(
				'label'       => 'Tags',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $tags->get_controls(),
				'default'     => array(
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
		$this->media_control( 'img_pc', 'Desktop background', 'fg2-hero.jpg' );
		$this->media_control( 'img_mobile', 'Mobile background', 'fg2-hero-mobile.jpg' );
		$this->end_controls_section();
	}

	protected function render() {
		$s  = $this->get_settings_for_display();
		$pc = $this->media_url( $s, 'img_pc', 'fg2-hero.jpg' );
		$mb = $this->media_url( $s, 'img_mobile', 'fg2-hero-mobile.jpg' );
		$c1 = ! empty( $s['cta1_link']['url'] ) ? $s['cta1_link']['url'] : '#contact';
		$c2 = ! empty( $s['cta2_link']['url'] ) ? $s['cta2_link']['url'] : '#services';
		$this->wrap_open();
		?>
		<section class="hero" id="home">
			<img class="hero-bg hero-bg-pc" src="<?php echo esc_url( $pc ); ?>" alt="FreshGuard specialist in a modern home" />
			<img class="hero-bg hero-bg-mobile" src="<?php echo esc_url( $mb ); ?>" alt="FreshGuard specialist in a modern home" />
			<div class="hero-inner">
				<div class="brand-line fx"><?php echo esc_html( $s['label'] ); ?></div>
				<h1 class="fx" style="--d:1"><span><?php echo esc_html( $s['title_em'] ); ?></span> <?php echo esc_html( $s['title'] ); ?></h1>
				<p class="fx" style="--d:2"><?php echo esc_html( $s['text'] ); ?></p>
				<div class="hero-actions fx" style="--d:3">
					<a class="btn btn-aqua" href="<?php echo esc_url( $c1 ); ?>"><?php echo esc_html( $s['cta1'] ); ?></a>
					<a class="btn btn-ghost" href="<?php echo esc_url( $c2 ); ?>"><?php echo esc_html( $s['cta2'] ); ?></a>
				</div>
				<div class="tags fx" style="--d:4">
					<?php foreach ( (array) $s['tags'] as $tag ) : ?>
						<a class="tag" href="#contact"><?php echo esc_html( $tag['label'] ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── WELCOME (stats + about) ───────── */
class Widget_Welcome extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_welcome';
	}
	public function get_title() {
		return 'FG: Welcome';
	}
	public function get_icon() {
		return 'eicon-info-box';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Welcome content' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Welcome' ) );
		$this->add_control( 'title', array( 'label' => 'Title (HTML allowed)', 'type' => Controls_Manager::TEXT, 'default' => 'Welcome to Fresh<em>Guard</em>' ) );
		$this->add_control( 'lead', array( 'label' => 'Lead', 'type' => Controls_Manager::TEXTAREA, 'default' => 'FreshGuard Mold Remediation, Indoor Air Protection & Professional Biocidal Sanitization' ) );
		$this->add_control( 'p1', array( 'label' => 'Paragraph 1', 'type' => Controls_Manager::TEXTAREA, 'default' => 'We treat bathrooms, bedrooms, basements, crawl spaces, garages, and rental properties using a structured two-stage remediation process. Our advanced dry fogging treatment targets mold at its root, eliminates airborne spores, and kills up to 99.9999% of harmful bacteria, viruses, and fungi. Unlike bleach-based cleaning, our approach goes beyond surface stains to help prevent regrowth. We also offer odor neutralization and hygiene fogging for residential and commercial environments.' ) );
		$this->add_control( 'p2', array( 'label' => 'Paragraph 2', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Alongside biocidal sanitization, we provide professional oxidation-based fogging for odor control, disinfection, and whole-space hygiene — effectively treating air, surfaces, and hard-to-reach areas that conventional cleaning cannot reach.' ) );
		$stats = new Repeater();
		$stats->add_control( 'value', array( 'label' => 'Value', 'type' => Controls_Manager::TEXT ) );
		$stats->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT ) );
		$this->add_control(
			'stats',
			array(
				'label'       => 'Stats',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $stats->get_controls(),
				'default'     => array(
					array( 'value' => '99.9999%', 'label' => 'bacteria, viruses and fungi killed' ),
					array( 'value' => 'Two-stage', 'label' => 'structured remediation process' ),
					array( 'value' => '3 countries', 'label' => 'Netherlands, France, Portugal' ),
				),
				'title_field' => '{{{ value }}}',
			)
		);
		$this->media_control( 'image', 'Side image', 'fg2-welcome.jpg' );
		$this->end_controls_section();
	}

	protected function render() {
		$s   = $this->get_settings_for_display();
		$img = $this->media_url( $s, 'image', 'fg2-welcome.jpg' );
		$this->wrap_open();
		?>
		<div class="stats">
			<div class="shell stats-row">
				<?php foreach ( (array) $s['stats'] as $i => $st ) : ?>
					<div class="stat fx"<?php echo $i ? ' style="--d:' . (int) $i . '"' : ''; ?>><strong><?php echo esc_html( $st['value'] ); ?></strong><span><?php echo esc_html( $st['label'] ); ?></span></div>
				<?php endforeach; ?>
			</div>
		</div>
		<section class="about" id="about">
			<div class="shell about-grid">
				<div class="about-media fx">
					<img src="<?php echo esc_url( $img ); ?>" alt="FreshGuard specialist" />
				</div>
				<div class="about-copy">
					<div class="label fx"><?php echo esc_html( $s['label'] ); ?></div>
					<h2 class="fx" style="--d:1"><?php echo wp_kses_post( $s['title'] ); ?></h2>
					<p class="fx" style="--d:2"><strong><?php echo esc_html( $s['lead'] ); ?></strong></p>
					<p class="fx" style="--d:3"><?php echo esc_html( $s['p1'] ); ?></p>
					<p class="fx" style="--d:4"><?php echo esc_html( $s['p2'] ); ?></p>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── SERVICES ───────── */
class Widget_Services extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_services';
	}
	public function get_title() {
		return 'FG: Services';
	}
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	protected function register_controls() {
		$this->start_controls_section( 'head', array( 'label' => 'Header' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Our Services' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Four disciplines. One indoor standard.' ) );
		$this->add_control( 'lead', array( 'label' => 'Lead', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Pick the service you need, or combine them. Every property is different — we start by understanding the cause.' ) );
		$this->end_controls_section();

		$this->start_controls_section( 'cards', array( 'label' => 'Service cards' ) );
		$rep = new Repeater();
		$rep->add_control( 'n', array( 'label' => 'Number', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXTAREA ) );
		$rep->add_control( 'alt', array( 'label' => 'Image alt', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'image', array( 'label' => 'Image', 'type' => Controls_Manager::MEDIA ) );
		$this->add_control(
			'items',
			array(
				'label'       => 'Services',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $rep->get_controls(),
				'default'     => array(
					array( 'n' => '01', 'title' => 'Leak Detection & Moisture Assessment', 'text' => 'Moisture meters and infrared thermal imaging to find hidden moisture, cold bridges and leaks — including non-destructive detection with BA-MAH Totaaltechniek.', 'alt' => 'Thermal camera revealing a hidden leak and water-stained wall', 'image' => array( 'url' => fgn_img( 'fg2-service-thermal.jpg' ) ) ),
					array( 'n' => '02', 'title' => 'Odor Control, Sanitization & Disinfection', 'text' => 'Oxidation-based dry and wet fogging for odor control, disinfection and whole-space hygiene — air, surfaces and hard-to-reach areas.', 'alt' => 'Sanitizing fog treatment in a grimy bathroom', 'image' => array( 'url' => fgn_img( 'fg2-service-fog.jpg' ) ) ),
					array( 'n' => '03', 'title' => 'Mold Removal & Prevention', 'text' => 'A two-stage process that removes visible mold and kills up to 99.9999% of harmful bacteria, viruses and fungi. Built to prevent regrowth.', 'alt' => 'Visible mold growth on a bathroom wall and ceiling', 'image' => array( 'url' => fgn_img( 'fg2-service-mold.jpg' ) ) ),
					array( 'n' => '04', 'title' => 'Ventilation & Humidity Control', 'text' => 'Ongoing indoor monitoring of humidity, temperature and moisture to reduce recurrence and keep the indoor climate healthy.', 'alt' => 'Window condensation and humidity with a ventilation unit', 'image' => array( 'url' => fgn_img( 'fg2-service-vent.jpg' ) ) ),
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
		<section class="services" id="services">
			<div class="shell">
				<div class="section-head">
					<div class="label fx"><?php echo esc_html( $s['label'] ); ?></div>
					<h2 class="fx" style="--d:1"><?php echo esc_html( $s['title'] ); ?></h2>
					<p class="fx" style="--d:2"><?php echo esc_html( $s['lead'] ); ?></p>
				</div>
				<div class="service-grid">
					<?php
					foreach ( (array) $s['items'] as $i => $item ) :
						$img = ! empty( $item['image']['url'] ) ? $item['image']['url'] : '';
						?>
						<article class="service fx"<?php echo $i ? ' style="--d:' . (int) $i . '"' : ''; ?>>
							<?php if ( $img ) : ?>
								<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['alt'] ); ?>">
							<?php endif; ?>
							<div class="service-body">
								<div class="n"><?php echo esc_html( $item['n'] ); ?></div>
								<h3><?php echo esc_html( $item['title'] ); ?></h3>
								<p><?php echo esc_html( $item['text'] ); ?></p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── EUROPE ───────── */
class Widget_Europe extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_europe';
	}
	public function get_title() {
		return 'FG: Europe';
	}
	public function get_icon() {
		return 'eicon-google-maps';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Europe content' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Across Europe' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Smart protection. Built for the long term.' ) );
		$this->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'FreshGuard applies ongoing indoor condition monitoring, assessing humidity, temperature, and moisture levels to reduce the risk of mold recurrence and support lasting indoor health.' ) );
		$places = new Repeater();
		$places->add_control( 'label', array( 'label' => 'Place', 'type' => Controls_Manager::TEXT ) );
		$this->add_control( 'places', array( 'label' => 'Places', 'type' => Controls_Manager::REPEATER, 'fields' => $places->get_controls(), 'default' => array( array( 'label' => 'The Netherlands' ), array( 'label' => 'South of France' ), array( 'label' => 'Portugal' ) ), 'title_field' => '{{{ label }}}' ) );
		$this->media_control( 'bg', 'Background image', 'fg2-europe.jpg' );
		$this->add_control( 'note1_title', array( 'label' => 'Note 1 title', 'type' => Controls_Manager::TEXT, 'default' => 'Supporting homes & businesses across Europe' ) );
		$this->add_control( 'note1_text', array( 'label' => 'Note 1 text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Solutions for private clients and businesses across The Netherlands, the South of France, and Portugal — consistent quality, compliance, and professional standards in every market.' ) );
		$this->add_control( 'note2_title', array( 'label' => 'Note 2 title', 'type' => Controls_Manager::TEXT, 'default' => 'A cleaner, drier, healthier space starts here.' ) );
		$this->add_control( 'note2_text', array( 'label' => 'Note 2 text', 'type' => Controls_Manager::TEXTAREA, 'default' => 'From the first contact: transparent advice and clearly defined solutions for a healthier, cleaner, safer indoor environment.' ) );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="europe" id="europe">
			<img class="europe-bg" src="<?php echo esc_url( $this->media_url( $s, 'bg', 'fg2-europe.jpg' ) ); ?>" alt="European coastline" />
			<div class="shell-wide europe-inner">
				<div class="europe-top">
					<div class="label fx"><?php echo esc_html( $s['label'] ); ?></div>
					<h2 class="fx" style="--d:1"><?php echo esc_html( $s['title'] ); ?></h2>
					<p class="fx" style="--d:2"><?php echo esc_html( $s['text'] ); ?></p>
				</div>
				<div class="europe-aside">
					<div class="places fx" style="--d:3">
						<?php foreach ( (array) $s['places'] as $p ) : ?>
							<span><?php echo esc_html( $p['label'] ); ?></span>
						<?php endforeach; ?>
					</div>
					<div class="europe-notes">
						<article class="fx" style="--d:4">
							<h3><?php echo esc_html( $s['note1_title'] ); ?></h3>
							<p><?php echo esc_html( $s['note1_text'] ); ?></p>
						</article>
						<article class="fx" style="--d:5">
							<h3><?php echo esc_html( $s['note2_title'] ); ?></h3>
							<p><?php echo esc_html( $s['note2_text'] ); ?></p>
						</article>
					</div>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── ASSESS ───────── */
class Widget_Assess extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_assess';
	}
	public function get_title() {
		return 'FG: Assessment';
	}
	public function get_icon() {
		return 'eicon-image-box';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Assessment' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Leak Detection & Moisture Assessment' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Find the cause. Then treat the space.' ) );
		$this->add_control( 'p1', array( 'label' => 'Paragraph 1', 'type' => Controls_Manager::TEXTAREA, 'default' => 'At FreshGuard, we deliver tailored moisture and indoor environmental remediation solutions designed around your specific situation. Every property is different, which is why we begin with a careful intake and assessment to understand the underlying causes of mold, moisture issues, and persistent odors before recommending the most effective treatment approach.' ) );
		$this->add_control( 'p2', array( 'label' => 'Paragraph 2', 'type' => Controls_Manager::TEXTAREA, 'default' => 'Where appropriate, FreshGuard carries out professional on-site inspections using a professional-grade moisture meter and infrared thermal imaging camera. These tools detect hidden moisture, cold bridges and problem areas behind walls, floors and ceilings.' ) );
		$this->add_control( 'p3', array( 'label' => 'Paragraph 3 (HTML ok)', 'type' => Controls_Manager::TEXTAREA, 'default' => 'When leak detection expertise is required, we work in close partnership with <strong>BA-MAH Totaaltechniek</strong>, specialists in non-destructive leak detection, ensuring fast and accurate identification of both visible and hidden leaks without unnecessary damage.' ) );
		$this->media_control( 'image', 'Inspection image', 'fg2-assess.jpg' );
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="assess" id="assess">
			<div class="shell assess-grid">
				<div class="assess-copy">
					<div class="label fx"><?php echo esc_html( $s['label'] ); ?></div>
					<h2 class="fx" style="--d:1"><?php echo esc_html( $s['title'] ); ?></h2>
					<p class="fx" style="--d:2"><?php echo esc_html( $s['p1'] ); ?></p>
					<p class="fx" style="--d:3"><?php echo esc_html( $s['p2'] ); ?></p>
					<p class="fx" style="--d:4"><?php echo wp_kses_post( $s['p3'] ); ?></p>
				</div>
				<div class="assess-media fx" style="--d:2">
					<img src="<?php echo esc_url( $this->media_url( $s, 'image', 'fg2-assess.jpg' ) ); ?>" alt="Thermal camera and moisture meter inspecting a water-stained wall" />
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── PARTNERS ───────── */
class Widget_Partners extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_partners';
	}
	public function get_title() {
		return 'FG: Partners';
	}
	public function get_icon() {
		return 'eicon-person';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Partners' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Our Trusted Partners' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Specialists we work with' ) );
		$rep = new Repeater();
		$rep->add_control( 'title', array( 'label' => 'Name', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'text', array( 'label' => 'Text', 'type' => Controls_Manager::TEXTAREA ) );
		$this->add_control(
			'items',
			array(
				'label'       => 'Partners',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $rep->get_controls(),
				'default'     => array(
					array( 'title' => 'BA-MAH Totaaltechniek', 'text' => 'Non-destructive leak detection for houses, apartments, commercial properties and new-builds — thermography, acoustic detection, smoke testing, endoscopy and UV dye tracing.' ),
					array( 'title' => 'Professional biocidal partners', 'text' => 'Trusted partners for professional mold removal and dry fogging. FreshGuard uses products listed under Article 95 of the ECHA list, compliant with the EU Biocidal Products Regulation.' ),
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
		<section class="partners" id="partners">
			<div class="shell">
				<div class="section-head">
					<div class="label fx"><?php echo esc_html( $s['label'] ); ?></div>
					<h2 class="fx" style="--d:1"><?php echo esc_html( $s['title'] ); ?></h2>
				</div>
				<div class="partner-grid">
					<?php foreach ( (array) $s['items'] as $i => $item ) : ?>
						<article class="partner fx"<?php echo $i ? ' style="--d:' . (int) $i . '"' : ''; ?>>
							<h3><?php echo esc_html( $item['title'] ); ?></h3>
							<p><?php echo esc_html( $item['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── CONTACT ───────── */
class Widget_Contact extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_contact';
	}
	public function get_title() {
		return 'FG: Contact';
	}
	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Contact copy' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Get in touch' ) );
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
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$this->wrap_open();
		?>
		<section class="contact" id="contact">
			<div class="shell contact-grid">
				<div class="contact-copy">
					<div class="label fx"><?php echo esc_html( $s['label'] ); ?></div>
					<h2 class="fx" style="--d:1"><?php echo esc_html( $s['title'] ); ?></h2>
					<p class="lead fx" style="--d:2"><?php echo esc_html( $s['lead'] ); ?></p>
					<div class="contact-meta fx" style="--d:3">
						<a href="tel:<?php echo esc_attr( $s['phone_link'] ); ?>"><?php echo esc_html( $s['phone'] ); ?></a>
						<span><?php echo esc_html( $s['meta2'] ); ?></span>
						<span><?php echo esc_html( $s['meta3'] ); ?></span>
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
							<?php echo esc_html( $s['upload_label'] ); ?>
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
							<span class="fine"><?php echo esc_html( $s['fine'] ); ?></span>
							<button class="btn btn-aqua" type="submit"><?php echo esc_html( $s['submit'] ); ?></button>
						</div>
						<p id="formOk" class="full"><?php echo esc_html( $s['success'] ); ?></p>
					</form>
				</div>
			</div>
		</section>
		<?php
		$this->wrap_close();
	}
}

/* ───────── ARTICLES ───────── */
class Widget_Articles extends Fgn_Base_Widget {
	public function get_name() {
		return 'fgn_articles';
	}
	public function get_title() {
		return 'FG: Articles';
	}
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => 'Articles' ) );
		$this->add_control( 'label', array( 'label' => 'Label', 'type' => Controls_Manager::TEXT, 'default' => 'Recommended for you' ) );
		$this->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT, 'default' => 'Articles about mold & moisture' ) );
		$rep = new Repeater();
		$rep->add_control( 'n', array( 'label' => 'Number', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'title', array( 'label' => 'Title', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'alt', array( 'label' => 'Image alt', 'type' => Controls_Manager::TEXT ) );
		$rep->add_control( 'image', array( 'label' => 'Image', 'type' => Controls_Manager::MEDIA ) );
		$this->add_control(
			'items',
			array(
				'label'       => 'Featured articles',
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $rep->get_controls(),
				'default'     => array(
					array( 'n' => '01', 'title' => 'How Moisture Affects Your Home: A Hidden Threat to Health and Property', 'alt' => 'Water-stained ceiling and wall showing moisture damage in a home', 'image' => array( 'url' => fgn_img( 'fg2-article-moisture.jpg' ) ) ),
					array( 'n' => '02', 'title' => 'Everything You Wanted to Know About Mold, Even If You Were Hesitant to Ask', 'alt' => 'Close-up of household mold growing on a damp interior wall', 'image' => array( 'url' => fgn_img( 'fg2-article-mold.jpg' ) ) ),
					array( 'n' => '03', 'title' => 'The Role of Proper Ventilation in Preventing Mold', 'alt' => 'Window condensation and mold beside a wall ventilation grille', 'image' => array( 'url' => fgn_img( 'fg2-article-vent.jpg' ) ) ),
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
		<section class="articles" id="articles">
			<div class="shell">
				<div class="section-head">
					<div class="label fx"><?php echo esc_html( $s['label'] ); ?></div>
					<h2 class="fx" style="--d:1"><?php echo esc_html( $s['title'] ); ?></h2>
				</div>
				<div class="art-grid">
					<?php
					foreach ( (array) $s['items'] as $i => $item ) :
						$img = ! empty( $item['image']['url'] ) ? $item['image']['url'] : '';
						?>
						<article class="art fx"<?php echo $i ? ' style="--d:' . (int) $i . '"' : ''; ?>>
							<?php if ( $img ) : ?>
								<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( $item['alt'] ); ?>">
							<?php endif; ?>
							<div class="t">
								<div class="n"><?php echo esc_html( $item['n'] ); ?></div>
								<h3><?php echo esc_html( $item['title'] ); ?></h3>
							</div>
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
