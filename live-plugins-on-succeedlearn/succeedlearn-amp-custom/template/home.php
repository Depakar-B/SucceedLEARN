<!doctype html>
<html amp lang="en">
<head>
    <meta charset="utf-8">
    <title>SucceedLEARN | Security Awareness & Compliance Training</title>
    <link rel="canonical" href="https://succeedlearn.com/">
    <meta name="description" content="SucceedLEARN is a product of Succeed Technologies®, a dynamic organization that aims to revolutionize how people learn online and simplify Compliance eLearning for organizations across the globe.">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link rel="preconnect" href="https://cdn.ampproject.org" crossorigin>
    <link rel="dns-prefetch" href="//cdn.ampproject.org">
    <link rel="preload" as="image" href="https://succeedlearn.com/wp-content/uploads/2026/03/Saint-Gobin.webp">

    <!-- AMP runtime -->
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    
    <!-- AMP components -->
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-consent" src="https://cdn.ampproject.org/v0/amp-consent-0.1.js"></script>

    <!-- ✅ AMP BOILERPLATE (REQUIRED) -->
    <style amp-boilerplate>
        body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
        -moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
        -ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;
        animation:-amp-start 8s steps(1,end) 0s 1 normal both}
        @-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
        @keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}
    </style>

    <noscript>
        <style amp-boilerplate>
            body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}
        </style>
    </noscript>

    <!-- AMP Custom CSS -->
    <style amp-custom>
        <?php include('style.php'); ?>
    </style>

    <!-- ✅ Schema Markup -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Website",
            "name": "SucceedLEARN",
            "url": "https://succeedlearn.com",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://succeedlearn.com/?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
</head>

