<?php
/**
 * Whistleblowing Training — Legal & Regulatory Context.
 *
 * Layout mirrors AML PE/VC due-diligence cards.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$frameworks = array(
	array(
		'code'        => 'UK',
		'title'       => __( 'UK whistleblowing framework', 'akaza-adventure' ),
		'subtitle'    => __( 'Key UK laws and regulatory channels introduced in the course', 'akaza-adventure' ),
		'items'       => array(
			__( 'Employment Rights Act 1996 protected-disclosure framework', 'akaza-adventure' ),
			__( 'Public Interest Disclosure Act 1998 (PIDA)', 'akaza-adventure' ),
			__( 'FCA SYSC 18 whistleblowing framework', 'akaza-adventure' ),
			__( 'FCA and PRA as relevant external regulatory channels in the course material', 'akaza-adventure' ),
		),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/uk_whistleblowing_law-1.webp',
		'image_label' => __( 'Image Space — UK', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: UK legal and regulatory whistleblowing framework.', 'akaza-adventure' ),
		'image_alt'   => __( 'UK whistleblowing legal and regulatory framework', 'akaza-adventure' ),
		'reverse'     => true,
	),
	array(
		'code'        => 'US',
		'title'       => __( 'US whistleblower protections introduced', 'akaza-adventure' ),
		'subtitle'    => __( 'Selected US legislation referenced in the learning material', 'akaza-adventure' ),
		'items'       => array(
			__( 'Sarbanes-Oxley Act', 'akaza-adventure' ),
			__( 'Dodd-Frank Act', 'akaza-adventure' ),
			__( 'False Claims Act', 'akaza-adventure' ),
		),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/us_whistleblower_protection.webp',
		'image_label' => __( 'Image Space — US', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: US whistleblower protection legislation.', 'akaza-adventure' ),
		'image_alt'   => __( 'US whistleblower protection legislation', 'akaza-adventure' ),
		'reverse'     => false,
	),
);
?>

<section
	id="legal-regulatory-context"
	class="sl-whistleblowing-regulatory"
	aria-labelledby="sl-whistleblowing-regulatory-title"
>
	<div class="container">

		<div class="sl-whistleblowing-regulatory__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Legal & Regulatory Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-regulatory-title">
				<?php esc_html_e( 'Which UK and US Whistleblowing Laws Does the Course', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Cover?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course introduces the main legal frameworks included in the learning material while keeping the focus on practical awareness.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-regulatory__stack">
			<?php foreach ( $frameworks as $framework ) : ?>
				<?php
				$card_mod = ! empty( $framework['reverse'] )
					? ' sl-whistleblowing-regulatory__card--reverse'
					: '';
				$has_image = ! empty( $framework['image_url'] );
				?>
				<article class="sl-whistleblowing-regulatory__card<?php echo esc_attr( $card_mod ); ?>">

					<?php if ( $has_image ) : ?>
						<div class="sl-whistleblowing-regulatory__media sl-whistleblowing-regulatory__media--photo">
							<img
								src="<?php echo esc_url( $framework['image_url'] ); ?>"
								alt="<?php echo esc_attr( $framework['image_alt'] ); ?>"
								loading="lazy"
								decoding="async"
							>
						</div>
					<?php else : ?>
						<div
							class="sl-whistleblowing-regulatory__media"
							role="img"
							aria-label="<?php echo esc_attr( $framework['image_alt'] ); ?>"
						>
							<span class="sl-whistleblowing-regulatory__icon" aria-hidden="true">
								<?php echo esc_html( $framework['code'] ); ?>
							</span>
							<strong><?php echo esc_html( $framework['image_label'] ); ?></strong>
							<span><?php echo esc_html( $framework['image_hint'] ); ?></span>
						</div>
					<?php endif; ?>

					<div class="sl-whistleblowing-regulatory__content">
						<span class="sl-whistleblowing-regulatory__code">
							<?php echo esc_html( $framework['code'] ); ?>
						</span>

						<h3><?php echo esc_html( $framework['title'] ); ?></h3>

						<span class="sl-whistleblowing-regulatory__name">
							<?php echo esc_html( $framework['subtitle'] ); ?>
						</span>

						<ul class="sl-whistleblowing-regulatory__list">
							<?php foreach ( $framework['items'] as $item ) : ?>
								<li>
									<span class="sl-whistleblowing-regulatory__item">
										<?php echo esc_html( $item ); ?>
									</span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-whistleblowing-regulatory__notice">
			<span class="sl-whistleblowing-regulatory__notice-label">
				<?php esc_html_e( 'Important', 'akaza-adventure' ); ?>
			</span>

			<p>
				<?php esc_html_e( 'The precise requirements applying to an organisation depend on jurisdiction, regulatory status and circumstances. This course is awareness training and should be used alongside current internal policies and appropriate legal or compliance advice.', 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>
