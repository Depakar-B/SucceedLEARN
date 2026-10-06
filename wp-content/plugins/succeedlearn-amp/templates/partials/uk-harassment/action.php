<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — policy to action.
 *
 * Expected vars: $action_points
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $action_points ) || ! is_array( $action_points ) ) {
	$action_points = function_exists( 'succeedlearn_amp_get_uk_harassment_action_points' )
		? succeedlearn_amp_get_uk_harassment_action_points()
		: array();
}

$images       = function_exists( 'succeedlearn_amp_get_uk_harassment_images' )
	? succeedlearn_amp_get_uk_harassment_images()
	: array();
$action_image = isset( $images['action'] ) ? $images['action'] : '';
?>
<section
	id="policy-to-action"
	class="sl-section sl-section--alt sl-uk-harassment-action"
	aria-labelledby="sl-uk-harassment-action-title"
>
	<div class="sl-wrap">
		<div class="sl-uk-harassment-action__grid">

			<div class="sl-uk-harassment-action__content">
				<span class="sl-uk-harassment-action__intro">
					<?php esc_html_e( 'Prevention becomes stronger when expectations are understood before a concern arises.', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-uk-harassment-action-title" class="sl-h2">
					<?php esc_html_e( 'Move from Policy Awareness to', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Everyday Action', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( "A policy explains an organisation's position. Training helps workers connect that position with the choices they make every day.", 'succeedlearn-amp' ); ?>
				</p>

				<ul class="sl-uk-harassment-bullets">
					<?php foreach ( $action_points as $point ) : ?>
						<li><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>

				<p>
					<?php esc_html_e( 'The emphasis remains on practical judgement, not lengthy legal instruction.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-uk-harassment-action__media">
				<?php if ( $action_image ) : ?>
					<div class="sl-uk-harassment-action__image">
						<amp-img
							src="<?php echo esc_url( $action_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'From awareness to action steps for UK sexual harassment prevention training.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>
