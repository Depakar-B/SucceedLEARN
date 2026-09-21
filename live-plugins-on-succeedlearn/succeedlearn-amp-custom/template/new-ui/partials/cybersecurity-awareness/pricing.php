<?php
/**
 * Cybersecurity Awareness AMP — Pricing section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bands    = succeedlearn_amp_csa_pricing_bands();
$included = array(
	array(
		'text'      => __( 'Comprehensive security awareness training', 'succeedlearn-amp' ),
		'highlight' => false,
	),
	array(
		'text'      => __( 'Up to 10 phishing simulation emails per user', 'succeedlearn-amp' ),
		'highlight' => false,
	),
	array(
		'text'      => __( 'Access to 300+ phishing templates', 'succeedlearn-amp' ),
		'highlight' => false,
	),
	array(
		'text'      => __( 'PhishCue reported-email workflow', 'succeedlearn-amp' ),
		'highlight' => false,
	),
	array(
		'text'      => __( 'Standard Microsoft 365 implementation support', 'succeedlearn-amp' ),
		'highlight' => false,
	),
	array(
		'text'      => __( 'SSO and SCIM integration', 'succeedlearn-amp' ),
		'highlight' => false,
	),
	array(
		'text'      => __( 'Campaign dashboard and outcome report', 'succeedlearn-amp' ),
		'highlight' => false,
	),
	array(
		'text'      => __( '50% discount for the first-year extension', 'succeedlearn-amp' ),
		'highlight' => true,
	),
);
?>
<section class="sl-section sl-section--alt sl-csa-pricing" id="pricing" aria-labelledby="sl-csa-pricing-title">
	<div class="sl-wrap">
		<header class="sl-csa-section-heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Fixed October Campaign Fee', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-csa-pricing-title" class="sl-h2">
				<?php echo wp_kses_post( __( 'Clear pricing for teams <span>of every size</span>', 'succeedlearn-amp' ) ); ?>
			</h2>
			<p class="sl-lead">
				<?php esc_html_e( 'One domain. One fixed campaign fee. No additional per-user charge within your selected employee band.', 'succeedlearn-amp' ); ?>
			</p>
		</header>

		<div class="sl-csa-pricing__grid">
			<?php foreach ( $bands as $band ) : ?>
				<article class="sl-csa-pricing__card<?php echo ! empty( $band['featured'] ) ? ' sl-csa-pricing__card--featured' : ''; ?>">
					<?php if ( ! empty( $band['featured'] ) ) : ?>
						<span class="sl-csa-pricing__badge">
							<?php
							echo esc_html(
								succeedlearn_amp_csa_is_uk()
									? __( 'October Offer', 'succeedlearn-amp' )
									: __( 'Best for most organisations', 'succeedlearn-amp' )
							);
							?>
						</span>
					<?php endif; ?>
					<div class="sl-csa-pricing__head">
						<span aria-hidden="true">▥</span>
						<h3><?php echo esc_html( $band['users'] ); ?></h3>
					</div>
					<strong class="sl-csa-pricing__price"><?php echo esc_html( $band['price'] ); ?></strong>
					<p><?php esc_html_e( 'Fixed campaign price', 'succeedlearn-amp' ); ?></p>
					<a
						class="sl-btn sl-btn--primary"
						href="<?php echo esc_url( $band['stripe'] ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						data-cta="pricing-offer"
					>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: fixed campaign price, e.g. $50 */
								__( 'Unlock the %s Offer', 'succeedlearn-amp' ),
								$band['price']
							)
						);
						?>
					</a>
				</article>
			<?php endforeach; ?>
		</div>

		<?php
		$why_reasons = array(
			array(
				'title' => __( 'Introducing SucceedLEARN globally', 'succeedlearn-amp' ),
				'text'  => __( 'We want more organisations to experience our comprehensive Security Awareness and Phishing Simulation Programme.', 'succeedlearn-amp' ),
			),
			array(
				'title' => __( 'Experience before expanding', 'succeedlearn-amp' ),
				'text'  => __( 'This offer makes it easy for organisations of every size to evaluate the programme with their employees.', 'succeedlearn-amp' ),
			),
			array(
				'title' => __( 'Built on confidence', 'succeedlearn-amp' ),
				'text'  => __( 'We are confident that once you experience the quality, capabilities and value of SucceedLEARN, you will see how strongly it compares with other solutions in the market.', 'succeedlearn-amp' ),
			),
		);
		?>

		<div class="sl-csa-pricing__why" id="why-this-offer">
			<div class="sl-csa-pricing__why-heading">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Introductory offer', 'succeedlearn-amp' ); ?></span>
				<h3><?php esc_html_e( 'Why is this offer so affordable?', 'succeedlearn-amp' ); ?></h3>
				<p>
					<?php esc_html_e( 'This is a special introductory offer created for Cybersecurity Awareness Month.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-csa-pricing__why-scroll">
				<table class="sl-csa-pricing__why-table">
					<tbody>
						<?php foreach ( $why_reasons as $reason ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $reason['title'] ); ?></th>
								<td><?php echo esc_html( $reason['text'] ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<p class="sl-csa-pricing__why-close">
				<?php esc_html_e( 'Your Cybersecurity Awareness Month Programme. Almost Entirely on Us.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-csa-included">
			<div class="sl-csa-included__heading">
				<span class="sl-home-sub-heading"><?php esc_html_e( 'Included at every level', 'succeedlearn-amp' ); ?></span>
				<h3><?php esc_html_e( 'Everything needed to launch, test and measure', 'succeedlearn-amp' ); ?></h3>
				<p>
					<?php esc_html_e( 'Each pricing band includes the same core campaign capabilities. Only the number of participating users changes.', 'succeedlearn-amp' ); ?>
				</p>
			</div>
			<ol class="sl-csa-included__features">
				<?php foreach ( $included as $feature ) : ?>
					<li class="sl-csa-included__feature<?php echo ! empty( $feature['highlight'] ) ? ' sl-csa-included__feature--highlight' : ''; ?>">
						<?php echo esc_html( $feature['text'] ); ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

		<p class="sl-csa-disclaimer">
			<?php esc_html_e( 'Applicable taxes are additional. Offer is subject to eligibility, campaign terms, technical prerequisites and available onboarding capacity.', 'succeedlearn-amp' ); ?>
		</p>
	</div>
</section>
