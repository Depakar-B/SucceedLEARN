<?php
/**
 * S-Bytes AMP — A Growing Library for Everyday Cyber Risks.
 *
 * Desktop uses a JS-filtered catalog; AMP uses a topic accordion (no custom JS).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = succeedlearn_amp_get_sbytes_library_topics();
?>
<section id="funfosec-library" class="sl-sbytes-library" aria-labelledby="sl-sbytes-library-title">
	<div class="sl-wrap">
		<div class="sl-sbytes-library__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'FunFoSec Library', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-sbytes-library-title" class="sl-h2">
				<?php esc_html_e( 'A Growing Library for Everyday', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Cyber Risks', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-panel-title"><?php esc_html_e( 'One Series. Multiple Security Topics.', 'succeedlearn-amp' ); ?></h3>
			<div class="sl-sbytes-library__body">
				<p><?php esc_html_e( 'Employees encounter cybersecurity risks in many different ways.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'The FunFoSec library addresses a broad range of security topics through short stories and relatable scenarios designed to make individual security behaviours easier to understand.', 'succeedlearn-amp' ); ?></p>
			</div>
			<?php if ( ! empty( $topics ) ) : ?>
			<div class="sl-hero-actions sl-sbytes-library__actions">
				<button
					type="button"
					class="sl-hero-btn sl-hero-btn-primary"
					data-cta="library-browse"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'funfosec-video-catalog' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php esc_html_e( 'Browse FunFoSec Videos', 'succeedlearn-amp' ); ?>
				</button>
			</div>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $topics ) ) : ?>
		<div id="funfosec-video-catalog" class="sl-sbytes-library__catalog">
			<amp-accordion class="sl-sbytes-library__accordion" animate expand-single-section disable-session-states>
				<?php
				$is_first = true;
				foreach ( $topics as $topic ) :
					if ( empty( $topic['videos'] ) ) {
						continue;
					}
					?>
					<section class="sl-sbytes-library__topic" id="sl-sbytes-topic-<?php echo esc_attr( $topic['id'] ); ?>"<?php echo $is_first ? ' expanded' : ''; ?>>
						<h3 class="sl-sbytes-library__topic-title">
							<?php echo esc_html( $topic['label'] ); ?>
							<span class="sl-sbytes-library__count"><?php echo esc_html( (string) count( $topic['videos'] ) ); ?></span>
						</h3>
						<div class="sl-sbytes-library__panel">
							<div class="sl-sbytes-library__row sl-amp-card-grid">
								<?php foreach ( $topic['videos'] as $video ) : ?>
									<article class="sl-sbytes-library__card">
										<div class="sl-sbytes-library__card-media">
											<amp-img
												src="<?php echo esc_url( succeedlearn_amp_upload_url( $video['file'] ) ); ?>"
												width="480"
												height="270"
												layout="responsive"
												alt="<?php echo esc_attr( $video['title'] ); ?>"
											></amp-img>
										</div>
										<div class="sl-sbytes-library__card-body">
											<h4 class="sl-sbytes-library__card-title"><?php echo esc_html( $video['title'] ); ?></h4>
											<p class="sl-sbytes-library__card-desc"><?php echo esc_html( $video['description'] ); ?></p>
										</div>
									</article>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
					<?php
					$is_first = false;
				endforeach;
				?>
			</amp-accordion>
		</div>
		<?php endif; ?>
	</div>
</section>
