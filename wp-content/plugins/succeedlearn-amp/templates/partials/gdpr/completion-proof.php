<?php
/**
 * GDPR Employee Awareness Training - Completion and proof.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$proof_items = function_exists( 'succeedlearn_amp_get_gdpr_completion_proof_items' )
	? succeedlearn_amp_get_gdpr_completion_proof_items()
	: array();
?>

<section
	class="sl-section sl-gdpr-completion-proof"
	aria-labelledby="sl-gdpr-completion-proof-title"
>
	<div class="sl-wrap">
		<div class="sl-gdpr-completion-proof__grid">
			<div class="sl-gdpr-completion-proof__content">
				<header class="sl-gdpr-completion-proof__heading">
					<span class="sl-home-sub-heading">
						<?php
						esc_html_e(
							"Prove It, Don't Just Do It",
							'succeedlearn-amp'
						);
						?>
					</span>

					<h2
						class="sl-h2"
						id="sl-gdpr-completion-proof-title"
					>
						<?php
						echo wp_kses(
							__(
								'Completion You Can Hand to <span>an Auditor or a Customer.</span>',
								'succeedlearn-amp'
							),
							array(
								'span' => array(),
							)
						);
						?>
					</h2>

					<p>
						<?php
						esc_html_e(
							"Every learner produces a dated certificate and a completion record. If a customer's Data Processing Agreement or security questionnaire asks for evidence of trained staff, this is what you attach.",
							'succeedlearn-amp'
						);
						?>
					</p>
				</header>
			</div>

			<article class="sl-gdpr-completion-proof__card">
				<header class="sl-gdpr-completion-proof__card-heading">
					<h3 class="sl-panel-title">
						<?php esc_html_e( 'What You Get', 'succeedlearn-amp' ); ?>
					</h3>

					<p>
						<?php
						esc_html_e(
							'Built for the moment someone asks you to prove it, not just tell them.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</header>

				<ul class="sl-list sl-gdpr-completion-proof__list">
					<?php foreach ( $proof_items as $item ) : ?>
						<li class="sl-list-item">
							<div class="sl-list-item__content">
								<span class="sl-list-item__label">
									<?php echo esc_html( $item['label'] ); ?>
								</span>

								<span class="sl-list-item__text">
									<?php echo esc_html( $item['text'] ); ?>
								</span>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>
	</div>
</section>