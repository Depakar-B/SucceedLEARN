<?php
/**
 * S-Aware — Designed for the Teams Driving Security Culture
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = array(
	array(
		'title'       => __( 'Information Security & Cybersecurity Teams', 'akaza-adventure' ),
		'description' => __( 'Build employee understanding of cyber threats and reinforce the behaviours that support the organisation\'s wider security strategy.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Compliance & Risk Teams', 'akaza-adventure' ),
		'description' => __( 'Deliver structured awareness programmes that can support relevant internal, regulatory and framework-based training requirements.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Learning & Development Teams', 'akaza-adventure' ),
		'description' => __( 'Provide employees with engaging and measurable learning experiences that can be incorporated into broader organisational learning programmes.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'HR & People Teams', 'akaza-adventure' ),
		'description' => __( 'Introduce security awareness during onboarding and reinforce employees\' responsibilities throughout their lifecycle within the organisation.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Leadership', 'akaza-adventure' ),
		'description' => __( 'Gain greater visibility into awareness initiatives and demonstrate organisational commitment to developing a stronger security culture.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-saware-security-teams"
	aria-labelledby="sl-saware-security-teams-title"
>
	<div class="container">

		<div class="sl-saware-security-teams__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Supporting Security Culture Across the Organisation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-saware-security-teams-title">
				<?php esc_html_e( 'Designed for the Teams Driving', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'akaza-adventure' ); ?></span>
			</h2>

			<div class="sl-saware-security-teams__intro">
				<p>
					<?php esc_html_e( 'Building a security-aware workforce often requires collaboration across multiple organisational functions.', 'akaza-adventure' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'S-Aware provides a common learning foundation that helps these teams support their respective security awareness objectives.', 'akaza-adventure' ); ?>
				</p>
			</div>

		</div>

		<div class="sl-saware-security-teams__grid">

			<?php foreach ( $team_groups as $index => $team_group ) : ?>

				<article class="sl-saware-security-teams__card">

					<div class="sl-saware-security-teams__card-title">
						<span class="sl-saware-security-teams__number" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<h3 class="sl-panel-title">
							<?php echo esc_html( $team_group['title'] ); ?>
						</h3>
					</div>

					<p>
						<?php echo esc_html( $team_group['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
