<?php
/**
 * DPDPA Compliance Training AMP - Trusted organisations.
 *
 * Expected data helper:
 * succeedlearn_amp_dpdpa_trusted_logos()
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$dpdpa_logos = function_exists( 'succeedlearn_amp_dpdpa_trusted_logos' )
	? succeedlearn_amp_dpdpa_trusted_logos()
	: array();
?>

<section
	class="sl-section sl-section--alt sl-dpdpa-trusted"
	aria-labelledby="sl-dpdpa-trusted-title"
>
	<div class="sl-wrap">

		<header class="sl-dpdpa-trusted__heading">
			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Trusted by organisations',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				id="sl-dpdpa-trusted-title"
				class="sl-h2"
			>
				<?php
				esc_html_e(
					'Trusted by teams that take ',
					'succeedlearn-amp'
				);
				?>

				<span>
					<?php
					esc_html_e(
						'privacy seriously.',
						'succeedlearn-amp'
					);
					?>
				</span>
			</h2>

			<p class="sl-lead">
				<?php
				esc_html_e(
					'Organisations across industries use SucceedLEARN to build practical privacy awareness and demonstrate completion.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</header>

		<div class="sl-dpdpa-trusted__logos">
			<div class="sl-dpdpa-trusted__logo-grid">
				<?php foreach ( $dpdpa_logos as $logo ) : ?>
					<div class="sl-dpdpa-trusted__logo">
						<?php if ( ! empty( $logo['url'] ) ) : ?>
							<div class="sl-dpdpa-trusted__logo-image">
								<amp-img
									src="<?php echo esc_url( $logo['url'] ); ?>"
									width="180"
									height="60"
									layout="intrinsic"
									alt="<?php echo esc_attr( sprintf( /* translators: %s: organisation name. */ __( '%s logo', 'succeedlearn-amp' ), $logo['name'] ) ); ?>"
								></amp-img>
							</div>
						<?php else : ?>
							<span class="sl-dpdpa-trusted__logo-placeholder">
								<?php echo esc_html( $logo['name'] ); ?>
							</span>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<ul
			class="sl-list sl-dpdpa-trusted__proof"
			aria-label="<?php esc_attr_e( 'SucceedLEARN trust indicators', 'succeedlearn-amp' ); ?>"
		>
			<li class="sl-list-item sl-dpdpa-trusted__proof-item">
				<span class="sl-dpdpa-trusted__proof-number">
					<?php esc_html_e( '900+', 'succeedlearn-amp' ); ?>
				</span>

				<span class="sl-dpdpa-trusted__proof-content">
					<?php esc_html_e( 'organisations', 'succeedlearn-amp' ); ?>
				</span>
			</li>

			<li class="sl-list-item sl-dpdpa-trusted__proof-item">
				<span
					class="sl-dpdpa-trusted__proof-icon"
					aria-hidden="true"
				>
					<svg viewBox="0 0 24 24" focusable="false">
						<path d="M12 3.5 19 6v5.5c0 4.5-2.9 7.7-7 9-4.1-1.3-7-4.5-7-9V6l7-2.5Z" />
						<path d="m8.8 12 2.1 2.1 4.4-4.5" />
					</svg>
				</span>

				<span class="sl-dpdpa-trusted__proof-content">
					<?php esc_html_e( 'ISO 27001:2022', 'succeedlearn-amp' ); ?>
				</span>
			</li>

			<li class="sl-list-item sl-dpdpa-trusted__proof-item">
				<span
					class="sl-dpdpa-trusted__proof-icon"
					aria-hidden="true"
				>
					<svg viewBox="0 0 24 24" focusable="false">
						<path d="M5 5.5h14v13H5z" />
						<path d="M8.5 9.5h7M8.5 13h4.5" />
					</svg>
				</span>

				<span class="sl-dpdpa-trusted__proof-content">
					<?php esc_html_e( 'SOC 2', 'succeedlearn-amp' ); ?>
				</span>
			</li>
		</ul>

	</div>
</section>