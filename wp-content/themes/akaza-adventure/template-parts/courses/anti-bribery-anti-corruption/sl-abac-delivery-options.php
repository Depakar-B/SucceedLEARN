<?php
/**
 * ABAC Delivery Options section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section
    id="abac-delivery-options"
    class="sl-abac-delivery-options"
    aria-labelledby="sl-abac-delivery-options-title"
>
    <div class="container">

        <div class="sl-abac-delivery-options__layout">

            <!-- Intro -->
            <div class="sl-abac-delivery-options__intro">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e(
                        'Delivery Options',
                        'akaza-adventure'
                    ); ?>
                </span>

                <h2 id="sl-abac-delivery-options-title">
                    <?php esc_html_e(
                        'How can organisations deliver',
                        'akaza-adventure'
                    ); ?>
                    <span>
                        <?php esc_html_e(
                            'ABAC eLearning?',
                            'akaza-adventure'
                        ); ?>
                    </span>
                </h2>

                <p>
                    <?php esc_html_e(
                        'Use the SucceedLEARN platform or add the course to your existing compatible learning environment. Both routes support structured completion and reporting.',
                        'akaza-adventure'
                    ); ?>
                </p>

            </div>


            <!-- Delivery Options -->
            <div class="sl-abac-delivery-options__list">

                <!-- SaaS -->
                <article class="sl-abac-delivery-options__card">

                    <div class="sl-abac-delivery-options__mark">
                        S
                    </div>

                    <div class="sl-abac-delivery-options__card-content">

                        <h3>
                            <?php esc_html_e(
                                'SaaS delivery',
                                'akaza-adventure'
                            ); ?>
                        </h3>

                        <p>
                            <?php esc_html_e(
                                'Assign and manage training through SucceedLEARN with learner enrolment, progress tracking, reminders, assessments, certificates and reporting.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                    </div>

                </article>


                <!-- SCORM -->
                <article class="sl-abac-delivery-options__card">

                    <div class="sl-abac-delivery-options__mark">
                        SC
                    </div>

                    <div class="sl-abac-delivery-options__card-content">

                        <h3>
                            <?php esc_html_e(
                                'SCORM package',
                                'akaza-adventure'
                            ); ?>
                        </h3>

                        <p>
                            <?php esc_html_e(
                                'Deploy the course through your existing SCORM-compatible LMS and retain training within your established learning infrastructure.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                    </div>

                </article>


                <!-- Customisation -->
                <article class="sl-abac-delivery-options__card">

                    <div class="sl-abac-delivery-options__mark">
                        C
                    </div>

                    <div class="sl-abac-delivery-options__card-content">

                        <h3>
                            <?php esc_html_e(
                                'Customisation',
                                'akaza-adventure'
                            ); ?>
                        </h3>

                        <p>
                            <?php esc_html_e(
                                'Reflect your policy terminology, reporting routes, branding, approval process and suitable workplace scenarios.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                    </div>

                </article>

            </div>

        </div>

    </div>
</section>