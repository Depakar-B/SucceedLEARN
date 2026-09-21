<?php
/**
 * Homepage — Featured Product (SBCS) section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pills = array(
	'Awareness Training',
	'Phishing Simulations',
	'Microlearning',
	'Gamified Learning',
	'Visual Awareness Campaigns',
	'Assessments',
	'Analytics & Reporting',
	'Enterprise Integrations',
);

$metrics = array(
	array(
		'title'     => 'Phishing Simulations Sent',
		'value'     => '12,480',
		'cols'      => 'col-md-6',
		'show_arrow' => false,
	),
	array(
		'title'     => 'Reduction in Phishing Click-Through Rate',
		'value'     => '68%',
		'cols'      => 'col-md-6',
		'show_arrow' => true,
	),
	array(
		'title'     => 'Modules Completed',
		'value'     => '96%',
		'cols'      => 'col-md-6',
		'show_arrow' => false,
	),
	array(
		'title'     => 'Culture Score',
		'value'     => 'A+',
		'cols'      => 'col-md-6',
		'show_arrow' => false,
	),
	array(
		'title'     => 'Audit Readiness',
		'value'     => 'READY',
		'cols'      => 'col-md-12',
		'show_arrow' => false,
	),
);
?>
<section class="sl-home-feature-product-section" aria-labelledby="suite-heading">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="sl-home-feature-product-content">

                    <span class="sl-home-sub-heading">
                        Featured Product
                    </span>

                    <h2 id="suite-heading">
                        <?php
                        echo wp_kses(
                            __( 'Security Behaviour &amp; <span>Culture Suite (SBCS)</span>', 'akaza-adventure' ),
                            array( 'span' => array() )
                        );
                        ?>
                    </h2>

                    <h3>
                        TRAIN. TEST. MEASURE. IMPROVE.
                    </h3>

                    <p>
                        SucceedLEARN SBCS is a unified platform designed to help
                        organizations manage human cybersecurity risk at scale.
                        Purpose-built to transform awareness into measurable
                        behaviour change.
                    </p>

                    <div class="row g-3 mt-3">
                        <?php foreach ( $pills as $pill ) : ?>
                            <div class="col-md-6">
                                <div class="sl-home-feature-pill">
                                    <span class="sl-home-feature-pill__icon" aria-hidden="true">✓</span>
                                    <span class="sl-home-feature-pill__text"><?php echo esc_html( $pill ); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <a href="<?php echo esc_url( akaza_page_url( 'contact-us' ) ); ?>" class="sl-content-btn sl-content-btn-primary mt-4">
                        <?php esc_html_e( 'See SBCS in Action', 'akaza-adventure' ); ?>
                    </a>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="row g-3">
                    <?php foreach ( $metrics as $metric ) : ?>
                        <div class="<?php echo esc_attr( $metric['cols'] ); ?>">
                            <div class="sl-home-metric-card">
                                <h4><?php echo esc_html( $metric['title'] ); ?></h4>
                                <span class="sl-home-metric-card__value">
                                    <?php if ( ! empty( $metric['show_arrow'] ) ) : ?>
                                        <span class="sl-home-metric-card__arrow" aria-hidden="true">↓</span>
                                    <?php endif; ?>
                                    <?php echo esc_html( $metric['value'] ); ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

    </div>

</section>
