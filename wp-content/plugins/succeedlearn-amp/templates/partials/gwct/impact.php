<?php
/**
 * GWCT AMP — Lasting workplace impact section + Global Workplace Insights dashboard.
 *
 * Expected vars: $impact_themes
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$insight_stats = array(
	array(
		'value' => '8.2%',
		'text'  => __( 'of women in employment have experienced sexual violence and harassment at work during their working life.', 'succeedlearn-amp' ),
		'tone'  => 'women',
		'icon'  => '<path d="M12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8Zm0 10c-4.4 0-8 2-8 4.5V20h3v-2h10v2h3v-3.5C20 14 16.4 12 12 12Z"/>',
	),
	array(
		'value' => '5.0%',
		'text'  => __( 'of men in employment have experienced sexual violence and harassment at work during their working life.', 'succeedlearn-amp' ),
		'tone'  => 'men',
		'icon'  => '<path d="M12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8Zm-1 10.1V22h2V12.1c3.5.3 6.2 2.1 6.2 4.4V20h2v-3.5C21.2 13.2 17 11.5 12.9 11.2Zm-8.1 5.4V20h2v-3.5c0-1.5 1.4-2.8 3.5-3.5-.2 0-.5-.1-.7-.1-3.5 0-6.9 1.5-6.9 3.6Z"/>',
	),
	array(
		'value' => '205 million',
		'text'  => __( 'people in employment are estimated to have experienced sexual violence and harassment at work globally.', 'succeedlearn-amp' ),
		'tone'  => 'people',
		'icon'  => '<path d="M9 11a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Zm6 0a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7ZM2 20v-1.5C2 16 5.1 14 9 14c.9 0 1.7.1 2.5.3A7.4 7.4 0 0 0 9 18.5V20H2Zm13-6c3.9 0 7 2 7 4.5V20h-7v-1.5c0-1.5-.8-2.8-2.1-3.8.7-.1 1.4-.2 2.1-.2Z"/>',
	),
	array(
		'value' => '1 in 2',
		'text'  => __( 'people who experienced workplace violence and harassment (including sexual harassment) disclosed their experience to someone.', 'succeedlearn-amp' ),
		'tone'  => 'disclose',
		'icon'  => '<path d="M4 4h10a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H9l-3 3v-3H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Zm8 9h2a2 2 0 0 1 2 2v2h1l2 2v-2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2h-2.1A4 4 0 0 1 12 13Z"/>',
	),
);

$person_icon = '<path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 2c-4.4 0-8 2.2-8 5v1h16v-1c0-2.8-3.6-5-8-5Z"/>';
?>
<section class="sl-section">
	<div class="sl-wrap sl-gwct-split sl-gwct-split--reverse">
		<div class="sl-gwct-split__content">
			<span class="sl-eyebrow"><?php esc_html_e( 'Lasting impact', 'succeedlearn-amp' ); ?></span>
			<h2 class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Learning That Creates Lasting <span>Workplace Impact</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<ul class="sl-gwct-impact-points" role="list">
				<?php foreach ( $impact_themes as $theme ) : ?>
					<li class="sl-gwct-impact-point">
						<div class="sl-gwct-impact-point__body">
							<?php
							if ( ! empty( $theme['icon'] ) ) {
								succeedlearn_amp_gwct_render_icon( $theme['icon'], 'sl-gwct-impact-point__icon' );
							}
							?>
							<p class="sl-gwct-impact-point__text">
								<span class="sl-gwct-impact-point__highlight"><?php echo esc_html( $theme['highlight'] ); ?></span>
								<?php echo ' '; ?>
								<span class="sl-gwct-impact-point__rest"><?php echo esc_html( $theme['text'] ); ?></span>
							</p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<p class="sl-lead"><?php esc_html_e( 'The most effective workplace learning does more than satisfy compliance requirements. It helps employees build stronger relationships, make better decisions, and contribute to healthier, more productive workplaces.', 'succeedlearn-amp' ); ?></p>
			<p class="sl-lead sl-gwct-impact-emphasis">
				<strong><?php esc_html_e( 'That’s the difference', 'succeedlearn-amp' ); ?></strong>
				<?php esc_html_e( ' SucceedLEARN delivers.', 'succeedlearn-amp' ); ?>
			</p>
			<p style="margin-top:18px">
				<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?></button>
			</p>
		</div>

		<div class="sl-gwct-split__visual">
			<div class="sl-whpt-insights" aria-label="<?php esc_attr_e( 'Global Workplace Insights dashboard', 'succeedlearn-amp' ); ?>">
				<div class="sl-whpt-insights__chrome">
					<span class="sl-whpt-insights__dot" aria-hidden="true"></span>
					<span class="sl-whpt-insights__dot" aria-hidden="true"></span>
					<span class="sl-whpt-insights__dot" aria-hidden="true"></span>
					<span class="sl-whpt-insights__chrome-title"><?php esc_html_e( 'Global Workplace Insights', 'succeedlearn-amp' ); ?></span>
				</div>
				<div class="sl-whpt-insights__body">
					<div class="sl-whpt-insights__head">
						<span class="sl-whpt-insights__head-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor" focusable="false"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm7.9 9h-3.1a15 15 0 0 0-1.3-5.1A8 8 0 0 1 19.9 11ZM12 4a13 13 0 0 1 1.8 7H10.2A13 13 0 0 1 12 4ZM4.1 13h3.1a15 15 0 0 0 1.3 5.1A8 8 0 0 1 4.1 13Zm3.1-2H4.1a8 8 0 0 1 4.4-5.1A15 15 0 0 0 7.2 11Zm2.8 2h3.6A13 13 0 0 1 12 20a13 13 0 0 1-1.8-7Zm5.2 5.1A15 15 0 0 0 16.8 13h3.1a8 8 0 0 1-4.4 5.1Z"/></svg>
						</span>
						<div>
							<p class="sl-whpt-insights__eyebrow"><?php esc_html_e( 'Sexual harassment at work', 'succeedlearn-amp' ); ?></p>
							<h3 class="sl-whpt-insights__title"><?php esc_html_e( 'A Global Challenge That Demands Action', 'succeedlearn-amp' ); ?></h3>
							<div class="sl-whpt-insights__tags">
								<span><?php esc_html_e( 'People', 'succeedlearn-amp' ); ?></span>
								<span><?php esc_html_e( 'Safety', 'succeedlearn-amp' ); ?></span>
								<span><?php esc_html_e( 'Respect', 'succeedlearn-amp' ); ?></span>
								<span><?php esc_html_e( 'Change', 'succeedlearn-amp' ); ?></span>
							</div>
						</div>
					</div>

					<div class="sl-whpt-insights__hero">
						<div>
							<p class="sl-whpt-insights__hero-lead"><?php esc_html_e( 'Globally,', 'succeedlearn-amp' ); ?></p>
							<p class="sl-whpt-insights__hero-stat"><?php esc_html_e( '1 in 15', 'succeedlearn-amp' ); ?></p>
							<p class="sl-whpt-insights__hero-text">
								<?php esc_html_e( 'people in employment have experienced sexual violence and harassment at work during their working life.', 'succeedlearn-amp' ); ?>
							</p>
						</div>
						<div class="sl-whpt-insights__people" aria-hidden="true">
							<?php for ( $i = 0; $i < 15; $i++ ) : ?>
								<span class="sl-whpt-insights__person<?php echo 0 === $i ? ' is-active' : ''; ?>">
									<svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor" focusable="false"><?php echo $person_icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
								</span>
							<?php endfor; ?>
						</div>
					</div>

					<div class="sl-whpt-insights__grid">
						<?php foreach ( $insight_stats as $stat ) : ?>
							<article class="sl-whpt-insights__card sl-whpt-insights__card--<?php echo esc_attr( $stat['tone'] ); ?>">
								<span class="sl-whpt-insights__card-icon" aria-hidden="true">
									<svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor" focusable="false"><?php echo $stat['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></svg>
								</span>
								<p class="sl-whpt-insights__card-value"><?php echo esc_html( $stat['value'] ); ?></p>
								<p class="sl-whpt-insights__card-text"><?php echo esc_html( $stat['text'] ); ?></p>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
