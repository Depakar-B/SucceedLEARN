<?php
/**
 * Cybersecurity Awareness Month
 * Pricing Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$csa_pricing_plans = array(
	array(
		'users'    => __( 'Up to 100 users', 'akaza-adventure' ),
		'price'    => '£50',
		'stripe'   => 'https://buy.stripe.com/eVq28t8q8g2V4KRcVG3F60j',
		'featured' => false,
		'icon'     => 'users',
	),
	array(
		'users'    => __( '101–1,000 users', 'akaza-adventure' ),
		'price'    => '£100',
		'stripe'   => 'https://buy.stripe.com/3cIeVf9uc181dhncVG3F60k',
		'featured' => true,
		'icon'     => 'users',
	),
	array(
		'users'    => __( '1,001–5,000 users', 'akaza-adventure' ),
		'price'    => '£500',
		'stripe'   => 'https://buy.stripe.com/5kQ00l49SeYRgtzbRC3F60l',
		'featured' => false,
		'icon'     => 'building',
	),
	array(
		'users'    => __( '5,001–10,000 users', 'akaza-adventure' ),
		'price'    => '£1,000',
		'stripe'   => 'https://buy.stripe.com/6oU4gB6i0dUNgtzcVG3F60m',
		'featured' => false,
		'icon'     => 'bars',
	),
);
?>

<section
    class="sl-cybersecurity-awareness-pricing"
    id="pricing"
    aria-labelledby="sl-cybersecurity-awareness-pricing-title"
>
    <div class="container">

        <!-- Section Heading -->
        <div class="sl-cybersecurity-awareness-pricing__heading">

            <span class="sl-home-sub-heading">
                <?php esc_html_e( 'Fixed October Campaign Fee', 'akaza-adventure' ); ?>
            </span>

            <h2 id="sl-cybersecurity-awareness-pricing-title">
                <?php
                echo wp_kses(
                    __( 'Clear pricing for teams <span>of every size</span>', 'akaza-adventure' ),
                    array( 'span' => array() )
                );
                ?>
            </h2>

            <p>
                <?php esc_html_e(
                    'One domain. One fixed campaign fee. No additional per-user charge within your selected employee band.',
                    'akaza-adventure'
                ); ?>
            </p>

        </div>


        <!-- Pricing Plans -->
        <div class="sl-cybersecurity-awareness-pricing__plans">

			<?php foreach ( $csa_pricing_plans as $plan ) : ?>
				<article class="sl-cybersecurity-awareness-pricing__card<?php echo ! empty( $plan['featured'] ) ? ' sl-cybersecurity-awareness-pricing__card--featured' : ''; ?>">

					<?php if ( ! empty( $plan['featured'] ) ) : ?>
						<span class="sl-cybersecurity-awareness-pricing__badge">
							<?php esc_html_e( 'October Offer', 'akaza-adventure' ); ?>
						</span>
					<?php endif; ?>

					<div class="sl-cybersecurity-awareness-pricing__card-head">

						<span
							class="sl-cybersecurity-awareness-pricing__icon"
							aria-hidden="true"
						>
							<?php if ( 'building' === $plan['icon'] ) : ?>
								<svg viewBox="0 0 24 24" fill="none">
									<path d="M3 21h18"/>
									<path d="M6 21V9h5v12"/>
									<path d="M11 21V4h7v17"/>
									<path d="M14 8h1"/>
									<path d="M14 12h1"/>
									<path d="M14 16h1"/>
								</svg>
							<?php elseif ( 'bars' === $plan['icon'] ) : ?>
								<svg viewBox="0 0 24 24" fill="none">
									<path d="M4 20V10"/>
									<path d="M10 20V4"/>
									<path d="M16 20v-7"/>
									<path d="M22 20V7"/>
								</svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" fill="none">
									<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
									<circle cx="9" cy="7" r="4"/>
									<path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
									<path d="M16 3.13a4 4 0 0 1 0 7.75"/>
								</svg>
							<?php endif; ?>
						</span>

						<h3>
							<?php echo esc_html( $plan['users'] ); ?>
						</h3>

					</div>

					<div class="sl-cybersecurity-awareness-pricing__price">
						<?php echo esc_html( $plan['price'] ); ?>
					</div>

					<p class="sl-cybersecurity-awareness-pricing__price-note">
						<?php esc_html_e( 'Fixed campaign price', 'akaza-adventure' ); ?>
					</p>

					<?php
					$stripe_url   = (string) $plan['stripe'];
					$is_external  = 0 === strpos( $stripe_url, 'http' );
					?>
					<a
						href="<?php echo esc_url( $stripe_url ); ?>"
						class="sl-content-btn sl-content-btn-primary"
						<?php if ( $is_external ) : ?>
							target="_blank"
							rel="noopener noreferrer"
						<?php endif; ?>
					>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: fixed campaign price, e.g. $50 */
								__( 'Unlock the %s Offer', 'akaza-adventure' ),
								$plan['price']
							)
						);
						?>

						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14"/>
							<path d="m13 6 6 6-6 6"/>
						</svg>
					</a>

				</article>
			<?php endforeach; ?>

        </div>

		<?php
		$why_reasons = array(
			array(
				'title' => __( 'Introducing SucceedLEARN globally', 'akaza-adventure' ),
				'text'  => __( 'We want more organisations to experience our comprehensive Security Awareness and Phishing Simulation Programme.', 'akaza-adventure' ),
			),
			array(
				'title' => __( 'Experience before expanding', 'akaza-adventure' ),
				'text'  => __( 'This offer makes it easy for organisations of every size to evaluate the programme with their employees.', 'akaza-adventure' ),
			),
			array(
				'title' => __( 'Built on confidence', 'akaza-adventure' ),
				'text'  => __( 'We are confident that once you experience the quality, capabilities and value of SucceedLEARN, you will see how strongly it compares with other solutions on the market.', 'akaza-adventure' ),
			),
		);
		?>

		<div class="sl-cybersecurity-awareness-pricing__why" id="why-this-offer">
			<div class="sl-cybersecurity-awareness-pricing__why-heading">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Introductory Offer', 'akaza-adventure' ); ?>
				</span>
				<h3 id="sl-csa-why-affordable-title">
					<?php esc_html_e( 'Why is this offer so affordable?', 'akaza-adventure' ); ?>
				</h3>
				<p>
					<?php esc_html_e( 'This is a special introductory offer created for Cyber Security Awareness Month.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-cybersecurity-awareness-pricing__why-scroll">
				<table class="sl-cybersecurity-awareness-pricing__why-table">
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

			<p class="sl-cybersecurity-awareness-pricing__why-close">
				<?php esc_html_e( 'Your Cyber Security Awareness Month Programme. Almost Entirely on Us.', 'akaza-adventure' ); ?>
			</p>
		</div>


        <!-- Included at Every Level -->
        <div class="sl-cybersecurity-awareness-pricing__included">

            <div class="sl-cybersecurity-awareness-pricing__included-heading">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'Included at Every Level', 'akaza-adventure' ); ?>
                </span>

                <h3>
                    <?php esc_html_e(
                        'Everything needed to launch, test and measure',
                        'akaza-adventure'
                    ); ?>
                </h3>

                <p>
                    <?php esc_html_e(
                        'Each pricing band includes the same core campaign capabilities; only the number of participating users changes.',
                        'akaza-adventure'
                    ); ?>
                </p>

            </div>


            <?php
            $included_features = array(
                array(
                    'text'      => __( 'Comprehensive security awareness training', 'akaza-adventure' ),
                    'highlight' => false,
                ),
                array(
                    'text'      => __( 'Up to 10 phishing simulation emails per user', 'akaza-adventure' ),
                    'highlight' => false,
                ),
                array(
                    'text'      => __( 'Access to 300+ phishing templates', 'akaza-adventure' ),
                    'highlight' => false,
                ),
                array(
                    'text'      => __( 'PhishCue reported-email workflow', 'akaza-adventure' ),
                    'highlight' => false,
                ),
                array(
                    'text'      => __( 'Standard Microsoft 365 implementation support', 'akaza-adventure' ),
                    'highlight' => false,
                ),
                array(
                    'text'      => __( 'SSO and SCIM integration', 'akaza-adventure' ),
                    'highlight' => false,
                ),
                array(
                    'text'      => __( 'Campaign dashboard and outcome report', 'akaza-adventure' ),
                    'highlight' => false,
                ),
                array(
                    'text'      => __( '50% discount on the first-year extension', 'akaza-adventure' ),
                    'highlight' => true,
                ),
            );
            ?>

            <ol class="sl-cybersecurity-awareness-pricing__features">
                <?php foreach ( $included_features as $feature ) : ?>
                    <li class="sl-cybersecurity-awareness-pricing__feature<?php echo ! empty( $feature['highlight'] ) ? ' sl-cybersecurity-awareness-pricing__feature--highlight' : ''; ?>">
                        <?php echo esc_html( $feature['text'] ); ?>
                    </li>
                <?php endforeach; ?>
            </ol>

        </div>


        <p class="sl-cybersecurity-awareness-pricing__disclaimer">
            <?php esc_html_e(
                'Applicable taxes are additional. Offer is subject to eligibility, campaign terms, technical prerequisites and available onboarding capacity.',
                'akaza-adventure'
            ); ?>
        </p>

    </div>
</section>