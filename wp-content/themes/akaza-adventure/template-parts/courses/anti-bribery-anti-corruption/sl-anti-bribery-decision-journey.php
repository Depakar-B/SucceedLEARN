<?php
/**
 * Anti-Bribery and Anti-Corruption
 * Decision Journey section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section
    id="abac-decision-journey"
    class="sl-abac-decision-journey"
    aria-labelledby="sl-abac-decision-journey-title"
>
    <div class="container">

        <div class="sl-abac-decision-journey__intro">

            <span class="sl-home-sub-heading">
                <?php esc_html_e( 'Course Journey', 'akaza-adventure' ); ?>
            </span>

            <h2 id="sl-abac-decision-journey-title">
                <?php esc_html_e(
                    'How does the ABAC course build',
                    'akaza-adventure'
                ); ?>
                <span>
                    <?php esc_html_e(
                        'confident employee decisions?',
                        'akaza-adventure'
                    ); ?>
                </span>
            </h2>

        </div>


        <div class="sl-abac-decision-journey__timeline">

            <div class="sl-abac-decision-journey__line" aria-hidden="true"></div>


            <article class="sl-abac-decision-journey__step">
                <div class="sl-abac-decision-journey__number">1</div>

                <div class="sl-abac-decision-journey__content">
                    <h3><?php esc_html_e( 'Understand', 'akaza-adventure' ); ?></h3>

                    <p>
                        <?php esc_html_e(
                            'Corporate bribery, corruption and their impact.',
                            'akaza-adventure'
                        ); ?>
                    </p>
                </div>
            </article>


            <article class="sl-abac-decision-journey__step">
                <div class="sl-abac-decision-journey__number">2</div>

                <div class="sl-abac-decision-journey__content">
                    <h3><?php esc_html_e( 'Explore', 'akaza-adventure' ); ?></h3>

                    <p>
                        <?php esc_html_e(
                            'Relevant laws and organisational policy.',
                            'akaza-adventure'
                        ); ?>
                    </p>
                </div>
            </article>


            <article class="sl-abac-decision-journey__step">
                <div class="sl-abac-decision-journey__number">3</div>

                <div class="sl-abac-decision-journey__content">
                    <h3><?php esc_html_e( 'Decide', 'akaza-adventure' ); ?></h3>

                    <p>
                        <?php esc_html_e(
                            'Gifts, hospitality and third-party scenarios.',
                            'akaza-adventure'
                        ); ?>
                    </p>
                </div>
            </article>


            <article class="sl-abac-decision-journey__step">
                <div class="sl-abac-decision-journey__number">4</div>

                <div class="sl-abac-decision-journey__content">
                    <h3><?php esc_html_e( 'Respond', 'akaza-adventure' ); ?></h3>

                    <p>
                        <?php esc_html_e(
                            'Refusal, escalation and reporting actions.',
                            'akaza-adventure'
                        ); ?>
                    </p>
                </div>
            </article>


            <article class="sl-abac-decision-journey__step">
                <div class="sl-abac-decision-journey__number">5</div>

                <div class="sl-abac-decision-journey__content">
                    <h3><?php esc_html_e( 'Demonstrate', 'akaza-adventure' ); ?></h3>

                    <p>
                        <?php esc_html_e(
                            'Final assessment and CPD certificate.',
                            'akaza-adventure'
                        ); ?>
                    </p>
                </div>
            </article>

        </div>


        <div class="sl-abac-decision-journey__media">

            <div class="sl-abac-decision-journey__media-item">
                <div
                    class="sl-abac-decision-journey__placeholder"
                    role="img"
                    aria-label="<?php esc_attr_e(
                        'ABAC assessment journey image placeholder',
                        'akaza-adventure'
                    ); ?>"
                >
                    <span>
                        <?php esc_html_e(
                            'Image placeholder',
                            'akaza-adventure'
                        ); ?>
                    </span>
                </div>
            </div>


            <div class="sl-abac-decision-journey__media-item">
                <div
                    class="sl-abac-decision-journey__placeholder"
                    role="img"
                    aria-label="<?php esc_attr_e(
                        'ABAC certificate or learner dashboard image placeholder',
                        'akaza-adventure'
                    ); ?>"
                >
                    <span>
                        <?php esc_html_e(
                            'Image placeholder',
                            'akaza-adventure'
                        ); ?>
                    </span>
                </div>
            </div>

        </div>

    </div>
</section>