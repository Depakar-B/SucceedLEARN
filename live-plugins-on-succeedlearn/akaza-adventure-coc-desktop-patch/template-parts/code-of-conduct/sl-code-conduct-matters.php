<?php
/**
 * Code of Conduct — Why It Matters section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$matters_scenarios = array(
	__( 'Should an employee accept a gift from a supplier?', 'akaza-adventure' ),
	__( 'What happens when a close relative applies for a position?', 'akaza-adventure' ),
	__( 'Can confidential company information be entered into a public AI tool?', 'akaza-adventure' ),
	__( 'Should an employee respond to a customer complaint on social media?', 'akaza-adventure' ),
	__( 'What should someone do when they suspect misconduct but are not certain?', 'akaza-adventure' ),
);

$matters_image = '2026/09/Why-It-Matters.webp';
// Image export: 1200 x 640 px (2x). Displays at ~600 x 320 px in the 45/55 layout.
?>

<section class="sl-code-conduct-matters" aria-labelledby="sl-code-conduct-matters-title">
	<div class="container">

		<div class="sl-code-conduct-matters__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why It Matters', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-code-conduct-matters-title">
				<?php
				echo wp_kses(
					__( 'Why Code of Conduct Training <span>Matters</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<h3 class="sl-code-conduct-matters__lead">
				<?php
				esc_html_e(
					'Employees make decisions every day that can affect colleagues, customers, business partners and the reputation of the organization.',
					'akaza-adventure'
				);
				?>
			</h3>
		</div>

		<div class="sl-code-conduct-matters__layout">

			<div class="sl-code-conduct-matters__media">
				<img
					src="<?php echo esc_url( akaza_upload_url( $matters_image ) ); ?>"
					alt="<?php esc_attr_e( 'Professional considering workplace ethics scenarios including gifts, collaboration, data use, and reporting concerns', 'akaza-adventure' ); ?>"
					width="600"
					height="320"
					loading="lazy"
					decoding="async"
				/>
			</div>

			<div class="sl-code-conduct-matters__content">

				<p class="sl-code-conduct-matters__intro">
					<?php esc_html_e( 'Some decisions are obvious. Others are not.', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-code-conduct-matters__list">
					<?php foreach ( $matters_scenarios as $index => $scenario ) : ?>
						<li class="sl-code-conduct-matters__list-item">
							<span class="sl-code-conduct-matters__list-index" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>
							<p class="sl-code-conduct-matters__question">
								<?php echo esc_html( $scenario ); ?>
							</p>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

		</div>

		<div class="sl-code-conduct-matters__gap" aria-labelledby="sl-code-conduct-matters-gap-title">
			<div class="sl-code-conduct-matters__gap-inner">
				<div class="sl-code-conduct-matters__gap-copy">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Practical Decision-Making', 'akaza-adventure' ); ?>
					</span>

					<h3 id="sl-code-conduct-matters-gap-title">
						<?php esc_html_e( 'The Policy–Practice Gap', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'The challenge is often not the absence of a policy. It is the gap between knowing what the policy says and applying it when real workplace situations arise.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<div class="sl-code-conduct-matters__gap-highlight">
					<p class="sl-code-conduct-matters__gap-lead">
						<?php esc_html_e( 'Employees need practical guidance, not just policy documents.', 'akaza-adventure' ); ?>
					</p>
				</div>
			</div>
		</div>

	</div>
</section>
