<?php
/**
 * S-Phish — Hero Section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section
    id="hero"
    class="sl-s-phish-hero"
    aria-labelledby="sl-s-phish-hero-title"
>
    <div class="container">

        <div class="sl-s-phish-hero__grid">

            <!-- Left: Hero Content -->
            <div class="sl-s-phish-hero__content">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'S-Phish', 'akaza-adventure' ); ?>
                </span>

                <h1 id="sl-s-phish-hero-title">
                    <?php esc_html_e( 'Phishing Simulation', 'akaza-adventure' ); ?>
                    <span><?php esc_html_e( 'Tool', 'akaza-adventure' ); ?></span>
                </h1>

                <h2 class="sl-hero-h2">
                    <?php esc_html_e(
                        'Enterprise Phishing Simulation Tool for Building a Stronger Human Firewall',
                        'akaza-adventure'
                    ); ?>
                </h2>

                <p>
                    <?php esc_html_e(
                        'Email continues to be one of the most exploited attack vectors, with phishing remaining the leading cause of credential theft, ransomware, and business email compromise. While technical security controls block thousands of malicious emails every day, it only takes one successful click to create a costly security incident.',
                        'akaza-adventure'
                    ); ?>
                </p>

                <p>
                    <?php esc_html_e(
                        "S-Phish is SucceedLEARN's enterprise phishing simulation platform, designed to transform phishing awareness from theoretical knowledge into practical experience through realistic simulations, behaviour-based learning interventions and actionable analytics.",
                        'akaza-adventure'
                    ); ?>
                </p>

                <div class="sl-s-phish-hero__message" aria-label="<?php esc_attr_e( 'Test, Learn, Strengthen', 'akaza-adventure' ); ?>">
                    <span><?php esc_html_e( 'Test', 'akaza-adventure' ); ?></span>
                    <span class="sl-s-phish-hero__separator" aria-hidden="true">|</span>
                    <span><?php esc_html_e( 'Learn', 'akaza-adventure' ); ?></span>
                    <span class="sl-s-phish-hero__separator" aria-hidden="true">|</span>
                    <span><?php esc_html_e( 'Strengthen', 'akaza-adventure' ); ?></span>
                </div>

                <div class="sl-hero-actions">

                    <a
                        class="sl-hero-btn sl-hero-btn-primary"
                        href="#contact"
                    >
                        <?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
                        <span aria-hidden="true">→</span>
                    </a>

                    <a
                        class="sl-hero-btn sl-hero-btn-secondary"
                        href="#video"
                    >
                        <?php esc_html_e( 'Watch Video', 'akaza-adventure' ); ?>
                        <span aria-hidden="true">→</span>
                    </a>

                </div>

            </div>

            <!-- Right: Hero Image -->
            <div class="sl-s-phish-hero__media">

                <div class="sl-s-phish-hero__image">

                    <div class="sl-s-phish-hero__image-placeholder">
                        <?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>