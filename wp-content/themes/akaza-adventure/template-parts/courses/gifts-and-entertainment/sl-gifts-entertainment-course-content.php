<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Course Content Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$topics = array(
	array(
		__( 'Gifts, entertainment and hospitality', 'akaza-adventure' ),
		__( 'Merchandise, gift cards, services, personal favours, loans, discounts, meals, event tickets, travel and hospitality.', 'akaza-adventure' ),
	),
	array(
		__( 'Acceptable and unacceptable business courtesies', 'akaza-adventure' ),
		__( 'How purpose, value, timing and transparency affect whether an activity is appropriate.', 'akaza-adventure' ),
	),
	array(
		__( 'Approval, reporting and documentation', 'akaza-adventure' ),
		__( 'The importance of following internal approval and recording requirements.', 'akaza-adventure' ),
	),
	array(
		__( 'Government officials', 'akaza-adventure' ),
		__( 'Higher-risk interactions requiring additional scrutiny.', 'akaza-adventure' ),
	),
	array(
		__( 'Vendors, advisers and negotiations', 'akaza-adventure' ),
		__( 'Risk during bidding, procurement, onboarding, adviser selection and negotiations.', 'akaza-adventure' ),
	),
	array(
		__( 'Travel and accommodation', 'akaza-adventure' ),
		__( 'Reviewing externally offered travel or accommodation before acceptance.', 'akaza-adventure' ),
	),
	array(
		__( 'Cross-cultural gift-giving', 'akaza-adventure' ),
		__( 'Assessing local customs against organisational policy and applicable requirements.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-gifts-entertainment-course-content"
	aria-labelledby="sl-gifts-entertainment-course-content-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-course-content__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Content', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-gifts-entertainment-course-content-title">
				<?php
				echo wp_kses_post(
					__(
						'Gifts and Entertainment Compliance Course <span>Topics for Private Equity and Venture Capital</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The module progresses from the fundamentals of gifts and entertainment to higher-risk interactions, approval processes and PE/VC-specific decision-making.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-gifts-entertainment-course-content__list">

			<?php foreach ( $topics as $index => $topic ) : ?>
				<article class="sl-gifts-entertainment-course-content__item">

					<span
						class="sl-gifts-entertainment-course-content__number"
						aria-hidden="true"
					>
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>

					<div class="sl-gifts-entertainment-course-content__item-content">
						<h3><?php echo esc_html( $topic[0] ); ?></h3>
						<p><?php echo esc_html( $topic[1] ); ?></p>
					</div>

				</article>
			<?php endforeach; ?>

		</div>

	</div>
</section>
