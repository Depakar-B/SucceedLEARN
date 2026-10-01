<?php
/**
 * Financial Crime Prevention — CPD certification section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cpd_benefits = array(
	__( 'Structured professional learning', 'akaza-adventure' ),
	__( 'Evidence of completed development', 'akaza-adventure' ),
	__( 'Independently reviewed learning activity', 'akaza-adventure' ),
);
?>
<section
	id="cpd"
	class="sl-fcp-section sl-fcp-section--grey sl-fcp-cpd"
	aria-labelledby="sl-fcp-cpd-title"
>
	<div class="container sl-fcp-cpd__layout">

		<div class="sl-fcp-cpd__badge" aria-hidden="true">
			<strong>CPD</strong>
			<span><?php esc_html_e( 'Certified Learning', 'akaza-adventure' ); ?></span>
		</div>

		<div>
			<p class="sl-fcp-eyebrow">
				<?php esc_html_e( 'Continuing Professional Development', 'akaza-adventure' ); ?>
			</p>

			<h2 id="sl-fcp-cpd-title">
				<?php esc_html_e( 'CPD-Certified Financial Crime Prevention Courses', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-fcp-lead">
				<?php esc_html_e( 'CPD stands for Continuing Professional Development. It describes structured learning undertaken by professionals to develop and maintain their knowledge and abilities.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'SucceedLEARN’s Financial Crime Prevention courses are CPD certified, supporting compliance awareness and ongoing professional development.', 'akaza-adventure' ); ?>
			</p>

			<ul class="sl-fcp-cpd__pills">
				<?php foreach ( $cpd_benefits as $benefit ) : ?>
					<li><?php echo esc_html( $benefit ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

	</div>
</section>
