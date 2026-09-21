<?php
/**
 * Homepage — Final CTA section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-home-cta-section" aria-labelledby="cta-heading">

    <div class="container">

        <div class="sl-home-cta-wrapper">

            <span class="sl-home-sub-heading">
                Final Call to Action
            </span>

            <h2 id="cta-heading">
                <?php
                echo wp_kses(
                    __( 'Ready to build a safer, <span>more compliant workforce?</span>', 'akaza-adventure' ),
                    array( 'span' => array() )
                );
                ?>
            </h2>

            <p>
                Discover how engaging training can reduce risk, simplify compliance,
                and create measurable behaviour change across your organization.
            </p>

            <div class="sl-home-cta-buttons">

                <a href="<?php echo esc_url( akaza_page_url( 'contact-us' ) ); ?>" class="sl-content-btn sl-content-btn-primary" data-cta="footer-demo">
                    <?php esc_html_e( 'Book a Demo', 'akaza-adventure' ); ?>
                </a>

                <a href="mailto:sales@succeedtech.com" class="sl-content-btn sl-content-btn-secondary">
                    <?php esc_html_e( 'Contact Sales', 'akaza-adventure' ); ?>
                </a>

            </div>

            <div class="sl-home-contact-row">

                <div class="sl-home-contact-box">
                    <span class="sl-home-contact-icon" aria-hidden="true">@</span>
                    <span class="sl-home-contact-label"><?php esc_html_e( 'Sales', 'akaza-adventure' ); ?></span>
                    <a href="mailto:sales@succeedtech.com">sales@succeedtech.com</a>
                </div>

                <div class="sl-home-contact-box">
                    <span class="sl-home-contact-icon" aria-hidden="true">@</span>
                    <span class="sl-home-contact-label"><?php esc_html_e( 'General', 'akaza-adventure' ); ?></span>
                    <a href="mailto:info@succeedtech.com">info@succeedtech.com</a>
                </div>

            </div>

        </div>

    </div>

</section>
