<?php
/**
 * Homepage — The Solution section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-home-solution-section" aria-labelledby="solution-heading">

    <div class="container">

        <div class="row">

            <!-- Left Sticky Content -->

            <div class="col-lg-5">

                <div class="sl-home-solution-content">

                    <span class="sl-home-sub-heading">
                        The Solution
                    </span>

                    <h2 id="solution-heading">
                        <?php
                        echo wp_kses(
                            __( 'Learning Experiences Employees Engage With. <span>Outcomes Employers Can Measure.</span>', 'akaza-adventure' ),
                            array( 'span' => array() )
                        );
                        ?>
                    </h2>

                    <p>
                        Our workplace compliance training combines behavioural science,
                        interactive content, and real-world scenarios to turn mandatory
                        learning into measurable behaviour change.
                    </p>

                </div>

            </div>


            <!-- Right Side Cards -->

            <div class="col-lg-7">

                <!-- Card 1 -->

                <div class="sl-home-solution-card">

                    <span class="sl-home-card-tag">
                        For Employees
                    </span>

                    <h3>Engaging Learning Experiences</h3>

                    <ul>
                        <li>Role-based and relevant content</li>
                        <li>Interactive scenarios and assessments</li>
                        <li>Gamified microlearning</li>
                        <li>Mobile-friendly delivery</li>
                    </ul>

                    <div class="sl-home-outcome-box">

                        <h4>Employee Outcomes</h4>

                        <p>
                            Employees gain practical skills to make safer, more compliant
                            decisions every day.
                        </p>

                    </div>

                </div>



                <!-- Card 2 -->

                <div class="sl-home-solution-card">

                    <span class="sl-home-card-tag">
                        For Employers
                    </span>

                    <h3>Operational Simplicity</h3>

                    <ul>
                        <li>Real-time dashboards and reporting.</li>
                        <li>Automated reminders and certifications.</li>
                        <li>SSO, SAML and enterprise integrations.</li>
                        <li>HRMS-driven user provisioning.</li>
                        <li>Ready-to-use awareness assets.</li>
                    </ul>

                    <div class="sl-home-outcome-box">

                        <h4>Business Outcomes</h4>

                        <p>
                            Reduce administrative effort while improving visibility,
                            engagement and compliance readiness.
                        </p>

                    </div>

                </div>



                <!-- Add More Cards Here -->

            </div>

        </div>

    </div>

</section>
