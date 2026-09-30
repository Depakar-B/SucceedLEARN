<?php
/**
 * BFSI & PE/VC AMP — Course outline.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = succeedlearn_amp_get_bfsi_outline_modules();
?>
<section
	class="sl-bfsi-outline"
	id="course-outline"
	aria-labelledby="sl-bfsi-outline-title"
>
	<div class="sl-wrap">
		<div class="sl-bfsi-outline__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Curriculum', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-bfsi-outline-title" class="sl-h2">
				<?php esc_html_e( 'Course', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Outline', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-bfsi-outline__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-bfsi-outline__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $module['title'] ); ?></h3>
					<ul>
						<?php foreach ( $module['topics'] as $topic ) : ?>
							<li><?php echo esc_html( $topic ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
