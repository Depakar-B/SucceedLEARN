<?php
/**
 * Inclusive Workplace Training — Online training for a global workforce.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Optional image for the right column (set URL when asset is ready).
$global_workforce_image = '';
?>
<section class="sl-inclusive-global" id="inclusive-global-workforce" aria-labelledby="sl-inclusive-global-heading">
	<div class="container-xl">
		<div class="sl-inclusive-global__inner">
			<h2 id="sl-inclusive-global-heading">
				<?php esc_html_e( 'Online training for a global workforce', 'akaza-adventure' ); ?>
			</h2>

			<div class="sl-inclusive-global__split">
				<div class="sl-inclusive-global__content">
					<p>
						<?php esc_html_e( 'Inclusive workplace challenges can arise wherever employees work—across offices, remote teams, operational environments and international locations.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'SucceedLearn’s Inclusive Workplace courses sit within the Global HR Compliance Suite, helping organisations find HR training relevant to different workplace topics and regions.', 'akaza-adventure' ); ?>
					</p>

					<p class="sl-inclusive-global__note">
						<?php esc_html_e( 'The Equality, Diversity and Inclusion course introduces frameworks from multiple jurisdictions. Each organisation should select training based on its employee population, internal policies and applicable legal requirements.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<div class="sl-inclusive-global__media">
					<?php if ( $global_workforce_image ) : ?>
						<img
							src="<?php echo esc_url( $global_workforce_image ); ?>"
							alt=""
							loading="lazy"
							decoding="async"
						/>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
