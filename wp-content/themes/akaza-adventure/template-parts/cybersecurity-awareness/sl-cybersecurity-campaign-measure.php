<?php
/**
 * Cybersecurity Awareness Month
 * Measure What Matters Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$csa_measure_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/09/campaign-insights-team-review.webp' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/campaign-insights-team-review.webp';
?>

<section
    class="sl-cybersecurity-campaign-measure"
    aria-labelledby="sl-cybersecurity-campaign-measure-title"
>
    <div class="container">

        <div class="sl-cybersecurity-campaign-measure__content">

            <!-- Left: heading + metrics -->
            <div class="sl-cybersecurity-campaign-measure__details">

                <div class="sl-cybersecurity-campaign-measure__heading">

                    <span class="sl-home-sub-heading">
                        <?php esc_html_e( 'Measure What Matters', 'akaza-adventure' ); ?>
                    </span>

                    <h2 id="sl-cybersecurity-campaign-measure-title">
                        <?php
                        echo wp_kses(
                            __( 'Understand more than <span>who completed a course</span>', 'akaza-adventure' ),
                            array( 'span' => array() )
                        );
                        ?>
                    </h2>

                    <p>
                        <?php
                        esc_html_e(
                            'See how employees respond to realistic scenarios, where risks remain and how results change across the campaign.',
                            'akaza-adventure'
                        );
                        ?>
                    </p>

                </div>

                <ul class="sl-cybersecurity-campaign-measure__metrics">

                    <li class="sl-cybersecurity-campaign-measure__metric">
                        <span class="sl-cybersecurity-campaign-measure__icon" aria-hidden="true">
                            <svg viewBox="0 0 16 16" role="img">
                                <path d="M3 8.5 6.2 12 13 4.5" />
                            </svg>
                        </span>

                        <span class="sl-cybersecurity-campaign-measure__label">
                            <?php esc_html_e( 'Training completion rate', 'akaza-adventure' ); ?>
                        </span>
                    </li>

                    <li class="sl-cybersecurity-campaign-measure__metric">
                        <span class="sl-cybersecurity-campaign-measure__icon" aria-hidden="true">
                            <svg viewBox="0 0 16 16" role="img">
                                <path d="M3 8.5 6.2 12 13 4.5" />
                            </svg>
                        </span>

                        <span class="sl-cybersecurity-campaign-measure__label">
                            <?php esc_html_e( 'Assessment performance', 'akaza-adventure' ); ?>
                        </span>
                    </li>

                    <li class="sl-cybersecurity-campaign-measure__metric">
                        <span class="sl-cybersecurity-campaign-measure__icon" aria-hidden="true">
                            <svg viewBox="0 0 16 16" role="img">
                                <path d="M3 8.5 6.2 12 13 4.5" />
                            </svg>
                        </span>

                        <span class="sl-cybersecurity-campaign-measure__label">
                            <?php esc_html_e( 'Simulation interaction rate', 'akaza-adventure' ); ?>
                        </span>
                    </li>

                    <li class="sl-cybersecurity-campaign-measure__metric">
                        <span class="sl-cybersecurity-campaign-measure__icon" aria-hidden="true">
                            <svg viewBox="0 0 16 16" role="img">
                                <path d="M3 8.5 6.2 12 13 4.5" />
                            </svg>
                        </span>

                        <span class="sl-cybersecurity-campaign-measure__label">
                            <?php esc_html_e( 'Employee reporting rate', 'akaza-adventure' ); ?>
                        </span>
                    </li>

                    <li class="sl-cybersecurity-campaign-measure__metric">
                        <span class="sl-cybersecurity-campaign-measure__icon" aria-hidden="true">
                            <svg viewBox="0 0 16 16" role="img">
                                <path d="M3 8.5 6.2 12 13 4.5" />
                            </svg>
                        </span>

                        <span class="sl-cybersecurity-campaign-measure__label">
                            <?php esc_html_e( "Department-level patterns / org's resilience score", 'akaza-adventure' ); ?>
                        </span>
                    </li>

                    <li class="sl-cybersecurity-campaign-measure__metric">
                        <span class="sl-cybersecurity-campaign-measure__icon" aria-hidden="true">
                            <svg viewBox="0 0 16 16" role="img">
                                <path d="M3 8.5 6.2 12 13 4.5" />
                            </svg>
                        </span>

                        <span class="sl-cybersecurity-campaign-measure__label">
                            <?php esc_html_e( 'Baseline vs follow-up performance', 'akaza-adventure' ); ?>
                        </span>
                    </li>

                </ul>

            </div>


            <!-- Right image -->
            <div class="sl-cybersecurity-campaign-measure__visual">
                <div class="sl-cybersecurity-campaign-measure__image">
                    <img
                        src="<?php echo esc_url( $csa_measure_image ); ?>"
                        alt="<?php esc_attr_e( 'Team reviewing campaign insight dashboards together', 'akaza-adventure' ); ?>"
                        width="1600"
                        height="1067"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>

        </div>

    </div>
</section>