<?php
/**
 * Code of Conduct — One Programme section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-coc-one-programme" aria-labelledby="sl-coc-one-programme-title">
	<div class="container">

		<div class="sl-coc-one-programme__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'One Programme', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-one-programme-title">
				<?php
				echo wp_kses(
					__( 'One Programme. One Shared <span>Understanding.</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'SucceedLEARN brings HR, compliance, learning, business leaders and employees together around one practical approach to Code of Conduct training.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

		<div class="sl-coc-one-programme__diagram">

			<svg class="sl-coc-one-programme__connections" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true" focusable="false">
				<line x1="50" y1="42" x2="50" y2="10" />
				<line x1="50" y1="42" x2="12" y2="42" />
				<line x1="50" y1="42" x2="88" y2="42" />
				<line x1="50" y1="42" x2="22" y2="82" />
				<line x1="50" y1="42" x2="78" y2="82" />
			</svg>

			<div class="sl-coc-one-programme__centre">
				<div class="sl-coc-one-programme__centre-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none">
						<path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3z" />
						<path d="M8.5 12l2.3 2.3 4.7-5" />
					</svg>
				</div>

				<span class="sl-coc-one-programme__centre-label">
					<?php esc_html_e( 'One Programme', 'akaza-adventure' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Code of Conduct Training', 'akaza-adventure' ); ?>
				</h3>

				<p>
					<?php
					esc_html_e(
						'One consistent learning experience connecting people, policies and practical workplace decisions.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<article class="sl-coc-one-programme__card sl-coc-one-programme__card--hr">
				<div class="sl-coc-one-programme__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none">
						<circle cx="12" cy="8" r="3" />
						<path d="M5 20c0-3.5 3-6 7-6s7 2.5 7 6" />
					</svg>
				</div>
				<h3 class="sl-panel-title"><?php esc_html_e( 'For HR Leaders', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Build consistent understanding of workplace behaviour, organizational values and employee responsibilities.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

			<article class="sl-coc-one-programme__card sl-coc-one-programme__card--compliance">
				<div class="sl-coc-one-programme__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none">
						<path d="M6 3h12v18H6z" />
						<path d="M9 7h6M9 11h6M9 15h4" />
					</svg>
				</div>
				<h3 class="sl-panel-title"><?php esc_html_e( 'For Compliance Teams', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Strengthen policy awareness, improve reporting visibility and maintain evidence of employee training.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

			<article class="sl-coc-one-programme__card sl-coc-one-programme__card--learning">
				<div class="sl-coc-one-programme__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none">
						<path d="M4 5h16v12H4z" />
						<path d="M8 21h8M12 17v4" />
						<path d="M8 9h8M8 12h5" />
					</svg>
				</div>
				<h3 class="sl-panel-title"><?php esc_html_e( 'For Learning & Development', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Deliver interactive corporate compliance training that is easier for employees to understand and remember.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

			<article class="sl-coc-one-programme__card sl-coc-one-programme__card--employees">
				<div class="sl-coc-one-programme__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none">
						<circle cx="9" cy="8" r="3" />
						<circle cx="17" cy="10" r="2.5" />
						<path d="M3 20c0-3.5 2.5-6 6-6s6 2.5 6 6" />
						<path d="M15 15c3 0 5 2 5 5" />
					</svg>
				</div>
				<h3 class="sl-panel-title"><?php esc_html_e( 'For Employees', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Understand what the Code means in practical situations and gain confidence to make responsible decisions.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

			<article class="sl-coc-one-programme__card sl-coc-one-programme__card--business">
				<div class="sl-coc-one-programme__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none">
						<path d="M4 20V9h16v11" />
						<path d="M8 9V5h8v4M7 13h2M11 13h2M15 13h2M7 17h2M11 17h2M15 17h2" />
					</svg>
				</div>
				<h3 class="sl-panel-title"><?php esc_html_e( 'For Business Leaders', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Build a stronger ethical culture while reducing behavioural, compliance and reputational risk.',
						'akaza-adventure'
					);
					?>
				</p>
			</article>

		</div>

	</div>
</section>
