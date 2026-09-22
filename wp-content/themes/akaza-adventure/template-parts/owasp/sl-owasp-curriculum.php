<?php
/**
 * OWASP — Curriculum / Top 10 modules.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = array(
	array(
		'id'       => 'a01',
		'code'     => 'A01',
		'title'    => __( 'Broken Access Control', 'akaza-adventure' ),
		'body'     => __( 'Understand what happens when applications fail to correctly enforce <strong>who is allowed to access what</strong>. Learners explore authentication versus authorisation, least privilege, server-side permission checks, IDOR, request manipulation, forced browsing and access-control models.', 'akaza-adventure' ),
		'takeaway' => __( 'Being authenticated does not automatically mean a user is authorised to access every resource or perform every action.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a02',
		'code'     => 'A02',
		'title'    => __( 'Security Misconfiguration', 'akaza-adventure' ),
		'body'     => __( 'Even securely written applications can become vulnerable when systems, services or environments are incorrectly configured. Explore insecure defaults, unnecessary services, exposed administrative functionality, directory listing, verbose production errors, cloud configuration, excessive permissions, security headers and configuration hardening.', 'akaza-adventure' ),
		'takeaway' => __( 'Application security depends on secure configuration as well as secure code.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a03',
		'code'     => 'A03',
		'title'    => __( 'Software Supply Chain Failures', 'akaza-adventure' ),
		'body'     => __( 'Modern applications rely heavily on third-party libraries, packages, frameworks, repositories and automated development processes. Learners explore direct and transitive dependencies, outdated or vulnerable components, malicious packages, compromised software updates, dependency visibility, SBOM, Software Composition Analysis, trusted software sources, patching and supply-chain risk reduction.', 'akaza-adventure' ),
		'takeaway' => __( 'Know what enters your software and manage the trust you place in external components and development systems.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a04',
		'code'     => 'A04',
		'title'    => __( 'Cryptographic Failures', 'akaza-adventure' ),
		'body'     => __( 'Sensitive information needs protection throughout its lifecycle. This module explores sensitive-data classification, password protection, hashing versus encryption, salting, encryption at rest, encryption in transit, TLS, HSTS, cryptographic key protection and data minimisation.', 'akaza-adventure' ),
		'takeaway' => __( 'Encryption alone is not enough. Cryptography must be selected, implemented and managed correctly.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a05',
		'code'     => 'A05',
		'title'    => __( 'Injection', 'akaza-adventure' ),
		'body'     => __( 'Injection occurs when applications fail to keep <strong>untrusted data separate from executable instructions</strong>. Learners explore SQL, NoSQL, OS Command, LDAP, XPath, header-related injection, Cross-Site Scripting and other interpreter-based attacks. Preventive concepts include parameterised queries, safe APIs, allow-list validation, secure input handling, contextual output encoding and separation of data from executable commands.', 'akaza-adventure' ),
		'takeaway' => __( 'Treat untrusted input as data — never as executable instructions.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a06',
		'code'     => 'A06',
		'title'    => __( 'Insecure Design', 'akaza-adventure' ),
		'body'     => __( 'Some vulnerabilities begin before the first line of code is written. Learners explore how insecure architecture, workflows and business logic can create security weaknesses even when the software behaves exactly as designed. Topics include Secure SDLC, shift-left security, threat modelling, misuse and abuse cases, secure design principles, business-logic risks and resource abuse.', 'akaza-adventure' ),
		'takeaway' => __( 'Security cannot always be patched into an application later. It must be considered during requirements and design.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a07',
		'code'     => 'A07',
		'title'    => __( 'Authentication Failures', 'akaza-adventure' ),
		'body'     => __( 'Authentication answers a fundamental security question: <strong>“Is this user really who they claim to be?”</strong> Learners explore credential stuffing, brute-force attacks, weak or compromised passwords, phishing, multi-factor authentication, secure login behaviour, session management, secure session identifiers, logout and session invalidation, and trusted authentication frameworks.', 'akaza-adventure' ),
		'takeaway' => __( 'Strong authentication requires secure credentials, secure login processes and secure session management.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a08',
		'code'     => 'A08',
		'title'    => __( 'Software or Data Integrity Failures', 'akaza-adventure' ),
		'body'     => __( 'Applications frequently receive software, updates, files, build artifacts and data from systems they do not fully control. Learners explore trust boundaries, software authenticity, cryptographic hashes, digital signatures, certificate validation, CI/CD artifact verification, trusted repositories, integrity validation and insecure deserialisation.', 'akaza-adventure' ),
		'takeaway' => __( 'Verify before trusting or executing software and data.', 'akaza-adventure' ),
	),
	array(
		'id'       => 'a09',
		'code'     => 'A09',
		'title'    => __( 'Security Logging and Alerting Failures', 'akaza-adventure' ),
		'body'     => __( 'Security events cannot be investigated or stopped effectively if nobody knows they are happening. Learners explore what should be logged, how logs should be protected, what should never appear in logs, how suspicious activity is detected, why alert fatigue matters, and why alerts need defined ownership and response playbooks.', 'akaza-adventure' ),
		'takeaway' => __( 'Logging is only useful when it leads to meaningful detection, alerting and response.', 'akaza-adventure' ),
		'flow'     => array(
			__( 'Log', 'akaza-adventure' ),
			__( 'Protect', 'akaza-adventure' ),
			__( 'Monitor', 'akaza-adventure' ),
			__( 'Alert', 'akaza-adventure' ),
			__( 'Respond', 'akaza-adventure' ),
		),
	),
	array(
		'id'       => 'a10',
		'code'     => 'A10',
		'title'    => __( 'Mishandling of Exceptional Conditions', 'akaza-adventure' ),
		'body'     => __( 'Applications will eventually encounter errors, timeouts, failed transactions and unexpected inputs. Learners explore fail-safe and fail-closed behaviour, transaction rollback, safe error messages, centralised exception handling, monitoring repeated errors, rate limiting, resource controls, input validation and maintaining safe system states during failures.', 'akaza-adventure' ),
		'takeaway' => __( 'Applications should remain secure and predictable even when something goes wrong.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-owasp-curriculum" id="course-content" aria-labelledby="sl-owasp-curriculum-title">
	<div class="container">

		<div class="sl-owasp-curriculum__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course content', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-owasp-curriculum-title">
				<?php
				echo wp_kses(
					__( 'Explore the <span>OWASP Top 10:2025</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p>
				<?php esc_html_e( 'Ten core application-security risk categories, explained through practical developer-focused learning.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-owasp-curriculum__layout">

			<nav class="sl-owasp-curriculum__nav" aria-label="<?php esc_attr_e( 'OWASP Top 10 course modules', 'akaza-adventure' ); ?>" data-owasp-curriculum-nav>
				<?php foreach ( $modules as $module ) : ?>
					<a href="#<?php echo esc_attr( $module['id'] ); ?>">
						<span><?php echo esc_html( $module['code'] ); ?></span>
						<?php echo esc_html( $module['title'] ); ?>
					</a>
				<?php endforeach; ?>
			</nav>

			<div class="sl-owasp-curriculum__content">
				<?php foreach ( $modules as $module ) : ?>
					<article class="sl-owasp-curriculum__module" id="<?php echo esc_attr( $module['id'] ); ?>">
						<div class="sl-owasp-curriculum__code"><?php echo esc_html( $module['code'] ); ?></div>
						<div>
							<h3 class="sl-panel-title"><?php echo esc_html( $module['title'] ); ?></h3>
							<p>
								<?php
								echo wp_kses(
									$module['body'],
									array( 'strong' => array() )
								);
								?>
							</p>
							<?php if ( ! empty( $module['flow'] ) ) : ?>
								<div class="sl-owasp-curriculum__flow" aria-label="<?php esc_attr_e( 'Security visibility process', 'akaza-adventure' ); ?>">
									<?php foreach ( $module['flow'] as $index => $step ) : ?>
										<?php if ( $index > 0 ) : ?>
											<b aria-hidden="true">→</b>
										<?php endif; ?>
										<span><?php echo esc_html( $step ); ?></span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<p class="sl-owasp-curriculum__takeaway">
								<strong><?php esc_html_e( 'Key takeaway:', 'akaza-adventure' ); ?></strong>
								<?php echo esc_html( $module['takeaway'] ); ?>
							</p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
