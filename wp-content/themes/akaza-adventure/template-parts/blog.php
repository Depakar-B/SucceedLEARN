<?php
/**
 * Blog page content wrapper.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type array        $posts               Formatted blog cards.
 *   @type WP_Term[]    $categories          Category terms.
 *   @type string       $sort                Current sort key.
 *   @type WP_Term|null $term                Category term when on a category archive.
 *   @type bool         $hide_category_pills Hide the topic filter pills.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$posts               = isset( $args['posts'] ) ? $args['posts'] : array();
$categories          = isset( $args['categories'] ) ? $args['categories'] : array();
$sort                = isset( $args['sort'] ) ? $args['sort'] : 'newest';
$term                = isset( $args['term'] ) && $args['term'] instanceof WP_Term ? $args['term'] : null;
$hide_category_pills = ! empty( $args['hide_category_pills'] );
$has_posts           = ! empty( $posts );
?>
<main id="main-content" class="slf-section slf-section--cream slf-blog-archive">
	<div class="slf-container slf-blog-archive__container">
		<?php
		get_template_part(
			'template-parts/blog/hero',
			null,
			array(
				'term' => $term,
			)
		);
		?>

		<?php
		get_template_part(
			'template-parts/blog/filter-bar',
			null,
			array(
				'sort' => $sort,
			)
		);
		?>

		<?php if ( ! $hide_category_pills ) : ?>
			<?php
			get_template_part(
				'template-parts/blog/category-pills',
				null,
				array(
					'categories' => $categories,
				)
			);
			?>
		<?php endif; ?>

		<div class="slf-blog-main" id="slf-blog-grid-wrap">
			<?php if ( $has_posts ) : ?>
				<div class="slf-blog-grid" id="slf-blog-grid">
					<?php foreach ( $posts as $post ) : ?>
						<?php
						get_template_part(
							'template-parts/blog/card',
							null,
							array( 'post' => $post )
						);
						?>
					<?php endforeach; ?>
				</div>

				<div class="slf-blog-empty slf-blog-empty--search" id="slf-blog-search-empty" hidden>
					<p><?php esc_html_e( 'No results found for this search.', 'akaza-adventure' ); ?></p>
				</div>

				<div class="slf-blog-load-more" id="slf-blog-load-more-wrap">
					<p class="slf-blog-load-more__status" id="slf-blog-load-more-status" aria-live="polite"></p>
					<button type="button" class="slf-btn slf-btn--outline slf-blog-load-more__btn" id="slf-blog-load-more">
						<?php esc_html_e( 'Load more articles', 'akaza-adventure' ); ?>
					</button>
				</div>
			<?php else : ?>
				<div class="slf-blog-empty">
					<?php if ( $term ) : ?>
						<p><?php esc_html_e( 'No articles in this category yet.', 'akaza-adventure' ); ?></p>
					<?php else : ?>
						<p><?php esc_html_e( 'No articles published yet. Check back soon.', 'akaza-adventure' ); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php get_template_part( 'template-parts/blog/cta-strip' ); ?>
	</div>
</main>
