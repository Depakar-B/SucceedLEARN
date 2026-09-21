<?php
/**
 * Cybersecurity Awareness Campaign Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$csa_training_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Comprehensive-security-awareness-training-2.webp';
$csa_phishing_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Realistic-phishing-simulations-1.webp';

$csa_training_local = WP_CONTENT_DIR . '/uploads/2026/09/Comprehensive-security-awareness-training-2.webp';
$csa_phishing_local = WP_CONTENT_DIR . '/uploads/2026/09/Realistic-phishing-simulations-1.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $csa_training_local ) ) {
	$csa_training_image = akaza_upload_url( '2026/09/Comprehensive-security-awareness-training-2.webp' );
}

if ( function_exists( 'akaza_upload_url' ) && file_exists( $csa_phishing_local ) ) {
	$csa_phishing_image = akaza_upload_url( '2026/09/Realistic-phishing-simulations-1.webp' );
}
?>

<section
    class="sl-cybersecurity-campaign"
    id="campaign"
    aria-labelledby="sl-cybersecurity-campaign-title"
>
    <div class="container">

        <!-- Section Intro -->
        <div class="sl-cybersecurity-campaign__heading">

            <div class="sl-cybersecurity-campaign__heading-content">
                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'One Complete Campaign', 'akaza-adventure' ); ?>
                </span>

                <h2 id="sl-cybersecurity-campaign-title">
                    <?php
                    echo wp_kses(
                        __( 'From awareness to <span>measurable action</span>', 'akaza-adventure' ),
                        array( 'span' => array() )
                    );
                    ?>
                </h2>
            </div>

            <p class="sl-cybersecurity-campaign__intro-text">
                <?php
                esc_html_e(
                    'Learning, testing and active email reporting — delivered as one coordinated Cybersecurity Awareness Month campaign.',
                    'akaza-adventure'
                );
                ?>
            </p>

        </div>


        <!-- Campaign Row 01 -->
        <div class="sl-cybersecurity-campaign__row">

            <!-- Content -->
            <div class="sl-cybersecurity-campaign__content">

                <span class="sl-cybersecurity-campaign__number">
                    <?php esc_html_e( '01', 'akaza-adventure' ); ?>
                </span>

                <h3>
                    <?php esc_html_e( 'Comprehensive security awareness training', 'akaza-adventure' ); ?>
                </h3>

                <p>
                    <?php
                    esc_html_e(
                        'Equip employees to identify common cyber risks, verify unusual requests, protect business information and make safer decisions in everyday work.',
                        'akaza-adventure'
                    );
                    ?>
                </p>

                <div class="sl-cybersecurity-campaign__checklist">
					<?php
					$training_topics = array(
						__( 'Account Security', 'akaza-adventure' ),
						__( 'AI-based Attack', 'akaza-adventure' ),
						__( 'Data Classification', 'akaza-adventure' ),
						__( 'Malware', 'akaza-adventure' ),
						__( 'Physical Security', 'akaza-adventure' ),
						__( 'Remote Work Security', 'akaza-adventure' ),
						__( 'Social Engineering', 'akaza-adventure' ),
						__( 'Vendor and Third-Party Risk Management', 'akaza-adventure' ),
					);
					foreach ( $training_topics as $topic ) :
						?>
                    <div class="sl-cybersecurity-campaign__check-item">
                        <span class="sl-cybersecurity-campaign__check-icon" aria-hidden="true">
                            <svg viewBox="0 0 16 16" role="img">
                                <path d="M3 8.5 6.2 12 13 4.5" />
                            </svg>
                        </span>
                        <span><?php echo esc_html( $topic ); ?></span>
                    </div>
					<?php endforeach; ?>
                </div>

            </div>


            <!-- Image -->
            <div class="sl-cybersecurity-campaign__media">
                <div class="sl-cybersecurity-campaign__image">
                    <img
                        src="<?php echo esc_url( $csa_training_image ); ?>"
                        alt="<?php esc_attr_e( 'Employee correctly identifying and avoiding a phishing attempt', 'akaza-adventure' ); ?>"
                        width="1254"
                        height="1254"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>

        </div>


        <!-- Campaign Row 02 -->
        <div class="sl-cybersecurity-campaign__row sl-cybersecurity-campaign__row--reverse">

            <!-- Image -->
            <div class="sl-cybersecurity-campaign__media">
                <div class="sl-cybersecurity-campaign__image">
                    <img
                        src="<?php echo esc_url( $csa_phishing_image ); ?>"
                        alt="<?php esc_attr_e( 'Create a phishing simulation campaign with multiple attack types', 'akaza-adventure' ); ?>"
                        width="1254"
                        height="1254"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>


            <!-- Content -->
            <div class="sl-cybersecurity-campaign__content">

                <span class="sl-cybersecurity-campaign__number">
                    <?php esc_html_e( '02', 'akaza-adventure' ); ?>
                </span>

                <h3>
                    <?php esc_html_e( 'Realistic phishing simulations', 'akaza-adventure' ); ?>
                </h3>

                <p>
                    <?php
                    esc_html_e(
                        'Test how employees respond to realistic but controlled phishing scenarios. Each simulation is approved in advance, safely delivered and measured without collecting genuine passwords.',
                        'akaza-adventure'
                    );
                    ?>
                </p>


                <!-- Phishing Checklist -->
                <div class="sl-cybersecurity-campaign__checklist">

                    <?php
                    $phishing_topics = array(
                        'Link-click phishing',
                        'Credential harvesting',
                        'Malicious attachments',
                        'QR-code phishing',
                        'Reply-to-email attacks',
                        'Business email compromise',
                        'Spear-phishing scenarios',
                        'Executive impersonation',
                    );
                    ?>

                    <?php foreach ( $phishing_topics as $topic ) : ?>
                        <div class="sl-cybersecurity-campaign__check-item">
                            <span class="sl-cybersecurity-campaign__check-icon" aria-hidden="true">
                                <svg viewBox="0 0 16 16" role="img">
                                    <circle cx="8" cy="8" r="5.5" />
                                    <circle cx="8" cy="8" r="1.5" />
                                </svg>
                            </span>

                            <span>
                                <?php echo esc_html( $topic ); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>
</section>