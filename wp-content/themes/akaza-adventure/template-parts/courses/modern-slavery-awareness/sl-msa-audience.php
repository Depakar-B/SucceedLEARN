<?php
/**
 * Modern Slavery Awareness — Target audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_image = '';
$audiences      = array(
	__( 'Employees who need basic modern slavery awareness.', 'akaza-adventure' ),
	__( 'Employees who may encounter third-party workers or vendors.', 'akaza-adventure' ),
	__( 'Procurement and vendor-selection colleagues.', 'akaza-adventure' ),
	__( 'Employees who may need to raise or escalate concerns.', 'akaza-adventure' ),
);
?>

<section id="audience" class="msa-section msa-section--grey" aria-labelledby="msa-audience-title">
	<div class="msa-container msa-audience">

		<?php if ( $audience_image ) : ?>
			<div class="msa-visual-holder msa-visual-holder--image">
				<img
					src="<?php echo esc_url( $audience_image ); ?>"
					alt="<?php esc_attr_e( 'UK employees, compliance or procurement colleagues discussing workplace and supplier risk', 'akaza-adventure' ); ?>"
					loading="lazy"
					decoding="async"
				>
			</div>
		<?php else : ?>
			<div class="msa-visual-holder">
				<div>
					<strong><?php esc_html_e( 'Workplace learning image holder', 'akaza-adventure' ); ?></strong>
					<p><?php esc_html_e( 'Suggested visual: UK employees, compliance or procurement colleagues discussing workplace and supplier risk.', 'akaza-adventure' ); ?></p>
				</div>
			</div>
		<?php endif; ?>

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Target Audience', 'akaza-adventure' ); ?></span>
			<h2 id="msa-audience-title">
				<?php esc_html_e( 'Who Should Take Modern Slavery Awareness Training', 'akaza-adventure' ); ?>
				<span class="msa-highlight"><?php esc_html_e( 'in a UK Organisation?', 'akaza-adventure' ); ?></span>
			</h2>
			<p>
				<?php esc_html_e( 'The course is suitable for employees who need practical awareness of modern slavery and guidance on how to respond when something does not seem right.', 'akaza-adventure' ); ?>
			</p>
			<ul class="msa-check-list">
				<?php foreach ( $audiences as $audience ) : ?>
					<li><?php echo esc_html( $audience ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

	</div>
</section>
