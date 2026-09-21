</main>

<?php
/**
 * Prefer Akaza Header Footer plugin. Minimal theme footer is fallback only.
 */
if ( has_action( 'ahf_render_site_footer' ) ) {
	do_action( 'ahf_render_site_footer' );
} else {
	?>
	<footer class="site-footer" role="contentinfo">
		<div class="site-footer__inner">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
		</div>
	</footer>
	<?php
}
?>

<?php wp_footer(); ?>
</body>
</html>
