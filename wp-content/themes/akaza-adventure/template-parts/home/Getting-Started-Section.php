<?php
/**
 * Homepage — Getting Started section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array(
		'icon'  => akaza_upload_url( '/uploads/2026/08/Discover.svg' ),
		'label' => 'Discover',
		'title' => 'Tell us about your goals',
		'text'  => 'Share your compliance and training needs.',
	),
	array(
		'icon'  => akaza_upload_url( '/uploads/2026/08/Design.svg' ),
		'label' => 'Design',
		'title' => 'Get personalised recommendations',
		'text'  => 'We recommend the right modules and delivery approach.',
	),
	array(
		'icon'  => akaza_upload_url( '/uploads/2026/08/Demo.svg' ),
		'label' => 'Demo',
		'title' => 'See a live demo',
		'text'  => 'Explore the platform and reporting capabilities.',
	),
	array(
		'icon'  => akaza_upload_url( '/uploads/2026/08/Launch.svg' ),
		'label' => 'Launch',
		'title' => 'Launch with ease',
		'text'  => 'Rapid onboarding with guided setup and support.',
	),
);
?>
<section class="sl-home-getting-started-section" aria-labelledby="started-heading">

    <div class="container">

        <div class="sl-home-getting-started-heading">

            <span class="sl-home-sub-heading">
                Getting Started
            </span>

            <h2 id="started-heading">
                <?php
                echo wp_kses(
                    __( 'Getting started is <span>simple</span>', 'akaza-adventure' ),
                    array( 'span' => array() )
                );
                ?>
            </h2>

        </div>

        <div class="row g-4">

            <?php foreach ( $steps as $index => $step ) : ?>
                <?php
				$delay      = $index * 1;
				$z_index    = count( $steps ) - $index;
				$from_class = 0 === $index ? 'sl-home-step-enter--from-left' : 'sl-home-step-enter--from-under';
				?>
                <div class="col-md-6 col-lg-3">
                    <div
                        class="sl-home-step-enter <?php echo esc_attr( $from_class ); ?>"
                        style="--sl-gs-delay: <?php echo esc_attr( (string) $delay ); ?>s; --sl-gs-z: <?php echo esc_attr( (string) $z_index ); ?>;"
                    >
                        <div class="sl-home-step-card">
                            <div class="sl-home-step-icon">
                                <img src="<?php echo esc_url( $step['icon'] ); ?>" alt="" width="32" height="32" loading="lazy" decoding="async">
                            </div>
                            <span class="sl-home-step-label">
                                <?php echo esc_html( $step['label'] ); ?>
                            </span>
                            <h3><?php echo esc_html( $step['title'] ); ?></h3>
                            <p><?php echo esc_html( $step['text'] ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>

</section>
