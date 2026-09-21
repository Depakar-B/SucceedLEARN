<?php
/**
 * GDPR Employee Awareness Training - Trust and compliance.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gdpr_clients = function_exists( 'succeedlearn_amp_get_gdpr_clients' )
	? succeedlearn_amp_get_gdpr_clients()
	: array();

$gdpr_standards = function_exists( 'succeedlearn_amp_get_gdpr_standards' )
	? succeedlearn_amp_get_gdpr_standards()
	: array();
?>

<section
	class="sl-section sl-gdpr-trust"
	id="gdpr-trust"
	aria-labelledby="sl-gdpr-trust-title"
>
	<div class="sl-wrap">
		<header class="sl-gdpr-trust__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Trusted and aligned', 'succeedlearn-amp' ); ?>
			</span>

			<h2
				class="sl-h2"
				id="sl-gdpr-trust-title"
			>
				<?php
				echo wp_kses(
					__(
						'Built for organisations where <span>privacy matters.</span>',
						'succeedlearn-amp'
					),
					array(
						'span' => array(),
					)
				);
				?>
			</h2>
		</header>

		<div class="sl-gdpr-trust__layout">
			<section
				class="sl-gdpr-trust__clients"
				aria-labelledby="sl-gdpr-trust-clients-title"
			>
				<header class="sl-gdpr-trust__section-header">
					<span
						class="sl-gdpr-trust__section-icon"
						aria-hidden="true"
					>
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M4 20V10l8-5 8 5v10"></path>
							<path d="M8 20v-6h8v6"></path>
						</svg>
					</span>

					<div class="sl-gdpr-trust__section-heading">
						<h3
							class="sl-panel-title"
							id="sl-gdpr-trust-clients-title"
						>
							<?php
							esc_html_e(
								'Trusted by teams at',
								'succeedlearn-amp'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Organisations choose practical learning to strengthen employee awareness.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</header>

				<div class="sl-gdpr-trust__client-grid">
					<?php foreach ( $gdpr_clients as $client ) : ?>
						<div class="sl-gdpr-trust__client">
							<?php if ( ! empty( $client['url'] ) ) : ?>
								<div class="sl-gdpr-trust__client-logo">
									<amp-img
										src="<?php echo esc_url( $client['url'] ); ?>"
										width="180"
										height="60"
										layout="intrinsic"
										alt="<?php echo esc_attr( sprintf( /* translators: %s: organisation name. */ __( '%s logo', 'succeedlearn-amp' ), $client['name'] ) ); ?>"
									></amp-img>
								</div>
							<?php else : ?>
								<span class="sl-gdpr-trust__client-placeholder">
									<?php echo esc_html( $client['name'] ); ?>
								</span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</section>

			<section
				class="sl-gdpr-trust__standards"
				aria-labelledby="sl-gdpr-trust-standards-title"
			>
				<header class="sl-gdpr-trust__section-header">
					<span
						class="sl-gdpr-trust__section-icon"
						aria-hidden="true"
					>
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M12 3l7 3v5.5c0 4.7-2.9 8.9-7 9.5-4.1-.6-7-4.8-7-9.5V6l7-3Z"></path>
							<path d="m9 12 2 2 4-4"></path>
						</svg>
					</span>

					<div class="sl-gdpr-trust__section-heading">
						<h3
							class="sl-panel-title"
							id="sl-gdpr-trust-standards-title"
						>
							<?php
							esc_html_e(
								'Aligned with recognised frameworks',
								'succeedlearn-amp'
							);
							?>
						</h3>

						<p>
							<?php
							esc_html_e(
								'Training supports privacy, security and compliance awareness.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</header>

				<ul class="sl-list sl-gdpr-trust__standard-list">
					<?php foreach ( $gdpr_standards as $standard ) : ?>
						<li class="sl-list-item sl-gdpr-trust__standard">
							<span
								class="sl-gdpr-trust__standard-check"
								aria-hidden="true"
							>
								✓
							</span>

							<strong class="sl-gdpr-trust__standard-title">
								<?php echo esc_html( $standard['title'] ); ?>
							</strong>

							<span class="sl-gdpr-trust__standard-text">
								<?php echo esc_html( $standard['text'] ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
		</div>
	</div>
</section>