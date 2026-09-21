<?php
/**
 * UK Sexual Harassment Prevention Training — From Policy to Action.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$action_points = array(
	__( 'Notice when workplace conduct may require attention', 'akaza-adventure' ),
	__( 'Think more carefully about personal and professional boundaries', 'akaza-adventure' ),
	__( 'Respond appropriately to concerning situations', 'akaza-adventure' ),
	__( "Use the organisation's reporting routes with greater confidence", 'akaza-adventure' ),
	__( 'Understand their role in maintaining a respectful workplace', 'akaza-adventure' ),
);
?>

<section
	id="policy-to-action"
	class="sl-uk-sexual-harassment-action"
	aria-labelledby="sl-uk-sexual-harassment-action-title"
>
	<div class="container">

		<div class="sl-uk-sexual-harassment-action__grid">

			<!-- Left: Image -->
			<div class="sl-uk-sexual-harassment-action__media">
				<div class="sl-uk-sexual-harassment-action__image">
					<div
						class="sl-uk-sexual-harassment-action__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Image Placeholder', 'akaza-adventure' ); ?>"
					>
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

			<!-- Right: Content -->
			<div class="sl-uk-sexual-harassment-action__content">

				<span class="sl-uk-sexual-harassment-action__intro">
					<?php esc_html_e( 'Prevention becomes stronger when expectations are understood before a concern arises.', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-uk-sexual-harassment-action-title">
					<?php esc_html_e( 'Move from Policy Awareness to', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Everyday Action', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( "A policy explains an organisation's position. Training helps workers connect that position with the choices they make every day.", 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-uk-sexual-harassment-action__list">
					<?php foreach ( $action_points as $index => $point ) : ?>
						<li class="sl-uk-sexual-harassment-action__item">
							<span
								class="sl-uk-sexual-harassment-action__number"
								aria-hidden="true"
							>
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-uk-sexual-harassment-action__text">
								<?php echo esc_html( $point ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<p>
					<?php esc_html_e( 'The emphasis remains on practical judgement, not lengthy legal instruction.', 'akaza-adventure' ); ?>
				</p>

			</div>

		</div>
	</div>
</section>