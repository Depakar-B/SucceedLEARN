<?php
/**
 * Security Awareness — Security Behaviour & Culture Suite.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sl_suite_product_urls = array(
	's-aware'   => home_url( '/security-awareness/s-aware/' ),
	's-bytes'   => home_url( '/security-awareness/s-bytes/' ),
	's-phish'   => home_url( '/security-awareness/s-phish-phishing-simulation/' ),
	's-play'    => home_url( '/security-awareness/s-play-gamified-training/' ),
	's-sign'    => home_url( '/security-awareness/s-signs-security-awareness/' ),
	's-metrics' => home_url( '/security-awareness/s-metrics-tracking-reporting/' ),
	's-sync'    => home_url( '/security-awareness/s-sync-security-awareness/' ),
);
?>
<section class="sl-suite-section" id="security-behaviour-suite" aria-labelledby="sl-sa-behaviour-suite-title">

    <div class="container">

        <div class="sl-suite-intro">

            <span class="sl-home-sub-heading">
                <?php esc_html_e( 'Introduction to the Suite', 'akaza-adventure' ); ?>
            </span>

            <h2 id="sl-sa-behaviour-suite-title">
                <?php esc_html_e( 'Everything You Need to Build a', 'akaza-adventure' ); ?>
                <span><?php esc_html_e( 'Security-Aware Organisation', 'akaza-adventure' ); ?></span>
            </h2>

            <p>
                <?php esc_html_e(
                    'Whether your objective is improving phishing resilience, meeting ISO 27001 awareness requirements, strengthening regulatory compliance, or reducing human cyber risk, the SucceedLEARN Security Behaviour & Culture Suite provides a comprehensive set of integrated solutions that work together throughout the employee lifecycle.',
                    'akaza-adventure'
                ); ?>
            </p>

        </div>


        <!-- Suite Explorer -->
        <div class="sl-suite-explorer">

            <!-- Product Navigation -->
            <div class="sl-suite-nav">

                <button class="sl-suite-nav-item active"
                        type="button"
                        data-suite="s-aware">
                    <span>
                        <strong>S-Aware</strong>
                        <small>Security Awareness Training</small>
                    </span>
                </button>

                <button class="sl-suite-nav-item"
                        type="button"
                        data-suite="s-bytes">
                    <span>
                        <strong>S-Bytes</strong>
                        <small>Security Microlearning</small>
                    </span>
                </button>

                <button class="sl-suite-nav-item"
                        type="button"
                        data-suite="s-phish">
                    <span>
                        <strong>S-Phish</strong>
                        <small>Phishing Simulation</small>
                    </span>
                </button>

                <button class="sl-suite-nav-item"
                        type="button"
                        data-suite="s-play">
                    <span>
                        <strong>S-Play</strong>
                        <small>Gamified Awareness</small>
                    </span>
                </button>

                <button class="sl-suite-nav-item"
                        type="button"
                        data-suite="s-sign">
                    <span>
                        <strong>S-Sign</strong>
                        <small>Visual Reinforcement</small>
                    </span>
                </button>

                <button class="sl-suite-nav-item"
                        type="button"
                        data-suite="s-metrics">
                    <span>
                        <strong>S-Metrics</strong>
                        <small>Analytics &amp; Reporting</small>
                    </span>
                </button>

                <button class="sl-suite-nav-item"
                        type="button"
                        data-suite="s-sync">
                    <span>
                        <strong>S-Sync</strong>
                        <small>Enterprise Integrations</small>
                    </span>
                </button>

            </div>


            <!-- Product Content -->
            <div class="sl-suite-content">


                <!-- S-AWARE -->
                <article class="sl-suite-panel active"
                         data-suite-panel="s-aware">

                    <div class="sl-suite-panel-header">

                        <div>
                            <span class="sl-suite-product-label">
                                S-Aware
                            </span>

                            <h3>
                                Build the Foundation of
                                Security Awareness
                            </h3>

                            <h4>
                                Core Security &amp; Privacy Learning
                            </h4>
                        </div>

                    </div>


                    <div class="sl-suite-panel-grid">

                        <div class="sl-suite-panel-copy">

                            <p>
                                Build essential cybersecurity knowledge
                                across your workforce with a comprehensive
                                library of security and privacy awareness
                                courses.
                            </p>

                            <p>
                                S-Aware provides CPD-certified learning
                                mapped to recognised frameworks and
                                regulations including ISO 27001, SOC 2,
                                GDPR, HIPAA and PCI DSS.
                            </p>

                            <p>
                                Organisations can assign relevant courses
                                from a shared library, customise learning
                                to reflect their branding and policies,
                                and deliver training through SucceedLEARN's
                                SaaS platform or their own LMS using SCORM.
                            </p>

                            <p>
                                S-Aware creates the foundational knowledge
                                employees need to understand security
                                risks, their responsibilities, and the
                                everyday behaviours that help protect
                                organisational information.
                            </p>

                            <strong class="sl-suite-highlight">
                                Build awareness. Support compliance.
                                Establish the foundation for secure behaviour.
                            </strong>

                            <a
                                class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
                                href="<?php echo esc_url( $sl_suite_product_urls['s-aware'] ); ?>"
                            >
                                <?php esc_html_e( 'View Content', 'akaza-adventure' ); ?>
                            </a>

                        </div>


                    </div>

                </article>


                <!-- S-BYTES -->
                <article class="sl-suite-panel"
                         data-suite-panel="s-bytes">

                    <div class="sl-suite-panel-header">

                        <div>
                            <span class="sl-suite-product-label">
                                S-Bytes
                            </span>

                            <h3>
                                Reinforce Security Awareness
                                with Bite-Sized Learning
                            </h3>

                            <h4>
                                Continuous Microlearning Reinforcement
                            </h4>
                        </div>

                    </div>


                    <div class="sl-suite-panel-grid">

                        <div class="sl-suite-panel-copy">

                            <p>
                                Security awareness shouldn't end when
                                employees complete their annual training.
                            </p>

                            <p>
                                S-Bytes delivers short, engaging
                                microlearning experiences designed to
                                reinforce important security behaviours
                                throughout the year.
                            </p>

                            <p>
                                Bite-sized modules of approximately
                                3–5 minutes make cybersecurity topics
                                easier to revisit and remember without
                                significantly disrupting the employee's
                                working day.
                            </p>

                            <p>
                                Covering areas such as phishing,
                                social engineering, account security,
                                remote working, malware and data
                                classification, S-Bytes helps organisations
                                turn security awareness into an ongoing
                                conversation.
                            </p>

                            <p>
                                Content can be delivered through channels
                                including email, Slack, Teams or LMS,
                                helping bring learning closer to employees'
                                everyday workflows.
                            </p>

                            <strong class="sl-suite-highlight">
                                Short enough to consume. Relevant enough
                                to remember. Regular enough to build habits.
                            </strong>

                            <a
                                class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
                                href="<?php echo esc_url( $sl_suite_product_urls['s-bytes'] ); ?>"
                            >
                                <?php esc_html_e( 'View Content', 'akaza-adventure' ); ?>
                            </a>

                        </div>


                    </div>

                </article>


                <!-- S-PHISH -->
                <article class="sl-suite-panel"
                         data-suite-panel="s-phish">

                    <div class="sl-suite-panel-header">

                        <div>
                            <span class="sl-suite-product-label">
                                S-Phish
                            </span>

                            <h3>
                                Turn Phishing Awareness
                                into Practical Experience
                            </h3>

                            <h4>
                                Phishing Simulation &amp; Resilience
                            </h4>
                        </div>

                    </div>


                    <div class="sl-suite-panel-grid">

                        <div class="sl-suite-panel-copy">

                            <p>
                                Knowing how phishing works is one thing.
                                Recognising it when it lands in your inbox
                                is another.
                            </p>

                            <p>
                                S-Phish enables organisations to test
                                employee readiness through realistic
                                phishing simulations designed to replicate
                                the types of threats employees may encounter
                                in the real world.
                            </p>

                            <p>
                                With 150+ ready-to-use phishing email and
                                landing-page templates, custom campaign
                                creation, flexible scheduling and automated
                                remedial training, organisations can
                                continuously assess how employees respond
                                to simulated attacks.
                            </p>

                            <p>
                                Track opens, clicks, reports and repeat
                                behaviour to identify where risk exists
                                and where additional awareness may be
                                required.
                            </p>

                            <strong class="sl-suite-highlight">
                                Test. Learn. Strengthen.
                            </strong>

                            <a
                                class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
                                href="<?php echo esc_url( $sl_suite_product_urls['s-phish'] ); ?>"
                            >
                                <?php esc_html_e( 'View Content', 'akaza-adventure' ); ?>
                            </a>

                        </div>


                    </div>

                </article>


                <!-- S-PLAY -->
                <article class="sl-suite-panel"
                         data-suite-panel="s-play">

                    <div class="sl-suite-panel-header">

                        <div>
                            <span class="sl-suite-product-label">
                                S-Play
                            </span>

                            <h3>
                                Make Security Learning
                                More Engaging
                            </h3>

                            <h4>
                                Gamified Security Awareness
                            </h4>

                        </div>

                    </div>


                    <div class="sl-suite-panel-grid">

                        <div class="sl-suite-panel-copy">

                            <p>
                                Security concepts become more memorable
                                when employees actively engage with them.
                            </p>

                            <p>
                                S-Play transforms cybersecurity reinforcement
                                into interactive learning experiences
                                through games including trivia, crosswords,
                                scenario-based challenges and unique formats.
                            </p>

                            <p>
                                Short, replayable activities allow employees
                                to test their knowledge, receive real-time
                                feedback and reinforce important concepts
                                through participation rather than passive
                                consumption.
                            </p>

                            <p>
                                By bringing an element of challenge and play
                                into security awareness, S-Play helps
                                organisations maintain employee interest
                                while creating additional opportunities to
                                revisit and strengthen security knowledge.
                            </p>

                            <strong class="sl-suite-highlight">
                                Play. Practise. Reinforce. Remember.
                            </strong>

                            <a
                                class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
                                href="<?php echo esc_url( $sl_suite_product_urls['s-play'] ); ?>"
                            >
                                <?php esc_html_e( 'View Content', 'akaza-adventure' ); ?>
                            </a>

                        </div>


                    </div>

                </article>


                <!-- S-SIGN -->
                <article class="sl-suite-panel"
                         data-suite-panel="s-sign">

                    <div class="sl-suite-panel-header">

                        <div>
                            <span class="sl-suite-product-label">
                                S-Sign
                            </span>

                            <h3>
                                Keep Security Awareness
                                Visible
                            </h3>

                            <h4>
                                Visual Security Reinforcement
                            </h4>

                        </div>

                    </div>


                    <div class="sl-suite-panel-grid">

                        <div class="sl-suite-panel-copy">

                            <p>
                                Not every security intervention needs to
                                be another course.
                            </p>

                            <p>
                                S-Signs keeps important cybersecurity
                                messages visible through a library of
                                50+ security awareness posters covering
                                topics such as phishing, password security,
                                clean desk practices and other everyday
                                security behaviours.
                            </p>

                            <p>
                                Designed for use across email, intranets,
                                screensavers and physical workplaces,
                                S-Signs enables organisations to create
                                regular visual touchpoints between formal
                                learning activities.
                            </p>

                            <p>
                                Posters can be organised into monthly or
                                quarterly awareness campaigns and adapted
                                to incorporate organisational branding or
                                policy references.
                            </p>

                            <strong class="sl-suite-highlight">
                                Keep security visible. Keep secure behaviour
                                top of mind.
                            </strong>

                            <a
                                class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
                                href="<?php echo esc_url( $sl_suite_product_urls['s-sign'] ); ?>"
                            >
                                <?php esc_html_e( 'View Content', 'akaza-adventure' ); ?>
                            </a>

                        </div>


                    </div>

                </article>


                <!-- S-METRICS -->
                <article class="sl-suite-panel"
                         data-suite-panel="s-metrics">

                    <div class="sl-suite-panel-header">

                        <div>
                            <span class="sl-suite-product-label">
                                S-Metrics
                            </span>

                            <h3>
                                Turn Awareness Into
                                Actionable Insight
                            </h3>

                            <h4>
                                Unified Awareness Reporting &amp; Analytics
                            </h4>

                        </div>

                    </div>


                    <div class="sl-suite-panel-grid">

                        <div class="sl-suite-panel-copy">

                            <p>
                                Training completion tells you whether
                                employees finished a course. A mature
                                security awareness programme needs
                                visibility beyond completion alone.
                            </p>

                            <p>
                                S-Metrics brings data from across the
                                SucceedLEARN security awareness ecosystem
                                into a central reporting and analytics
                                dashboard.
                            </p>

                            <p>
                                Organisations can track course completion,
                                phishing simulation results, microlearning
                                engagement, game participation and other
                                awareness indicators from one place.
                            </p>

                            <p>
                                Filter results across users, groups,
                                campaigns and locations, monitor trends
                                over time, and export reporting for audits,
                                management reviews or presentations.
                            </p>

                            <p>
                                By connecting learning activity with
                                engagement and behavioural indicators,
                                S-Metrics helps organisations understand
                                where awareness is working and where
                                further reinforcement may be needed.
                            </p>

                            <strong class="sl-suite-highlight">
                                Measure participation. Identify risk.
                                Demonstrate progress.
                            </strong>

                            <a
                                class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
                                href="<?php echo esc_url( $sl_suite_product_urls['s-metrics'] ); ?>"
                            >
                                <?php esc_html_e( 'View Content', 'akaza-adventure' ); ?>
                            </a>

                        </div>


                    </div>

                </article>


                <!-- S-SYNC -->
                <article class="sl-suite-panel"
                         data-suite-panel="s-sync">

                    <div class="sl-suite-panel-header">

                        <div>
                            <span class="sl-suite-product-label">
                                S-Sync
                            </span>

                            <h3>
                                Connect Security Awareness
                                with Your Existing Ecosystem
                            </h3>

                            <h4>
                                Enterprise Integration Framework
                            </h4>

                        </div>

                    </div>


                    <div class="sl-suite-panel-grid">

                        <div class="sl-suite-panel-copy">

                            <p>
                                Security awareness shouldn't create another
                                disconnected system for your IT and
                                compliance teams to manage.
                            </p>

                            <p>
                                S-Sync is the integration layer of the
                                SucceedLEARN Security Behaviour &amp; Culture
                                Suite, designed to connect awareness
                                programmes with an organisation's existing
                                technology environment.
                            </p>

                            <p>
                                Through capabilities including SAML 2.0
                                Single Sign-On, SCIM provisioning, REST APIs
                                and SCORM deployment, S-Sync can help
                                streamline user access, provisioning, data
                                exchange and learning delivery.
                            </p>

                            <p>
                                Support for enterprise identity providers
                                including Microsoft Entra ID, Okta,
                                OneLogin, Google Workspace, JumpCloud and
                                Oracle helps organisations integrate
                                SucceedLEARN into existing workflows while
                                reducing administrative complexity.
                            </p>

                            <strong class="sl-suite-highlight">
                                Connect. Simplify. Scale.
                            </strong>

                            <a
                                class="sl-content-btn sl-content-btn-primary sl-suite-panel-cta"
                                href="<?php echo esc_url( $sl_suite_product_urls['s-sync'] ); ?>"
                            >
                                <?php esc_html_e( 'View Content', 'akaza-adventure' ); ?>
                            </a>

                        </div>


                    </div>

                </article>

            </div>

        </div>

    </div>

</section>
