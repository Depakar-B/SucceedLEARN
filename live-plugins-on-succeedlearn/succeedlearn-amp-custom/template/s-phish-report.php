<!doctype html>
<html amp lang="en">
<head>
  <meta charset="utf-8">
  <title>S-PhishReport | Phishing Incident Reporting & Awareness Tool </title>
  <link rel="canonical" href="https://succeedlearn.com/s-phish-report/">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

  <!-- AMP Scripts -->
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>

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
	
  <style amp-custom>
    <?php
    include('style.php');
    ?>
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
	

<?php include(plugin_dir_path(__FILE__) . 'amp-cookie-consent.php'); ?>
  <!-- ✅ AMP Sidebar/Menu -->
  <?php include(plugin_dir_path(__FILE__) . 'menu.php'); ?>
<main id="main-content">
	
<!-- Banner section -->
 <section class="banner" aria-label="s-phishreport banner">
 </section>
	
<!-- ===== Privacy Policy Section ===== -->
<section class="privacy-policy-section">

<div class="pp-container">

        <!-- Box 1 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">1. Introduction</h3>
            <p class="pp-desc">
               This Privacy Policy and Terms of Use govern your use of the S-PhishReport Google Add-On, provided by Succeed Technologies Pvt Ltd. (“we”, “our”, “us”). By installing and using the Add-On, you agree to be bound by the terms outlined in this Policy. The Add-On is designed to assist users in reporting phishing emails within Gmail™ in a streamlined and efficient manner, enhancing organizational security efforts while also facilitating phishing awareness training. All operations of the Add-On are executed within Google’s secure infrastructure (Gmail™ and Drive™). 
            </p>
        </div>

        <!-- Box 2 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">2. Overview</h3>
            <p class="pp-desc">
                S-PhishReport is a Google add-on designed to simplify the process of reporting phishing attempts directly from Gmail™. When a user clicks the S-PhishReport Gmail™ Add-on button, the add-on checks the headers of the email that is currently open. If the header indicates that the message is part of a phishing simulation (identified by the X-ST-PST: SucceedTech marker), the email is automatically forwarded to the training mailbox for simulation tracking. If the header is not present, the email is treated as a real phishing report and is forwarded to the security mailbox. This process ensures that simulated and real phishing reports are accurately separated and handled correctly. 
            </p>
        </div>

        <!-- Box 3 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">3. Key Features</h3>
            <ul class="pp-list">
                <li><b>One-click phishing reporting: </b>Users can report the currently opened email with a single click. The add-on simply initiates the report action without requiring any additional user steps. </li>
                <li><b>Simulation awareness: </b>The add-on identifies simulated phishing emails using the simulation header configured by the administrator, ensuring that training emails are kept separate from real phishing reports. </li>
                <li><b>Preserves evidence: </b>All reported emails are forwarded in their original format as .eml files, to preserve evidence for investigation and compliance purposes.</li>
                <li><b>Admin-configurable actions:</b> Once the S-PhishReport add-on is installed, administrators must configure three items: the destination mailbox for training reports, the destination mailbox for security reports, and, if required, the simulation-header key and value that will be used to identify simulated phishing emails. These settings enable the add-on to correctly distinguish and route reported messages. </li>
                <li><b>Domain-wide deployment:</b> The Add-On can be deployed across an entire Workspace domain, ensuring that individual consent prompts are bypassed, simplifying deployment for administrators. </li>
            </ul>
        </div>
	
	        <!-- Box 4 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">4. Permissions and Scopes</h3>
			<p class="pp-desc"><b>S-PhishReport requests a few permissions, and here’s why each one is needed: </b></p>
            <ul class="pp-list">
                <li><b>See, edit, create, and delete only the specific Google Drive files you use with this app:</b> This lets the add-on create a temporary copy of the reported email in a secure format, stored only in its own private Drive space. </li>
                <li><b>View your email messages when the add-on is running:</b> This allows the add-on to read only the email you are reporting so it can capture the full message, attachments, and headers. </li>
                <li><b>Run as a Gmail add-on:</b> This permission enables S-PhishReport to appear inside Gmail™ and operate directly from your inbox. 
