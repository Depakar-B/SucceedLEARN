<?php
/**
 * Shared course FAQ section.
 *
 * Args:
 * - modifier (string)
 * - eyebrow (string)
 * - title_main (string)
 * - title_highlight (string)
 * - description (string)
 * - cta_text (string)
 * - cta_url (string)
 * - items (array<int,array{question:string,answer:string}>)
 * - schema (bool)
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modifier        = isset( $args['modifier'] ) ? sanitize_html_class( (string) $args['modifier'] ) : '';
$eyebrow         = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title_main      = isset( $args['title_main'] ) ? (string) $args['title_main'] : '';
$title_highlight = isset( $args['title_highlight'] ) ? (string) $args['title_highlight'] : '';
$description     = isset( $args['description'] ) ? (string) $args['description'] : '';
$cta_text        = isset( $args['cta_text'] ) ? (string) $args['cta_text'] : '';
$cta_url         = isset( $args['cta_url'] ) ? (string) $args['cta_url'] : '#contact';
$items           = ( isset( $args['items'] ) && is_array( $args['items'] ) ) ? $args['items'] : array();
$with_schema     = ! isset( $args['schema'] ) || (bool) $args['schema'];

$valid_items = array();
foreach ( $items as $item ) {
	if ( ! is_array( $item ) ) {
		continue;
	}

	$question = isset( $item['question'] ) ? trim( (string) $item['question'] ) : '';
	$answer   = isset( $item['answer'] ) ? trim( (string) $item['answer'] ) : '';

	if ( '' === $question || '' === $answer ) {
		continue;
	}

	$valid_items[] = array(
		'question' => $question,
		'answer'   => $answer,
	);
}

if ( empty( $valid_items ) ) {
	return;
}

$section_class = 'sl-course-faq';
if ( '' !== $modifier ) {
	$section_class .= ' sl-course-faq--' . $modifier;
}

if ( $with_schema ) {
	$schema_entities = array();
	foreach ( $valid_items as $item ) {
		$schema_entities[] = array(
			'@type'          => 'Question',
			'name'           => $item['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $item['answer'],
			),
		);
	}

	$schema = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => $schema_entities,
	);
	?>
	<script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?></script>
	<?php
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>" aria-labelledby="sl-course-faq-heading">
	<div class="sl-course-faq__container">
		<div class="sl-course-faq__intro">
			<?php if ( '' !== $eyebrow ) : ?>
				<span class="sl-course-faq__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( '' !== $title_main || '' !== $title_highlight ) : ?>
				<h2 id="sl-course-faq-heading" class="sl-course-faq__title">
					<span class="sl-course-faq__title-main"><?php echo esc_html( $title_main ); ?></span>
					<?php if ( '' !== $title_highlight ) : ?>
						<span class="sl-course-faq__title-highlight"><?php echo esc_html( $title_highlight ); ?></span>
					<?php endif; ?>
				</h2>
			<?php endif; ?>

			<?php if ( '' !== $description ) : ?>
				<p class="sl-course-faq__description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

			<?php if ( '' !== $cta_text ) : ?>
				<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_url( $cta_url ); ?>">
					<?php echo esc_html( $cta_text ); ?>
					<span aria-hidden="true">→</span>
				</a>
			<?php endif; ?>
		</div>

		<div class="sl-course-faq__list" data-course-faq-list>
			<?php foreach ( $valid_items as $index => $item ) : ?>
				<?php
				$item_id     = 'course-faq-' . ( '' !== $modifier ? $modifier . '-' : '' ) . ( $index + 1 );
				$is_open     = 0 === $index;
				$button_id   = $item_id . '-button';
				$panel_id    = $item_id . '-panel';
				?>
				<div class="sl-course-faq__item<?php echo $is_open ? ' is-open' : ''; ?>" data-course-faq-item>
					<button
						id="<?php echo esc_attr( $button_id ); ?>"
						class="sl-course-faq__question"
						type="button"
						aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
					>
						<span class="sl-course-faq__question-text"><?php echo esc_html( $item['question'] ); ?></span>
					</button>
					<div
						id="<?php echo esc_attr( $panel_id ); ?>"
						class="sl-course-faq__panel"
						role="region"
						aria-labelledby="<?php echo esc_attr( $button_id ); ?>"
					>
						<div class="sl-course-faq__panel-inner">
							<p class="sl-course-faq__answer"><?php echo esc_html( $item['answer'] ); ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
