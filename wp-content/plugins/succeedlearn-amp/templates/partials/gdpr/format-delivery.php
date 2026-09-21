<?php
/**
 * GDPR Employee Awareness Training - Format and delivery.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$format_stats = function_exists( 'succeedlearn_amp_get_gdpr_format_stats' )
	? succeedlearn_amp_get_gdpr_format_stats()
	: array();

$delivery_formats = function_exists( 'succeedlearn_amp_get_gdpr_delivery_formats' )
	? succeedlearn_amp_get_gdpr_delivery_formats()
	: array();
?>

<section
	class="sl-section sl-gdpr-format-delivery"
	aria-labelledby="sl-gdpr-format-delivery-title"
>
	<div class="sl-wrap">
		<header class="sl-gdpr-format-delivery__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Format and Delivery', 'succeedlearn-amp' ); ?>
			</span>

			<h2
				class="sl-h2"
				id="sl-gdpr-format-delivery-title"
			>
				<?php
				echo wp_kses(
					__(
						'Ready for the LMS you already <span>run.</span>',
						'succeedlearn-amp'
					),
					array(
						'span' => array(),
					)
				);
				?>
			</h2>
		</header>

		<div class="sl-gdpr-format-delivery__stats">
			<?php foreach ( $format_stats as $stat ) : ?>
				<article class="sl-gdpr-format-delivery__stat">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $stat['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $stat['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-gdpr-format-delivery__formats-heading">
			<h3 class="sl-panel-title">
				<?php
				esc_html_e(
					'Available Delivery Formats',
					'succeedlearn-amp'
				);
				?>
			</h3>
		</div>

		<ul
			class="sl-gdpr-format-delivery__formats"
			aria-label="<?php esc_attr_e( 'Available delivery formats', 'succeedlearn-amp' ); ?>"
		>
			<?php foreach ( $delivery_formats as $format ) : ?>
				<li class="sl-gdpr-format-delivery__chip">
					<?php echo esc_html( $format ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>