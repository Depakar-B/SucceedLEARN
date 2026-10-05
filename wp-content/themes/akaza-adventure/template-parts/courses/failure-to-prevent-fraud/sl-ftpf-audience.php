<?php
/**
 * Failure to Prevent Fraud — Target audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	__( 'Investment & Deal Teams', 'akaza-adventure' ),
	__( 'Finance, Accounting & Fund Operations', 'akaza-adventure' ),
	__( 'Business Operations providing external reporting', 'akaza-adventure' ),
	__( 'Sales, Distribution & Investor Relations', 'akaza-adventure' ),
	__( 'Procurement & Third-Party/Vendor Management', 'akaza-adventure' ),
);
?>

<section id="audience" class="ftpf-section ftpf-section--grey ftpf-audience" aria-labelledby="ftpf-audience-title">
	<div class="ftpf-container ftpf-audience__grid">

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Who Should Take This Course?', 'akaza-adventure' ); ?></span>
			<h2 id="ftpf-audience-title">
				<?php esc_html_e( 'Fraud prevention involves', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'people across the organisation', 'akaza-adventure' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'The course reinforces that preventing and identifying fraud risk is not limited to senior management or control functions.', 'akaza-adventure' ); ?></p>
			<p><?php esc_html_e( 'It is especially relevant where employees prepare, review, communicate or rely upon information that can influence investors, financial records, external reporting, suppliers or commercial decisions.', 'akaza-adventure' ); ?></p>
		</div>

		<ul class="ftpf-audience__list">
			<?php foreach ( $audiences as $index => $audience ) : ?>
				<li>
					<span class="ftpf-audience__number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<?php echo esc_html( $audience ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
