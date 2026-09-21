<?php
/**
 * Cybersecurity Awareness Month
 * Campaign Journey Section
 *
 * @package Akaza_Adventure
 */
?>

<section
    class="sl-cybersecurity-campaign-journey"
    aria-labelledby="sl-cybersecurity-campaign-journey-title"
>
    <div class="container">

        <div class="sl-cybersecurity-campaign-journey__heading">

            <span class="sl-home-sub-heading">
                <?php esc_html_e( 'The Campaign Journey', 'akaza-adventure' ); ?>
            </span>

            <h2 id="sl-cybersecurity-campaign-journey-title">
                <?php
                echo wp_kses(
                    __( 'A practical <span>four-stage approach</span>', 'akaza-adventure' ),
                    array( 'span' => array() )
                );
                ?>
            </h2>

            <p>
                <?php
                esc_html_e(
                    'Move beyond one-off training and build a clear picture of employee readiness.',
                    'akaza-adventure'
                );
                ?>
            </p>

        </div>

        <div class="sl-cybersecurity-campaign-journey__stages">

            <!-- Stage 01 -->
            <article class="sl-cybersecurity-campaign-journey__stage">

                <span class="sl-cybersecurity-campaign-journey__number">
                    <?php esc_html_e( '01', 'akaza-adventure' ); ?>
                </span>

                <h3>
                    <?php esc_html_e( 'Identify', 'akaza-adventure' ); ?>
                </h3>

                <p>
                    <?php
                    esc_html_e(
                        'Learn how urgency, authority and fear can manipulate decisions.',
                        'akaza-adventure'
                    );
                    ?>
                </p>

            </article>

            <!-- Stage 02 -->
            <article class="sl-cybersecurity-campaign-journey__stage">

                <span class="sl-cybersecurity-campaign-journey__number">
                    <?php esc_html_e( '02', 'akaza-adventure' ); ?>
                </span>

                <h3>
                    <?php esc_html_e( 'Resist', 'akaza-adventure' ); ?>
                </h3>

                <p>
                    <?php
                    esc_html_e(
                        'Pause, verify and follow secure processes before taking action.',
                        'akaza-adventure'
                    );
                    ?>
                </p>

            </article>

            <!-- Stage 03 -->
            <article class="sl-cybersecurity-campaign-journey__stage">

                <span class="sl-cybersecurity-campaign-journey__number">
                    <?php esc_html_e( '03', 'akaza-adventure' ); ?>
                </span>

                <h3>
                    <?php esc_html_e( 'Report', 'akaza-adventure' ); ?>
                </h3>

                <p>
                    <?php
                    esc_html_e(
                        'Use PhishCue to report messages and build vigilance.',
                        'akaza-adventure'
                    );
                    ?>
                </p>

            </article>

            <!-- Stage 04 -->
            <article class="sl-cybersecurity-campaign-journey__stage">

                <span class="sl-cybersecurity-campaign-journey__number">
                    <?php esc_html_e( '04', 'akaza-adventure' ); ?>
                </span>

                <h3>
                    <?php esc_html_e( 'Improve', 'akaza-adventure' ); ?>
                </h3>

                <p>
                    <?php
                    esc_html_e(
                        'Reinforce safer actions through targeted learning and retesting.',
                        'akaza-adventure'
                    );
                    ?>
                </p>

            </article>

        </div>

    </div>
</section>