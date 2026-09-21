<?php
/**
 * Newsletter page content wrapper.
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *   @type array    $posts Formatted newsletter cards.
 *   @type string[] $years Year strings.
 *   @type string   $sort  Current sort key.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$posts     = isset( $args['posts'] ) ? $args['posts'] : array();
$years     = isset( $args['years'] ) ? $args['years'] : array();
$sort      = isset( $args['sort'] ) ? $args['sort'] : 'newest';
$has_posts = ! empty( $posts );
?>
<main id="main-content" class="slf-section slf-section--cream slf-blog-archive">
	<div class="slf-container slf-blog-archive__container">
		<?php get_template_part( 'template-parts/newsletter/hero' ); ?>

		<?php
		get_template_part(
			'template-parts/blog/filter-bar',
			null,
			array(
				'sort' => $sort,
			)
		);
		?>

		<?php
		get_template_part(
			'template-parts/newsletter/year-pills',
			null,
			array(
				'years' => $years,
			)
		);
		?>

		<div class="slf-blog-main" id="slf-blog-grid-wrap">
			<?php if ( $has_posts ) : ?>
				<div class="slf-blog-grid" id="slf-blog-grid">
					<?php foreach ( $posts as $post ) : ?>
						<?php
						get_template_part(
							'template-parts/blog/card',
							null,
							array(
								'post'          => $post,
								'hide_category' => true,
								'show_year'     => true,
							)
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
					<p><?php esc_html_e( 'No newsletters published yet. Check back soon.', 'akaza-adventure' ); ?></p>
				</div>
			<?php endif; ?>
		</div>

		<?php get_template_part( 'template-parts/blog/cta-strip' ); ?>
	</div>
</main>
