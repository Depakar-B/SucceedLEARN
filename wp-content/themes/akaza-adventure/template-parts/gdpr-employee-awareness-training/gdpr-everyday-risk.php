<?php
/**
 * SucceedLEARN — GDPR Employee Awareness
 *
 * Section: Why All Employee Training
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gdpr_risks = array(
	array(
		'number' => '01',
		'title'  => 'Everyday Risk',
		'text'   => 'A list exported and kept with no purpose.',
	),
	array(
		'number' => '02',
		'title'  => 'Everyday Risk',
		'text'   => 'The wrong attachment on an outgoing email.',
	),
	array(
		'number' => '03',
		'title'  => 'Everyday Risk',
		'text'   => 'A prospect emailed who never opted in.',
	),
	array(
		'number' => '04',
		'title'  => 'Everyday Risk',
		'text'   => 'A laptop with client data left on a bus.',
	),
);
?>

<section
	class="sl-gdpr-risk"
	id="why-all-employee-training"
	aria-labelledby="sl-gdpr-risk-title"
>

	<div class="container">

		<div class="sl-gdpr-risk__grid">

			<!-- =====================================
			     LEFT CONTENT
			===================================== -->

			<div class="sl-gdpr-risk__content">

				<div class="sl-gdpr-risk__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Why All Employee Training', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-gdpr-risk-title">
						<?php esc_html_e( 'You already know how the', 'akaza-adventure' ); ?>
						<span>
							<?php esc_html_e( 'incident report will read.', 'akaza-adventure' ); ?>
						</span>
					</h2>

				</div>


				<div class="sl-gdpr-risk__content-text">

					<p>
						<?php
						esc_html_e(
							'Someone exported a contact list "just in case." Someone replied all with a spreadsheet still attached. Someone kept CVs from a role that closed two years ago.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'None of them meant harm, and none of them remember any training, if they ever had it.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'When the question comes, from a regulator, a customer\'s security team, or your own board, it is always the same question.',
							'akaza-adventure'
						); ?>
					</p>

					<div class="sl-highlight">
						<p>
							<?php
							esc_html_e(
								'Can you show your people were trained?',
								'akaza-adventure'
							);
							?>
						</p>
					</div>

				</div>

			</div>


			<!-- =====================================
			     RIGHT RISK CARDS
			===================================== -->

			<div class="sl-gdpr-risk__cards">

				<?php foreach ( $gdpr_risks as $risk ) : ?>

					<article class="sl-gdpr-risk__card">

						<div class="sl-gdpr-risk__card-top">

							<span class="sl-gdpr-risk__number">
								<?php echo esc_html( $risk['number'] ); ?>
							</span>

							<span class="sl-gdpr-risk__label">
								<?php echo esc_html( $risk['title'] ); ?>
							</span>

						</div>

						<p class="sl-gdpr-risk__card-text">
							<?php echo esc_html( $risk['text'] ); ?>
						</p>

					</article>

				<?php endforeach; ?>

			</div>

		</div>

	</div>

</section>