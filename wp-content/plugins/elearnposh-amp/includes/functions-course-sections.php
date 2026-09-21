<?php
/**
 * Reusable course page sections for AMP templates.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'elearnposh_amp_format_key_point' ) ) {
	/**
	 * Capitalize key-point text for AMP output.
	 *
	 * @param string $text Key point text.
	 * @return string
	 */
	function elearnposh_amp_format_key_point( $text ) {
		if ( function_exists( 'elearnposh_capitalize_key_point' ) ) {
			return elearnposh_capitalize_key_point( $text );
		}

		$text = trim( (string) $text );

		if ( '' === $text ) {
			return $text;
		}

		if ( function_exists( 'mb_substr' ) && function_exists( 'mb_strtoupper' ) ) {
			return mb_strtoupper( mb_substr( $text, 0, 1 ) ) . mb_substr( $text, 1 );
		}

		return ucfirst( $text );
	}
}

/**
 * Output extended .pfe course styles once per page.
 */
function elearnposh_amp_output_course_pfe_extended_styles() {
	static $printed = false;

	if ( $printed ) {
		return;
	}

	$printed = true;
	elearnposh_amp_include_style_partial( 'page-hero-subtitle' );
	include ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/course-pfe-extended-styles.php';
}

/**
 * Render a split topic card grid with check icons.
 *
 * @param string               $heading     Optional section heading.
 * @param array<int, string>   $topics      Topic labels.
 * @param string               $heading_tag Heading element tag.
 */
function elearnposh_amp_render_topic_card_list( $heading, array $topics, $heading_tag = 'h4' ) {
	elearnposh_amp_render_learning_outcomes_block( $heading, '', $topics, true );
}

/**
 * Render icon topic cards (desktop pfe-card-list parity).
 *
 * @param array<int, array{icon:string,color:string,label:string,alt?:string}> $items Topic cards.
 */
