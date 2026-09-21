<?php
/**
 * Code of Conduct — Industries.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$industries = array(
	__( 'Government & Public Sector', 'akaza-adventure' ),
	__( 'Banking & Financial Services', 'akaza-adventure' ),
	__( 'Information Technology', 'akaza-adventure' ),
	__( 'Healthcare', 'akaza-adventure' ),
	__( 'Pharmaceuticals', 'akaza-adventure' ),
	__( 'Manufacturing', 'akaza-adventure' ),
	__( 'Retail', 'akaza-adventure' ),
	__( 'Professional Services', 'akaza-adventure' ),
	__( 'Education', 'akaza-adventure' ),
	__( 'Global Enterprises', 'akaza-adventure' ),
);

$industries_image = '2026/09/Industries-COC.webp';
?>

<section class="sl-coc-industries" aria-labelledby="sl-coc-industries-title">
	<div class="container">

		<div class="sl-coc-industries__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Industries', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-industries-title">
				<?php
				echo wp_kses(
					__( 'Code of Conduct Training <span>Across Industries</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<h3>
				<?php esc_html_e( 'Ethical risks differ across industries.', 'akaza-adventure' ); ?>
			</h3>

		</div>

		<div class="sl-coc-industries__main">

			<div class="sl-coc-industries__content">

				<p class="sl-coc-industries__intro">
					<?php esc_html_e( 'SucceedLEARN can adapt training scenarios and examples for organisations operating in:', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-coc-industries__list" aria-label="<?php esc_attr_e( 'Industries covered', 'akaza-adventure' ); ?>">
					<?php foreach ( $industries as $index => $industry ) : ?>
						<li class="sl-coc-industries__item">
							<span class="sl-coc-industries__item-index" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>
							<span class="sl-coc-industries__item-label">
								<?php echo esc_html( $industry ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

			<div class="sl-coc-industries__image">
				<img
					src="<?php echo esc_url( akaza_upload_url( $industries_image ) ); ?>"
					alt="<?php esc_attr_e( 'Code of Conduct training adapted across industries including government, business, technology, healthcare, and education', 'akaza-adventure' ); ?>"
					width="560"
					height="640"
					loading="lazy"
					decoding="async"
				/>
			</div>

		</div>

		<div class="sl-coc-industries__statement">
			<p>
				<?php esc_html_e( 'Industry-specific versions can focus on the ethical risks employees are most likely to encounter in their roles.', 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>
