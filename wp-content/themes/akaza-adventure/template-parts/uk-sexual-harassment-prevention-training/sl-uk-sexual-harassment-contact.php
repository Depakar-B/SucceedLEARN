<?php
/**
 * UK Sexual Harassment Prevention — Contact / Demo.
 *
 * Uses the global `.sl-contact` layout and styling.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$whatsapp_url = 'https://wa.me/916362021778';
$phone_label  = '+91 63620 21778';

$form_title = __( 'Request a Demo', 'akaza-adventure' );

$form_shortcode = sprintf(
    '[contact_form form_variant="course" title="%s"]',
    esc_attr( $form_title )
);
?>

<section
    id="contact"
    class="sl-contact sl-contact--on-soft sl-uk-sexual-harassment-contact"
    aria-labelledby="sl-uk-sexual-harassment-contact-title"
>
    <div class="container">

        <div class="sl-contact__grid">

            <!-- Left: Contact Content -->
            <div class="sl-contact__content">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'Set the standard. Strengthen awareness. Support prevention.', 'akaza-adventure' ); ?>
                </span>

                <h2 id="sl-uk-sexual-harassment-contact-title">
                    <?php esc_html_e(
                        'Make Prevention Part of How Your Workplace',
                        'akaza-adventure'
                    ); ?>
                    <span>
                        <?php esc_html_e( 'Works', 'akaza-adventure' ); ?>
                    </span>
                </h2>

                <div class="sl-contact__copy">
                    <p>
                        <?php esc_html_e(
                            'Employees should not have to wait for a serious incident before understanding the standard expected of them.',
                            'akaza-adventure'
                        ); ?>
                    </p>

                    <p>
                        <?php esc_html_e(
                            'Give your workforce clear, relevant learning that supports better judgement and a more respectful working environment.',
                            'akaza-adventure'
                        ); ?>
                    </p>
                </div>

                <div class="sl-contact__actions">

                    <a
                        class="sl-contact-btn sl-contact-btn--email"
                        href="mailto:info@succeedtech.com"
                    >
                        <span class="sl-contact-btn__stack">
                            <span class="sl-contact-btn__label">
                                <?php esc_html_e( 'Email us', 'akaza-adventure' ); ?>
                            </span>

                            <span class="sl-contact-btn__value">
                                info@succeedtech.com
                            </span>
                        </span>
                    </a>

                    <a
                        class="sl-contact-btn sl-contact-btn--whatsapp"
                        href="<?php echo esc_url( $whatsapp_url ); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="<?php echo esc_attr(
                            sprintf(
                                __( 'Chat on WhatsApp at %s', 'akaza-adventure' ),
                                $phone_label
                            )
                        ); ?>"
                    >
                        <span
                            class="sl-contact-btn__icon"
                            aria-hidden="true"
                        >
                            <!-- Global WhatsApp SVG -->
                            <svg
                                viewBox="0 0 24 24"
                                width="22"
                                height="22"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path d="M20.52 3.48A11.78 11.78 0 0 0 12.14 0C5.63 0 .34 5.29.34 11.8c0 2.08.54 4.11 1.57 5.9L.24 24l6.44-1.69a11.76 11.76 0 0 0 5.46 1.31h.01c6.5 0 11.79-5.29 11.79-11.8 0-3.15-1.23-6.11-3.42-8.34ZM12.15 21.6h-.01a9.78 9.78 0 0 1-4.99-1.36l-.36-.21-3.82 1 1.02-3.72-.24-.38a9.78 9.78 0 0 1-1.5-5.13C2.25 6.4 6.69 1.96 12.15 1.96c2.65 0 5.14 1.03 7.02 2.92a9.87 9.87 0 0 1 2.9 7.03c0 5.46-4.44 9.89-9.92 9.89Zm5.42-7.4c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.28-.47-2.44-1.5-.9-.8-1.51-1.78-1.69-2.08-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.5s1.07 2.9 1.22 3.1c.15.2 2.1 3.2 5.1 4.49.71.31 1.27.49 1.7.63.71.23 1.35.2 1.86.12.57-.08 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"/>
                            </svg>
                        </span>

                        <span class="sl-contact-btn__stack">
                            <span class="sl-contact-btn__label">
                                <?php esc_html_e( 'WhatsApp us', 'akaza-adventure' ); ?>
                            </span>

                            <span class="sl-contact-btn__value">
                                <?php echo esc_html( $phone_label ); ?>
                            </span>
                        </span>
                    </a>

                </div>

            </div>

            <!-- Right: Form -->
            <div class="sl-contact__form-panel">

                <div class="sl-home-form-wrapper sl-home-form-wrapper--slim">

                    <?php
                    if ( shortcode_exists( 'contact_form' ) ) {

                        echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                    } elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {

                        echo do_shortcode(
                            sprintf(
                                '[succeedlearn_course_form title="%s"]',
                                esc_attr( $form_title )
                            )
                        ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    }
                    ?>

                </div>

            </div>

        </div>

    </div>
</section>