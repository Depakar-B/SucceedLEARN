<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * UK and US Legal Context Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$laws = array(
	array(
		'code'        => 'UK',
		'label'       => __( 'United Kingdom', 'akaza-adventure' ),
		'title'       => __( 'UK Bribery Act 2010', 'akaza-adventure' ),
		'text'        => __( 'The course references the UK Bribery Act 2010 when explaining bribery risks, gifts and hospitality, foreign public officials and organisational anti-bribery controls.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/uk_regulatory_law.webp',
		'image_alt'   => __( 'UK Bribery Act 2010 gifts and hospitality compliance', 'akaza-adventure' ),
		'image_label' => __( 'Image Space — UK Bribery Act', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: UK anti-bribery controls, gifts and hospitality review.', 'akaza-adventure' ),
	),
	array(
		'code'        => 'US',
		'label'       => __( 'United States', 'akaza-adventure' ),
		'title'       => __( 'U.S. Foreign Corrupt Practices Act', 'akaza-adventure' ),
		'text'        => __( 'The course references the FCPA in the context of interactions with foreign government officials and risks involving gifts, travel, entertainment and other things of value.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/us_pay_to_play_rules.webp',
		'image_alt'   => __( 'U.S. FCPA foreign government official interactions', 'akaza-adventure' ),
		'image_label' => __( 'Image Space — FCPA', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: foreign official interactions, travel and entertainment risk.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-gifts-entertainment-legal-context"
	aria-labelledby="sl-gifts-entertainment-legal-context-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-legal-context__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'UK and US Legal Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-gifts-entertainment-legal-context-title">
				<?php
				echo wp_kses_post(
					__(
						'UK Bribery Act and FCPA <span>Gifts and Entertainment Compliance</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course places gifts and entertainment decisions within anti-bribery and anti-corruption frameworks relevant to UK and US business environments.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-gifts-entertainment-legal-context__stack">
			<?php foreach ( $laws as $law ) : ?>
				<article class="sl-gifts-entertainment-legal-context__card">

					<?php if ( ! empty( $law['image_url'] ) ) : ?>
						<div class="sl-gifts-entertainment-legal-context__media sl-gifts-entertainment-legal-context__media--photo">
							<img
								src="<?php echo esc_url( $law['image_url'] ); ?>"
								alt="<?php echo esc_attr( $law['image_alt'] ); ?>"
								loading="lazy"
								decoding="async"
							>
						</div>
					<?php else : ?>
						<div class="sl-gifts-entertainment-legal-context__media">
							<span class="sl-gifts-entertainment-legal-context__icon" aria-hidden="true">
								<?php echo esc_html( $law['code'] ); ?>
							</span>
							<strong><?php echo esc_html( $law['image_label'] ); ?></strong>
							<span><?php echo esc_html( $law['image_hint'] ); ?></span>
						</div>
					<?php endif; ?>

					<div class="sl-gifts-entertainment-legal-context__content">
						<span class="sl-gifts-entertainment-legal-context__code">
							<?php echo esc_html( $law['code'] ); ?>
						</span>
						<h3><?php echo esc_html( $law['title'] ); ?></h3>
						<span class="sl-gifts-entertainment-legal-context__fullname">
							<?php echo esc_html( $law['label'] ); ?>
						</span>
						<p><?php echo esc_html( $law['text'] ); ?></p>
					</div>

				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-gifts-entertainment-legal-context__highlight">

			<p>
				<strong>
					<?php esc_html_e( 'Business gifts and hospitality require context.', 'akaza-adventure' ); ?>
				</strong>
			</p>

			<p>
				<?php
				esc_html_e(
					'Purpose, value, timing, recipient, transparency, applicable law and organisational policy should all be considered when assessing an activity.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

	</div>
</section>