</li>
                <li><b>Send email on your behalf:</b> This allows the add-on to forward the reported message to the security or training mailbox from your account, ensuring authenticity. 
</li>
                <li><b>Read, compose, and send emails from your Gmail account:</b> This lets the add-on prepare the outgoing report email, attach the suspicious message, and send it securely. 
</li>
                <li><b>Allow this application to run when you are not present:</b> This lets the add-on finish the report in the background. If the email is over 25 MB or Google times out, it will still create the Drive file and send the report even after you close Gmail™. 
</li>
            </ul>
        </div>
	
	        <!-- Box 5 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">5. Data Privacy and Security</h3>
			<p class="pp-desc">We are committed to protecting the privacy and security of your data. The Add-On is designed to minimize the amount of personal and sensitive information it accesses. Here is an overview of our data privacy practices: </p>
            <ul class="pp-list">
                <li><b>Minimal Data Access:</b> The Add-On accesses only the currently open email message to extract headers and relevant information. No other emails or data within your Gmail™ account are accessed. </li>
                <li><b>Forwarding Emails:</b> Reported emails are forwarded as .eml attachments, preserving the full message content, including headers, for investigation purposes. </li>
                <li><b>Data Storage:</b> If a reported message exceeds Gmail’s™ attachment size limit, the Add-On securely stores the .eml file in the reporter’s Google Drive™ and shares a link with the configured mailbox as per admin policy. All processing occurs within Google’s environment and follows organization-defined security configurations. 
</li>
                <li><b>Data Processing Transparency:</b> The Add-On accesses subject lines, headers (including simulation identifiers), message IDs, and raw message content only to generate the .eml file. Reporter identity (verified Google email) and admin-defined configurations are processed securely within Google Apps Script properties. No message content is stored externally. 
</li>
            </ul>
        </div>
	
	        <!-- Box 6 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">6. Admin Configuration and Deployment</h3>
            <p class="pp-desc">S-PhishReport can be privately deployed across your organization’s Google Workspace™ domain, providing users with a seamless experience without individual consent prompts. The Add-On integrates smoothly with existing phishing simulation tools, allowing administrators to configure Gmail™ compliance rules to safelist simulation emails and prevent them from being misclassified as real phishing threats. Administrators can also customize reporting mailboxes for phishing and simulated reports and specify post-report actions. Administrators retain complete control over configuration, including reporting destinations and retention settings. The Add-On’s configuration data, such as mailbox destinations and post-report policies, is securely stored in Google Apps Script properties under the organization’s domain and can be modified or deleted at any time by the administrator. </p>
        </div>
	
		        <!-- Box 7 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">7. Use of Data </h3>
            <p class="pp-desc">We do not sell, share, or transfer any personal data to third parties. All data processed through the Add-On remains under your organization’s control and is used solely for phishing detection, reporting, and phishing simulation tracking. Our organization is ISO 27001 and SOC 2 Type II certified, reflecting our commitment to maintaining the highest standards of data security, privacy, and operational integrity. All Add-On operations occur entirely within Google’s infrastructure, ensuring that data remains encrypted in transit and protected by Google’s security controls. </p>
        </div>
	
		        <!-- Box 8 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">8. Changes to This Policy </h3>
            <p class="pp-desc">We may update this Privacy Policy from time to time. Any changes will be reflected in the updated version of the Policy, and users are encouraged to review it periodically to stay informed about how we manage data and maintain the Add-On’s features.</p>
        </div>
	
		        <!-- Box 9 -->
        <div class="privacy-policy-box">
            <h3 class="pp-subtitle">9. Disclaimer</h3>
            <p class="pp-desc">S-PhishReport is an independent software product and is not endorsed by Google LLC. The Add-On is provided “as is.” It supports phishing awareness and reporting within Gmail™ and operates with industry best practices to ensure reliability and security. Its effectiveness also depends on user vigilance and adherence to organizational security training. In the event of any security incident affecting Add-On processing, Succeed Technologies will notify affected administrators promptly and cooperate as required by applicable data protection regulations. 

</p>
        </div>
	
	

    </div>
</section>


  <!-- ✅ Footer -->
  <?php include(plugin_dir_path(__FILE__) . 'footer.php'); ?>
	</main>
</body>

</html>