<?php
/**
 * HIPAA Trust and Credentials Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$credentials = array(
	array(
		'label' => __( 'ISO 27001:2022 certified', 'akaza-adventure' ),
		'icon'  => 'shield',
	),
	array(
		'label' => __( 'SOC 2', 'akaza-adventure' ),
		'icon'  => 'shield',
	),
	array(
		'label' => __( 'SCORM 1.2 and 2004', 'akaza-adventure' ),
		'icon'  => 'check',
	),
	array(
		'label' => __( 'SSO and HRIS ready', 'akaza-adventure' ),
		'icon'  => 'check',
	),
	array(
		'label' => __( 'Innovation in Education, Aegis Graham Bell Awards 2025', 'akaza-adventure' ),
		'icon'  => 'star',
	),
);
?>

<section
	class="sl-hipaa-trust"
	aria-labelledby="sl-hipaa-trust-title"
>
	<div class="container">

		<h2
			id="sl-hipaa-trust-title"
			class="screen-reader-text"
		>
			<?php esc_html_e( 'Security, compatibility and recognition', 'akaza-adventure' ); ?>
		</h2>

		<ul class="sl-hipaa-trust__grid" role="list">

			<?php foreach ( $credentials as $credential ) : ?>

				<li class="sl-hipaa-trust__item">

					<span
						class="sl-hipaa-icon sl-hipaa-trust__icon"
						aria-hidden="true"
					>
						<?php if ( 'shield' === $credential['icon'] ) : ?>

							<svg
								viewBox="0 0 24 24"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
								focusable="false"
							>
								<path
									d="M12 3.4L18.5 6V11.2C18.5 15.3 15.9 18.8 12 20.6C8.1 18.8 5.5 15.3 5.5 11.2V6L12 3.4Z"
									stroke="currentColor"
									stroke-width="1.7"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
							</svg>

						<?php elseif ( 'check' === $credential['icon'] ) : ?>

							<svg
								viewBox="0 0 24 24"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
								focusable="false"
							>
								<path
									d="M6.8 12.2L9.9 15.3L17.2 8"
									stroke="currentColor"
									stroke-width="2"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
							</svg>

						<?php else : ?>

							<svg
								viewBox="0 0 24 24"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
								focusable="false"
							>
								<path
									d="M12 3.7L14.3 8.3L19.3 9L15.7 12.5L16.6 17.5L12 15.1L7.4 17.5L8.3 12.5L4.7 9L9.7 8.3L12 3.7Z"
									stroke="currentColor"
									stroke-width="1.7"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
							</svg>

						<?php endif; ?>
					</span>

					<span class="sl-hipaa-trust__label">
						<?php echo esc_html( $credential['label'] ); ?>
					</span>

				</li>

			<?php endforeach; ?>

		</ul>

	</div>
</section>