<?php
/**
 * DPDPA AMP - 13-module course outline.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stages = array(
	array(
		'n'     => '1',
		'title' => 'Understand',
		'goal'  => 'What the law is and why it matters',
		'mods'  => array(
			array( '01', 'Introduction and objectives', '' ),
			array( '02', 'Why data protection matters', '' ),
			array( '03', 'What is the DPDPA?', '' ),
			array( '04', 'Key DPDPA terms', 'Reveal cards · Sorting activity' ),
			array( '05', 'Scope of the DPDPA', '' ),
		),
	),
	array(
		'n'     => '2',
		'title' => 'Apply',
		'goal'  => 'Using data the right way, every day',
		'mods'  => array(
			array( '06', 'Lawful grounds for processing', 'Consent and legitimate uses' ),
			array( '07', 'Privacy by design', '' ),
			array( '08', 'Handling data across its lifecycle', '' ),
		),
	),
	array(
		'n'     => '3',
		'title' => 'Protect',
		'goal'  => 'Rights, requests and incidents',
		'mods'  => array(
			array( '09', 'Data Principal rights and requests', 'Knowledge check' ),
			array( '10', 'Grievances and escalation', '' ),
			array( '11', 'Breach awareness and reporting', 'Scenario check' ),
		),
	),
	array(
		'n'     => '4',
		'title' => 'Prove',
		'goal'  => 'Responsibilities and certification',
		'mods'  => array(
			array( '12', 'Your responsibilities', '' ),
			array( '13', 'Final assessment and certificate', '80% to pass · Verified certificate' ),
		),
	),
);
?>
<section class="sl-section sl-section--alt sl-dpdpa-course-outline" id="outline" aria-labelledby="sl-dpdpa-outline-title">
	<div class="sl-wrap">
		<header class="sl-dpdpa-section-head">
			<h2 id="sl-dpdpa-outline-title" class="sl-h2">
				<?php esc_html_e( 'DPDPA course outline: ', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( '13 modules, four stages', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p class="sl-lead"><?php esc_html_e( 'A clear path from understanding the law to proving your team has learnt it.', 'succeedlearn-amp' ); ?></p>
		</header>

		<div class="sl-dpdpa-course-outline__grid">
			<?php foreach ( $stages as $stage ) : ?>
				<article class="sl-dpdpa-course-outline__stage">
					<div class="sl-dpdpa-course-outline__card">
						<span class="sl-dpdpa-course-outline__node" aria-hidden="true"><?php echo esc_html( $stage['n'] ); ?></span>
						<h3 class="sl-panel-title"><?php echo esc_html( $stage['title'] ); ?></h3>
						<p class="sl-dpdpa-course-outline__goal"><?php echo esc_html( $stage['goal'] ); ?></p>
						<ol>
							<?php foreach ( $stage['mods'] as $mod ) : ?>
								<li>
									<b><?php echo esc_html( $mod[0] ); ?></b>
									<div>
										<strong><?php echo esc_html( $mod[1] ); ?></strong>
										<?php if ( $mod[2] ) : ?>
											<span><?php echo esc_html( $mod[2] ); ?></span>
										<?php endif; ?>
									</div>
								</li>
							<?php endforeach; ?>
						</ol>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-dpdpa-section-actions">
			<button type="button" class="sl-content-btn sl-content-btn-secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'book' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php esc_html_e( 'Book a 20-min demo', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
