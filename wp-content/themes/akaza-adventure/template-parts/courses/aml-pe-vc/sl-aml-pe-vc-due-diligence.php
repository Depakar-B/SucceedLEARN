<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — Due Diligence / Financial Crime Concepts
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$concepts = array(
	array(
		'code'        => 'CDD',
		'title'       => __( 'Customer Due Diligence', 'akaza-adventure' ),
		'subtitle'    => __( 'Understanding the relationship and its risk', 'akaza-adventure' ),
		'text'        => __( 'CDD goes beyond identity checks to understand ownership, business purpose, source of funds and the nature of the relationship. It helps determine whether the customer or investment presents standard or higher financial crime risk.', 'akaza-adventure' ),
		'image_label' => __( 'Image Space — CDD', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: due diligence checklist, investor profile or ownership and source-of-funds review.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/CDD_image.webp',
		'image_alt'   => __( 'Customer Due Diligence checklist and investor review', 'akaza-adventure' ),
		'accent'      => 'blue',
	),
	array(
		'code'        => 'EDD',
		'title'       => __( 'Enhanced Due Diligence', 'akaza-adventure' ),
		'subtitle'    => __( 'Deeper checks for higher-risk relationships', 'akaza-adventure' ),
		'text'        => __( 'EDD applies deeper scrutiny where higher risks are identified, such as PEP exposure, opaque ownership structures or connections to high-risk jurisdictions. Reviews can include source of wealth, source of funds, UBO transparency and additional supporting evidence.', 'akaza-adventure' ),
		'image_label' => __( 'Image Space — EDD', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: enhanced verification, complex ownership structure or high-risk investor review.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/EDD_image.webp',
		'image_alt'   => __( 'Enhanced Due Diligence high-risk investor review', 'akaza-adventure' ),
		'accent'      => 'blue',
	),
	array(
		'code'        => 'CFT',
		'title'       => __( 'Combating the Financing of Terrorism', 'akaza-adventure' ),
		'subtitle'    => __( 'Preventing funds from supporting terrorist activity', 'akaza-adventure' ),
		'text'        => __( 'CFT focuses on identifying and preventing funds or financial services from being used to support terrorist activity. Learners consider why unusual transactions, counterparties and fund flows may require further scrutiny and escalation.', 'akaza-adventure' ),
		'image_label' => __( 'Image Space — CFT', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: suspicious fund flows, transaction monitoring or terrorist-financing prevention.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/CFT_image.webp',
		'image_alt'   => __( 'Combating the Financing of Terrorism monitoring and prevention', 'akaza-adventure' ),
		'accent'      => 'blue',
	),
	array(
		'code'        => 'CPF',
		'title'       => __( 'Counter Proliferation Financing', 'akaza-adventure' ),
		'subtitle'    => __( 'Preventing financing linked to weapons proliferation', 'akaza-adventure' ),
		'text'        => __( 'CPF focuses on preventing financing connected to the proliferation of weapons of mass destruction. In investment contexts, relevant risks can involve sanctioned parties, high-risk jurisdictions or businesses connected to dual-use technologies.', 'akaza-adventure' ),
		'image_label' => __( 'Image Space — CPF', 'akaza-adventure' ),
		'image_hint'  => __( 'Suggested visual: global sanctions, dual-use technology or proliferation-financing risk.', 'akaza-adventure' ),
		'image_url'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/CPF_image.webp',
		'image_alt'   => __( 'Counter Proliferation Financing risk awareness', 'akaza-adventure' ),
		'accent'      => 'blue',
	),
);
?>

<section
	class="sl-aml-pe-vc-due-diligence"
	aria-labelledby="sl-aml-pe-vc-due-diligence-title"
>
	<div class="container">

		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Risk-Based Financial Crime Awareness', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-aml-pe-vc-due-diligence-title">
			<?php
			echo wp_kses_post(
				__(
					'From Investor Due Diligence to <span>Wider Financial Crime Risk</span>',
					'akaza-adventure'
				)
			);
			?>
		</h2>

		<p class="sl-aml-pe-vc-due-diligence__intro">
			<?php
			esc_html_e(
				'Understand five core concepts that help investment professionals identify who they are dealing with, apply the right level of due diligence and recognise wider financial crime risks.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-aml-pe-vc-due-diligence__stack">
			<?php foreach ( $concepts as $concept ) : ?>
				<?php
				$is_orange = ( 'orange' === $concept['accent'] );
				$card_mod  = $is_orange ? ' sl-aml-pe-vc-due-diligence__card--orange' : '';
				$code_mod  = $is_orange ? ' sl-aml-pe-vc-due-diligence__code--orange' : '';
				$media_mod = $is_orange ? ' sl-aml-pe-vc-due-diligence__media--orange' : '';
				$name_mod  = $is_orange ? ' sl-aml-pe-vc-due-diligence__fullname--orange' : '';
				?>
				<article class="sl-aml-pe-vc-due-diligence__card<?php echo esc_attr( $card_mod ); ?>">

					<?php if ( ! empty( $concept['image_url'] ) ) : ?>
						<div class="sl-aml-pe-vc-due-diligence__media sl-aml-pe-vc-due-diligence__media--photo<?php echo esc_attr( $media_mod ); ?>">
							<img
								src="<?php echo esc_url( $concept['image_url'] ); ?>"
								alt="<?php echo esc_attr( $concept['image_alt'] ? $concept['image_alt'] : $concept['title'] ); ?>"
								loading="lazy"
								decoding="async"
							>
						</div>
					<?php else : ?>
						<div class="sl-aml-pe-vc-due-diligence__media<?php echo esc_attr( $media_mod ); ?>">
							<span class="sl-aml-pe-vc-due-diligence__icon" aria-hidden="true">
								<?php echo esc_html( $concept['code'] ); ?>
							</span>
							<strong><?php echo esc_html( $concept['image_label'] ); ?></strong>
							<span><?php echo esc_html( $concept['image_hint'] ); ?></span>
						</div>
					<?php endif; ?>

					<div class="sl-aml-pe-vc-due-diligence__content">
						<span class="sl-aml-pe-vc-due-diligence__code<?php echo esc_attr( $code_mod ); ?>">
							<?php echo esc_html( $concept['code'] ); ?>
						</span>
						<h3><?php echo esc_html( $concept['title'] ); ?></h3>
						<span class="sl-aml-pe-vc-due-diligence__fullname<?php echo esc_attr( $name_mod ); ?>">
							<?php echo esc_html( $concept['subtitle'] ); ?>
						</span>
						<p><?php echo esc_html( $concept['text'] ); ?></p>
					</div>

				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
