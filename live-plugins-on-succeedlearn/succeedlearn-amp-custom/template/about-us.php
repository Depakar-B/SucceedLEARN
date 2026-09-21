<!doctype html>
<html amp lang="en">
<head>
  <meta charset="utf-8">
  <title>About Us | SucceedLEARN</title>
  <link rel="canonical" href="https://succeedlearn.com/about-us/">
  <meta name="description" content="SucceedLEARN is a product of Succeed Technologies®, a dynamic organization that aims to revolutionize how people learn online and simplify Compliance eLearning
for organizations across the globe.">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

  <!-- AMP runtime -->
  <script async src="https://cdn.ampproject.org/v0.js"></script>
	
  <!-- AMP components -->
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
  <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
  <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
  <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
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

<body data-block-on-consent>

<!-- ✅ AMP Sidebar/Menu -->
<?php include(plugin_dir_path(__FILE__) . 'menu.php'); ?>
	<main id="main-content">
	
<?php include(plugin_dir_path(__FILE__) . 'amp-cookie-consent.php'); ?>

  <section class="banner" aria-label="about-us">
  </section>
	
	
	<section class="about-us-main-top-section">
	<h2 class="heading"><span class="black">About</span><span class="blue"> Us</span></h2>
		<h3 class="about-subheading">WELCOME TO SUCCEED</h3>
		<p class="about-us-description">SucceedLEARN is a product of <a href="https://succeedtech.com" class="about-us-highlight-link">Succeed Technologies®</a>, 
  a dynamic organization that aims to revolutionize how people learn online and simplify compliance eLearning for organizations across the globe.Our rich experience in corporate training, adult learning principles, instructional design and exposure to different industries has helped us create a learning platform and courses that are engaging, and impactful. We ensure a fun-filled learning experience for the learners with usage of enriching visuals created using 2D & 3D technologies and gamified interactivities.</p>

<p class="about-us-description">We help organizations go beyond compliance with our intuitive, enterprise-class learning portal that simplifies compliance training. Our curated catalog offers ready-made courses on today’s most in-demand compliance topics. With flexible customization options and translations available in over 30 languages, we ensure your organization’s unique learning needs are met.</p>
		<p class="about-us-description"><b>Click Below Button to Get in touch with Us,</b></p>
		<a href="<?php echo succeedlearn_get_amp_link( 87 ); ?>" class="course-button">Contact Us</a>
	</section>

	

<?php
include_once plugin_dir_path(__FILE__) . 'clients-marquee.php';
render_succeedlearn_clients_marquee(
	array(
		'title_tag'   => 'h2',
		'title_class' => 'heading',
		'title_html'  => '<span class="black">Trusted  </span><span class="blue">By</span>',
	)
);
?>
	
<?php
include_once plugin_dir_path(__FILE__) . 'contact-section.php';
render_succeedlearn_common_cta_section(
	array(
		'shortcode' => '[contact_form]',
	)
);
?>

