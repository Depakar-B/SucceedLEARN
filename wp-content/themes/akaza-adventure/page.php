<?php
/**
 * Default page template.
 *
 * @package Akaza_Adventure
 */

get_header();
?>
<main id="main-content" class="slf-section">
	<div class="slf-container">
		<?php
		if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
			akaza_render_hero_breadcrumbs();
		}
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
			<?php
		endwhile;
		?>
	</div>
</main>
<?php
get_footer();
