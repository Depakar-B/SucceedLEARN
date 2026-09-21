<?php
/**
 * Code of Conduct — Decision-Based Interactive Experience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$decision_scenarios = array(
	array(
		'id'              => 1,
		'tab_label'       => __( 'Conflict of Interest', 'akaza-adventure' ),
		'tab_description' => __( 'Navigating potential conflicts', 'akaza-adventure' ),
		'title'           => __( 'Conflict of Interest', 'akaza-adventure' ),
		'situation'       => __( 'Your team is evaluating three vendors. One of the vendors is owned by a close relative.', 'akaza-adventure' ),
		'question'        => __( 'What should you do?', 'akaza-adventure' ),
		'answer'          => __( 'The learner makes a decision and receives immediate feedback explaining the ethical considerations involved.', 'akaza-adventure' ),
	),
	array(
		'id'              => 2,
		'tab_label'       => __( 'Confidentiality', 'akaza-adventure' ),
		'tab_description' => __( 'Protecting sensitive information', 'akaza-adventure' ),
		'title'           => __( 'Confidentiality', 'akaza-adventure' ),
		'situation'       => __( 'An employee receives a confidential presentation before travelling.', 'akaza-adventure' ),
		'question'        => __( 'Would it be appropriate to review the presentation in a crowded airport lounge?', 'akaza-adventure' ),
		'answer'          => __( 'The learner considers the confidentiality risks involved and receives immediate feedback on the ethical considerations.', 'akaza-adventure' ),
	),
	array(
		'id'              => 3,
		'tab_label'       => __( 'Speak Up', 'akaza-adventure' ),
		'tab_description' => __( 'Recognising when to raise concerns', 'akaza-adventure' ),
		'title'           => __( 'Speak Up', 'akaza-adventure' ),
		'situation'       => __( 'You notice behaviour that appears inconsistent with the Code, but you are not certain a violation has occurred.', 'akaza-adventure' ),
		'question'        => __( 'Should you report the concern?', 'akaza-adventure' ),
		'answer'          => __( 'The learner receives guidance on recognising when an ethical concern should be raised.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-coc-decision" aria-labelledby="sl-coc-decision-title">
	<div class="container">

		<div class="sl-coc-decision__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Interactive Experience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-decision-title">
				<?php
				echo wp_kses(
					__( 'Experience Code of Conduct Through <span>Real-World Scenarios</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Employees learn differently when they participate rather than simply read. SucceedLEARN uses realistic workplace scenarios to help employees practise ethical judgement in situations they could genuinely encounter.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-coc-decision__experience">

			<div class="sl-coc-decision__tabs" role="tablist" aria-label="<?php esc_attr_e( 'Training scenarios', 'akaza-adventure' ); ?>">
				<?php foreach ( $decision_scenarios as $index => $scenario ) : ?>
					<?php
					$scenario_id   = (int) $scenario['id'];
					$is_first_tab  = 0 === $index;
					$tab_id        = 'sl-coc-decision-tab-' . $scenario_id;
					$panel_id      = 'sl-coc-decision-panel-' . $scenario_id;
					$tab_number    = str_pad( (string) $scenario_id, 2, '0', STR_PAD_LEFT );
					?>
					<button
						class="sl-coc-decision__tab<?php echo $is_first_tab ? ' is-active' : ''; ?>"
						id="<?php echo esc_attr( $tab_id ); ?>"
						type="button"
						role="tab"
						aria-selected="<?php echo $is_first_tab ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
						data-scenario="<?php echo esc_attr( (string) $scenario_id ); ?>"
					>
						<span class="sl-coc-decision__tab-number"><?php echo esc_html( $tab_number ); ?></span>

						<span class="sl-coc-decision__tab-content">
							<span class="sl-coc-decision__tab-label">
								<?php echo esc_html( $scenario['tab_label'] ); ?>
							</span>

							<span class="sl-coc-decision__tab-description">
								<?php echo esc_html( $scenario['tab_description'] ); ?>
							</span>
						</span>

						<span class="sl-coc-decision__tab-arrow" aria-hidden="true">→</span>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="sl-coc-decision__panels">
				<?php foreach ( $decision_scenarios as $index => $scenario ) : ?>
					<?php
					$scenario_id  = (int) $scenario['id'];
					$is_first_tab = 0 === $index;
					$tab_id       = 'sl-coc-decision-tab-' . $scenario_id;
					$panel_id     = 'sl-coc-decision-panel-' . $scenario_id;
					$answer_id    = 'sl-coc-decision-answer-' . $scenario_id;
					$scenario_num = str_pad( (string) $scenario_id, 2, '0', STR_PAD_LEFT );
					?>
					<div
						class="sl-coc-decision__panel<?php echo $is_first_tab ? ' is-active' : ''; ?>"
						id="<?php echo esc_attr( $panel_id ); ?>"
						role="tabpanel"
						aria-labelledby="<?php echo esc_attr( $tab_id ); ?>"
						data-scenario-panel="<?php echo esc_attr( (string) $scenario_id ); ?>"
						<?php echo $is_first_tab ? '' : ' hidden'; ?>
					>
						<div class="sl-coc-decision__panel-top">
							<span class="sl-coc-decision__panel-eyebrow">
								<?php
								printf(
									/* translators: %s: scenario number. */
									esc_html__( 'Scenario %s', 'akaza-adventure' ),
									esc_html( $scenario_num )
								);
								?>
							</span>

							<h3>
								<?php echo esc_html( $scenario['title'] ); ?>
							</h3>
						</div>

						<div class="sl-coc-decision__situation">
							<span class="sl-coc-decision__label">
								<?php esc_html_e( 'The Situation', 'akaza-adventure' ); ?>
							</span>

							<p>
								<?php echo esc_html( $scenario['situation'] ); ?>
							</p>
						</div>

						<div class="sl-coc-decision__reveal" data-decision-reveal>
							<button
								class="sl-coc-decision__reveal-btn"
								type="button"
								aria-expanded="false"
								aria-controls="<?php echo esc_attr( $answer_id ); ?>"
								data-decision-reveal-btn
								data-view-label="<?php echo esc_attr( $scenario['question'] ); ?>"
								data-hide-label="<?php esc_attr_e( 'Hide Answer', 'akaza-adventure' ); ?>"
							>
								<span class="sl-coc-decision__reveal-btn-label" data-decision-reveal-label>
									<?php echo esc_html( $scenario['question'] ); ?>
								</span>
								<span class="sl-coc-decision__reveal-btn-icon" aria-hidden="true">↓</span>
							</button>

							<div
								class="sl-coc-decision__answer-panel"
								id="<?php echo esc_attr( $answer_id ); ?>"
								data-decision-answer-panel
								aria-hidden="true"
							>
								<div class="sl-coc-decision__answer-panel-inner">
									<div class="sl-coc-decision__feedback">
										<p class="sl-coc-decision__feedback-answer">
											<?php echo esc_html( $scenario['answer'] ); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

		<div class="sl-coc-section-close">
			<p class="sl-coc-section-close__text">
				<?php
				echo wp_kses(
					__( 'These scenarios help employees develop <strong>ethical judgement</strong>, not simply recall policy statements.', 'akaza-adventure' ),
					array( 'strong' => array() )
				);
				?>
			</p>
		</div>

	</div>
</section>
