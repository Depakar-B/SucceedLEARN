<?php
/**
 * DPDPA Compliance Training — Training records.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = array(
	array(
		'label' => 'Per learner',
		'title' => 'Dated certificates',
		'text'  => 'Issued automatically the moment someone passes.',
	),
	array(
		'label' => 'Dashboard',
		'title' => 'Completion by team',
		'text'  => 'See exactly who has finished, and who has not.',
	),
	array(
		'label' => 'Exportable',
		'title' => 'Audit-ready records',
		'text'  => 'Attach directly to a security review or Board update.',
	),
);
?>
<section class="sl-dpdpa-training-records" aria-labelledby="sl-dpdpa-training-records-title">
	<div class="container">
		<div class="sl-dpdpa-section-heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Training records and compliance evidence', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-dpdpa-training-records-title">
				<?php esc_html_e( 'Completion you can hand to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'an auditor or a customer.', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-dpdpa-training-records__cards">
			<?php foreach ( $cards as $card ) : ?>
				<article class="sl-dpdpa-training-records__card">
					<div class="sl-dpdpa-training-records__head">
						<span class="sl-dpdpa-training-records__label"><?php echo esc_html( $card['label'] ); ?></span>
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-dpdpa-training-records__screenshots">
			<figure class="sl-dpdpa-training-records__screenshot">
				<div class="sl-dpdpa-training-records__image">
					<img
						src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/dpdpa-certificate.webp' ); ?>"
						alt="<?php esc_attr_e( 'DPDPA certificate of completion with dummy learner name', 'akaza-adventure' ); ?>"
						width="900"
						height="560"
						loading="lazy"
						decoding="async"
					>
				</div>
				<figcaption><?php esc_html_e( 'What every learner receives', 'akaza-adventure' ); ?></figcaption>
			</figure>

			<figure class="sl-dpdpa-training-records__screenshot">
				<div class="sl-dpdpa-training-records__image">
					<img
						src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/dpdpa-admin-dashboard.webp' ); ?>"
						alt="<?php esc_attr_e( 'DPDPA admin completion dashboard with dummy organisation data', 'akaza-adventure' ); ?>"
						width="900"
						height="560"
						loading="lazy"
						decoding="async"
					>
				</div>
				<figcaption><?php esc_html_e( 'What your DPO or HR admin sees', 'akaza-adventure' ); ?></figcaption>
			</figure>
		</div>
	</div>
</section>
