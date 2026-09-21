<?php
/**
 * SucceedLEARN — S-Aware
 *
 * Section: Comprehensive Security & Privacy Awareness Course Library
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$framework_rows = array(
	array(
		'frameworks' => array(
			'SOC 2',
			'ISO 27001',
			'UK Cyber Essentials',
		),
		'courses'    => array(
			__( 'Security Awareness Training', 'akaza-adventure' ),
			__( 'Work-from-Home - Security Tips', 'akaza-adventure' ),
			__( 'Phishing Awareness Training', 'akaza-adventure' ),
		),
	),
	array(
		'frameworks' => array(
			__( 'HIPAA (US Healthcare)', 'akaza-adventure' ),
		),
		'courses'    => array(
			__( 'HIPAA for Covered & Non-covered Entities', 'akaza-adventure' ),
		),
	),
	array(
		'frameworks' => array(
			__( 'PCI DSS (Payment Card Security)', 'akaza-adventure' ),
		),
		'courses'    => array(
			__( 'PCI DSS - Employee Training', 'akaza-adventure' ),
			__( 'PCI DSS - Point-of-Sale', 'akaza-adventure' ),
		),
	),
	array(
		'frameworks' => array(
			__( 'Data Protection Regimes', 'akaza-adventure' ),
		),
		'courses'    => array(
			__( 'GDPR & UK DPA Awareness', 'akaza-adventure' ),
			__( 'CCPA Awareness', 'akaza-adventure' ),
			__( 'Data Protection Fundamentals', 'akaza-adventure' ),
			__( 'Global Data Protection Essentials', 'akaza-adventure' ),
		),
	),
	array(
		'frameworks' => array(
			__( 'FERPA (US Education Privacy)', 'akaza-adventure' ),
		),
		'courses'    => array(
			__( 'FERPA Compliance Essentials', 'akaza-adventure' ),
		),
	),
);
?>

<section
	class="sl-saware-library"
	aria-labelledby="sl-saware-library-title"
>
	<div class="container">

		<div class="sl-saware-library__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'S-Aware Course Library', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-saware-library-title">
				<?php
				esc_html_e(
					'Comprehensive Security & Privacy Awareness Course Library',
					'akaza-adventure'
				);
				?>
			</h2>

			<h3 class="sl-panel-title">
				<?php
				esc_html_e(
					'One Learning Library. Multiple Security Priorities.',
					'akaza-adventure'
				);
				?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'Security awareness requirements differ across industries, regulations, and organisational risk profiles. S-Aware provides a growing library of security, privacy, and compliance awareness courses, enabling organisations to deliver role-relevant learning while supporting multiple regulatory frameworks from a single platform.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'Every organisation faces a different combination of cybersecurity threats, privacy obligations, regulatory requirements and workforce risks.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'Depending on your programme requirements, learning can address areas such as:',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-saware-library__mapping-heading">
			<h3 class="sl-panel-title">
				<?php
				esc_html_e(
					'Built For The Frameworks That Govern You',
					'akaza-adventure'
				);
				?>
			</h3>
		</div>

		<div class="sl-saware-library__mapping">

			<div class="sl-saware-library__table-wrap">

				<table class="sl-saware-library__table">

					<thead>
						<tr>
							<th scope="col">
								<?php esc_html_e( 'Framework / Regulation', 'akaza-adventure' ); ?>
							</th>
							<th scope="col">
								<?php esc_html_e( 'Mapped S-Aware Courses', 'akaza-adventure' ); ?>
							</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ( $framework_rows as $row ) : ?>
							<tr>
								<td>
									<div class="sl-saware-library__frameworks">
										<?php foreach ( $row['frameworks'] as $framework ) : ?>
											<span class="sl-saware-library__tag">
												<?php echo esc_html( $framework ); ?>
											</span>
										<?php endforeach; ?>
									</div>
								</td>
								<td>
									<ul class="sl-saware-library__courses">
										<?php foreach ( $row['courses'] as $course ) : ?>
											<li>
												<span class="sl-saware-library__course-mark" aria-hidden="true"></span>
												<span><?php echo esc_html( $course ); ?></span>
											</li>
										<?php endforeach; ?>
									</ul>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>

				</table>

			</div>

		</div>

	</div>
</section>
