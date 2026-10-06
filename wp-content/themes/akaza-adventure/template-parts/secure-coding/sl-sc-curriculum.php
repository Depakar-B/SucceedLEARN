<?php
/**
 * Secure Coding — Curriculum / topics.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = array(
	array(
		'title' => __( 'From SDLC to Secure SDLC', 'akaza-adventure' ),
		'text'  => __( 'Shift-left thinking, security responsibilities throughout development, and why early decisions shape downstream risk.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'CIA triad & security design mindset', 'akaza-adventure' ),
		'text'  => __( 'Confidentiality, integrity and availability as practical design lenses — plus secure defaults and defence in depth.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Input validation, encoding & injection prevention', 'akaza-adventure' ),
		'text'  => __( 'Trust boundaries, allow-list validation, output encoding, parameterised operations and safe handling of untrusted data.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Authentication, sessions & access control', 'akaza-adventure' ),
		'text'  => __( 'Deny-by-default thinking, least privilege, consistent authorisation checks and safer session handling.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Cryptography, secrets & sensitive data', 'akaza-adventure' ),
		'text'  => __( 'Use established cryptographic libraries, protect keys and secrets, minimise sensitive-data exposure and avoid hard-coded credentials.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Errors, exceptions, logging & alerting', 'akaza-adventure' ),
		'text'  => __( 'Fail safely, avoid information leakage, record meaningful security events and design logs that support investigation without exposing secrets.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Secure configuration & software supply chain', 'akaza-adventure' ),
		'text'  => __( 'Dependencies, packages, build artefacts, configuration choices and why third-party components are part of the application’s attack surface.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Review, testing & continuous improvement', 'akaza-adventure' ),
		'text'  => __( 'Use code review, automated checks, secure testing and recurring feedback to verify assumptions and prevent repeat weaknesses.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-sc-curriculum" id="curriculum" aria-labelledby="sl-sc-curriculum-title">
	<div class="container">

		<div class="sl-sc-curriculum__grid">

			<div class="sl-sc-curriculum__intro">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course coverage', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-sc-curriculum-title">
					<?php esc_html_e( 'Practical secure coding topics for modern development teams', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'The content connects secure-development principles with the points in a developer’s workflow where security decisions actually happen.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-sc-curriculum__code" aria-label="<?php esc_attr_e( 'Secure coding example', 'akaza-adventure' ); ?>">
					<div class="sl-sc-curriculum__code-label">
						<?php esc_html_e( 'Simple pattern shift', 'akaza-adventure' ); ?>
					</div>
					<pre><span class="sl-sc-curriculum__code-bad"><?php esc_html_e( 'Avoid: building a query from raw user input', 'akaza-adventure' ); ?></span>
query("... WHERE email='" + email + "'")

<span class="sl-sc-curriculum__code-good"><?php esc_html_e( 'Prefer: parameterised queries + validated input', 'akaza-adventure' ); ?></span>
query("... WHERE email = ?", [email])</pre>
				</div>
			</div>

			<div class="sl-sc-curriculum__topics">
				<?php foreach ( $topics as $index => $topic ) : ?>
					<article class="sl-sc-curriculum__topic">
						<div class="sl-sc-curriculum__num">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</div>
						<div>
							<h3 class="sl-panel-title"><?php echo esc_html( $topic['title'] ); ?></h3>
							<p><?php echo esc_html( $topic['text'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

		</div>

	</div>
</section>
