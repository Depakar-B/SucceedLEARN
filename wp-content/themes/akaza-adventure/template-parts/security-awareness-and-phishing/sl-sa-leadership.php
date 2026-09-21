<?php
/**
 * Security Awareness — Built for Security, Compliance and People Leaders.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$leadership_items = array(
	array(
		'title' => 'Information Security & Cybersecurity Teams',
		'text'  => 'Information Security & Cybersecurity Teams can run awareness initiatives, phishing simulations and targeted interventions while gaining greater visibility into human cyber risk. ',
	),
	array(
		'title' => 'Compliance & Risk Teams',
		'text'  => 'Compliance & Risk Teams can support awareness requirements with structured programmes, measurable participation and reporting. ',
	),
	array(
		'title' => 'Learning & Development Teams',
		'text'  => 'Learning & Development Teams can deliver engaging, continuous learning experiences rather than relying solely on lengthy annual courses. ',
	),
	array(
		'title' => 'HR & People Teams',
		'text'  => 'HR & People Teams can integrate security awareness into onboarding and ongoing employee development.  ',
	),
	array(
		'title' => 'Leadership Teams',
		'text'  => 'Leadership Teams can gain clearer visibility into awareness initiatives and how employee security behaviour is developing across the organisation.',
	),
);
?>

<section
	class="sl-sa-leadership"
	id="security-leadership"
	aria-labelledby="sl-sa-leadership-title"
>

	<div class="container">

		<div class="sl-sa-annual-training__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'One Platform. Multiple Stakeholders.', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sa-leadership-title">
				<?php esc_html_e( 'Designed for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security, Compliance and People Leaders', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e(
					'Security awareness involves multiple teams across an organisation. SucceedLEARN brings together the capabilities required by security, compliance, HR, learning, and business leaders within one platform.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-sa-annual-training__grid">

			<?php foreach ( $leadership_items as $item ) : ?>

				<article class="sl-sa-annual-training__card">

					<h3><?php echo esc_html( $item['title'] ); ?></h3>

					<p><?php echo esc_html( $item['text'] ); ?></p>

				</article>

			<?php endforeach; ?>


		</div>

	</div>

</section>
