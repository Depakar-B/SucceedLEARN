<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * UK and US Legal Context Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-gifts-entertainment-legal-context"
	aria-labelledby="sl-gifts-entertainment-legal-context-title"
>
	<div class="container">

		<!-- Full Width Introduction -->
		<div class="sl-gifts-entertainment-legal-context__intro">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'UK and US Legal Context',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-gifts-entertainment-legal-context-title">
				<?php
				echo wp_kses_post(
					__(
						'UK Bribery Act and FCPA <span>Gifts and Entertainment Compliance</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course places gifts and entertainment decisions within anti-bribery and anti-corruption frameworks relevant to UK and US business environments.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<!-- UK and US Cards -->
		<div class="sl-gifts-entertainment-legal-context__grid">

			<!-- United Kingdom -->
			<article class="sl-gifts-entertainment-legal-context__card">

				<span class="sl-gifts-entertainment-legal-context__card-label">
					<?php
					esc_html_e(
						'United Kingdom',
						'akaza-adventure'
					);
					?>
				</span>

				<h3>
					<?php
					esc_html_e(
						'UK Bribery Act 2010',
						'akaza-adventure'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'The course references the UK Bribery Act 2010 when explaining bribery risks, gifts and hospitality, foreign public officials and organisational anti-bribery controls.',
						'akaza-adventure'
					);
					?>
				</p>

			</article>

			<!-- United States -->
			<article class="sl-gifts-entertainment-legal-context__card">

				<span class="sl-gifts-entertainment-legal-context__card-label">
					<?php
					esc_html_e(
						'United States',
						'akaza-adventure'
					);
					?>
				</span>

				<h3>
					<?php
					esc_html_e(
						'U.S. Foreign Corrupt Practices Act',
						'akaza-adventure'
					);
					?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'The course references the FCPA in the context of interactions with foreign government officials and risks involving gifts, travel, entertainment and other things of value.',
						'akaza-adventure'
					);
					?>
				</p>

			</article>

		</div>

		<!-- Highlighted Conclusion -->
		<div class="sl-gifts-entertainment-legal-context__highlight">

			<p>
				<strong>
					<?php
					esc_html_e(
						'Business gifts and hospitality require context.',
						'akaza-adventure'
					);
					?>
				</strong>
			</p>

			<p>
				<?php
				esc_html_e(
					'Purpose, value, timing, recipient, transparency, applicable law and organisational policy should all be considered when assessing an activity.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

	</div>
</section>