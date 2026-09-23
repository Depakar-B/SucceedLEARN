<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Practical Compliance Decisions Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-gifts-entertainment-decisions"
	aria-labelledby="sl-gifts-entertainment-decisions-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-decisions__intro">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Practical Compliance Decisions',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-gifts-entertainment-decisions-title">
				<?php
				echo wp_kses_post(
					__(
						'Gifts and Entertainment Decision-Making <span>for PE/VC Professionals</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course gives learners a practical framework for assessing purpose, value, timing, transparency and the surrounding business relationship.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-gifts-entertainment-decisions__grid">

			<div class="sl-gifts-entertainment-decisions__card sl-gifts-entertainment-decisions__card--consider">

				<h3>
					<?php
					esc_html_e(
						'Consider before proceeding',
						'akaza-adventure'
					);
					?>
				</h3>

				<ul class="sl-gifts-entertainment-decisions__list">
					<li>
						<?php
						esc_html_e(
							'Does it serve a legitimate business purpose?',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'Is the value modest and reasonable?',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'Would I be comfortable if it were disclosed publicly?',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'Is the venue or content appropriate?',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'Is the timing appropriate?',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'Is it separate from an active deal or decision?',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'Has required approval been obtained?',
							'akaza-adventure'
						);
						?>
					</li>
				</ul>

			</div>

			<div class="sl-gifts-entertainment-decisions__card sl-gifts-entertainment-decisions__card--avoid">

				<h3>
					<?php
					esc_html_e(
						'Situations that should not proceed',
						'akaza-adventure'
					);
					?>
				</h3>

				<ul class="sl-gifts-entertainment-decisions__list">
					<li>
						<?php
						esc_html_e(
							'It creates or may create a sense of obligation.',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'It could influence or appear to influence a decision.',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'It conflicts with organisational policy.',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'It may conflict with applicable law.',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'It involves cash or a cash equivalent.',
							'akaza-adventure'
						);
						?>
					</li>
					<li>
						<?php
						esc_html_e(
							'It occurs during a sensitive commercial process.',
							'akaza-adventure'
						);
						?>
					</li>
				</ul>

			</div>

		</div>

	</div>
</section>
