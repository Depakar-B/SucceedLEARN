<?php
/**
 * Cybersecurity Awareness — PhishCue Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phishcue_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/09/phishcue-reporting-workflow.webp' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/phishcue-reporting-workflow.webp';
?>

<section
    class="sl-cyber-awareness-phishcue"
    id="phishcue"
    aria-labelledby="sl-cyber-awareness-phishcue-title"
>
    <div class="container">

        <div class="sl-cyber-awareness-phishcue__grid">

            <!-- Content -->
            <div class="sl-cyber-awareness-phishcue__content">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'PhishCue (Available only for Microsoft Office Customers) ', 'akaza-adventure' ); ?>
                </span>


                <div class="sl-cyber-awareness-phishcue__heading">

                    <h2 id="sl-cyber-awareness-phishcue-title">
                        <?php
                        echo wp_kses(
                            __( 'When an employee spots a suspicious email, <span>what happens next?</span>', 'akaza-adventure' ),
                            array( 'span' => array() )
                        );
                        ?>
                    </h2>

                    <p>PhishCue enables employees to report suspicious emails using Outlook’s default Report button. It automatically routes reported emails, submits relevant reports to Microsoft, provides detailed analysis for the IT team, and converts confirmed phishing emails into simulation templates for future employee awareness campaigns.
                    </p>

                </div>


                <!-- Feature checklist -->
                <ul class="sl-cyber-awareness-phishcue__features">

                    <li class="sl-cyber-awareness-phishcue__feature">
                        <span
                            class="sl-cyber-awareness-phishcue__check"
                            aria-hidden="true"
                        >
                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 12.5L9.2 16.5L19 6.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </span>

                        <span>Simple Outlook reporting workflow</span>
                    </li>


                    <li class="sl-cyber-awareness-phishcue__feature">
                        <span
                            class="sl-cyber-awareness-phishcue__check"
                            aria-hidden="true"
                        >
                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 12.5L9.2 16.5L19 6.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </span>

                        <span>Central collection of reported emails</span>
                    </li>


                    <li class="sl-cyber-awareness-phishcue__feature">
                        <span
                            class="sl-cyber-awareness-phishcue__check"
                            aria-hidden="true"
                        >
                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 12.5L9.2 16.5L19 6.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </span>

                        <span>Header, link and attachment analysis</span>
                    </li>


                    <li class="sl-cyber-awareness-phishcue__feature">
                        <span
                            class="sl-cyber-awareness-phishcue__check"
                            aria-hidden="true"
                        >
                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 12.5L9.2 16.5L19 6.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </span>

                        <span>Message classification and tracking</span>
                    </li>


                    <li class="sl-cyber-awareness-phishcue__feature">
                        <span
                            class="sl-cyber-awareness-phishcue__check"
                            aria-hidden="true"
                        >
                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 12.5L9.2 16.5L19 6.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </span>

                        <span>Automated employee confirmation</span>
                    </li>


                    <li class="sl-cyber-awareness-phishcue__feature">
                        <span
                            class="sl-cyber-awareness-phishcue__check"
                            aria-hidden="true"
                        >
                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 12.5L9.2 16.5L19 6.5"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </span>

                        <span>Security-team review dashboard</span>
                    </li>

                </ul>


                <!-- CTA -->
                <a
                    class="sl-content-btn sl-content-btn-primary"
                    href="#contact"
                >
                    <span>Explore PhishCue in a demo</span>

                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            d="M5 12H19"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                        <path
                            d="M13 6L19 12L13 18"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </a>

            </div>


            <!-- Image / Visual -->
            <div class="sl-cyber-awareness-phishcue__visual">
                <div class="sl-cyber-awareness-phishcue__image">
                    <img
                        src="<?php echo esc_url( $phishcue_image ); ?>"
                        alt="<?php esc_attr_e( 'PhishCue reporting workflow from suspicious email to resolution', 'akaza-adventure' ); ?>"
                        width="1400"
                        height="700"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>

        </div>

    </div>
</section>