<section class="contact-carousel-section-amp">
  <amp-carousel
    type="slides"
    layout="fixed-height"
    height="660"
    autoplay
    delay="4000"
    loop
    class="contact-carousel-amp"
  >
    <!-- SLIDE 1 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Comprehensive-Security-Awareness.svg"
              alt="Comprehensive Security Awareness"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Comprehensive Security Awareness Training Program</h3>
          <p>Looking for a complete, organisation-wide cybersecurity awareness solution? Our Security Awareness Suite brings together immersive training, real phishing simulations, bite-sized videos, gamified learning, visual reminders, analytics dashboards, and seamless integrations.</p>
          <p class="card-link-amp">Fill out the form to explore the full suite.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/S-Aware.svg"
              alt="S-Aware"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>S-Aware - Cybersecurity & Data Protection Training</h3>
          <p>Looking to strengthen employee security behaviour across your organisation? S-Aware offers comprehensive, cybersecurity and data protection training designed to reduce human risk. From phishing to passwords, social engineering to data handling, your teams learn through engaging modules built for real-world threats.</p>
          <p class="card-link-amp">Fill the form to explore customisation options for your organisation.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 3 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/S-Phish.svg"
              alt="S-Phish"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>S-Phish - Phishing Simulation Platform</h3>
          <p>Need a reliable way to test your organisation's security posture? S-Phish enables you to run realistic phishing simulations, measure vulnerability levels, identify high-risk groups, and track improvements over time. With automated campaigns, templates, reporting dashboards, and behavioural insights, S-Phish becomes your continuous defence mechanism.</p>
          <p class="card-link-amp">Fill out the form to schedule a walkthrough.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 4 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/S-Bytes.svg"
              alt="S-Bytes"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>S-Bytes - 5-Minute Cybersecurity Microlearning</h3>
          <p>Want cybersecurity training that employees actually enjoy? S-Bytes delivers short, story-driven, humorous microlearning videos under five minutes-perfect for busy teams. If you need high-impact learning with high completion rates, share your details and we'll assist.</p>
          <p class="card-link-amp">Share your details and we'll assist.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 5 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/S-Metrics.svg"
              alt="S-Metrics"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>S-Metrics - Security Awareness Analytics Hub</h3>
          <p>Struggling to measure the impact of your awareness program? S-Metrics brings all training, simulation, engagement, and behaviour data into a single dashboard. Track risk reduction, completions, phish-prone users, trends, policy acceptance, and more.</p>
          <p class="card-link-amp">Fill in the form to see S-Metrics in action.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 6 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/S-Play.svg"
              alt="S-Play"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>S-Play - Gamified Cybersecurity Learning</h3>
          <p>Looking for security training that doesn't feel like training? S-Play uses interactive games to help employees practise secure behaviours through challenge-based learning. It transforms complex cyber concepts into fun, competitive, skill-building activities that enhance retention and drive behaviour change.</p>
          <p class="card-link-amp">Share your contact details to explore how gamified learning can boost engagement.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 7 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/S-Signs.svg"
              alt="S-Signs"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>S-Signs - Cybersecurity Poster Library</h3>
          <p>Want ready-to-use visual reminders to reinforce secure behaviour? S-Signs provides a full library of professionally designed posters covering phishing risks, MFA, passwords, device safety, social engineering, clean desk policy, and more.</p>
          <p class="card-link-amp">Fill the form to access the complete poster collection.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 8 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/S-Sync.svg"
              alt="S-Sync"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>S-Sync - Integration Layer for IT, HR & Compliance</h3>
          <p>Need your cybersecurity training ecosystem to work seamlessly with existing systems? S-Sync ensures smooth integration with your LMS, HRIS, identity provider, and compliance workflows.</p>
          <p class="card-link-amp">Share your details to learn about implementation.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 9 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/POSH-Fundamentals.svg"
              alt="POSH Fundamentals"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>POSH Fundamentals India - Anti-Sexual Harassment (India)</h3>
          <p>Looking for POSH training that meets legal requirements and drives real culture change? Our POSH Fundamentals program offers interactive learning, Indian legal compliance, case-based scenarios, IC guidance, and practical insights to help employees create safer workplaces.</p>
          <p class="card-link-amp">Fill out the form for details.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 10 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Harassment-Prevention-USA.svg"
              alt="Harassment Prevention USA"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Harassment Prevention USA - Anti-Harassment Training (U.S.)</h3>
          <p>Need a compliant, engaging harassment-prevention program for U.S. workplaces? This course covers federal and state laws, protected classes, acceptable behaviour, retaliation, reporting, and real scenarios tailored for American teams.</p>
          <p class="card-link-amp">Submit your information and we'll guide you with deployment options for your workforce.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 11 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Code-of-Conduct.svg"
              alt="Code of Conduct"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Code of Conduct Training</h3>
          <p>Looking to implement organisation-wide ethical behaviour? Our Code of Conduct program covers conflicts of interest, gifts, anti-bribery, confidentiality, insider trading, social media, data protection, and more. It transforms policies into practical, everyday decisions employees can apply.</p>
          <p class="card-link-amp">Fill in the form.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 12 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Information-Security.svg"
              alt="Information Security"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Information Security / DPDP / GDPR Awareness</h3>
          <p>Need training that prepares employees for global data protection regulations? Our program simplifies Information Security, GDPR principles, data handling rules, privacy rights, and breach prevention. With clear, relatable examples and sector-specific risks, your teams build strong compliance habits.</p>
          <p class="card-link-amp">Share your contact details for customised deployment options.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 13 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Anti-Bribery-Corruption.svg"
              alt="Anti-Bribery & Corruption"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Anti-Bribery & Corruption (ABC)</h3>
          <p>Worried about bribery risks, third-party interactions, or ethical lapses? Our ABC training explains bribery red flags, facilitation payments, hospitality risks, conflicts, reporting duties, and global enforcement scenarios.</p>
          <p class="card-link-amp">Fill out the form to strengthen your organisation's anti-corruption framework.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 14 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Gift-Hospitality-Training.svg"
              alt="Gift & Hospitality"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Gift & Hospitality Training</h3>
          <p>Need clarity on acceptable gifts and hospitality? This training explains thresholds, approvals, conflict situations, vendor relationships, cultural considerations, and high-risk scenarios employees often face. It helps prevent reputational and regulatory harm by ensuring transparent decision-making.</p>
          <p class="card-link-amp">Share your information to explore customisable content for your policies.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 15 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Anti-Trust-Fair-Competition.svg"
              alt="Anti-Trust & Fair Competition"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Anti-Trust & Fair Competition</h3>
          <p>Looking to protect your organisation from competition law violations? This course explains anti-competitive behaviour, price-fixing risks, market dominance, bid rigging, and collusive practices with global case studies. It prepares employees to identify and avoid illegal conduct.</p>
          <p class="card-link-amp">Fill out the form to implement a practical, business-friendly training solution.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 16 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Business-Continuity.svg"
              alt="Business Continuity"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Business Continuity (BCMS)</h3>
          <p>Need better preparedness for operational disruptions? Our BCMS training covers crisis response, risk assessment, incident communication, recovery planning, and maintaining critical services during unexpected events. It helps employees understand their role in organisational resilience.</p>
          <p class="card-link-amp">Submit your details and our team will support your rollout plan.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 17 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/AML-CFT-KYC-Compliance-Training.svg"
              alt="AML / CFT / KYC"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>AML / CFT / KYC Compliance Training</h3>
          <p>Looking to strengthen financial crime compliance? This program explains money laundering stages, red flags, KYC procedures, suspicious transaction indicators, reporting obligations, and preventative controls. Ideal for banks, fintech, NBFCs, and regulated sectors.</p>
          <p class="card-link-amp">Fill in the form for a tailored AML/CFT/KYC learning solution.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 18 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Insider-Trading-Awareness.svg"
              alt="Insider Trading Awareness"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Insider Trading Awareness</h3>
          <p>Want employees to understand and avoid insider trading violations? This training clarifies material non-public information, trading windows, disclosure rules, prohibited conduct, and corporate responsibilities. It protects both individuals and the organisation from severe penalties.</p>
          <p class="card-link-amp">Share your information for customised insider-trading compliance modules.</p>
        </div>
      </div>
    </div>

    <!-- SLIDE 19 -->
    <div class="carousel-slide-amp">
      <div class="contact-card-amp">
        <div class="card-icon-amp">
          <div class="icon-wrapper-amp">
            <amp-img
              src="https://succeedlearn.com/wp-content/uploads/2026/01/Equal-Opportunity-DEI-Training.svg"
              alt="Equal Opportunity & DEI"
              width="28"
              height="28"
              layout="fixed"
            ></amp-img>
          </div>
        </div>
        <div class="card-inner-amp">
          <h3>Equal Opportunity & DEI Training</h3>
          <p>Looking to build a respectful, inclusive workplace? Our DEI training covers unconscious bias, inclusive communication, equal opportunity obligations, cultural sensitivity, and intervention techniques. It strengthens employee awareness and supports healthier team dynamics.</p>
          <p class="card-link-amp">Fill out the form to deploy DEI programs that shift behaviours and perspectives.</p>
        </div>
      </div>
    </div>

  </amp-carousel>
</section>	
	
  <!-- ✅ Footer -->
  <?php include(plugin_dir_path(__FILE__) . 'footer.php'); ?>
</main>
</body>

</html>