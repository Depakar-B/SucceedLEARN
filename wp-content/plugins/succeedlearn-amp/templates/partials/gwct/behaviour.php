<?php
/**
 * GWCT AMP — Behaviour / learning section + interactive assessment.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$behaviour_options = array(
	array(
		'id'     => 'hesitate-a',
		'label'  => __( 'I noticed it, but I’m not sure if I should get involved.', 'succeedlearn-amp' ),
		'answer' => 'hesitate',
	),
	array(
		'id'     => 'hesitate-b',
		'label'  => __( 'I know something isn’t right, but I don’t know what to do.', 'succeedlearn-amp' ),
		'answer' => 'hesitate',
	),
	array(
		'id'     => 'ready',
		'label'  => __( 'I recognise the concern and know how to respond appropriately.', 'succeedlearn-amp' ),
		'answer' => 'ready',
	),
);
?>
<amp-state id="gwctBehaviour">
	<script type="application/json">
		{"selected":"","tone":""}
	</script>
</amp-state>

<section class="sl-section sl-section--alt sl-gwct-behaviour" aria-labelledby="sl-gwct-behaviour-title">
	<div class="sl-wrap sl-gwct-behaviour__layout">
		<div class="sl-gwct-behaviour__content">
			<span class="sl-eyebrow"><?php esc_html_e( 'Behaviour change', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-gwct-behaviour-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'More Than Compliance. Learning That Changes <span>Workplace Behaviour</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p class="sl-lead sl-gwct-behaviour-keyline">
				<strong><?php esc_html_e( 'Policies establish expectations. People shape workplace culture.', 'succeedlearn-amp' ); ?></strong>
			</p>
			<p class="sl-lead"><?php esc_html_e( 'Effective workplace learning goes beyond checking compliance boxes. It empowers employees to make better decisions, build stronger relationships, and contribute to workplaces where everyone feels respected, valued, and able to succeed.', 'succeedlearn-amp' ); ?></p>
			<p class="sl-lead"><?php esc_html_e( 'SucceedLEARN combines storytelling, realistic workplace scenarios, interactive decision-making, and globally relevant content to help learners confidently apply what they’ve learned in everyday workplace situations.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-gwct-behaviour__aside">
			<div class="sl-gwct-behaviour-assessment">
				<div class="sl-gwct-behaviour-assessment__top">
					<span class="sl-gwct-behaviour-assessment__category">
						<?php esc_html_e( 'Workplace scenario', 'succeedlearn-amp' ); ?>
					</span>
					<span class="sl-gwct-behaviour-assessment__label">
						<?php esc_html_e( 'Decision point', 'succeedlearn-amp' ); ?>
					</span>
				</div>

				<h3 class="sl-gwct-behaviour-assessment__question">
					<?php esc_html_e( '“What would you do?”', 'succeedlearn-amp' ); ?>
				</h3>

				<p class="sl-gwct-behaviour-assessment__prompt">
					<?php esc_html_e( 'A colleague makes a comment that leaves someone visibly uncomfortable. What happens next?', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-gwct-behaviour-assessment__choose">
					<?php esc_html_e( 'Choose the response that feels most familiar:', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-gwct-behaviour-assessment__options">
					<?php foreach ( $behaviour_options as $option ) : ?>
						<button
							type="button"
							class="sl-gwct-behaviour-assessment__option"
							[class]="'sl-gwct-behaviour-assessment__option' + (gwctBehaviour.selected == '<?php echo esc_js( $option['id'] ); ?>' ? (' is-selected ' + (gwctBehaviour.tone == 'ready' ? 'is-correct' : 'is-incorrect')) : '')"
							on="tap:AMP.setState({gwctBehaviour:{selected:'<?php echo esc_js( $option['id'] ); ?>',tone:'<?php echo esc_js( $option['answer'] ); ?>'}})"
						>
							<span class="sl-gwct-behaviour-assessment__radio" aria-hidden="true"></span>
							<span class="sl-gwct-behaviour-assessment__option-text">
								<?php echo esc_html( $option['label'] ); ?>
							</span>
						</button>
					<?php endforeach; ?>
				</div>

				<div
					class="sl-gwct-behaviour-assessment__feedback is-success"
					hidden
					[hidden]="gwctBehaviour.tone != 'ready'"
					aria-live="polite"
				>
					<p class="sl-gwct-behaviour-assessment__reveal-lead">
						<?php esc_html_e( 'That’s where learning makes a difference.', 'succeedlearn-amp' ); ?>
					</p>
					<div class="sl-gwct-behaviour-assessment__paths">
						<p class="sl-gwct-behaviour-assessment__path sl-gwct-behaviour-assessment__path--before">
							<strong><?php esc_html_e( 'Before training:', 'succeedlearn-amp' ); ?></strong>
							<span><?php esc_html_e( 'Notice → Hesitate → Move on', 'succeedlearn-amp' ); ?></span>
						</p>
						<p class="sl-gwct-behaviour-assessment__path sl-gwct-behaviour-assessment__path--after">
							<strong><?php esc_html_e( 'After effective training:', 'succeedlearn-amp' ); ?></strong>
							<span><?php esc_html_e( 'Recognise → Decide → Act appropriately', 'succeedlearn-amp' ); ?></span>
						</p>
					</div>
				</div>

				<div
					class="sl-gwct-behaviour-assessment__feedback is-error"
					hidden
					[hidden]="gwctBehaviour.selected == '' || gwctBehaviour.tone == 'ready'"
					aria-live="polite"
				>
					<p class="sl-gwct-behaviour-assessment__reveal-lead">
						<?php esc_html_e( 'That’s where learning makes a difference.', 'succeedlearn-amp' ); ?>
					</p>
					<div class="sl-gwct-behaviour-assessment__paths">
						<p class="sl-gwct-behaviour-assessment__path sl-gwct-behaviour-assessment__path--before">
							<strong><?php esc_html_e( 'Before training:', 'succeedlearn-amp' ); ?></strong>
							<span><?php esc_html_e( 'Notice → Hesitate → Move on', 'succeedlearn-amp' ); ?></span>
						</p>
						<p class="sl-gwct-behaviour-assessment__path sl-gwct-behaviour-assessment__path--after">
							<strong><?php esc_html_e( 'After effective training:', 'succeedlearn-amp' ); ?></strong>
							<span><?php esc_html_e( 'Recognise → Decide → Act appropriately', 'succeedlearn-amp' ); ?></span>
						</p>
					</div>
				</div>
			</div>

			<button
				type="button"
				class="sl-btn sl-btn--primary sl-gwct-behaviour-know-more"
				hidden
				[hidden]="gwctBehaviour.selected == ''"
				data-cta="behaviour-know-more"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'solutions' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Know more', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>
	</div>
</section>
