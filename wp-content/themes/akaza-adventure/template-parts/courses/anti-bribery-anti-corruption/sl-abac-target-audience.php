<?php
/**
 * ABAC Target Audience section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section
    id="abac-target-audience"
    class="sl-abac-target-audience"
    aria-labelledby="sl-abac-target-audience-title"
>
    <div class="container">

        <div class="sl-abac-target-audience__layout">

            <!-- Left Content -->
            <div class="sl-abac-target-audience__intro">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e(
                        'Target Audience',
                        'akaza-adventure'
                    ); ?>
                </span>

                <h2 id="sl-abac-target-audience-title">
                    <?php esc_html_e(
                        'Who should take',
                        'akaza-adventure'
                    ); ?>
                    <span>
                        <?php esc_html_e(
                            'Anti-Bribery and Anti-Corruption training?',
                            'akaza-adventure'
                        ); ?>
                    </span>
                </h2>

                <p>
                    <?php esc_html_e(
                        'The course is suitable for employees, managers and relevant contractors, with particular value for people who interact with suppliers, intermediaries, clients or public officials, approve expenses or influence commercial decisions.',
                        'akaza-adventure'
                    ); ?>
                </p>

            </div>


            <!-- Right Audience List -->
            <div class="sl-abac-target-audience__list">

                <div class="sl-abac-target-audience__item">
                    <span>01</span>
                    <h3><?php esc_html_e( 'Procurement', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>02</span>
                    <h3><?php esc_html_e( 'Sales', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>03</span>
                    <h3><?php esc_html_e( 'Finance', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>04</span>
                    <h3><?php esc_html_e( 'Legal', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>05</span>
                    <h3><?php esc_html_e( 'Compliance', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>06</span>
                    <h3><?php esc_html_e( 'Audit', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>07</span>
                    <h3><?php esc_html_e( 'Business development', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>08</span>
                    <h3><?php esc_html_e( 'Vendor management', 'akaza-adventure' ); ?></h3>
                </div>

                <div class="sl-abac-target-audience__item">
                    <span>09</span>
                    <h3><?php esc_html_e( 'International operations', 'akaza-adventure' ); ?></h3>
                </div>

            </div>

        </div>

    </div>
</section>