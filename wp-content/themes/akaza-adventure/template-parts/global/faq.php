<?php
/**
 * Global reusable FAQ section.
 *
 * Usage:
 * get_template_part( 'template-parts/global/faq', null, array( ... ) );
 *
 * Args:
 * - id (string) optional section id attribute
 * - section_class (string)
 * - eyebrow (string)
 * - title (string)
 * - description (string) optional intro below the title
 * - cta_text (string) optional button label below the description
 * - cta_url (string) optional button URL (default #contact)
 * - items (array of question/answer; answer may be plain text or safe HTML)
 * - schema (bool) default true — outputs FAQPage JSON-LD
 * - open_first (bool) default true — first item open on load
 * - numbered (bool) default false — prefix each question with 01, 02, …
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args          = is_array( $args ?? null ) ? $args : array();
$section_id    = isset( $args['id'] ) ? sanitize_html_class( (string) $args['id'] ) : '';
$section_class = isset( $args['section_class'] ) ? (string) $args['section_class'] : '';
$eyebrow       = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$title_html    = isset( $args['title_html'] ) ? (string) $args['title_html'] : '';
$description   = isset( $args['description'] ) ? trim( (string) $args['description'] ) : '';
$cta_text      = isset( $args['cta_text'] ) ? trim( (string) $args['cta_text'] ) : '';
$cta_url       = isset( $args['cta_url'] ) ? trim( (string) $args['cta_url'] ) : '#contact';
$items         = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$with_schema   = ! isset( $args['schema'] ) || (bool) $args['schema'];
$open_first    = ! isset( $args['open_first'] ) || (bool) $args['open_first'];
$numbered      = ! empty( $args['numbered'] );

if ( empty( $items ) ) {
	return;
}

$valid_items = array();
foreach ( $items as $item ) {
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

$section_classes = trim( 'sl-faq-section ' . $section_class );
if ( $numbered ) {
	$section_classes .= ' sl-faq-section--numbered';
}

if ( $with_schema ) {
	$schema_entities = array();
	foreach ( $valid_items as $item ) {
		$schema_entities[] = array(
			'@type'          => 'Question',
			'name'           => $item['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => wp_strip_all_tags( $item['answer'] ),
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
<section
	class="<?php echo esc_attr( $section_classes ); ?>"
	<?php echo '' !== $section_id ? 'id="' . esc_attr( $section_id ) . '" ' : ''; ?>
	data-faq-open-first="<?php echo $open_first ? 'true' : 'false'; ?>"
	aria-labelledby="sl-faq-heading"
>
	<div class="container">
		<div class="sl-home-section-heading shead">
			<?php if ( '' !== $eyebrow ) : ?>
				<span class="sl-home-sub-heading eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>
			<?php if ( '' !== $title_html ) : ?>
				<h2 id="sl-faq-heading"><?php echo wp_kses( $title_html, array( 'span' => array() ) ); ?></h2>
			<?php elseif ( '' !== $title ) : ?>
				<h2 id="sl-faq-heading"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $description ) : ?>
				<p class="sl-faq-intro"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $cta_text ) : ?>
				<a class="sl-faq-cta" href="<?php echo esc_url( $cta_url ); ?>">
					<?php echo esc_html( $cta_text ); ?>
					<span aria-hidden="true">→</span>
				</a>
			<?php endif; ?>
		</div>

		<div class="sl-faq-list">
			<?php foreach ( $valid_items as $index => $item ) : ?>
				<details
					class="faq"
					<?php echo ( 0 === $index && $open_first ) ? ' open' : ''; ?>
				>
					<summary>
						<span class="sl-faq-summary-text">
							<?php if ( $numbered ) : ?>
								<span class="sl-faq-number" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<?php endif; ?>
							<span class="sl-faq-question"><?php echo esc_html( $item['question'] ); ?></span>
						</span>
					</summary>
					<div class="sl-faq-panel">
						<div class="sl-faq-panel-inner">
							<?php if ( false !== strpos( $item['answer'], '<' ) ) : ?>
								<div class="sl-faq-answer">
									<?php echo wp_kses_post( $item['answer'] ); ?>
								</div>
							<?php else : ?>
								<p><?php echo esc_html( $item['answer'] ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