<body>
    <?php include(plugin_dir_path(__FILE__) . 'amp-cookie-consent.php'); ?>
    <!-- ✅ AMP Sidebar/Menu -->
    <?php include(plugin_dir_path(__FILE__) . 'menu.php'); ?>

    <main id="main-content">
        <!-- Lightweight hero section (AMP/mobile) -->
        <section class="banner" aria-label="SucceedLearn"></section>
        <section class="hero-static-section" aria-label="SucceedLEARN key offerings">
            <div class="hero-static" aria-label="SucceedLEARN highlight">
                <h1 class="topic blue">SucceedLEARN</h1>
                <h2>Security Awareness</h2>
                <p class="hero-subtitle">The Most Comprehensive Security Awareness Program</p>
                <a href="<?php echo succeedlearn_get_amp_link(87); ?>" class="course-button">Request Demo</a>
            </div>
        </section>

        <?php
        include_once plugin_dir_path(__FILE__) . 'clients-marquee.php';
        render_succeedlearn_clients_marquee([
            'title_tag'  => 'h3',
            'title_html' => '<span class="black">Trusted </span><span class="blue">By</span>',
            // Show up to 18 logos; grid will auto-reduce columns by width.
            'max_logos'  => 18,
            // Legacy arg; ignored by the new grid renderer (kept for backward compatibility).
            'clone_track'=> true,
        ]);
        ?>

        <!-- Why SucceedLearn Section-->
        <section class="section">
            <h2 class="heading">
                <span class="black">Why</span><span class="blue"> SucceedLearn?</span>
            </h2>
            <div class="amp-spacer"></div>
            <div class="why-imagebox-grid">
                <div class="why-imagebox">
                    <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/Flexibility.svg" width="70" height="70" layout="fixed" alt="Flexible"></amp-img>
                    <div class="why-imagebox-text">
                        <h3>Flexibility</h3>
                        <p>We will not settle until our customers get what they want.</p>
                    </div>
                </div>
                <div class="why-imagebox">
                    <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/Value-for-Money.svg" width="70" height="70" layout="fixed" alt="Value for Money"></amp-img>
                    <div class="why-imagebox-text">
                        <h3>Value for Money</h3>
                        <p>Fully customized state-of-the-art solutions at incredible pricing.</p>
                    </div>
                </div>
                <div class="why-imagebox">
                    <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/Best-in-class-support.svg" width="70" height="70" layout="fixed" alt="Support"></amp-img>
                    <div class="why-imagebox-text">
                        <h3>Best-in-class support</h3>
                        <p>Our Customer-first approach consistently delights our clients.</p>
                    </div>
                </div>
            </div>
        </section>


        
        <!-- Course 1 section-->
        <section class="common-content-section bg-light-mint">
            <div class="course-content">
                <h2 class="course-title">SucceedLEARN Security Awareness (SucceedLEARN SA)</h2>
                <h3 class="course-subtitle">Comprehensive security-and-privacy awareness program, with multiple approaches to build awareness.</h3>
                <ul class="course-keypoints">
                    <li><p>Courses covering major frameworks: SOC 2, ISO 27001, PCI DSS, HIPAA</p></li>
                    <li><p>Simulated phishing-test, train, track, then re-test</p></li>
                    <li><p>Fun-fo-sec micro-learning bytes, quizzes, security game</p></li>
                    <li><p>Seamless Microsoft integration for automated onboarding</p></li>
                    <li><p>Full policies-to-posters ecosystem delivers continuous awareness</p></li>
                </ul>
                <a href="<?php echo succeedlearn_get_amp_link(37337); ?>" class="course-button">Know More</a>
            </div>
            <div class="subcategory-image">
                <amp-img
                    src="https://succeedlearn.com/wp-content/uploads/2025/08/SucceedLEARN-Security-Awareness-SA.svg"
                    width="300" height="250"
                    layout="responsive"
                    alt="SucceedLEARN Security Awareness training program with engaging features and courses on SOC 2, ISO 27001, PCI DSS, HIPAA.">
                </amp-img>
            </div>
        </section>
		        <!-- Sub category section -->
        <section class="bg-light-mint grid-center-responsive home-grid-center-section">
            <h2 class="heading">
                <span class="black">Comprehensive</span>
                <span class="blue"> Security Awareness </span>
                <span class="black"> Training Program</span>
            </h2>
            <div class="amp-spacer"></div>
            <div class="imagebox-grid">

                <a href="<?php echo succeedlearn_get_amp_link(34867); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-Aware.svg" width="60" height="60" layout="fixed" alt="S-Aware" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S-Aware</h3>
                            <p class="imagebox-description">Framework‑mapped courses delivering foundational security knowledge for every employee globally.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo succeedlearn_get_amp_link(37751); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-Phish-1.svg" width="60" height="60" layout="fixed" alt="S‑Phish" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S‑Phish</h3>
                            <p class="imagebox-description">Realistic phishing simulations to test, train, track, and boost resilience.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo succeedlearn_get_amp_link(48598); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-bites.svg" width="60" height="60" layout="fixed" alt="S-Bytes" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S-Bytes</h3>
                            <p class="imagebox-description">Bite sized microlearning bursts reinforcing key behaviours without disrupting workflows daily.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo succeedlearn_get_amp_link(38574); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-metric.svg" width="60" height="60" layout="fixed" alt="S‑Metrics" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S‑Metrics</h3>
                            <p class="imagebox-description">Unified dashboard visualising completions, phishing metrics, risk scores, and trends.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo succeedlearn_get_amp_link(39642); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-play.svg" width="60" height="60" layout="fixed" alt="S-Play" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S-Play</h3>
                            <p class="imagebox-description">Interactive security games that gamify learning, driving engagement and retention.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo succeedlearn_get_amp_link(40052); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-signs.svg" width="60" height="60" layout="fixed" alt="S-Signs" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S-Signs</h3>
                            <p class="imagebox-description">Eye catching email posters and signage keeping security messages constantly visible.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo succeedlearn_get_amp_link(39805); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-shield.svg" width="60" height="60" layout="fixed" alt="S‑Shield" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S‑Shield</h3>
                            <p class="imagebox-description">Policy drafting tool offering ready templates, guidance, and effortless customisation.</p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo succeedlearn_get_amp_link(38326); ?>" class="imagebox-link">
                    <div class="imagebox">
                        <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/S-sync-1.svg" width="60" height="60" layout="fixed" alt="S‑Sync" class="icon-img"></amp-img>
                        <div class="imagebox-text">
                            <h3 class="imagebox-title">S‑Sync</h3>
                            <p class="imagebox-description">Integration portal linking LMS, SSO, HRIS, GRC systems for automated data flow.</p>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!-- Course 2 section-->
        <section class="common-content-section bg-white">
            <div class="course-content">
                <h2 class="course-title">HR Compliance Suite</h2>
                <h3 class="course-subtitle">Comprehensive global harassment program forging respect and lasting culture change.</h3>
                <ul class="course-keypoints">
                    <li><p>Courses aligned to US federal and state laws, UK Equality Act, and other Global laws</p></li>
                    <li><p>CPD-certified interactive scenarios build empathy and safety</p></li>
                    <li><p>Audit-ready completion records for effortless regulatory proof</p></li>
                    <li><p>Risk assessments, templates, posters sustain ongoing awareness</p></li>
                    <li><p>Live webinars reinforce policies and encourage dialogue</p></li>
                </ul>
                <a href="<?php echo succeedlearn_get_amp_link(43515); ?>" class="course-button">Know More</a>
            </div>
            <div class="subcategory-image">
                <amp-img
                    src="https://succeedlearn.com/wp-content/uploads/2025/08/Respect-Inclusion-Suite-2.svg"
                    width="300" height="250" layout="responsive"
                    alt="SucceedLEARN Respect and Inclusion Suite providing global compliance training programs.">
                </amp-img>
            </div>
        </section>

        <!-- Course 3 section-->
        <section class="common-content-section bg-light-mint">
            <div class="course-content">
                <h2 class="course-title">Financial Crime Prevention Suite</h2>
                <h3 class="course-subtitle">Modular financial crime training safeguarding revenue and reputation across industries</h3>
                <ul class="course-keypoints">
                    <li><p>AML - CFT, ABC, Trade Compliance &amp; Sanctions, Tax – evasion courses</p></li>
                    <li><p>Updated to latest regulatory guidance</p></li>
                    <li><p>Cloud or SCORM delivery, branded quickly</p></li>
                    <li><p>CPD - Certified, highly engaging and interactive eLearning</p></li>
                    <li><p>PE/VC- specific modules for sector compliance</p></li>
                </ul>
                <a href="<?php echo succeedlearn_get_amp_link(50893); ?>" class="course-button">Know More</a>
            </div>
            <div class="subcategory-image">
                <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/Financial-Crime-Prevention-Training-2.svg" width="300" height="250" layout="responsive" alt="Financial Crime Prevention Suite with AML, CFT, anti-bribery, sanctions, and tax evasion training to safeguard organizations."></amp-img>
            </div>
        </section>

        <!-- Course 4 section-->
        <section class="common-content-section bg-white">
            <div class="course-content">
                <h2 class="course-title">Workplace Health and Safety Suite</h2>
                <h3 class="course-subtitle">Complete health and safety training fostering safer, compliant, productive workplaces.</h3>
                <ul class="course-keypoints">
                    <li><p>Courses aligned to US federal and state laws, UK Equality Act, and other Global laws</p></li>
                    <li><p>CPD-certified interactive scenarios build empathy and safety</p></li>
                    <li><p>Audit-ready completion records for effortless regulatory proof</p></li>
                    <li><p>Risk assessments, templates, posters sustain ongoing awareness</p></li>
                    <li><p>Live webinars reinforce policies and encourage dialogue</p></li>
                </ul>
                <a href="<?php echo succeedlearn_get_amp_link(50712); ?>" class="course-button">Know More</a>
            </div>
            <div class="subcategory-image">
                <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/Workplace-Health-and-Safety-Training-1.svg" width="300" height="250" layout="responsive" alt="Workplace Health and Safety Suite with complete training to foster safer workplaces"></amp-img>
            </div>
        </section>

        <!-- Course 5 section-->
        <section class="common-content-section bg-light-mint">
            <div class="course-content">
                <h2 class="course-title">Customizable Code of Conduct Training</h2>
                <h3 class="course-subtitle">Customised Code-of-Conduct eLearning, fully branded and policy-aligned in days effortlessly.</h3>
                <ul class="course-keypoints">
                    <li><p>Pick essential topics, assemble instantly</p></li>
                    <li><p>Insert logo, tone, policy references</p></li>
                    <li><p>SaaS streaming or SCORM package delivery</p></li>
                    <li><p>Rapid turnaround with expert instructional design</p></li>
                    <li><p>Rich animations, branching scenarios, interactive quizzes</p></li>
                </ul>
                <a href="<?php echo succeedlearn_get_amp_link(51624); ?>" class="course-button">Know More</a>
            </div>
            <div class="subcategory-image">
                <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/Customizable-Code-of-Conduct-Training-4.svg" width="300" height="250" layout="responsive" alt="Fully customizable Code of Conduct training aligned with company policies and global regulatory standards."></amp-img>
            </div>
        </section>

        <!-- Course 6 section-->
        <section class="common-content-section bg-white">
            <div class="course-content">
                <h2 class="course-title">Purpose-built Learning Management Platform</h2>
                <h3 class="course-subtitle">Compliance-first LMS with intuitive UI and plug-and-play enterprise integration.</h3>
                <ul class="course-keypoints">
                    <li><p>Branded UI, tailor roles and themes</p></li>
                    <li><p>Connect SSO, HRIS, GRC tools instantly</p></li>
                    <li><p>Auto certificates, reminders, verifiable credentials</p></li>
                    <li><p>Custom dashboards and exportable reports</p></li>
                    <li><p>Rapid go-live with white-glove support</p></li>
                </ul>
            </div>
            <div class="subcategory-image">
                <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/08/Purpose-built-Learning-Management-Platform-1.svg" width="300" height="250" layout="responsive" alt="Learning Management System (LMS) with customizable dashboards, compliance reports, and advanced eLearning analytics."></amp-img>
            </div>
        </section>

        <!-- Course 7 section-->
        <section class="common-content-section bg-light-mint">
            <div class="course-content">
                <h2 class="course-title">Private Equity and Venture Capital Suite</h2>
                <h3 class="course-subtitle">Complete compliance training equipping PE/VC firms to stay investor-ready, and regulator-compliant.</h3>
                <ul class="course-keypoints">
                    <li><p>PE/VC-specific modules for sector compliance</p></li>
                    <li><p>Covers GDPR, CCPA, Worker Protection Act 2023, Equality Act 2010, UK Bribery Act, AML, CFT, and SMCR</p></li>
                    <li><p>Interactive, scenario-based modules with easy-to-understand animations</p></li>
                    <li><p>Modular training with knowledge checks, assessments, and certifications</p></li>
                    <li><p>Fast branding, cloud or SCORM delivery for seamless rollout</p></li>
                </ul>
                <a href="<?php echo succeedlearn_get_amp_link(50754); ?>" class="course-button">Know More</a>
            </div>
            <div class="subcategory-image">
                <amp-img src="https://succeedlearn.com/wp-content/uploads/2025/09/Private-Equity-and-Venture-Capital-Suite.svg" width="300" height="200" layout="responsive" alt="SucceedLEARN Private Equity and Venture Capital Suite with GDPR, CCPA, Worker Protection Act 2023, Equality Act 2010 and many more."></amp-img>
            </div>
        </section>

        <?php
        include_once plugin_dir_path(__FILE__) . 'contact-section.php';
        render_succeedlearn_common_cta_section([
            'show_form' => true,
            'cta_text'  => 'Contact Us',
            'cta_url'   => succeedlearn_get_amp_link(87),
        ]);
        ?>

        <!-- ✅ Footer -->
        <?php include(plugin_dir_path(__FILE__) . 'footer.php'); ?>
    </main>
</body>
</html>