<?php
/**
 * GDPR Employee Awareness Training - Why all-employee training.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gdpr_risks = function_exists( 'succeedlearn_amp_get_gdpr_risks' )
	? succeedlearn_amp_get_gdpr_risks()
	: array();
?>

<section
	class="sl-section sl-gdpr-risk"
	id="why-all-employee-training"
	aria-labelledby="sl-gdpr-risk-title"
>
	<div class="sl-wrap">
		<header class="sl-gdpr-risk__heading">
			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Why All-Employee Training',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				class="sl-h2"
				id="sl-gdpr-risk-title"
			>
				<?php
				echo wp_kses(
					__(
						'You already know how the <span>incident report will read.</span>',
						'succeedlearn-amp'
					),
					array(
						'span' => array(),
					)
				);
				?>
			</h2>
		</header>

		<div class="sl-gdpr-risk__cards">
			<?php foreach ( $gdpr_risks as $risk ) : ?>
				<article class="sl-gdpr-risk__card">
					<div class="sl-gdpr-risk__card-top">
						<span
							class="sl-gdpr-risk__number"
							aria-hidden="true"
						>
							<?php echo esc_html( $risk['number'] ); ?>
						</span>

						<h3 class="sl-panel-title sl-gdpr-risk__label">
							<?php echo esc_html( $risk['title'] ); ?>
						</h3>
					</div>

					<p class="sl-gdpr-risk__card-text">
						<?php echo esc_html( $risk['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-gdpr-risk__content-text">
			<p>
				<?php
				esc_html_e(
					'Someone exported a contact list "just in case." Someone replied all with a spreadsheet still attached. Someone kept CVs from a role that closed two years ago.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'None of them meant harm, and none of them remember any training, if they ever had it.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					"When the question comes, from a regulator, a customer's security team, or your own board, it is always the same question.",
					'succeedlearn-amp'
				);
				?>
			</p>

			<div class="sl-highlight sl-gdpr-risk__highlight">
				<p>
					<?php
					esc_html_e(
						'Can you show your people were trained?',
						'succeedlearn-amp'
					);
					?>
				</p>
			</div>
		</div>
	</div>
</section>