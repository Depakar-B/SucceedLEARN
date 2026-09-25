<?php
/**
 * SMCR Training — UK Regulatory Context.
 *
 * Card UI mirrors AML PE/VC due-diligence stack.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$regulators = array(
	array(
		'code'        => 'FCA',
		'title'       => __( 'Financial Conduct Authority', 'akaza-adventure' ),
		'subtitle'    => __( 'Regulator', 'akaza-adventure' ),
		'text'        => __( 'The Employees course explains that SMCR was introduced by the FCA to strengthen conduct standards and individual accountability.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/FCA_SMCR.webp',
		'image_label' => __( 'Image Space — FCA', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: FCA regulatory oversight and SMCR accountability.', 'akaza-adventure' ),
		'image_alt'   => __( 'FCA regulatory oversight and SMCR accountability', 'akaza-adventure' ),
		'reverse'     => false,
	),
	array(
		'code'        => 'COCON',
		'title'       => __( 'Code of Conduct Sourcebook — COCON', 'akaza-adventure' ),
		'subtitle'    => __( 'Sourcebook', 'akaza-adventure' ),
		'text'        => __( 'The Employees course identifies COCON as the sourcebook containing the Conduct Rules covered in the training.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/COCON_SMCR.webp',
		'image_label' => __( 'Image Space — COCON', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: Conduct Rules sourcebook and workplace standards.', 'akaza-adventure' ),
		'image_alt'   => __( 'COCON Conduct Rules sourcebook and workplace standards', 'akaza-adventure' ),
		'reverse'     => true,
	),
	array(
		'code'        => 'PRA',
		'title'       => __( 'Prudential Regulation Authority', 'akaza-adventure' ),
		'subtitle'    => __( 'Prudential Regulation', 'akaza-adventure' ),
		'text'        => __( 'The Senior Managers course also refers to PRA responsibilities in the context of Senior Manager regulatory obligations.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/PRA_SMCR.webp',
		'image_label' => __( 'Image Space — PRA', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: PRA responsibilities for Senior Managers.', 'akaza-adventure' ),
		'image_alt'   => __( 'PRA responsibilities for Senior Managers', 'akaza-adventure' ),
		'reverse'     => false,
	),
);
?>

<section
	id="uk-regulatory-context"
	class="sl-smcr-regulatory-context"
	aria-labelledby="sl-smcr-regulatory-context-title"
>
	<div class="container">

		<div class="sl-smcr-regulatory-context__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'UK Regulatory Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-smcr-regulatory-context-title">
				<?php esc_html_e( 'UK SMCR Training: FCA Conduct Rules, COCON and PRA', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Responsibilities', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-smcr-regulatory-context__stack">
			<?php foreach ( $regulators as $regulator ) : ?>
				<?php
				$card_mod  = ! empty( $regulator['reverse'] )
					? ' sl-smcr-regulatory-context__card--reverse'
					: '';
				$has_image = ! empty( $regulator['image_url'] );
				?>
				<article class="sl-smcr-regulatory-context__card<?php echo esc_attr( $card_mod ); ?>">

					<?php if ( $has_image ) : ?>
						<div class="sl-smcr-regulatory-context__media sl-smcr-regulatory-context__media--photo">
							<img
								src="<?php echo esc_url( $regulator['image_url'] ); ?>"
								alt="<?php echo esc_attr( $regulator['image_alt'] ); ?>"
								loading="lazy"
								decoding="async"
							>
						</div>
					<?php else : ?>
						<div
							class="sl-smcr-regulatory-context__media"
							role="img"
							aria-label="<?php echo esc_attr( $regulator['image_label'] ); ?>"
						>
							<span class="sl-smcr-regulatory-context__icon" aria-hidden="true">
								<?php echo esc_html( $regulator['code'] ); ?>
							</span>
							<strong><?php echo esc_html( $regulator['image_label'] ); ?></strong>
							<span><?php echo esc_html( $regulator['image_hint'] ); ?></span>
						</div>
					<?php endif; ?>

					<div class="sl-smcr-regulatory-context__content">
						<span class="sl-smcr-regulatory-context__code">
							<?php echo esc_html( $regulator['code'] ); ?>
						</span>

						<h3><?php echo esc_html( $regulator['title'] ); ?></h3>

						<span class="sl-smcr-regulatory-context__name">
							<?php echo esc_html( $regulator['subtitle'] ); ?>
						</span>

						<p><?php echo esc_html( $regulator['text'] ); ?></p>
					</div>

				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
