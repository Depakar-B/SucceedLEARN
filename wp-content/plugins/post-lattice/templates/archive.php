<?php
/**
 * Archive layout wrapper.
 *
 * @package Post_Lattice
 *
 * @var string $post_lattice_uid    Unique instance id.
 * @var array  $post_lattice_config Instance config.
 * @var array  $post_lattice_cards  Formatted cards.
 * @var array  $post_lattice_terms  Category terms.
 * @var array  $post_lattice_years  Year strings.
 * @var array  $post_lattice_tags   Tag terms.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_lattice_js_config = wp_json_encode( Post_Lattice_Renderer::js_config( $post_lattice_config ) );
$post_lattice_style     = Post_Lattice_Renderer::css_variables( $post_lattice_config );
$post_lattice_has_posts = ! empty( $post_lattice_cards );
?>
<section
	class="plt-archive <?php echo ( 'list' === $post_lattice_config['default_view'] ) ? 'is-view-list' : 'is-view-grid'; ?>"
	id="<?php echo esc_attr( $post_lattice_uid ); ?>"
	data-plt-archive
	data-plt-config="<?php echo esc_attr( $post_lattice_js_config ? $post_lattice_js_config : '{}' ); ?>"
	style="<?php echo esc_attr( $post_lattice_style ); ?>">
	<div class="plt-archive__inner">
		<?php
		if ( ! empty( $post_lattice_config['show_hero'] ) ) {
			Post_Lattice_Renderer::partial(
				'hero',
				array(
					'uid'    => $post_lattice_uid,
					'config' => $post_lattice_config,
				)
			);
		}

		if ( ! empty( $post_lattice_config['show_search'] ) || ! empty( $post_lattice_config['show_sort'] ) || ! empty( $post_lattice_config['show_reset'] ) ) {
			Post_Lattice_Renderer::partial(
				'toolbar',
				array(
					'uid'    => $post_lattice_uid,
					'config' => $post_lattice_config,
				)
			);
		}

		if ( ! empty( $post_lattice_config['show_filters'] ) && ! empty( $post_lattice_config['enabled_filters'] ) ) {
			Post_Lattice_Renderer::partial(
				'pills',
				array(
					'uid'    => $post_lattice_uid,
					'config' => $post_lattice_config,
					'terms'  => $post_lattice_terms,
					'years'  => $post_lattice_years,
					'tags'   => $post_lattice_tags,
				)
			);
		}
		?>

		<div class="plt-main" id="<?php echo esc_attr( $post_lattice_uid ); ?>-main">
			<?php if ( $post_lattice_has_posts ) : ?>
				<div class="plt-grid" id="<?php echo esc_attr( $post_lattice_uid ); ?>-grid" data-plt-grid>
					<?php
					foreach ( $post_lattice_cards as $post_lattice_card ) {
						Post_Lattice_Renderer::partial(
							'card',
							array(
								'card'   => $post_lattice_card,
								'config' => $post_lattice_config,
							)
						);
					}
					?>
				</div>

				<div class="plt-empty plt-empty--search" data-plt-search-empty hidden>
					<p><?php echo esc_html( $post_lattice_config['empty_search'] ); ?></p>
				</div>

				<?php if ( ! empty( $post_lattice_config['show_load_more'] ) ) : ?>
					<div class="plt-more" data-plt-more>
						<p class="plt-more__status" data-plt-more-status aria-live="polite"></p>
						<button type="button" class="plt-btn plt-btn--outline plt-more__btn" data-plt-more-btn>
							<?php echo esc_html( $post_lattice_config['load_more_text'] ); ?>
						</button>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<div class="plt-empty">
					<p><?php echo esc_html( $post_lattice_config['empty_posts'] ); ?></p>
				</div>
			<?php endif; ?>
		</div>

		<?php
		if ( ! empty( $post_lattice_config['show_cta'] ) ) {
			Post_Lattice_Renderer::partial(
				'cta',
				array(
					'uid'    => $post_lattice_uid,
					'config' => $post_lattice_config,
				)
			);
		}
		?>
	</div>
</section>
