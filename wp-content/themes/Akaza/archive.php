<?php
/**
 * Archive template.
 *
 * @package Akaza
 */

get_header();
?>

<header class="archive-header">
	<h1><?php the_archive_title(); ?></h1>
</header>

<?php if ( have_posts() ) : ?>
	<ul class="archive-list">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
			<?php
		endwhile;
		?>
	</ul>
	<?php the_posts_pagination(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'No posts found.', 'akaza' ); ?></p>
<?php endif; ?>

<?php
get_footer();
