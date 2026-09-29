<?php
/**
 * S-Sync — Designed for Enterprise IT & Security Teams.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team_groups = array(
	array(
		'title' => __( 'IT & Infrastructure Teams', 'akaza-adventure' ),
		'text'  => __( "Connect security awareness with the organisation's broader technology environment while reducing repetitive user administration.", 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Identity & Access Management Teams', 'akaza-adventure' ),
		'text'  => __( 'Support secure learner authentication and user provisioning through relevant identity-management processes.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Information Security & Cybersecurity Teams', 'akaza-adventure' ),
		'text'  => __( 'Deploy awareness programmes across changing workforce populations without relying exclusively on manually maintained user lists.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'HR & People Systems Teams', 'akaza-adventure' ),
		'text'  => __( 'Support synchronisation of relevant workforce information used for learning administration.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Learning & Development Teams', 'akaza-adventure' ),
		'text'  => __( 'Integrate applicable security-awareness content with existing learning environments and organisational workflows.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Compliance & Risk Teams', 'akaza-adventure' ),
		'text'  => __( 'Benefit from more accurate learner populations and structured awareness programme administration.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-sync-enterprise"
	aria-labelledby="sl-s-sync-enterprise-title"
>
	<div class="container">

		<div class="sl-s-sync-enterprise__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Built for Enterprise Teams', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-sync-enterprise-title">
				<?php esc_html_e( 'Designed for Enterprise', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'IT & Security Teams', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-s-sync-enterprise__subtitle">
				<?php esc_html_e( 'Built for the Teams Managing Technology, Identity and Security Awareness', 'akaza-adventure' ); ?>
			</h3>

		</div>

		<div class="sl-s-sync-enterprise__cards">

			<?php foreach ( $team_groups as $team_group ) : ?>

				<article class="sl-s-sync-enterprise__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $team_group['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $team_group['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
