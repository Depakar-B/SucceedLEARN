<?php
/**
 * Political Donations Training — Political Activity.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$activities = array(
	__( 'Monetary political contributions', 'akaza-adventure' ),
	__( 'Paid fundraising events', 'akaza-adventure' ),
	__( 'Political sponsorship', 'akaza-adventure' ),
	__( 'Use of company facilities', 'akaza-adventure' ),
	__( 'In-kind services', 'akaza-adventure' ),
	__( 'Professional titles', 'akaza-adventure' ),
	__( 'Organisation branding', 'akaza-adventure' ),
	__( 'Public political endorsements', 'akaza-adventure' ),
);
?>

<section
	class="sl-political-donations-activity"
	aria-labelledby="sl-political-donations-activity-title"
>
	<div class="container">
		<div class="sl-political-donations-activity__grid">

			<div class="sl-political-donations-activity__media">
				<div class="sl-political-donations-activity__image">
					<div class="sl-political-donations-activity__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

			<div class="sl-political-donations-activity__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Political activity', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-political-donations-activity-title">
					<?php esc_html_e( 'What Counts as Political Contributions, In-Kind Support and', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Organisational Endorsement?', 'akaza-adventure' ); ?></span>
				</h2>

				<p class="sl-political-donations-activity__intro">
					<?php esc_html_e( 'Political activity is not limited to direct cash donations. Other forms of support may also need careful consideration depending on the circumstances.', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-list">
					<?php foreach ( $activities as $index => $activity ) : ?>
						<li class="sl-list-item">
							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $activity ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

		</div>
	</div>
</section>