<?php
/**
 * Code of Conduct — Emerging Ethical Risks.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$emerging_risk_topics = array(
	__( 'Responsible AI Use', 'akaza-adventure' ),
	__( 'Generative AI & Confidential Information', 'akaza-adventure' ),
	__( 'Data Privacy', 'akaza-adventure' ),
	__( 'Digital Workplace Behaviour', 'akaza-adventure' ),
	__( 'Remote & Hybrid Working', 'akaza-adventure' ),
	__( 'Cybersecurity Responsibilities', 'akaza-adventure' ),
	__( 'Third-Party Risk', 'akaza-adventure' ),
	__( 'Sustainability & Responsible Business', 'akaza-adventure' ),
);
?>

<section class="sl-coc-emerging-risks" aria-labelledby="sl-coc-emerging-risks-title">
	<div class="container">

		<div class="sl-coc-emerging-risks__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Emerging Topic', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-emerging-risks-title">
				<?php
				echo wp_kses(
					__( 'Prepare Employees for <span>New Ethical Risks</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<h3>
				<?php esc_html_e( 'Codes of Conduct are evolving as technology changes the workplace.', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php esc_html_e( "Where relevant to your organisation's policies, SucceedLEARN can incorporate emerging topics such as:", 'akaza-adventure' ); ?>
			</p>
		</div>



		<div class="sl-coc-emerging-risks__main">

			<div class="sl-coc-emerging-risks__image">
				<img
					src="<?php echo esc_url( akaza_upload_url( '2026/08/Prepare-Employees.webp' ) ); ?>"
					alt="<?php esc_attr_e( 'Employees navigating a difficult workplace ethics situation', 'akaza-adventure' ); ?>"
					width="760"
					height="500"
					loading="lazy"
					decoding="async"
				/>
			</div>

			<div class="sl-coc-emerging-risks__topics">

				<ul class="sl-coc-emerging-risks__list">
					<?php foreach ( $emerging_risk_topics as $index => $topic ) : ?>
						<li class="sl-coc-emerging-risks__list-item">
							<span class="sl-coc-emerging-risks__list-index" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>
							<span class="sl-coc-emerging-risks__list-label">
								<?php echo esc_html( $topic ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

		</div>

		<div class="sl-coc-section-close">
			<p class="sl-coc-section-close__text">
				<strong><?php esc_html_e( 'For example:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'Is it acceptable to paste confidential customer information into a public Generative AI tool to summarize it?', 'akaza-adventure' ); ?>
			</p>

			<p class="sl-coc-section-close__text">
				<?php esc_html_e( "Modern workplace ethics training should help employees think through new situations — not simply memorize yesterday's rules.", 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>