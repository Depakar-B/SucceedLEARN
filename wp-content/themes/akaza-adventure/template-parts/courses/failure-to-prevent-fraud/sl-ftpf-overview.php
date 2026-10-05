<?php
/**
 * Failure to Prevent Fraud — Course overview + at-a-glance panel.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$facts = array(
	__( 'Format', 'akaza-adventure' )             => __( 'eLearning', 'akaza-adventure' ),
	__( 'Category', 'akaza-adventure' )           => __( 'Financial Crime Prevention', 'akaza-adventure' ),
	__( 'Regulatory context', 'akaza-adventure' ) => __( 'ECCTA 2023', 'akaza-adventure' ),
	__( 'Learning approach', 'akaza-adventure' )  => __( 'Scenarios and knowledge checks', 'akaza-adventure' ),
	__( 'Focus', 'akaza-adventure' )              => __( 'Awareness, recognition and reporting', 'akaza-adventure' ),
);
?>

<section id="overview" class="ftpf-section ftpf-section--grey ftpf-overview" aria-labelledby="ftpf-overview-title">
	<div class="ftpf-container ftpf-overview__grid">

		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Course Overview', 'akaza-adventure' ); ?></span>
			<h2 id="ftpf-overview-title">
				<?php esc_html_e( 'Help employees connect', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'risk with everyday behaviour', 'akaza-adventure' ); ?></span>
			</h2>
			<p class="ftpf-lead"><?php esc_html_e( 'Fraud prevention is not only a concern for senior leaders, Compliance or Legal.', 'akaza-adventure' ); ?></p>
			<p><?php esc_html_e( 'Employees across an organisation may create, review, communicate or rely on information that affects investors, financial records, suppliers and business decisions.', 'akaza-adventure' ); ?></p>
			<p><?php esc_html_e( 'This course helps learners understand the Failure to Prevent Fraud context, recognise relevant warning signs and understand the importance of raising concerns when something appears unclear, unusual or suspicious.', 'akaza-adventure' ); ?></p>
		</div>

		<aside class="ftpf-overview__panel" aria-label="<?php esc_attr_e( 'Course at a glance', 'akaza-adventure' ); ?>">
			<p class="ftpf-overview__panel-label"><?php esc_html_e( 'Course at a glance', 'akaza-adventure' ); ?></p>
			<dl class="ftpf-overview__facts">
				<?php foreach ( $facts as $label => $value ) : ?>
					<div>
						<dt><?php echo esc_html( $label ); ?></dt>
						<dd><?php echo esc_html( $value ); ?></dd>
					</div>
				<?php endforeach; ?>
			</dl>
		</aside>

	</div>
</section>