function elearnposh_amp_render_icon_topic_card_list( array $items ) {
	$items = array_values( array_filter( $items ) );

	if ( empty( $items ) ) {
		return;
	}
	?>
	<div class="pfe-card-list pfe-card-list--split">
		<?php foreach ( $items as $item ) : ?>
			<?php
			$icon  = isset( $item['icon'] ) ? esc_url( $item['icon'] ) : '';
			$color = isset( $item['color'] ) ? sanitize_hex_color( $item['color'] ) : '#1e88d8';
			$label = isset( $item['label'] ) ? (string) $item['label'] : '';
			$alt   = isset( $item['alt'] ) ? (string) $item['alt'] : $label;

			if ( empty( $icon ) || empty( $label ) ) {
				continue;
			}
			?>
		<div class="pfe-card-list__item">
			<div class="pfe-card-list__icon" style="background-color:<?php echo esc_attr( $color ? $color : '#1e88d8' ); ?>">
				<amp-img src="<?php echo $icon; ?>" width="32" height="32" layout="fixed" alt="<?php echo esc_attr( $alt ); ?>"></amp-img>
			</div>
			<div class="pfe-card-list__content"><?php echo esc_html( $label ); ?></div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Render numbered why-cards grid (desktop parity).
 *
 * @param string                            $heading    Section heading.
 * @param array<int, array{accent:string,text:string}> $cards Card data.
 * @param string                            $aria_label Accessible label.
 */
function elearnposh_amp_render_why_cards_section( $heading, array $cards, $aria_label = '' ) {
	$cards = array_values( array_filter( $cards ) );

	if ( empty( $cards ) ) {
		return;
	}
	?>
	<div class="pfe-info-panel pfe-info-panel--plain">
		<h2 class="pfe-title"><?php echo esc_html( $heading ); ?></h2>
		<ul class="pfe-why-cards"<?php echo $aria_label ? ' aria-label="' . esc_attr( $aria_label ) . '"' : ''; ?>>
			<?php foreach ( $cards as $index => $card ) : ?>
			<li class="pfe-why-card" style="--card-accent:<?php echo esc_attr( $card['accent'] ); ?>">
				<span class="pfe-why-card__num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
				<p class="pfe-why-card__text"><?php echo esc_html( $card['text'] ); ?></p>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
}

/**
 * Render enterprise delivery timeline (static AMP version).
 *
 * @param string                               $heading Section heading.
 * @param array<int, array{title:string,text:string}> $items   Timeline items.
 */
function elearnposh_amp_render_enterprise_timeline( $heading, array $items ) {
	$items = array_values( array_filter( $items ) );

	if ( empty( $items ) ) {
		return;
	}
	?>
	<div class="pfe-info-panel pfe-info-panel--plain">
		<h2 class="pfe-title"><?php echo esc_html( $heading ); ?></h2>
		<div class="pfe-choose-timeline">
			<ul>
				<?php foreach ( $items as $index => $item ) : ?>
				<li class="pfe-choose-step">
					<span class="pfe-choose-dot" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<div class="pfe-choose-card pfe-choose-card--stack">
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<?php
}

/**
 * Render demo CTA block with optional YouTube preview.
 *
 * @param string $demo_url    Demo URL.
 * @param string $youtube_id  Optional YouTube video id.
 */
function elearnposh_amp_render_pfe_demo_cta( $demo_url, $youtube_id = '2u_YZty7nd4' ) {
	?>
	<div class="pfe-demo-cta ep-cta-shell--white">
		<div class="pfe-demo-copy">
			<span class="pfe-demo-chip"><?php esc_html_e( 'Ready to roll out POSH training?', 'elearnposh-amp' ); ?></span>
			<h2><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></h2>
			<p><?php esc_html_e( 'Whether you need a strong foundational POSH course for all employees or a more advanced subscription with microlearning, manager training, and HR support resources, our employee training solutions are designed to help organizations build safer, more respectful workplaces. Get a product walkthrough, plan guidance, and deployment support.', 'elearnposh-amp' ); ?></p>
		</div>
		<div class="pfe-demo-actions">
			<a class="btn-primary" href="<?php echo esc_url( $demo_url ); ?>" aria-label="<?php esc_attr_e( 'Schedule a Demo', 'elearnposh-amp' ); ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
		</div>
		<?php if ( $youtube_id ) : ?>
		<div class="pfe-demo-video">
			<amp-youtube data-videoid="<?php echo esc_attr( $youtube_id ); ?>" layout="responsive" width="16" height="9"></amp-youtube>
		</div>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Render employee-style learning outcomes with tick rows.
 *
 * @param string               $section_heading Section title.
 * @param string               $list_intro      Intro line above outcomes.
 * @param array<int, string>   $outcomes        Outcome lines.
 * @param bool                 $split_list      Use a two-column list layout on tablet and up.
 */
function elearnposh_amp_render_learning_outcomes_block( $section_heading, $list_intro, array $outcomes, $split_list = false ) {
	$outcomes = array_values( array_filter( $outcomes ) );

	if ( empty( $outcomes ) ) {
		return;
	}
	?>
	<div class="pfe-learning-outcomes">
		<?php if ( $section_heading ) : ?>
		<h3 class="pfe-learning-outcomes__title"><?php echo esc_html( $section_heading ); ?></h3>
		<?php endif; ?>
		<?php if ( $list_intro ) : ?>
		<p class="pfe-learning-outcomes__intro"><?php echo esc_html( $list_intro ); ?></p>
		<?php endif; ?>
		<ul class="pfe-learning-outcomes__list<?php echo $split_list ? ' pfe-learning-outcomes__list--split' : ''; ?>">
			<?php foreach ( $outcomes as $outcome ) : ?>
			<li><span class="pfe-learning-outcomes__tick" aria-hidden="true"></span><?php echo esc_html( elearnposh_amp_format_key_point( $outcome ) ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
}

/**
 * Render a tick-list outcomes card.
 *
 * @param string               $title    Section heading.
 * @param array<int, string>   $outcomes Outcome lines.
 */
function elearnposh_amp_render_outcomes_card( $title, array $outcomes ) {
	if ( empty( $outcomes ) ) {
		return;
	}
	?>
	<article class="pfe-card pocso-outcomes-card">
		<h2 class="pfe-title pocso-outcomes-title"><?php echo esc_html( $title ); ?></h2>
		<ul class="pocso-outcomes-list">
			<?php foreach ( $outcomes as $outcome ) : ?>
			<li>
				<span class="pocso-outcomes-tick" aria-hidden="true"></span>
				<span class="pocso-outcomes-text"><?php echo esc_html( elearnposh_amp_format_key_point( $outcome ) ); ?></span>
			</li>
			<?php endforeach; ?>
		</ul>
	</article>
	<?php
}

/**
 * Render a centered demo CTA band.
 *
 * @param string $text      Body copy.
 * @param string $demo_url  Demo URL.
 * @param string $heading   Optional heading above copy.
 */
function elearnposh_amp_render_cta_band( $text, $demo_url, $heading = '' ) {
	?>
	<div class="pfe-cta-band ep-cta-shell--white">
		<?php if ( $heading ) : ?>
		<h2 class="pfe-title"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		<p><?php echo esc_html( $text ); ?></p>
		<a class="btn-primary" href="<?php echo esc_url( $demo_url ); ?>"><?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?></a>
	</div>
	<?php
}

/**
 * Render course details + salient features panels (desktop tick-list parity).
 *
 * @param string               $subtitle          Optional subtitle.
 * @param array<int, string>   $details_items     Course detail bullets.
 * @param array<int, string>   $highlights_items  Salient feature bullets.
 * @param string               $cta_url           Optional CTA URL.
 * @param string               $cta_label         Optional CTA label.
 * @param string               $cta_aria_label    Optional CTA aria-label.
 * @param string               $section_id        Optional section element id.
 */
function elearnposh_amp_render_course_details_cards( $subtitle, array $details_items, array $highlights_items, $cta_url = '', $cta_label = '', $cta_aria_label = '', $section_id = 'pfe-details', $details_title = '', $highlights_title = '' ) {
	$details_items    = array_values( array_filter( $details_items ) );
	$highlights_items = array_values( array_filter( $highlights_items ) );

	if ( empty( $details_items ) && empty( $highlights_items ) ) {
		return;
	}

	if ( empty( $cta_label ) ) {
		$cta_label = __( 'Book a Demo', 'elearnposh-amp' );
	}

	if ( empty( $details_title ) ) {
		$details_title = __( 'Course Details', 'elearnposh-amp' );
	}

	if ( empty( $highlights_title ) ) {
		$highlights_title = __( 'Course Highlights', 'elearnposh-amp' );
	}
	?>
	<section class="pfe-section-sm"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
		<div class="pfe-wrap">
			<h2 class="pfe-title"><?php esc_html_e( 'Course details and highlights', 'elearnposh-amp' ); ?></h2>
			<?php if ( $subtitle ) : ?>
			<p class="pfe-sub"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
			<div class="pfe-grid-2 pfe-details-grid">
				<?php if ( ! empty( $details_items ) ) : ?>
				<div class="pfe-details-panel">
					<h3 class="pfe-title pfe-details-panel-title"><?php echo esc_html( $details_title ); ?></h3>
					<ul class="pfe-tick-list">
						<?php foreach ( $details_items as $item ) : ?>
						<li><span class="pfe-tick-icon" aria-hidden="true"></span><?php echo esc_html( elearnposh_amp_format_key_point( $item ) ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				<?php if ( ! empty( $highlights_items ) ) : ?>
				<div class="pfe-details-panel">
					<h3 class="pfe-title pfe-details-panel-title"><?php echo esc_html( $highlights_title ); ?></h3>
					<ul class="pfe-tick-list">
						<?php foreach ( $highlights_items as $item ) : ?>
						<li><span class="pfe-tick-icon" aria-hidden="true"></span><?php echo esc_html( elearnposh_amp_format_key_point( $item ) ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			<?php if ( $cta_url ) : ?>
			<div class="pfe-details-cta">
				<a class="btn-primary" href="<?php echo esc_url( $cta_url ); ?>"<?php echo $cta_aria_label ? ' aria-label="' . esc_attr( $cta_aria_label ) . '"' : ''; ?>><?php echo esc_html( $cta_label ); ?></a>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

/**
 * Render course details / highlights panels only (embedded layout).
 *
 * @param array $args Panel arguments (heading, subtitle, details_title, details_items, highlights_title, highlights_items, wrapper_class).
 */
function elearnposh_amp_render_course_details_panels( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'heading'          => '',
			'subtitle'         => '',
			'details_title'    => __( 'Course Details', 'elearnposh-amp' ),
			'details_items'    => array(),
			'highlights_title' => __( 'Salient Features', 'elearnposh-amp' ),
			'highlights_items' => array(),
			'wrapper_class'    => 'pfe-details-panels',
		)
	);

	$details_items    = array_values( array_filter( (array) $args['details_items'] ) );
	$highlights_items = array_values( array_filter( (array) $args['highlights_items'] ) );

	if ( empty( $details_items ) && empty( $highlights_items ) ) {
		return;
	}
	?>
	<div class="<?php echo esc_attr( $args['wrapper_class'] ); ?>">
		<?php if ( ! empty( $args['heading'] ) ) : ?>
		<h2 class="pfe-title pfe-details-panels__heading"><?php echo esc_html( $args['heading'] ); ?></h2>
		<?php endif; ?>
		<?php if ( ! empty( $args['subtitle'] ) ) : ?>
		<p class="pfe-sub pfe-details-panels__subtitle"><?php echo esc_html( $args['subtitle'] ); ?></p>
		<?php endif; ?>
		<div class="pfe-details-panels__grid">
			<?php if ( ! empty( $details_items ) ) : ?>
			<div class="pfe-details-panel">
				<?php if ( ! empty( $args['details_title'] ) ) : ?>
				<h3 class="pfe-title pfe-details-panel-title"><?php echo esc_html( $args['details_title'] ); ?></h3>
				<?php endif; ?>
				<ul class="pfe-tick-list<?php echo empty( $args['details_title'] ) ? ' pfe-tick-list--flush' : ''; ?>">
					<?php foreach ( $details_items as $item ) : ?>
					<li><span class="pfe-tick-icon" aria-hidden="true"></span><?php echo esc_html( elearnposh_amp_format_key_point( $item ) ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php if ( ! empty( $highlights_items ) ) : ?>
			<div class="pfe-details-panel">
				<?php if ( ! empty( $args['highlights_title'] ) ) : ?>
				<h3 class="pfe-title pfe-details-panel-title"><?php echo esc_html( $args['highlights_title'] ); ?></h3>
				<?php endif; ?>
				<ul class="pfe-tick-list<?php echo empty( $args['highlights_title'] ) ? ' pfe-tick-list--flush' : ''; ?>">
					<?php foreach ( $highlights_items as $item ) : ?>
					<li><span class="pfe-tick-icon" aria-hidden="true"></span><?php echo esc_html( elearnposh_amp_format_key_point( $item ) ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
}

/**
 * Render managers outcomes card with optional side-by-side video.
 *
 * @param array<int, string> $outcomes    Outcome lines.
 * @param string             $youtube_id  Optional YouTube video id.
 */
function elearnposh_amp_render_mgr_outcomes_section( array $outcomes, $youtube_id = '' ) {
	$outcomes = array_values( array_filter( $outcomes ) );

	if ( empty( $outcomes ) && empty( $youtube_id ) ) {
		return;
	}
	?>
	<section class="pfe-section-sm">
		<div class="pfe-wrap">
			<article class="pfe-card mgr-outcomes-card">
				<h2 class="pfe-title mgr-outcomes-title"><?php esc_html_e( 'Through this course, the managers should be able to:', 'elearnposh-amp' ); ?></h2>
				<div class="mgr-outcomes-body<?php echo $youtube_id ? '' : ' mgr-outcomes-body--no-video'; ?>">
					<?php if ( ! empty( $outcomes ) ) : ?>
					<ul class="pfe-list mgr-outcomes-list">
						<?php foreach ( $outcomes as $outcome ) : ?>
						<li><span class="mgr-tick-icon" aria-hidden="true"></span><?php echo esc_html( elearnposh_amp_format_key_point( $outcome ) ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<?php if ( $youtube_id ) : ?>
					<div class="mgr-outcomes-video" aria-label="<?php esc_attr_e( 'POSH Training for Managers course overview video', 'elearnposh-amp' ); ?>">
						<div class="pfe-video">
							<amp-youtube data-videoid="<?php echo esc_attr( $youtube_id ); ?>" layout="responsive" width="16" height="9"></amp-youtube>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</article>
		</div>
	</section>
	<?php
}

/**
 * Build FAQPage schema from FAQ items.
 *
 * @param array<int, array<string, mixed>> $faq_items FAQ items.
 * @return array<string, mixed>
 */
function elearnposh_amp_build_faq_schema( array $faq_items ) {
	$schema = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => array(),
	);

	foreach ( $faq_items as $faq_item ) {
		$answer_text = '';
		if ( ! empty( $faq_item['type'] ) && 'list' === $faq_item['type'] ) {
			$parts = array();
			if ( ! empty( $faq_item['intro'] ) ) {
				$parts[] = $faq_item['intro'];
			}
			if ( ! empty( $faq_item['items'] ) && is_array( $faq_item['items'] ) ) {
				$parts[] = implode( ' ', $faq_item['items'] );
			}
			if ( ! empty( $faq_item['outro'] ) ) {
				$parts[] = $faq_item['outro'];
			}
			$answer_text = implode( ' ', $parts );
		} else {
			if ( ! empty( $faq_item['a_html'] ) ) {
				$answer_text = wp_strip_all_tags( (string) $faq_item['a_html'] );
			} else {
				$answer_text = isset( $faq_item['a'] ) ? (string) $faq_item['a'] : '';
			}
		}

		$schema['mainEntity'][] = array(
			'@type'          => 'Question',
			'name'           => isset( $faq_item['q'] ) ? $faq_item['q'] : '',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $answer_text,
			),
		);
	}

	return $schema;
}

/**
 * Render FAQ accordion section.
 *
 * @param array<int, array<string, mixed>> $faq_items FAQ items.
 * @param string                          $section_id Optional section id.
 * @param string                          $title      Optional section title.
 */
function elearnposh_amp_render_faq_section( array $faq_items, $section_id = 'pfe-faq', $title = '' ) {
	if ( empty( $faq_items ) ) {
		return;
	}
	if ( '' === $title ) {
		$title = __( 'FAQs', 'elearnposh-amp' );
	}
	?>
	<section class="pfe-section" id="<?php echo esc_attr( $section_id ); ?>">
		<div class="pfe-wrap">
			<h2 class="pfe-title"><?php echo esc_html( $title ); ?></h2>
			<amp-accordion animate expand-single-section>
				<?php foreach ( $faq_items as $index => $faq_item ) : ?>
				<section<?php echo 0 === $index ? ' expanded' : ''; ?>>
					<h3 class="faq-q"><?php echo esc_html( ( $index + 1 ) . '. ' . $faq_item['q'] ); ?></h3>
					<div class="faq-a">
						<?php if ( ! empty( $faq_item['type'] ) && 'list' === $faq_item['type'] ) : ?>
							<?php if ( ! empty( $faq_item['intro'] ) ) : ?>
							<p><?php echo esc_html( $faq_item['intro'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $faq_item['items'] ) && is_array( $faq_item['items'] ) ) : ?>
							<ul>
								<?php foreach ( $faq_item['items'] as $list_item ) : ?>
								<li><?php echo esc_html( $list_item ); ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
							<?php if ( ! empty( $faq_item['outro'] ) ) : ?>
							<p><?php echo esc_html( $faq_item['outro'] ); ?></p>
							<?php endif; ?>
						<?php elseif ( ! empty( $faq_item['a_html'] ) ) : ?>
							<?php echo wp_kses_post( $faq_item['a_html'] ); ?>
						<?php else : ?>
							<p><?php echo esc_html( $faq_item['a'] ); ?></p>
						<?php endif; ?>
					</div>
				</section>
				<?php endforeach; ?>
			</amp-accordion>
		</div>
	</section>
	<?php
}

/**
 * Render home page blog or newsletter showcase (desktop blog-showcase parity).
 *
 * @param WP_Query $query   Post query.
 * @param array    $config  Section config.
 */
function elearnposh_amp_render_home_posts_showcase( WP_Query $query, array $config ) {
	if ( ! $query instanceof WP_Query ) {
		return;
	}

	$defaults = array(
		'aria_label'    => '',
		'title'         => '',
		'subtitle'      => '',
		'view_all_url'  => '',
		'view_all_text' => '',
		'section_mod'   => '',
		'placeholder'   => 'https://elearnposh.com/wp-content/uploads/2026/07/Best-Cost-effecient-eLearning-POSH-Training.webp',
	);

	$config = wp_parse_args( $config, $defaults );

	if ( empty( $config['title'] ) || empty( $config['view_all_url'] ) || empty( $config['view_all_text'] ) ) {
		return;
	}

	$section_class = 'blog-showcase-section';
	if ( ! empty( $config['section_mod'] ) ) {
		$section_class .= ' blog-showcase-section--' . sanitize_html_class( $config['section_mod'] );
	}
	?>
	<section class="<?php echo esc_attr( $section_class ); ?>"<?php echo $config['aria_label'] ? ' aria-label="' . esc_attr( $config['aria_label'] ) . '"' : ''; ?>>
		<div class="blog-showcase__shell">
		<div class="blog-showcase__intro">
				<h2 class="eposh-section-title"><?php echo esc_html( $config['title'] ); ?></h2>
				<?php if ( ! empty( $config['subtitle'] ) ) : ?>
				<p class="blog-showcase__subtitle"><?php echo esc_html( $config['subtitle'] ); ?></p>
				<?php endif; ?>
			</div>

			<div class="blog-showcase__grid">
				<?php if ( $query->have_posts() ) : ?>
					<?php
					$post_index = 0;
					while ( $query->have_posts() ) :
						$query->the_post();

						$content       = get_post_field( 'post_content', get_the_ID() );
						$word_count    = str_word_count( wp_strip_all_tags( (string) $content ) );
						$read_time     = max( 1, (int) ceil( $word_count / 200 ) );
						$is_featured   = ( 0 === $post_index );
						$excerpt_words = 18;

						$thumb_id  = get_post_thumbnail_id();
						$thumb_src = $thumb_id ? wp_get_attachment_image_src( $thumb_id, 'large' ) : false;
						$thumb_url = $thumb_src ? $thumb_src[0] : $config['placeholder'];
						$thumb_w   = $thumb_src ? max( 1, (int) $thumb_src[1] ) : 640;
						$thumb_h   = $thumb_src ? max( 1, (int) $thumb_src[2] ) : 400;
						?>

						<?php if ( $is_featured ) : ?>
						<div class="blog-showcase__featured-col">
						<?php endif; ?>

						<article class="blog-showcase__item<?php echo $is_featured ? ' blog-showcase__item--featured' : ''; ?>">
							<div class="blog-showcase__card">
								<a class="blog-showcase__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
									<amp-img
										src="<?php echo esc_url( $thumb_url ); ?>"
										width="<?php echo esc_attr( $thumb_w ); ?>"
										height="<?php echo esc_attr( $thumb_h ); ?>"
										layout="responsive"
										alt="<?php echo esc_attr( get_the_title() ); ?>">
									</amp-img>
									<span class="blog-showcase__image-overlay" aria-hidden="true"></span>
								</a>

								<div class="blog-showcase__body">
									<div class="blog-showcase__meta">
										<span class="blog-showcase__meta-item">
											<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
											<?php echo esc_html( get_the_date() ); ?>
										</span>
										<span class="blog-showcase__meta-item">
											<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><polyline points="12 7 12 12 15.5 14"></polyline></svg>
											<?php
											printf(
												/* translators: %d: estimated reading time in minutes */
												esc_html__( '%d min read', 'elearnposh-amp' ),
												$read_time
											);
											?>
										</span>
									</div>

									<h3 class="blog-showcase__title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>

									<p class="blog-showcase__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), $excerpt_words ) ); ?></p>

									<a class="blog-showcase__cta" href="<?php the_permalink(); ?>">
										<span class="blog-showcase__cta-text"><?php esc_html_e( 'Read article', 'elearnposh-amp' ); ?></span>
										<svg class="blog-showcase__cta-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M5 12h14"></path><path d="M13 6l6 6-6 6"></path></svg>
									</a>
								</div>
							</div>
						</article>

						<?php if ( $is_featured ) : ?>
							<div class="blog-showcase__featured-actions">
								<a class="blog-showcase__view-all blog-showcase__view-all--below-card" href="<?php echo esc_url( $config['view_all_url'] ); ?>">
									<?php echo esc_html( $config['view_all_text'] ); ?>
								</a>
							</div>
						</div>
						<?php endif; ?>

						<?php
						$post_index++;
					endwhile;
					wp_reset_postdata();
					?>
				<?php endif; ?>
			</div>

			<div class="blog-showcase__actions">
				<a class="blog-showcase__view-all" href="<?php echo esc_url( $config['view_all_url'] ); ?>">
					<?php echo esc_html( $config['view_all_text'] ); ?>
				</a>
			</div>
		</div>
	</section>
	<?php
}

if ( ! function_exists( 'elearnposh_amp_bust_home_posts_showcase_cache' ) ) {
	/**
	 * Clear cached home blog/newsletter showcase HTML.
	 */
	function elearnposh_amp_bust_home_posts_showcase_cache() {
		delete_transient( 'ep_amp_home_blogs_v1' );
		delete_transient( 'ep_amp_home_newsletters_v1' );
	}

	add_action( 'save_post_post', 'elearnposh_amp_bust_home_posts_showcase_cache' );
	add_action( 'deleted_post', 'elearnposh_amp_bust_home_posts_showcase_cache' );
}

if ( ! function_exists( 'elearnposh_amp_render_cached_home_posts_showcase' ) ) {
	/**
	 * Render home blog/newsletter showcase with transient HTML cache (TTFB).
	 *
	 * @param array  $query_args WP_Query arguments.
	 * @param array  $config       Showcase config for elearnposh_amp_render_home_posts_showcase().
	 * @param string $cache_key    Transient suffix (e.g. blogs, newsletters).
	 */
	function elearnposh_amp_render_cached_home_posts_showcase( array $query_args, array $config, $cache_key ) {
		if ( ! function_exists( 'elearnposh_amp_render_home_posts_showcase' ) ) {
			return;
		}

		$transient = 'ep_amp_home_' . sanitize_key( $cache_key ) . '_v1';
		$html      = get_transient( $transient );

		if ( is_string( $html ) && '' !== $html ) {
			echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			return;
		}

		$query = new WP_Query( $query_args );
		ob_start();
		elearnposh_amp_render_home_posts_showcase( $query, $config );
		$html = ob_get_clean();

		if ( '' !== trim( $html ) ) {
			set_transient( $transient, $html, 30 * MINUTE_IN_SECONDS );
		}

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
