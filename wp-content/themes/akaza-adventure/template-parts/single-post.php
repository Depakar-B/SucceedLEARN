<?php
/**
 * Single post article layout (blog + newsletter).
 *
 * @package Akaza_Adventure
 *
 * @var array $args {
 *     @type bool $is_newsletter Whether this post is a newsletter.
 * }
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_newsletter = ! empty( $args['is_newsletter'] );
$post_id       = get_the_ID();
$terms         = get_the_category( $post_id );
$eyebrow       = '';
$newsletter_id = function_exists( 'akaza_newsletter_category_id' ) ? akaza_newsletter_category_id() : 0;

if ( $is_newsletter ) {
	$eyebrow = __( 'Newsletter', 'akaza-adventure' );
} elseif ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
	foreach ( $terms as $term ) {
		if ( $newsletter_id && (int) $term->term_id === $newsletter_id ) {
			continue;
		}
		$eyebrow = $term->name;
		break;
	}
}

$date      = get_the_date();
$date_iso  = get_the_date( 'c' );
$read_time = function_exists( 'akaza_blog_read_time' ) ? akaza_blog_read_time( $post_id ) : '';
$thumb     = get_the_post_thumbnail_url( $post_id, 'akaza-course-hero' );
if ( ! $thumb ) {
	$thumb = get_the_post_thumbnail_url( $post_id, 'large' );
}
$tags    = get_the_tags( $post_id );
$related = function_exists( 'akaza_get_related_posts' ) ? akaza_get_related_posts( $post_id, 4 ) : array();
$contact = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );
$show_toc = function_exists( 'akaza_post_has_toc' ) && akaza_post_has_toc( $post_id );
$toc_items = $show_toc && function_exists( 'akaza_get_post_toc_items' ) ? akaza_get_post_toc_items( $post_id ) : array();
if ( $show_toc && ! empty( $related ) ) {
	$toc_items[] = array(
		'id'    => 'slf-related-heading',
		'title' => $is_newsletter
			? __( 'More newsletters', 'akaza-adventure' )
			: __( 'Related articles', 'akaza-adventure' ),
	);
}
?>
<main id="main-content" class="slf-section slf-single-article" data-variant="<?php echo $is_newsletter ? 'newsletter' : 'blog'; ?>">
	<div class="slf-single-article__container">
		<header class="slf-single-article__hero">
			<?php
			if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
				akaza_render_hero_breadcrumbs();
			}
			?>
			<?php if ( $eyebrow ) : ?>
				<p class="slf-eyebrow slf-eyebrow--sm"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<h1 class="slf-single-article__title"><?php the_title(); ?></h1>
			<div class="slf-single-article__meta">
				<time datetime="<?php echo esc_attr( $date_iso ); ?>"><?php echo esc_html( $date ); ?></time>
				<?php if ( $read_time ) : ?>
					<span class="slf-single-article__read-time"><?php echo esc_html( $read_time ); ?></span>
				<?php endif; ?>
			</div>
			<?php if ( $thumb ) : ?>
				<figure class="slf-single-article__media">
					<img src="<?php echo esc_url( $thumb ); ?>"
						alt="<?php echo esc_attr( get_the_title() ); ?>"
						width="1200"
						height="675"
						decoding="async">
				</figure>
			<?php endif; ?>
		</header>

		<?php if ( $show_toc ) : ?>
			<?php
			get_template_part(
				'template-parts/single-post-toc',
				null,
				array(
					'items'   => $toc_items,
					'variant' => 'mobile',
				)
			);
			?>
			<div class="slf-single-article__layout">
				<article <?php post_class( 'slf-single-article__body' ); ?>>
					<?php the_content(); ?>
				</article>
				<?php
				get_template_part(
					'template-parts/single-post-toc',
					null,
					array(
						'items'   => $toc_items,
						'variant' => 'desktop',
					)
				);
				?>
			</div>
		<?php else : ?>
			<article <?php post_class( 'slf-single-article__body' ); ?>>
				<?php the_content(); ?>
			</article>
		<?php endif; ?>

		<?php if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) : ?>
			<ul class="slf-single-article__tags" aria-label="<?php esc_attr_e( 'Tags', 'akaza-adventure' ); ?>">
				<?php foreach ( $tags as $tag ) : ?>
					<li>
						<a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $is_newsletter ) : ?>
			<section class="slf-blog-cta slf-single-article__cta" aria-labelledby="slf-newsletter-cta-heading">
				<div class="slf-blog-cta__inner">
					<div class="slf-blog-cta__content">
						<h2 id="slf-newsletter-cta-heading" class="slf-blog-cta__title">
							<?php esc_html_e( 'Want these updates in your inbox?', 'akaza-adventure' ); ?>
						</h2>
						<p class="slf-blog-cta__lead">
							<?php esc_html_e( 'Talk to our team to subscribe to the SucceedLEARN newsletter for your organisation.', 'akaza-adventure' ); ?>
						</p>
					</div>
					<a class="slf-btn slf-btn--primary" href="<?php echo esc_url( $contact ); ?>">
						<?php esc_html_e( 'Subscribe', 'akaza-adventure' ); ?>
					</a>
				</div>
			</section>
		<?php endif; ?>

		<?php if ( ! empty( $related ) ) : ?>
			<section class="slf-single-article__related" aria-labelledby="slf-related-heading">
				<h2 id="slf-related-heading" class="slf-single-article__related-title">
					<?php
					echo $is_newsletter
						? esc_html__( 'More newsletters', 'akaza-adventure' )
						: esc_html__( 'Related articles', 'akaza-adventure' );
					?>
				</h2>
				<div class="slf-blog-grid slf-single-article__related-grid">
					<?php
					foreach ( $related as $related_post ) {
						get_template_part(
							'template-parts/blog/card',
							null,
							array(
								'post' => $related_post,
							)
						);
					}
					?>
				</div>
			</section>
		<?php endif; ?>
	</div>
</main>
