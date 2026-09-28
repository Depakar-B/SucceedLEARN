<?php
/**
 * S-Bytes — Designed for Teams Driving Security Culture.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sbytes_teams = array(
	array(
		'title' => __( 'Information Security & Cybersecurity Teams', 'akaza-adventure' ),
		'body'  => __(
			'Keep important security risks visible and reinforce employee behaviours between formal training and simulation activities.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Compliance & Risk Teams', 'akaza-adventure' ),
		'body'  => __(
			'Support ongoing awareness initiatives and demonstrate that security communication extends beyond a single annual training event.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Learning & Development Teams', 'akaza-adventure' ),
		'body'  => __(
			'Introduce bite-sized learning into broader employee development programmes without creating unnecessary learning fatigue.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'HR & People Teams', 'akaza-adventure' ),
		'body'  => __(
			'Incorporate regular security awareness into the employee experience and help maintain security messaging throughout the employee lifecycle.',
			'akaza-adventure'
		),
	),
	array(
		'title' => __( 'Leadership', 'akaza-adventure' ),
		'body'  => __(
			'Support a culture in which cybersecurity remains visible and relevant across the organisation throughout the year.',
			'akaza-adventure'
		),
	),
);
?>

<section
	id="teams-driving-security-culture"
	class="sl-sbytes-teams"
	aria-labelledby="sl-sbytes-teams-title"
>
	<div class="container">

		<div class="sl-sbytes-teams__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'For Security Culture Teams', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sbytes-teams-title">
				<?php esc_html_e( 'Designed for the Teams Driving', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Building a strong security culture requires more than sending employees another annual course.', 'akaza-adventure' ); ?>
			</p>
			<p>
				<?php
				esc_html_e(
					'S-Bytes gives the teams responsible for security awareness a practical way to maintain engagement and reinforce key messages throughout the year.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-sbytes-teams__grid">
			<?php foreach ( $sbytes_teams as $item ) : ?>
				<article class="sl-sbytes-teams__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
