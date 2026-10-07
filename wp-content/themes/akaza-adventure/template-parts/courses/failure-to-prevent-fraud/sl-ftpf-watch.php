<?php
/**
 * Failure to Prevent Fraud — Know what to watch for.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$warning_signs = array(
	array(
		'title' => __( 'Incomplete or inconsistent information', 'akaza-adventure' ),
		'text'  => __( 'Figures, explanations or supporting information do not align, or change without a clear reason.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Over-reliance on a single source', 'akaza-adventure' ),
		'text'  => __( 'Important decisions or communications depend on information that has not been independently corroborated.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Lack of transparency or resistance to questions', 'akaza-adventure' ),
		'text'  => __( 'Someone avoids reasonable scrutiny, becomes defensive or discourages further review.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Unethical or suspicious behaviour', 'akaza-adventure' ),
		'text'  => __( 'Conduct appears inconsistent with expected standards, processes or organisational values.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Missing documentation or weak audit trails', 'akaza-adventure' ),
		'text'  => __( 'Important decisions, adjustments or transactions lack appropriate records or supporting documentation.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Uncertainty about whether something is right', 'akaza-adventure' ),
		'text'  => __( 'Information, instructions or behaviour feels unusual, unclear or inconsistent with normal expectations.', 'akaza-adventure' ),
	),
);
?>

<section id="warning-signs" class="ftpf-section ftpf-section--white ftpf-watch" aria-labelledby="ftpf-watch-title">
	<div class="ftpf-container">

		<div class="ftpf-section-heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Identifying Fraud Risk', 'akaza-adventure' ); ?></span>
			<h2 id="ftpf-watch-title">
				<?php esc_html_e( 'Recognising Fraud Risk - know', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'what to watch for', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Fraud risk does not always start with an obvious act of misconduct. Learners should be alert to warning signs in information, behaviour and business processes.', 'akaza-adventure' ); ?></p>
		</div>

		<div class="ftpf-watch__grid">
			<?php foreach ( $warning_signs as $index => $sign ) : ?>
				<article class="ftpf-watch__item">
					<span class="ftpf-watch__number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<div>
						<h3><?php echo esc_html( $sign['title'] ); ?></h3>
						<p><?php echo esc_html( $sign['text'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
