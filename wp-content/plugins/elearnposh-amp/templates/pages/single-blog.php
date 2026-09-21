<?php
/**
 * Single Blog Post Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Prevent default content outputs
remove_all_actions( 'the_content' );
remove_all_actions( 'amp_post_template_content' );
remove_all_actions( 'ampforwp_content' );

global $redux_builder_amp;

if ( ! function_exists( 'elearnposh_amp_render_cfbt_quiz' ) ) {
	/**
	 * Render AMP-safe quiz block from CFBT meta.
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	function elearnposh_amp_render_cfbt_quiz( $post_id ) {
		$enabled = get_post_meta( $post_id, '_cfbt_enable_quiz', true );
		$items   = get_post_meta( $post_id, '_cfbt_quiz_items', true );
		$items   = is_array( $items ) ? $items : array();

		if ( '1' !== $enabled || empty( $items ) ) {
			return '';
		}

		ob_start();
		?>
		<section class="cfbt-quiz">
			<h2><?php esc_html_e( 'Quick Quiz', 'conversion-funnel-blog-toolkit' ); ?></h2>
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$question = isset( $item['question'] ) ? sanitize_text_field( $item['question'] ) : '';
				$options  = isset( $item['options'] ) && is_array( $item['options'] ) ? $item['options'] : array();
				if ( '' === $question || count( $options ) < 2 ) {
					continue;
				}
				?>
				<div class="cfbt-quiz-item">
					<h3><?php echo esc_html( ( $index + 1 ) . '. ' . $question ); ?></h3>
					<div class="cfbt-quiz-options" role="radiogroup" aria-label="<?php echo esc_attr( $question ); ?>">
						<?php foreach ( $options as $option_index => $option ) : ?>
							<?php if ( '' !== trim( (string) $option ) ) : ?>
								<?php
								$quiz_option_id = 'cfbt-amp-quiz-' . absint( $index ) . '-' . absint( $option_index );
								$quiz_name      = 'cfbt_amp_quiz_' . absint( $index );
								?>
								<input
									class="cfbt-quiz-option-input"
									type="radio"
									id="<?php echo esc_attr( $quiz_option_id ); ?>"
									name="<?php echo esc_attr( $quiz_name ); ?>"
									value="<?php echo esc_attr( $option_index ); ?>"
								>
								<label class="cfbt-quiz-option" for="<?php echo esc_attr( $quiz_option_id ); ?>">
									<span class="cfbt-quiz-option-label"><?php echo esc_html( chr( 65 + ( $option_index % 26 ) ) . '.' ); ?></span>
									<span class="cfbt-quiz-option-text"><?php echo esc_html( $option ); ?></span>
								</label>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'elearnposh_amp_render_cfbt_faq' ) ) {
	/**
	 * Render AMP-safe FAQ block.
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	function elearnposh_amp_render_cfbt_faq( $post_id ) {
		$enabled = get_post_meta( $post_id, '_cfbt_enable_faq', true );
		$items   = get_post_meta( $post_id, '_cfbt_faq_items', true );
		$items   = is_array( $items ) ? $items : array();

		if ( '1' !== $enabled || empty( $items ) ) {
			return '';
		}

		ob_start();
		?>
		<section class="cfbt-faq">
			<h2><?php esc_html_e( 'Frequently Asked Questions', 'conversion-funnel-blog-toolkit' ); ?></h2>
			<amp-accordion class="cfbt-faq-accordion" expand-single-section disable-session-states animate>
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$question = isset( $item['question'] ) ? sanitize_text_field( $item['question'] ) : '';
				$answer   = isset( $item['answer'] ) ? wp_kses_post( wpautop( $item['answer'] ) ) : '';
				if ( '' === $question || '' === trim( wp_strip_all_tags( $answer ) ) ) {
					continue;
				}
				?>
				<section class="cfbt-faq-item" <?php echo 0 === $index ? 'expanded' : ''; ?>>
					<h3>
						<span class="cfbt-faq-question">
							<span class="cfbt-faq-sno"><?php echo esc_html( (string) ( $index + 1 ) ); ?>.</span>
							<?php echo esc_html( $question ); ?>
						</span>
					</h3>
					<div class="cfbt-faq-answer"><?php echo $answer; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				</section>
			<?php endforeach; ?>
			</amp-accordion>
		</section>
		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'elearnposh_amp_render_cfbt_cta' ) ) {
	/**
	 * Render AMP-safe CTA block.
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	function elearnposh_amp_render_cfbt_cta( $post_id ) {
		$enabled = get_post_meta( $post_id, '_cfbt_enable_cta', true );
		$title   = trim( (string) get_post_meta( $post_id, '_cfbt_cta_title', true ) );
		$text    = trim( (string) get_post_meta( $post_id, '_cfbt_cta_text', true ) );
		$label   = trim( (string) get_post_meta( $post_id, '_cfbt_cta_button_label', true ) );
		$url     = trim( (string) get_post_meta( $post_id, '_cfbt_cta_button_url', true ) );

		if ( '1' !== $enabled || ( '' === $title && '' === $text && ( '' === $label || '' === $url ) ) ) {
			return '';
		}

		ob_start();
		?>
		<section class="cfbt-cta">
			<?php if ( '' !== $title ) : ?>
				<h2><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $text ) : ?>
				<p><?php echo esc_html( $text ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $label && '' !== $url ) : ?>
				<a class="cfbt-cta-btn" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endif; ?>
		</section>
		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'elearnposh_amp_render_cfbt_reviews' ) ) {
	/**
	 * Render AMP-safe approved review list from native comments synced by plugin.
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	function elearnposh_amp_render_cfbt_reviews( $post_id ) {
		$enabled = get_post_meta( $post_id, '_cfbt_enable_review', true );
		if ( '1' !== $enabled ) {
			return '';
		}

		$comments = get_comments(
			array(
				'post_id' => $post_id,
				'status'  => 'approve',
				'type'    => 'comment',
				'number'  => 8,
				'order'   => 'DESC',
			)
		);

		if ( empty( $comments ) ) {
			return '';
		}

		ob_start();
		?>
		<section class="cfbt-review cfbt-review--list-only" id="cfbt-review-section">
			<h2><?php esc_html_e( 'Approved Reviews', 'conversion-funnel-blog-toolkit' ); ?></h2>
			<div class="cfbt-review-list">
			<?php foreach ( $comments as $comment ) : ?>
				<?php $rating = (int) get_comment_meta( $comment->comment_ID, 'cfbt_rating', true ); ?>
				<article class="cfbt-review-item">
					<div class="cfbt-review-item-head">
						<div class="cfbt-review-author-wrap">
							<?php
							$avatar_url = get_avatar_url(
								$comment->comment_author_email,
								array(
									'size'    => 56,
									'default' => 'mystery',
								)
							);
							?>
							<?php if ( ! empty( $avatar_url ) ) : ?>
								<amp-img
									class="cfbt-review-avatar"
									src="<?php echo esc_url( $avatar_url ); ?>"
									width="56"
									height="56"
									layout="fixed"
									alt="<?php echo esc_attr( $comment->comment_author ); ?>">
								</amp-img>
							<?php endif; ?>
							<div class="cfbt-review-author-meta">
								<strong class="cfbt-review-author"><?php echo esc_html( $comment->comment_author ); ?></strong>
								<span class="cfbt-review-date"><?php echo esc_html( get_comment_date( '', $comment ) ); ?></span>
							</div>
						</div>
						<div class="cfbt-review-rating-wrap">
							<?php if ( $rating > 0 ) : ?>
								<span class="cfbt-review-rating" aria-label="<?php echo esc_attr( sprintf( __( 'Rated %d out of 5', 'conversion-funnel-blog-toolkit' ), $rating ) ); ?>"><?php echo esc_html( str_repeat( '★', $rating ) ); ?></span>
							<?php else : ?>
								<span class="cfbt-review-rating cfbt-review-rating--empty" aria-hidden="true"><?php esc_html_e( 'No rating', 'conversion-funnel-blog-toolkit' ); ?></span>
							<?php endif; ?>
						</div>
					</div>
					<p class="cfbt-review-comment"><?php echo esc_html( $comment->comment_content ); ?></p>
				</article>
			<?php endforeach; ?>
			</div>
		</section>
		<?php
		return ob_get_clean();
	}
}

if ( ! function_exists( 'elearnposh_amp_render_cfbt_review_fab' ) ) {
	/**
	 * Render floating AMP review button and lightbox form.
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	function elearnposh_amp_render_cfbt_review_fab( $post_id ) {
		$enabled = get_post_meta( $post_id, '_cfbt_enable_review', true );
		if ( '1' !== $enabled ) {
			return '';
		}

		// Do not put __amp_source_origin in action-xhr — AMP appends it; validator rejects it.
		$ajax_url = admin_url( 'admin-ajax.php' );
		$nonce    = wp_create_nonce( 'cfbt_review_nonce' );

		ob_start();
		?>
		<button type="button" class="cfbt-amp-review-fab" on="tap:cfbt-review-lightbox.open" role="button" tabindex="0">
			<?php esc_html_e( 'Write a Review', 'conversion-funnel-blog-toolkit' ); ?>
		</button>

		<amp-lightbox id="cfbt-review-lightbox" layout="nodisplay">
			<div class="cfbt-amp-lightbox-shell">
				<div class="cfbt-amp-lightbox-card">
					<button type="button" class="cfbt-amp-lightbox-close" on="tap:cfbt-review-lightbox.close" role="button" tabindex="0" aria-label="<?php esc_attr_e( 'Close', 'conversion-funnel-blog-toolkit' ); ?>">x</button>
					<h2><?php esc_html_e( 'Share Your Review', 'conversion-funnel-blog-toolkit' ); ?></h2>

					<form method="post"
						action-xhr="<?php echo esc_url( $ajax_url ); ?>"
						target="_top"
						class="cfbt-amp-review-form cfbt-review-form">
						<input type="hidden" name="action" value="cfbt_submit_review">
						<input type="hidden" name="post_id" value="<?php echo esc_attr( $post_id ); ?>">
						<input type="hidden" name="nonce" value="<?php echo esc_attr( $nonce ); ?>">
						<input type="text" name="cfbt_website" class="cfbt-honeypot" value="" tabindex="-1" autocomplete="off" aria-hidden="true">

						<div class="cfbt-review-row">
							<p class="cfbt-review-col">
								<label for="cfbt_amp_name"><?php esc_html_e( 'Name', 'conversion-funnel-blog-toolkit' ); ?> <span class="cfbt-required">*</span></label>
								<input type="text" id="cfbt_amp_name" name="name" required>
							</p>

							<p class="cfbt-review-col">
								<label for="cfbt_amp_email"><?php esc_html_e( 'Email', 'conversion-funnel-blog-toolkit' ); ?> <span class="cfbt-required">*</span></label>
								<input type="email" id="cfbt_amp_email" name="email" required>
							</p>
						</div>

						<p>
							<label><?php esc_html_e( 'Rating (1-5)', 'conversion-funnel-blog-toolkit' ); ?> <span class="cfbt-required">*</span></label>
							<span class="cfbt-star-rating cfbt-amp-star-rating">
								<label class="cfbt-star-label" for="cfbt_amp_rating_1"><input id="cfbt_amp_rating_1" type="radio" name="rating" value="1" required><span class="cfbt-star-icon">★</span></label>
								<label class="cfbt-star-label" for="cfbt_amp_rating_2"><input id="cfbt_amp_rating_2" type="radio" name="rating" value="2" required><span class="cfbt-star-icon">★</span></label>
								<label class="cfbt-star-label" for="cfbt_amp_rating_3"><input id="cfbt_amp_rating_3" type="radio" name="rating" value="3" required><span class="cfbt-star-icon">★</span></label>
								<label class="cfbt-star-label" for="cfbt_amp_rating_4"><input id="cfbt_amp_rating_4" type="radio" name="rating" value="4" required><span class="cfbt-star-icon">★</span></label>
								<label class="cfbt-star-label" for="cfbt_amp_rating_5"><input id="cfbt_amp_rating_5" type="radio" name="rating" value="5" required><span class="cfbt-star-icon">★</span></label>
							</span>
						</p>

						<label for="cfbt_amp_comment"><?php esc_html_e( 'Comment', 'conversion-funnel-blog-toolkit' ); ?></label>
						<textarea id="cfbt_amp_comment" name="comment" rows="4"></textarea>

						<button type="submit" class="cfbt-amp-submit"><?php esc_html_e( 'Submit Review', 'conversion-funnel-blog-toolkit' ); ?></button>

						<div submit-success class="cfbt-amp-form-message is-success">
							<template type="amp-mustache">{{message}}</template>
						</div>
						<div submit-error class="cfbt-amp-form-message is-error">
							<template type="amp-mustache">{{message}}</template>
						</div>
					</form>
				</div>
			</div>
		</amp-lightbox>
		<?php
		return ob_get_clean();
	}
}
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8">
	<link rel="dns-prefetch" href="https://cdn.ampproject.org">
	
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<?php elearnposh_amp_output_components( 'blog' ); ?>

	<style amp-custom>
		html {
	scroll-behavior: smooth;
}

		/* Subscribe CTA scroll target (footer form) */
		#newsletter-subscription-form {
			scroll-margin-top: 100px;
		}

		/* Global Styles */
		body {
			font-family: "Inter", "Nunito Sans", "Segoe UI", Arial, sans-serif;
			background: #fff;
			color: #222;
			line-height: 1.75;
			margin: 0;
			padding-top: 100px !important;
		}

		.amp-wp-article-content {
			background: transparent;
			border-radius: 0;
			box-shadow: none;
			border: 0;
			padding: 0;
			box-sizing: border-box;
		}
		
		main {
			max-width: 780px;
			margin: 0 auto;
			padding: 16px 16px 24px;
		}

		/* Single post hero */
		.ep-blog-post-hero {
			background: transparent;
			border-bottom: 1px solid #e2e8f0;
			padding: 20px 16px 22px;
			margin: 0;
			box-sizing: border-box;
		}

		.ep-blog-post-hero__inner {
			max-width: 780px;
			margin: 0 auto;
		}

		.ep-blog-post-hero .ep-breadcrumbs {
			margin: 0 0 14px;
			padding: 0 0 12px;
			border-bottom: 1px solid #e8eef5;
			font-size: 0.8125rem;
			line-height: 1.5;
			word-break: break-word;
		}

		.ep-blog-post-hero h1 {
			margin: 0 0 12px;
			font-size: clamp(1.45rem, 1.05rem + 1.6vw, 2.05rem);
			font-weight: 600;
			color: #002a38;
			line-height: 1.22;
			letter-spacing: -0.015em;
			text-align: left;
		}

		.ep-blog-post-hero .ampforwp-meta-info {
			margin: 0;
			font-size: 14px;
			line-height: 1.5;
			color: #64748b;
			font-weight: 500;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			gap: 8px 14px;
		}

		.ep-blog-post-hero .ep-blog-read-time {
			font-size: 12px;
			color: #fff;
			background-color: #1472ba;
			padding: 5px 12px;
			border-radius: 999px;
			font-weight: 700;
			letter-spacing: 0.02em;
		}

		.ep-blog-subscribe-btn {
			margin: 16px 0 0;
			display: inline-flex;
			align-items: center;
		}

		.ep-blog-subscribe-btn a {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			min-height: 44px;
			padding: 10px 20px;
			background: linear-gradient(135deg, #ea3e24 0%, #f68c1e 50%, #fdb813 100%);
			color: #fff;
			text-decoration: none;
			border-radius: 8px;
			font-weight: 700;
			font-size: 14px;
			border: 0;
			box-shadow: 0 2px 8px rgba(234, 62, 36, 0.35);
			white-space: nowrap;
		}

		/* Headings */
		h1, h2, h3, h4 {
			text-align: left;
			margin-top: 20px;
			margin-bottom: 12px;
		}
		
		h1 {
			font-size: 26px;
			font-weight: 600;
			color: #111;
			line-height: 1.3;
		}
		
		.amp-wp-article-content h2 {
			font-size: 1.25rem;
			font-weight: 600;
			color: #1472ba;
			margin-top: 28px;
			margin-bottom: 12px;
			line-height: 1.35;
		}
		
		.amp-wp-article-content h3 {
			font-size: 1.125rem;
			font-weight: 600;
			color: #1472ba;
			margin-top: 22px;
			margin-bottom: 10px;
			line-height: 1.35;
		}
		
		.amp-wp-article-content h4 {
			font-size: 1.0625rem;
			font-weight: 600;
			color: #333;
			margin-top: 18px;
			margin-bottom: 10px;
			line-height: 1.35;
		}

		h2 {
			font-size: 22px;
			font-weight: 500;
			color: #222;
		}
		
		h3 {
			font-size: 19px;
			font-weight: 500;
			color: #333;
		}
		
		h4 {
			font-size: 16px;
			font-weight: 500;
			color: #444;
		}

		/* Text & Content */
		p {
			margin: 14px 0;
			font-size: 16px;
			color: #444;
		}
		
		blockquote {
			border-left: 3px solid #1472ba;
			padding-left: 14px;
			margin: 20px 0;
			font-style: italic;
			color: #555;
			background: #f9f9f9;
		}
		
		ul, ol {
			margin: 15px 0 15px 20px;
			padding: 0;
		}
		
		li {
			margin-bottom: 6px;
		}

		/* TOC / in-content links — no underlines */
		.amp-wp-article-content a,
		.amp-wp-article-content a:link,
		.amp-wp-article-content a:visited,
		.amp-wp-article-content a:hover,
		.amp-wp-article-content a:focus,
		.amp-wp-article-content a:active,
		.amp-wp-article-content ul a,
		.amp-wp-article-content ol a,
		.amp-wp-article-content li a,
		.amp-wp-article-content h2 a,
		.amp-wp-article-content h3 a,
		.amp-wp-article-content h4 a {
			color: #1472ba;
			text-decoration: none;
			border-bottom: 0;
		}

		/* Media — banner full width; other images fixed ~400x300, smaller on tablet/mobile */
		.amp-wp-article-content amp-img,
		.amp-wp-article-content amp-anim {
			display: block;
			width: 400px;
			max-width: 100%;
			height: 300px;
			margin: 18px auto;
			border-radius: 6px;
			float: none;
			box-sizing: border-box;
			overflow: hidden;
		}

		.amp-wp-article-content amp-youtube {
			display: block;
			max-width: 100%;
			width: 100%;
			margin: 18px 0;
			border-radius: 6px;
		}

		/* Top banner / first content image stays full width within the column */
		.amp-wp-article-content > p:first-of-type > amp-img:first-child,
		.amp-wp-article-content > p:first-of-type > a:first-child > amp-img,
		.amp-wp-article-content > figure:first-of-type amp-img,
		.amp-wp-article-content > amp-img:first-child,
		.amp-wp-article-content > amp-anim:first-child,
		.ampforwp-featured-holder amp-img {
			width: 100%;
			max-width: 100%;
			height: auto;
			margin-left: 0;
			margin-right: 0;
			overflow: visible;
		}

		.amp-wp-article-content amp-img.alignleft,
		.amp-wp-article-content amp-img.align-left {
			float: left;
			width: 400px;
			max-width: 48%;
			height: 300px;
			margin: 6px 16px 12px 0;
		}

		.amp-wp-article-content amp-img.alignright,
		.amp-wp-article-content amp-img.align-right {
			float: right;
			width: 400px;
			max-width: 48%;
			height: 300px;
			margin: 6px 0 12px 16px;
		}

		.amp-wp-article-content amp-img.aligncenter,
		.amp-wp-article-content amp-img.align-center {
			float: none;
			width: 400px;
			max-width: 100%;
			height: 300px;
			margin-left: auto;
			margin-right: auto;
		}

		.amp-wp-article-content amp-img.size-thumbnail,
		.amp-wp-article-content amp-img.avatar,
		.amp-wp-article-content amp-img[class*="avatar"] {
			width: 120px;
			max-width: 120px;
			height: 120px;
			margin-left: 0;
			margin-right: 0;
			display: inline-block;
		}
		
		.amp-wp-article-content amp-img img {
			object-fit: cover;
			width: 100%;
			height: 100%;
		}

		.amp-wp-article-content > p:first-of-type > amp-img:first-child img,
		.amp-wp-article-content > p:first-of-type > a:first-child > amp-img img,
		.amp-wp-article-content > figure:first-of-type amp-img img,
		.amp-wp-article-content > amp-img:first-child img,
		.ampforwp-featured-holder amp-img img {
			object-fit: contain;
			height: auto;
		}

		/* Featured Image */
		.ampforwp-featured-holder {
			text-align: center;
			margin-bottom: 18px;
		}

		.ampforwp-featured-holder amp-img {
			width: 100%;
			max-width: 100%;
			height: auto;
		}

		@media (max-width: 992px) {
			.amp-wp-article-content amp-img,
			.amp-wp-article-content amp-anim,
			.amp-wp-article-content amp-img.aligncenter,
			.amp-wp-article-content amp-img.align-center {
				width: 320px;
				height: 240px;
			}

			.amp-wp-article-content amp-img.alignleft,
			.amp-wp-article-content amp-img.align-left,
			.amp-wp-article-content amp-img.alignright,
			.amp-wp-article-content amp-img.align-right {
				width: 280px;
				max-width: 46%;
				height: 210px;
			}

			.amp-wp-article-content > p:first-of-type > amp-img:first-child,
			.amp-wp-article-content > p:first-of-type > a:first-child > amp-img,
			.amp-wp-article-content > figure:first-of-type amp-img,
			.amp-wp-article-content > amp-img:first-child,
			.amp-wp-article-content > amp-anim:first-child,
			.ampforwp-featured-holder amp-img {
				width: 100%;
				max-width: 100%;
				height: auto;
			}
		}

		@media (max-width: 640px) {
			.amp-wp-article-content amp-img,
			.amp-wp-article-content amp-anim,
			.amp-wp-article-content amp-img.aligncenter,
			.amp-wp-article-content amp-img.align-center,
			.amp-wp-article-content amp-img.alignleft,
			.amp-wp-article-content amp-img.align-left,
			.amp-wp-article-content amp-img.alignright,
			.amp-wp-article-content amp-img.align-right {
				float: none;
				width: 280px;
				max-width: 100%;
				height: 210px;
				margin-left: auto;
				margin-right: auto;
			}

			.amp-wp-article-content > p:first-of-type > amp-img:first-child,
			.amp-wp-article-content > p:first-of-type > a:first-child > amp-img,
			.amp-wp-article-content > figure:first-of-type amp-img,
			.amp-wp-article-content > amp-img:first-child,
			.amp-wp-article-content > amp-anim:first-child,
			.ampforwp-featured-holder amp-img {
				width: 100%;
				max-width: 100%;
				height: auto;
				margin-left: 0;
				margin-right: 0;
			}
		}

		/* Meta Info (in-content fallbacks) */
		.ampforwp-meta-info {
			font-size: 14px;
			color: #666;
			margin: 4px 0 18px;
			text-align: left;
		}

.share-buttons {
	display: flex;
	gap: 14px;
	flex-wrap: wrap;
}

amp-social-share {
	border-radius: 50%;
	box-shadow: 0 4px 10px rgba(0,0,0,0.15);
	transition: transform 0.2s ease;
}

amp-social-share:hover {
	transform: translateY(-3px);
}


		/* Related Posts */
		.related-posts {
			margin-top: 40px;
			padding-top: 20px;
			border-top: 1px solid #eee;
		}
		
		.related-posts h3 {
			font-size: 20px;
			font-weight: 500;
			margin-bottom: 20px;
			text-align: left;
		}
		
		.related-posts-list {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
			gap: 16px;
		}
		
		.related-card {
			text-align: left;
			background: #fff;
			border-radius: 10px;
			padding: 10px;
			box-shadow: 0 2px 6px rgba(0,0,0,0.08);
			transition: transform 0.3s;
		}
		
		.related-card:hover {
			transform: translateY(-2px);
		}
		
		.related-card h4 {
			font-size: 15px;
			font-weight: 500;
			margin-top: 8px;
			color: #222;
		}
		
		.related-card a {
			text-decoration: none;
			color: inherit;
		}

/* ===== AMP TABLE FIX ===== */
		
.amp-wp-article-content div {
	overflow-x: auto;
}

.amp-wp-article-content table {
	display: block;
	width: 100%;
	overflow-x: auto;
	-webkit-overflow-scrolling: touch;
	border-collapse: collapse;
	margin: 20px 0;
	font-size: 14px;
	min-width: 700px;
}

.amp-wp-article-content th,
.amp-wp-article-content td {
	padding: 10px;
	border: 1px solid #ddd;
	text-align: left;
	vertical-align: top;
}

.amp-wp-article-content th {
	background: #1472ba;
	color: #fff;
}

.amp-wp-article-content tbody tr:nth-child(even) {
	background: #f9f9f9;
}
/* ===== AMP TABLE BUTTON FULL WIDTH ===== */

.amp-wp-article-content table td a {
	display: block;
	width: 100%;
	background: #432459;
	color: #ffffff;
	padding: 10px 14px;
	border-radius: 6px;
	text-decoration: none;
	font-size: 14px;
	font-weight: 600;
	text-align: center;
	box-sizing: border-box;
	margin: 4px 0;
}

/* Hover effect */
.amp-wp-article-content table td a:hover {
	opacity: 0.9;
}

		.addtoany_share_save_container{
			display:none;
		}

		/* CFBT desktop UI styles adapted for AMP */
		.cfbt-faq,
		.cfbt-quiz,
		.cfbt-review,
		.cfbt-related,
		.cfbt-cta {
			margin: 2.25rem auto;
			padding: 0;
			border: 0;
			border-radius: 0;
			background: transparent;
			box-shadow: none;
			max-width: 100%;
			text-align: left;
		}

		.cfbt-faq h2,
		.cfbt-quiz h2,
		.cfbt-review h2,
		.cfbt-related h2,
		.cfbt-cta h2 {
			margin-top: 0;
			margin-bottom: 1.2rem;
			font-size: 1.55rem;
			line-height: 1.25;
			color: #0f172a;
		}

		.cfbt-faq-accordion,
		.cfbt-faq-accordion > section {
			background: transparent;
		}

		.cfbt-faq-item {
			border: 1px solid #e5e7eb;
			background: #ffffff !important;
			border-radius: 14px;
			padding: 1rem 1.1rem;
			margin-bottom: 0.7rem;
			position: relative;
			box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
			transition: border-color 0.5s cubic-bezier(0.4, 0, 0.2, 1),
				box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.cfbt-faq-item > h3 {
			cursor: pointer;
			font-weight: 700;
			color: #0f172a;
			font-size: 0.98rem;
			line-height: 1.5;
			list-style: none;
			margin: 0;
			padding: 0;
			background: transparent;
		}

		.cfbt-faq-question {
			min-width: 0;
		}

		.cfbt-faq-sno {
			color: #1d4ed8;
			font-weight: 700;
			margin-right: 0.4rem;
		}

		.cfbt-faq-answer {
			margin-top: 0;
			color: #475569;
			line-height: 1.65;
			font-size: 0.93rem;
			opacity: 0;
			transform: translateY(-4px);
			transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1),
				transform 0.5s cubic-bezier(0.4, 0, 0.2, 1),
				margin-top 0.5s cubic-bezier(0.4, 0, 0.2, 1);
		}

		.cfbt-faq-item[expanded] {
			border-color: #bfdbfe;
			box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
		}

		.cfbt-faq-item[expanded] > h3 {
			color: #0f172a;
		}

		.cfbt-faq-item[expanded] .cfbt-faq-answer {
			margin-top: 0.6rem;
			opacity: 1;
			transform: translateY(0);
		}

		.cfbt-quiz {
			border: 1px solid #dbe3ea;
			border-radius: 18px;
			background: #fff;
			padding: 2rem 1.5rem;
			box-shadow: 0 18px 36px rgba(15, 23, 42, 0.1);
		}

		.cfbt-quiz-item + .cfbt-quiz-item {
			margin-top: 1.2rem;
		}

		.cfbt-quiz-item {
			border: 1px solid #e2e8f0;
			border-radius: 14px;
			background: linear-gradient(180deg, #fff, #f8fafc);
			padding: 1.1rem 1rem;
			box-shadow: 0 8px 16px rgba(15, 23, 42, 0.06);
		}

		.cfbt-quiz-options {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 0.7rem;
		}

		.cfbt-quiz-option {
			border: 1px solid #cbd5e1;
			border-radius: 12px;
			background: #fff;
			color: #0f172a;
			padding: 0.85rem 0.95rem;
			font-weight: 600;
			text-align: left;
			display: flex;
			align-items: flex-start;
			gap: 0.62rem;
			box-shadow: 0 3px 8px rgba(15, 23, 42, 0.04);
			cursor: pointer;
			transition: border-color 0.18s ease, background-color 0.18s ease, box-shadow 0.18s ease;
		}

		.cfbt-quiz-option-input {
			position: absolute;
			opacity: 0;
			margin: 0;
			width: 1px;
			height: 1px;
			pointer-events: none;
		}

		.cfbt-quiz-option-input:checked + .cfbt-quiz-option {
			border-color: #16a34a;
			background: #f0fdf4;
			box-shadow: 0 8px 16px rgba(22, 163, 74, 0.16);
		}

		.cfbt-quiz-option-input:checked + .cfbt-quiz-option .cfbt-quiz-option-label {
			color: #166534;
		}

		.cfbt-quiz-option-input:checked + .cfbt-quiz-option .cfbt-quiz-option-text {
			color: #166534;
		}

		.cfbt-quiz-option-input:checked + .cfbt-quiz-option .cfbt-quiz-option-text::after {
			content: "  (Selected)";
			color: #166534;
			font-weight: 700;
			font-size: 0.82em;
		}

		.cfbt-quiz-option-input:focus + .cfbt-quiz-option {
			border-color: #2563eb;
			box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
		}

		.cfbt-quiz-option-label {
			color: #1d4ed8;
			font-weight: 800;
			min-width: 1.4rem;
		}

		.cfbt-quiz-option-text {
			flex: 1;
			line-height: 1.45;
		}

		.cfbt-review-list {
			margin-top: 1.25rem;
			display: grid;
			gap: 0.85rem;
		}

		.cfbt-review-item {
			border: 1px solid #dbe3ea;
			border-radius: 14px;
			padding: 0.95rem 1rem;
			background: linear-gradient(180deg, #fff, #f8fafc);
			box-shadow: 0 8px 18px rgba(15, 23, 42, 0.05);
		}

		.cfbt-review-item-head {
			display: flex;
			align-items: flex-start;
			justify-content: space-between;
			gap: 0.6rem;
			margin-bottom: 0.55rem;
		}

		.cfbt-review-author-wrap {
			display: flex;
			align-items: center;
			gap: 0.7rem;
			min-width: 0;
		}

		.cfbt-review-avatar {
			border-radius: 999px;
			overflow: hidden;
			flex-shrink: 0;
			background: #e2e8f0;
		}

		.cfbt-review-author-meta {
			display: flex;
			flex-direction: column;
			gap: 0.08rem;
			min-width: 0;
		}

		.cfbt-review-author {
			font-size: 0.98rem;
			color: #0f172a;
			line-height: 1.25;
		}

		.cfbt-review-date {
			font-size: 0.82rem;
			color: #64748b;
			line-height: 1.25;
		}

		.cfbt-review-rating {
			color: #f59e0b;
			letter-spacing: 0.05em;
			font-size: 0.95rem;
			white-space: nowrap;
		}

		.cfbt-review-rating-wrap {
			padding-top: 0.15rem;
		}

		.cfbt-review-rating--empty {
			color: #94a3b8;
			font-size: 0.8rem;
			letter-spacing: 0;
		}

		.cfbt-review-comment {
			margin: 0;
			color: #334155;
			line-height: 1.65;
			background: #fff;
			border: 1px solid #e2e8f0;
			border-left: 3px solid #cbd5e1;
			border-radius: 10px;
			padding: 0.72rem 0.8rem;
			white-space: pre-line;
			overflow-wrap: anywhere;
			font-size: 0.95rem;
		}

		.cfbt-cta {
			margin-top: 2rem;
			padding: 1.6rem 1.5rem;
			border: 1px solid #1d4ed8;
			border-radius: 18px;
			background:
				radial-gradient(circle at 12% 18%, rgba(255, 255, 255, 0.28), transparent 45%),
				radial-gradient(circle at 88% 82%, rgba(191, 219, 254, 0.32), transparent 42%),
				linear-gradient(135deg, #0f172a, #1e3a8a 52%, #2563eb);
			box-shadow: 0 18px 32px rgba(30, 58, 138, 0.28);
		}

		.cfbt-cta p {
			margin: 0 0 1rem;
			color: rgba(241, 245, 249, 0.95);
			font-size: 1.03rem;
			line-height: 1.65;
			max-width: 54ch;
		}

		.cfbt-cta h2 {
			color: #fff;
			font-size: 1.75rem;
			margin-bottom: 0.75rem;
			line-height: 1.2;
		}

		.cfbt-cta-btn {
			display: inline-block;
			text-decoration: none;
			background: linear-gradient(135deg, #f8fafc, #dbeafe);
			border-radius: 999px;
			padding: 0.72rem 1.35rem;
			font-weight: 700;
			color: #1e3a8a;
			border: 1px solid rgba(255, 255, 255, 0.48);
			box-shadow: 0 8px 18px rgba(15, 23, 42, 0.2);
		}

		.related-posts.cfbt-related .related-posts-list {
			display: grid;
			grid-template-columns: repeat(3, minmax(0, 1fr));
			gap: 24px;
		}

		.related-posts.cfbt-related .blog-item {
			background: #fff;
			border-radius: 12px;
			overflow: hidden;
			box-shadow: 0 4px 10px rgba(0,0,0,0.06);
			display: flex;
			flex-direction: column;
			height: 100%;
			border: 1px solid #e8e8e8;
		}

		.related-posts.cfbt-related .blog-item amp-img {
			width: 100%;
			height: 190px;
			object-fit: contain;
			background: #f8f8f8;
		}

		.related-posts.cfbt-related .blog-content {
			padding: 16px;
			display: flex;
			flex-direction: column;
			flex: 1;
		}

		.related-posts.cfbt-related .blog-title {
			font-size: 20px;
			font-weight: 700;
			margin: 0 0 12px 0;
			line-height: 1.3;
			color: #0f2a47;
			min-height: 50px;
			max-height: 50px;
			overflow: hidden;
		}

		.related-posts.cfbt-related .blog-title a {
			color: inherit;
			text-decoration: none;
		}

		.related-posts.cfbt-related .blog-meta {
			font-size: 13px;
			color: #777;
			margin: 0 0 12px 0;
			min-height: 20px;
		}

		.related-posts.cfbt-related .blog-desc {
			font-size: 14px;
			color: #77899c;
			margin: 0 0 12px 0;
			line-height: 1.5;
			min-height: 60px;
			max-height: 60px;
			overflow: hidden;
		}

		.related-posts.cfbt-related .blog-card-footer {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
			margin-top: auto;
		}

		.related-posts.cfbt-related .blog-read-time {
			font-size: 13px;
			color: #fff;
			background: #1472ba;
			padding: 5px 12px;
			border-radius: 6px;
			font-weight: 700;
			display: inline-flex;
			align-items: center;
			width: fit-content;
			flex-shrink: 0;
			margin: 0;
		}

		.related-posts.cfbt-related .read-more {
			margin: 0;
			font-size: 14px;
			font-weight: 600;
			color: #1472ba;
			display: inline-block;
			text-decoration: none;
			white-space: nowrap;
			margin-left: auto;
		}

		@media (max-width: 992px) {
			.related-posts.cfbt-related .related-posts-list {
				grid-template-columns: repeat(2, minmax(0, 1fr));
			}
		}

		@media (max-width: 767px) {
			.cfbt-quiz-options,
			.related-posts.cfbt-related .related-posts-list {
				grid-template-columns: 1fr;
			}

			.cfbt-review-item-head {
				align-items: flex-start;
				flex-direction: row;
				gap: 0.3rem;
				flex-wrap: wrap;
			}

			.cfbt-review-author-wrap {
				width: 100%;
			}

			.cfbt-cta {
				padding: 1.2rem 1rem;
				border-radius: 14px;
			}
		}

		/* Floating AMP review form */
		.cfbt-amp-review-fab {
			position: fixed;
			right: 16px;
			bottom: 18px;
			z-index: 99;
			border: 0;
			border-radius: 999px;
			padding: 12px 18px;
			background: linear-gradient(135deg, #0f172a, #1e3a8a);
			color: #fff;
			font-size: 14px;
			font-weight: 700;
			box-shadow: 0 12px 24px rgba(15, 23, 42, 0.24);
		}

		.cfbt-amp-lightbox-shell {
			background: rgba(2, 6, 23, 0.7);
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 20px 12px;
			box-sizing: border-box;
		}

		.cfbt-amp-lightbox-card {
			width: 100%;
			max-width: 520px;
			background: #fff;
			border-radius: 14px;
			padding: 18px 16px 16px;
			position: relative;
			box-sizing: border-box;
			border: 1px solid #dbe3ea;
			box-shadow: 0 18px 36px rgba(15, 23, 42, 0.2);
		}

		.cfbt-amp-lightbox-card h2 {
			margin: 0 32px 10px 0;
			font-size: 1.2rem;
			line-height: 1.35;
			color: #0f172a;
		}

		.cfbt-amp-lightbox-close {
			position: absolute;
			top: 10px;
			right: 10px;
			border: 0;
			background: #eef2ff;
			color: #0f172a;
			border-radius: 50%;
			width: 30px;
			height: 30px;
			font-weight: 700;
		}

		.cfbt-amp-review-form.cfbt-review-form {
			max-width: none;
			border: 0;
			border-radius: 0;
			padding: 0;
			box-shadow: none;
			background: transparent;
		}

		.cfbt-amp-review-form p {
			margin: 0 0 0.6rem;
		}

		.cfbt-amp-review-form label {
			display: block;
			margin: 0 0 5px;
			font-weight: 600;
			color: #0f172a;
			font-size: 0.92rem;
		}

		.cfbt-amp-review-form input,
		.cfbt-amp-review-form select,
		.cfbt-amp-review-form textarea {
			width: 100%;
			border: 1px solid #cbd5e1;
			border-radius: 10px;
			padding: 9px 10px;
			box-sizing: border-box;
			background: #fff;
			font-size: 0.95rem;
			line-height: 1.35;
		}

		.cfbt-amp-review-form textarea {
			min-height: 105px;
			resize: vertical;
		}

		.cfbt-amp-review-form .cfbt-review-row {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 0.5rem;
		}

		.cfbt-amp-review-form .cfbt-review-col {
			margin: 0;
		}

		.cfbt-required {
			color: #dc2626;
			font-weight: 700;
		}

		.cfbt-amp-star-rating {
			display: inline-flex;
			gap: 0.35rem;
			padding: 4px 2px 2px;
		}

		.cfbt-star-label {
			display: inline-flex;
			align-items: center;
			cursor: pointer;
			margin: 0;
		}

		.cfbt-star-label input {
			position: absolute;
			opacity: 0;
			width: 1px;
			height: 1px;
			pointer-events: none;
		}

		.cfbt-star-icon {
			font-size: 1.9rem;
			line-height: 1;
			color: #cbd5e1;
		}

		.cfbt-star-label input:focus + .cfbt-star-icon {
			text-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
			border-radius: 4px;
		}

		.cfbt-star-label input:checked + .cfbt-star-icon {
			color: #facc15;
		}

		@media (max-width: 767px) {
			.cfbt-amp-review-form .cfbt-review-row {
				grid-template-columns: 1fr;
			}
		}

		.cfbt-amp-submit {
			margin-top: 8px;
			border: 0;
			border-radius: 10px;
			background: linear-gradient(135deg, #0f172a, #1e3a8a);
			color: #fff;
			font-weight: 700;
			padding: 11px 14px;
			width: 100%;
			font-size: 0.95rem;
		}

		.cfbt-amp-form-message {
			margin-top: 10px;
			padding: 10px 12px;
			border-radius: 8px;
			font-size: 14px;
			line-height: 1.4;
		}

		.cfbt-amp-form-message.is-success {
			background: #f0fdf4;
			color: #166534;
			border: 1px solid #bbf7d0;
		}

		.cfbt-amp-form-message.is-error {
			background: #fef2f2;
			color: #991b1b;
			border: 1px solid #fecaca;
		}

		/* Hide honeypot anti-spam field */
		.cfbt-honeypot {
			position: absolute !important;
			left: -9999px !important;
			opacity: 0 !important;
			pointer-events: none !important;
			width: 1px !important;
			height: 1px !important;
			overflow: hidden !important;
		}
		.ans-honeypot{
			position: absolute !important;
			left: -9999px !important;
			opacity: 0 !important;
			pointer-events: none !important;
			width: 1px !important;
			height: 1px !important;
			overflow: hidden !important;
		}

		
		.amp-plain-brand {
			color: #fff;
			text-decoration: none;
			font-size: 16px;
			font-weight: 700;
			line-height: 1.2;
		}

		.amp-plain-home {
			color: #bfdbfe;
			text-decoration: none;
			font-size: 13px;
			font-weight: 600;
		}

		.footer-bottom-links {
        list-style: none;
    
        }
		<?php 
		// Output optimized menu and footer CSS
		$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
		echo $optimizer->get_optimized_css( 'blog', array( 'menu', 'footer', 'breadcrumbs', 'connect-fab' ) );
		?>
	</style>
	
	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>
</head>
<body class="amp-single">


	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

	<div class="amp-content-wrapper">
	<section class="ep-blog-post-hero" aria-labelledby="ep-blog-post-title">
		<div class="ep-blog-post-hero__inner">
			<?php elearnposh_amp_render_breadcrumbs(); ?>
			<h1 id="ep-blog-post-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
			<div class="ampforwp-meta-info">
				<span><?php echo esc_html( get_the_date() ); ?></span>
				<?php
				$read_time = '';
				if ( function_exists( 'get_field' ) ) {
					$read_time = get_field( 'read_time' );
				}
				if ( ! $read_time ) {
					$content = get_post_field( 'post_content', $this->get( 'post_id' ) );
					if ( $content ) {
						$words     = str_word_count( wp_strip_all_tags( $content ) );
						$read_time = (int) ceil( $words / 200 );
					} else {
						$read_time = 1;
					}
				}
				?>
				<span class="ep-blog-read-time"><?php echo esc_html( (string) $read_time ); ?> min read</span>
			</div>
			<span class="ep-blog-subscribe-btn">
				<a href="#newsletter-subscription-form" class="ep-blog-subscribe-link">
					<?php esc_html_e( 'Subscribe to our Newsletter', 'elearnposh-amp' ); ?>
				</a>
			</span>
		</div>
	</section>
	<main>
		<article class="amp-wp-article">

			<!-- Article Content -->
			<div class="amp-wp-article-content">
				<?php 
				$amp_custom_content_enable = get_post_meta( $this->get( 'post_id' ), 'ampforwp_custom_content_editor_checkbox', true );
				$current_amp_content       = '';

				if ( ! $amp_custom_content_enable ) {
					$current_amp_content = (string) $this->get( 'post_amp_content' );
				} else {
					$current_amp_content = (string) $this->get( 'ampforwp_amp_content' );
				}
				if ( function_exists( 'elearnposh_amp_sanitize_amp_fragment' ) ) {
					$current_amp_content = elearnposh_amp_sanitize_amp_fragment( $current_amp_content );
				}
				echo $current_amp_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</div>

			<?php
			$post_id = $this->get( 'post_id' );
			$content_has_quiz = ( false !== strpos( $current_amp_content, 'cfbt-quiz' ) );
			if ( ! $content_has_quiz ) {
				echo elearnposh_amp_render_cfbt_quiz( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			echo elearnposh_amp_render_cfbt_faq( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo elearnposh_amp_render_cfbt_cta( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo elearnposh_amp_render_cfbt_review_fab( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>

			<!-- AMP Social Share -->
<div class="share-block">
	<h3>Share this Blog</h3>
	<div class="share-buttons">

		<amp-social-share type="facebook"
			width="44"
			height="44">
		</amp-social-share>

		<amp-social-share type="linkedin"
			width="44"
			height="44">
		</amp-social-share>

		<amp-social-share type="twitter"
			width="44"
			height="44">
		</amp-social-share>

		<amp-social-share type="whatsapp"
			width="44"
			height="44">
		</amp-social-share>

		<amp-social-share type="email"
			width="44"
			height="44">
		</amp-social-share>

	</div>
</div>



			<!-- Related Posts -->
			<div class="related-posts cfbt-related">
				<h3><?php esc_html_e( 'Other Blog Posts', 'elearnposh-amp' ); ?></h3>
				<div class="related-posts-list">
					<?php
					$cfbt_related_enabled = get_post_meta( $this->get( 'post_id' ), '_cfbt_enable_related', true );
					$related_args         = array(
						'post_type'      => 'post',
						'posts_per_page' => 4,
						'post__not_in'   => array( $this->get( 'post_id' ) ),
						'category__not_in' => array( get_cat_ID( 'newsletter' ) ),
					);

					if ( '1' === $cfbt_related_enabled ) {
						$category_ids = wp_get_post_categories( $this->get( 'post_id' ) );
						if ( ! empty( $category_ids ) ) {
							$related_args['category__in'] = $category_ids;
						}
					}
					$related_query = new WP_Query( $related_args );

					if ( $related_query->have_posts() ) :
						while ( $related_query->have_posts() ) :
							$related_query->the_post();
							$words     = str_word_count( strip_tags( get_post_field( 'post_content', get_the_ID() ) ) );
							$read_time = max( 1, ceil( $words / 200 ) );
							?>
							<article class="blog-item related-card">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php echo esc_url( get_permalink() ); ?>?amp">
										<amp-img
											src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ); ?>"
											width="600"
											height="400"
											layout="responsive"
											alt="<?php the_title_attribute(); ?>">
										</amp-img>
									</a>
								<?php else : ?>
									<div style="width: 100%; height: 190px; background: #f8f8f8; display: flex; align-items: center; justify-content: center; color: #999; font-size: 12px;">
										<?php esc_html_e( 'No Image', 'elearnposh-amp' ); ?>
									</div>
								<?php endif; ?>

								<div class="blog-content">
									<h3 class="blog-title">
										<a href="<?php echo esc_url( get_permalink() ); ?>?amp"><?php the_title(); ?></a>
									</h3>

									<div class="blog-meta related-meta">
										<?php echo esc_html( get_the_date() ); ?>
									</div>

									<div class="blog-desc">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
									</div>

								<div class="blog-card-footer">
									<div class="blog-read-time">
										<?php
										/* translators: %s: Reading time in minutes */
										echo esc_html( sprintf( __( '%s min read', 'elearnposh-amp' ), $read_time ) );
										?>
									</div>
									<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>?amp">
										<?php esc_html_e( 'Read More →', 'elearnposh-amp' ); ?>
									</a>
								</div>
								</div>
							</article>
						<?php
						endwhile;
						wp_reset_postdata();
					else : 
						?>
						<p><?php esc_html_e( 'No blog posts available.', 'elearnposh-amp' ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<?php
			echo elearnposh_amp_render_cfbt_reviews( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>

		</article>
	</main>
	</div><!-- .amp-content-wrapper -->

	<a
		class="pa-connect-fab"
		href="<?php echo esc_url( elearnposh_amp_url( '/contact-us/' ) ); ?>"
		aria-label="<?php esc_attr_e( "Let's Connect — Contact Us", 'elearnposh-amp' ); ?>"
	><?php esc_html_e( "Let's Connect", 'elearnposh-amp' ); ?></a>

	<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>
</body>
</html>


