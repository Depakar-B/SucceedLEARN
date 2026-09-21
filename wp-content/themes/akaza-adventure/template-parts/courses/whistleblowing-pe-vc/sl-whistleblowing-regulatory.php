<?php
/**
 * Whistleblowing Training — Legal & Regulatory Context.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$uk_frameworks = array(
	__( 'Employment Rights Act 1996 protected-disclosure framework', 'akaza-adventure' ),
	__( 'Public Interest Disclosure Act 1998 (PIDA)', 'akaza-adventure' ),
	__( 'FCA SYSC 18 whistleblowing framework', 'akaza-adventure' ),
	__( 'FCA and PRA as relevant external regulatory channels in the course material', 'akaza-adventure' ),
);

$us_frameworks = array(
	__( 'Sarbanes-Oxley Act', 'akaza-adventure' ),
	__( 'Dodd-Frank Act', 'akaza-adventure' ),
	__( 'False Claims Act', 'akaza-adventure' ),
);
?>

<section
	id="legal-regulatory-context"
	class="sl-whistleblowing-regulatory"
	aria-labelledby="sl-whistleblowing-regulatory-title"
>
	<div class="container">

		<div class="sl-whistleblowing-regulatory__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Legal & Regulatory Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-regulatory-title">
				<?php esc_html_e( 'Which UK and US Whistleblowing Laws Does the Course', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Cover?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course introduces the main legal frameworks included in the learning material while keeping the focus on practical awareness.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-regulatory__table-wrap">
			<table class="sl-whistleblowing-regulatory__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'UK whistleblowing framework', 'akaza-adventure' ); ?>
						</th>
						<th scope="col">
							<?php esc_html_e( 'US whistleblower protections introduced', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$max_rows = max( count( $uk_frameworks ), count( $us_frameworks ) );

					for ( $index = 0; $index < $max_rows; $index++ ) :
						?>
						<tr>
							<td>
								<?php if ( isset( $uk_frameworks[ $index ] ) ) : ?>
									<span class="sl-whistleblowing-regulatory__item">
										<?php echo esc_html( $uk_frameworks[ $index ] ); ?>
									</span>
								<?php endif; ?>
							</td>

							<td>
								<?php if ( isset( $us_frameworks[ $index ] ) ) : ?>
									<span class="sl-whistleblowing-regulatory__item">
										<?php echo esc_html( $us_frameworks[ $index ] ); ?>
									</span>
								<?php endif; ?>
							</td>
						</tr>
					<?php endfor; ?>
				</tbody>
			</table>
		</div>

		<div class="sl-whistleblowing-regulatory__notice">
			<span class="sl-whistleblowing-regulatory__notice-label">
				<?php esc_html_e( 'Important', 'akaza-adventure' ); ?>
			</span>

			<p>
				<?php esc_html_e( 'The precise requirements applying to an organisation depend on jurisdiction, regulatory status and circumstances. This course is awareness training and should be used alongside current internal policies and appropriate legal or compliance advice.', 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>