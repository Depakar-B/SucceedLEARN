<?php
/**
 * S-Play — Meet S-Play / The Gamified Learning Layer.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$s_play_complements_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/09/Why-Gamified-Security-Awareness-Matters.webp' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/09/Why-Gamified-Security-Awareness-Matters.webp';
?>

<section
	class="sl-s-play-complements"
	aria-labelledby="sl-s-play-complements-title"
>
	<div class="container">

		<div class="sl-s-play-complements__grid">

			<div class="sl-s-play-complements__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Meet S-Play', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-play-complements-title">
					<?php esc_html_e( 'The Gamified Learning Layer of', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'SucceedLEARN SBCS', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-play-complements__copy">
					<p>
						<?php
						esc_html_e(
							'S-Play brings gamification into cybersecurity awareness training, giving organisations another way to reinforce important security concepts throughout the employee learning journey.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Through interactive security games and challenges, employees can revisit cybersecurity concepts in a format that encourages active participation rather than passive content consumption.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Play can be used alongside foundational security awareness training, phishing simulations, microlearning and other awareness activities to introduce additional engagement and reinforcement throughout the year.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							"For administrators, campaigns can be targeted to relevant employee groups, scheduled according to the organisation's awareness calendar and monitored after launch.",
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<strong>
							<?php
							esc_html_e(
								'Learn the concept. Play the challenge. Reinforce the behaviour.',
								'akaza-adventure'
							);
							?>
						</strong>
					</p>
				</div>

			</div>

			<div class="sl-s-play-complements__media">
				<div class="sl-s-play-complements__image">
					<img
						src="<?php echo esc_url( $s_play_complements_image ); ?>"
						alt="<?php esc_attr_e( 'The gamified learning layer of SucceedLEARN SBCS', 'akaza-adventure' ); ?>"
						width="720"
						height="720"
						loading="lazy"
						decoding="async"
					/>
				</div>
			</div>

		</div>

	</div>
</section>
