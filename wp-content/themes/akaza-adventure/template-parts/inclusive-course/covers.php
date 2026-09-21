<?php
/**
 * Inclusive course page — covers / curriculum blocks.
 *
 * Expects $args['course'].
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = isset( $args['course'] ) && is_array( $args['course'] ) ? $args['course'] : array();
if ( empty( $course ) || empty( $course['detail_blocks'] ) ) {
	return;
}

$heading    = isset( $course['covers_heading'] ) ? (string) $course['covers_heading'] : '';
$subheading = isset( $course['covers_subheading'] ) ? (string) $course['covers_subheading'] : '';
$intro      = isset( $course['covers_intro'] ) && is_array( $course['covers_intro'] ) ? $course['covers_intro'] : array();
$blocks     = (array) $course['detail_blocks'];
?>
<section class="sl-iwc-covers" id="course-covers" aria-labelledby="sl-iwc-covers-title">
	<div class="container">
		<div class="sl-iwc-section-heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course curriculum', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-iwc-covers-title">
				<?php esc_html_e( 'What the', 'akaza-adventure' ); ?>
				<span><?php echo esc_html( isset( $course['title'] ) ? $course['title'] : '' ); ?></span>
				<?php esc_html_e( 'covers', 'akaza-adventure' ); ?>
			</h2>
			<?php if ( $subheading ) : ?>
				<p class="sl-iwc-covers__subheading"><?php echo esc_html( $subheading ); ?></p>
			<?php endif; ?>
			<?php foreach ( $intro as $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
			<?php endforeach; ?>
		</div>

		<div class="sl-iwc-covers__blocks">
			<?php foreach ( $blocks as $block ) : ?>
				<?php
				$type          = isset( $block['type'] ) ? $block['type'] : 'text';
				$modifiers     = array( 'sl-iwc-covers__block' );
				$modifiers[]   = 'sl-iwc-covers__block--' . sanitize_html_class( $type );
				$default_full  = in_array( $type, array( 'jurisdictions', 'outcomes', 'suited', 'definitions' ), true );
				$is_full       = array_key_exists( 'full', $block ) ? (bool) $block['full'] : $default_full;
				if ( $is_full ) {
					$modifiers[] = 'sl-iwc-covers__block--full';
				}
				if ( ! empty( $block['span_last'] ) ) {
					$modifiers[] = 'sl-iwc-covers__block--span-last';
				}
				?>
				<article class="<?php echo esc_attr( implode( ' ', $modifiers ) ); ?>">
					<div class="sl-iwc-covers__block-head">
						<?php if ( ! empty( $block['number'] ) ) : ?>
							<span class="sl-iwc-covers__block-number"><?php echo esc_html( $block['number'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $block['icon'] ) ) : ?>
							<span class="sl-iwc-covers__block-icon" aria-hidden="true">
								<i class="bi <?php echo esc_attr( $block['icon'] ); ?>"></i>
							</span>
						<?php endif; ?>
						<?php if ( ! empty( $block['title'] ) ) : ?>
							<h3><?php echo esc_html( $block['title'] ); ?></h3>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $block['body'] ) && empty( $block['chips'] ) ) : ?>
						<?php foreach ( (array) $block['body'] as $para ) : ?>
							<p><?php echo esc_html( $para ); ?></p>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if ( ! empty( $block['intro'] ) ) : ?>
						<p><?php echo esc_html( $block['intro'] ); ?></p>
					<?php endif; ?>

					<?php if ( ! empty( $block['items'] ) && 'definitions' === $type ) : ?>
						<ul class="sl-iwc-covers__definitions" role="list">
							<?php foreach ( (array) $block['items'] as $item ) : ?>
								<li>
									<h4><?php echo esc_html( $item['term'] ); ?></h4>
									<p><?php echo esc_html( $item['definition'] ); ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<?php if ( ! empty( $block['chips'] ) ) : ?>
						<ul class="sl-iwc-covers__chips" role="list">
							<?php foreach ( (array) $block['chips'] as $chip ) : ?>
								<li><?php echo esc_html( $chip ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<?php if ( ! empty( $block['note'] ) ) : ?>
						<?php foreach ( (array) $block['note'] as $para ) : ?>
							<p class="sl-iwc-covers__note"><?php echo esc_html( $para ); ?></p>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if ( ! empty( $block['body'] ) && ! empty( $block['chips'] ) ) : ?>
						<?php foreach ( (array) $block['body'] as $para ) : ?>
							<p class="sl-iwc-covers__note"><?php echo esc_html( $para ); ?></p>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if ( ! empty( $block['disclaimer'] ) ) : ?>
						<p class="sl-iwc-covers__disclaimer"><?php echo esc_html( $block['disclaimer'] ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
