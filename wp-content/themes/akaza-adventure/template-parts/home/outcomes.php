<?php
/**
 * Homepage — Outcomes section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-home-outcomes-section" aria-labelledby="outcomes-heading">

    <div class="container">

        <div class="sl-home-section-heading">

            <span class="sl-home-sub-heading">
                Why organizations choose SucceedLEARN
            </span>

            <h2 id="outcomes-heading">
                <?php
                echo wp_kses(
                    __( 'Outcomes <span>you achieve</span>', 'akaza-adventure' ),
                    array( 'span' => array() )
                );
                ?>
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="sl-home-outcome-card">

                    <h3>Measurable outcomes</h3>

                    <ul>
                        <li>Reduced phishing and fraud incidents</li>
                        <li>Fewer human errors and preventable breaches</li>
                        <li>Improved employee decision-making</li>
                        <li>Stronger security and compliance culture</li>
                        <li>Better audit readiness</li>
                        <li>Greater visibility into organizational risk</li>
                    </ul>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="sl-home-outcome-card">

                    <h3>Easy Adoption. Real Impact.</h3>

                    <ul>
                        <li>SaaS or SCORM delivery</li>
                        <li>Enterprise-ready architecture</li>
                        <li>SSO, SAML, SCIM and API integrations</li>
                        <li>Rapid onboarding</li>
                        <li>Continuous reinforcement</li>
                        <li>Dedicated support</li>
                    </ul>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="sl-home-outcome-card">

                    <h3>Compliance Alignment</h3>

                    <div class="sl-home-tag-wrapper">
                        <span>GDPR / UK GDPR</span>
                        <span>ISO 27001</span>
                        <span>SOC 2</span>
                        <span>HIPAA</span>
                        <span>PCI DSS</span>
                        <span>Cyber Essentials</span>
                        <span>AML &amp; Anti-Bribery</span>
                        <span>Workplace Conduct</span>
                        <span>Health &amp; Safety</span>
                    </div>

                </div>

            </div>

        </div>

        <div class="sl-home-outcome-footer">

            <h4>
                Because compliance should not stop at course completion.
            </h4>

            <p>
                It should create safer decisions across the organization.
            </p>

        </div>

    </div>

</section>
