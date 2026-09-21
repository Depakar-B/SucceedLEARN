<?php
/**
 * Code of Conduct — Why It Matters.
 *
 * Content order:
 * 1. Introduction
 * 2. Image
 * 3. Scenario list
 * 4. Highlighted message
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_matters = function_exists( 'succeedlearn_amp_get_coc_matters_data' )
	? succeedlearn_amp_get_coc_matters_data()
	: array();

if ( empty( $coc_matters ) ) {
	return;
}

$coc_matters_image = ! empty( $coc_matters['image'] )
	? $coc_matters['image']
	: array();

$coc_matters_scenarios = ! empty( $coc_matters['scenarios'] )
	? $coc_matters['scenarios']
	: array();

$coc_matters_highlight = ! empty( $coc_matters['highlight'] )
	? $coc_matters['highlight']
	: array();
?>

<section
	class="sl-section sl-code-conduct-matters"
	aria-labelledby="sl-code-conduct-matters-title"
>
	<div class="sl-wrap">

		<!-- Introduction -->
		<div class="sl-code-conduct-matters__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_matters['eyebrow'] ); ?>
			</span>

			<h2
				id="sl-code-conduct-matters-title"
				class="sl-h2"
			>
				<?php echo esc_html( $coc_matters['title'] ); ?>

				<span>
					<?php echo esc_html( $coc_matters['title_accent'] ); ?>
				</span>
			</h2>

			<p class="sl-code-conduct-matters__lead">
				<?php echo esc_html( $coc_matters['lead'] ); ?>
			</p>
		</div>

		<div class="sl-code-conduct-matters__layout">

			<!-- Image -->
			<?php if ( ! empty( $coc_matters_image['url'] ) ) : ?>
				<figure class="sl-code-conduct-matters__media">
					<amp-img
						src="<?php echo esc_url( $coc_matters_image['url'] ); ?>"
						alt="<?php echo esc_attr( $coc_matters_image['alt'] ); ?>"
						width="<?php echo esc_attr( $coc_matters_image['width'] ); ?>"
						height="<?php echo esc_attr( $coc_matters_image['height'] ); ?>"
						layout="responsive"
					></amp-img>
				</figure>
			<?php endif; ?>

			<!-- Scenario list -->
			<div class="sl-code-conduct-matters__content">
				<p class="sl-code-conduct-matters__intro">
					<?php echo esc_html( $coc_matters['list_intro'] ); ?>
				</p>

				<?php if ( ! empty( $coc_matters_scenarios ) ) : ?>
					<ul class="sl-list sl-code-conduct-matters__list">
						<?php foreach ( $coc_matters_scenarios as $index => $scenario ) : ?>
							<li class="sl-list-item sl-code-conduct-matters__list-item">
								<span
									class="sl-code-conduct-matters__list-index"
									aria-hidden="true"
								>
									<?php
									echo esc_html(
										str_pad(
											(string) ( $index + 1 ),
											2,
											'0',
											STR_PAD_LEFT
										)
									);
									?>
								</span>

								<p class="sl-code-conduct-matters__question">
									<?php echo esc_html( $scenario ); ?>
								</p>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

		</div>

		<!-- Highlighted text -->
		<?php if ( ! empty( $coc_matters_highlight ) ) : ?>
			<div
				class="sl-highlight sl-code-conduct-matters__gap"
				aria-labelledby="sl-code-conduct-matters-gap-title"
			>
				<span class="sl-home-sub-heading sl-code-conduct-matters__gap-eyebrow">
					<?php echo esc_html( $coc_matters_highlight['eyebrow'] ); ?>
				</span>

				<h3
					id="sl-code-conduct-matters-gap-title"
					class="sl-panel-title sl-code-conduct-matters__gap-title"
				>
					<?php echo esc_html( $coc_matters_highlight['title'] ); ?>
				</h3>

				<p class="sl-code-conduct-matters__gap-text">
					<?php echo esc_html( $coc_matters_highlight['text'] ); ?>
				</p>

				<p class="sl-code-conduct-matters__gap-lead">
					<strong>
						<?php echo esc_html( $coc_matters_highlight['lead'] ); ?>
					</strong>
				</p>
			</div>
		<?php endif; ?>

	</div>
</section>