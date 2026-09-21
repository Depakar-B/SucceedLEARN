<?php
/**
 * Default page template.
 *
 * @package Akaza
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class( 'page-content' ); ?>>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</article>
	<?php
endwhile;

get_footer();
