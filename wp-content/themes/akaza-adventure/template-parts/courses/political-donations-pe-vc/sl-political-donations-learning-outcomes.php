<?php
/**
 * Political Donations Training — Learning Outcomes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	array(
		'title' => __( 'Recognise political contribution risk', 'akaza-adventure' ),
		'text'  => __( 'Identify anti-bribery, conflict of interest, regulatory and reputational considerations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Understand different forms of political support', 'akaza-adventure' ),
		'text'  => __( 'Consider financial contributions, sponsorship, fundraising, facilities and in-kind support.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognise professional identity risk', 'akaza-adventure' ),
		'text'  => __( 'Understand how titles, firm names and public visibility can change the compliance context.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Apply internal approval procedures', 'akaza-adventure' ),
		'text'  => __( 'Recognise when escalation, reporting or Compliance input may be appropriate.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-political-donations-learning-outcomes"
	aria-labelledby="sl-political-donations-learning-outcomes-title"
>
	<div class="container">
		<div class="sl-political-donations-learning-outcomes__grid">

			<div class="sl-political-donations-learning-outcomes__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Learning outcomes', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-political-donations-learning-outcomes-title">
					<?php esc_html_e( 'Compliance Training Outcomes for', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Investment Management Teams', 'akaza-adventure' ); ?></span>
				</h2>

				<p class="sl-political-donations-learning-outcomes__intro">
					<?php esc_html_e( 'The course helps learners move from basic awareness to practical decision-making around political activity and professional identity.', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-list">
					<?php foreach ( $outcomes as $index => $outcome ) : ?>
						<li class="sl-list-item">
							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<div class="sl-list-item__text">
								<h3 class="sl-panel-title">
									<?php echo esc_html( $outcome['title'] ); ?>
								</h3>

								<p>
									<?php echo esc_html( $outcome['text'] ); ?>
								</p>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

			<div class="sl-political-donations-learning-outcomes__media">
				<div class="sl-political-donations-learning-outcomes__image">
					<div class="sl-political-donations-learning-outcomes__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>