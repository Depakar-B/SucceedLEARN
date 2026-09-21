<?php
/**
 * Code of Conduct — What Is Code of Conduct Training?
 *
 * Sticky left media + scrollable right panels (home solution pattern).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$flow_steps = array(
	array(
		'title' => __( 'Understand the Code', 'akaza-adventure' ),
		'text'  => __( 'Know the ethical standards and responsibilities.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Apply It', 'akaza-adventure' ),
		'text'  => __( 'Think through real workplace situations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Decide Better', 'akaza-adventure' ),
		'text'  => __( 'Recognise risks and make responsible decisions.', 'akaza-adventure' ),
	),
);

$topics = array(
	__( 'Conflicts of Interest', 'akaza-adventure' ),
	__( 'Gifts & Hospitality', 'akaza-adventure' ),
	__( 'Data Privacy', 'akaza-adventure' ),
	__( 'Anti-Bribery', 'akaza-adventure' ),
	__( 'Social Media', 'akaza-adventure' ),
	__( 'Confidential Information', 'akaza-adventure' ),
	__( 'Suspected Misconduct', 'akaza-adventure' ),
	__( 'Workplace Behaviour', 'akaza-adventure' ),
);
?>

<section
	class="sl-code-conduct-definition"
	id="what-is-code-of-conduct-training"
	aria-labelledby="sl-code-conduct-definition-title"
>
	<div class="container">

		<div class="sl-code-conduct-definition__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Understanding the foundation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-code-conduct-definition-title">
				<?php
				echo wp_kses(
					__( 'What Is <span>Code of Conduct Training?</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p class="sl-code-conduct-definition__lead">
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: emphasised phrase */
						__( '%s helps employees understand the ethical standards, workplace behaviours and compliance responsibilities expected by their organization.', 'akaza-adventure' ),
						'<span class="sl-code-conduct-definition__accent">' . esc_html__( 'Code of Conduct training', 'akaza-adventure' ) . '</span>'
					),
					array(
						'span' => array(
							'class' => true,
						),
					)
				);
				?>
			</p>

		</div>

		<div class="sl-code-conduct-definition__layout">

			<div class="sl-code-conduct-definition__media">
				<img
					src="<?php echo esc_url( akaza_upload_url( '2026/08/What-Is-Code-of-Conduct.webp' ) ); ?>"
					alt="<?php esc_attr_e( 'Team collaborating on Code of Conduct training in a modern workplace', 'akaza-adventure' ); ?>"
					width="640"
					height="800"
					loading="lazy"
					decoding="async"
				/>
			</div>

			<div class="sl-code-conduct-definition__panels">

				<article class="sl-code-conduct-definition__panel sl-code-conduct-definition__panel--navy">
					<h3>
						<?php esc_html_e( 'From policy to practical workplace behaviour', 'akaza-adventure' ); ?>
					</h3>
					<p>
						<?php esc_html_e(
							'Effective training goes beyond asking employees to read or acknowledge a policy. It helps them understand how the Code applies when real workplace situations arise.',
							'akaza-adventure'
						); ?>
					</p>
				</article>

				<article class="sl-code-conduct-definition__panel sl-code-conduct-definition__panel--flow">
					<div class="sl-code-conduct-definition__flow" role="list">
						<?php foreach ( $flow_steps as $index => $step ) : ?>
							<?php if ( $index > 0 ) : ?>
								<div class="sl-code-conduct-definition__flow-arrow" aria-hidden="true">
									<svg viewBox="0 0 24 24" width="28" height="28" focusable="false">
										<path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
							<?php endif; ?>
							<div class="sl-code-conduct-definition__step" role="listitem">
								<strong><?php echo esc_html( $step['title'] ); ?></strong>
								<span><?php echo esc_html( $step['text'] ); ?></span>
							</div>
						<?php endforeach; ?>
					</div>
				</article>

				<article class="sl-code-conduct-definition__panel sl-code-conduct-definition__panel--approach">
					<p>
						<?php esc_html_e(
							'Few practical scenarios include: ',
							'akaza-adventure'
						); ?>
					</p>

					<ul class="sl-code-conduct-definition__tags" role="list">
						<?php foreach ( $topics as $topic ) : ?>
							<li><?php echo esc_html( $topic ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>

			</div>

		</div>

	</div>
</section>
