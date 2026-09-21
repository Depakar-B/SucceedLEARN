<?php
/**
 * Homepage — Contact form section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="contact" class="sl-home-contact-section" aria-labelledby="contact-heading">

    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-6">

                <div class="sl-home-contact-content">

                    <span class="sl-home-sub-heading">
                        Get Your Personalized Demo
                    </span>

                    <h2 id="contact-heading">
                        <?php
                        echo wp_kses(
                            __( 'Need Help or <span>Have a Query?</span>', 'akaza-adventure' ),
                            array( 'span' => array() )
                        );
                        ?>
                    </h2>

                    <p>
                        Tell us a bit about your organization and we'll show you
                        exactly how SucceedLEARN reduces risk, simplifies
                        compliance, and drives measurable behaviour change —
                        for your team.
                    </p>

                    <div class="sl-home-contact-image">
                        <img src="<?php echo esc_url( akaza_upload_url( '2026/08/Outcomes-you-achieve.webp' ) ); ?>"
                             alt="<?php esc_attr_e( 'Team reviewing compliance training outcomes and analytics', 'akaza-adventure' ); ?>"
                             class="img-fluid rounded"
                             width="1200"
                             height="630"
                             loading="lazy"
                             decoding="async">
                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="sl-home-form-wrapper">
                    <?php echo do_shortcode( '[contact_form]' ); ?>
                </div>

            </div>

        </div>

    </div>

</section>
