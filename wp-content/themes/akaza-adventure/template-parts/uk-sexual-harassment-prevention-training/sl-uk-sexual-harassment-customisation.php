<?php
/**
 * UK Sexual Harassment Prevention — Course Customisation.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$customisation_items = array(
    __( 'Your branding', 'akaza-adventure' ),
    __( 'Relevant policy information', 'akaza-adventure' ),
    __( 'Reporting and escalation routes', 'akaza-adventure' ),
    __( 'HR or employee-support contacts', 'akaza-adventure' ),
    __( 'Leadership messages', 'akaza-adventure' ),
    __( 'Organisation-specific terminology', 'akaza-adventure' ),
);
?>

<section
    id="customisation"
    class="sl-uk-sexual-harassment-customisation"
    aria-labelledby="sl-uk-sexual-harassment-customisation-title"
>
    <div class="container">

        <div class="sl-uk-sexual-harassment-customisation__grid">

            <!-- Left: Content -->
            <div class="sl-uk-sexual-harassment-customisation__content">

                <span class="sl-uk-sexual-harassment-customisation__intro">
                    <?php esc_html_e(
                        "Help employees recognise not only the standard, but your organisation's process.",
                        'akaza-adventure'
                    ); ?>
                </span>

                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'Course Customisation', 'akaza-adventure' ); ?>
                </span>

                <h2 id="sl-uk-sexual-harassment-customisation-title">
                    <?php esc_html_e( 'Make the Course Part of Your', 'akaza-adventure' ); ?>
                    <span><?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?></span>
                </h2>

                <p>
                    <?php esc_html_e(
                        'Training is more useful when employees can connect it with their own workplace.',
                        'akaza-adventure'
                    ); ?>
                </p>

                <p>
                    <?php esc_html_e(
                        'Depending on the selected package and project scope, SucceedLEARN can discuss incorporating:',
                        'akaza-adventure'
                    ); ?>
                </p>

                <ul class="sl-list">
                    <?php foreach ( $customisation_items as $index => $item ) : ?>
                        <li class="sl-list-item">
                            <span class="sl-list-item__label" aria-hidden="true">
                                <?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
                            </span>

                            <span class="sl-list-item__text">
                                <?php echo esc_html( $item ); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="sl-content-actions">
                    <a
                        class="sl-content-btn sl-content-btn-primary"
                        href="#contact"
                    >
                        <?php esc_html_e( 'Discuss Customisation', 'akaza-adventure' ); ?>
                        <span aria-hidden="true">→</span>
                    </a>
                </div>

            </div>

            <!-- Right: Image -->
            <div class="sl-uk-sexual-harassment-customisation__media">
                <div class="sl-uk-sexual-harassment-customisation__image">
                    <div class="sl-uk-sexual-harassment-customisation__image-placeholder">
                        <?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>