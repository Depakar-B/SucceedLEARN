<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Choose Workplace Harassment Prevention Training by Region
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$regional_training = array(
	array(
		'number'       => '01',
		'title'        => 'Global Sexual Harassment Prevention Training',
		'subtitle'     => 'Create a shared standard for an international workforce',
		'content'      => array(
			'Provide employees in different countries with a consistent understanding of workplace sexual harassment while recognising that legal definitions, reporting procedures and employee protections vary by location.',
			'The course introduces essential prevention principles, workplace boundaries, bystander responses, retaliation and reporting. It also provides country-relevant guidance to help employees connect the organisation’s global expectations with the procedures available where they work.',
		),
		'best_suited'  => 'Multinational organisations and internationally distributed teams that require a consistent awareness programme supported by regional reporting information.',
		'cta'          => 'Explore Global Sexual Harassment Prevention Training',
		'cta_url'      => '#global-sexual-harassment-training',
		'image_label'  => 'Global workplace training',
		'image_size'   => 'Image placeholder — 620 × 560 px',
		'image_side'   => 'right',
	),

	array(
		'number'       => '02',
		'title'        => 'US Sexual Harassment Prevention Training',
		'subtitle'     => 'Training shaped by location and supervisory responsibility',
		'content'      => array(
			'U.S. harassment-prevention requirements can vary by state, locality, employer size and employee role.',
			'SucceedLEARN provides separate learning paths for employees and supervisors. Employee training focuses on recognising harassment, reporting concerns, retaliation and appropriate workplace responses. Supervisor training addresses additional responsibilities such as policy enforcement, escalation, documentation and complaint handling.',
			'Employers should select the appropriate course according to each employee’s work location and responsibilities.',
		),
		'best_suited'  => 'US-based employees, supervisors and managers requiring training selected according to their location and responsibilities.',
		'cta'          => 'Explore US Harassment Prevention Training',
		'cta_url'      => '#us-harassment-prevention-training',
		'image_label'  => 'US workplace training',
		'image_size'   => 'Image placeholder — 620 × 560 px',
		'image_side'   => 'left',
	),

	array(
		'number'       => '03',
		'title'        => 'Preventing Sexual Harassment at Work: UK',
		'subtitle'     => 'Support the employer’s preventive approach',
		'content'      => array(
			'UK employers have a positive legal duty to take reasonable steps to prevent sexual harassment of workers.',
			'Relevant and regularly reviewed training can support this wider preventive approach when reinforced by appropriate policies, reporting channels, risk assessment and organisational action.',
			'The course helps workers recognise sexual harassment, understand the importance of purpose, effect and context, identify reporting options and respond appropriately when they experience or witness concerning conduct.',
		),
		'best_suited'  => 'Organisations with workers in England, Scotland or Wales seeking awareness training that supports their broader harassment-prevention framework.',
		'cta'          => 'Explore UK Sexual Harassment Prevention Training',
		'cta_url'      => '#uk-sexual-harassment-training',
		'image_label'  => 'UK workplace training',
		'image_size'   => 'Image placeholder — 620 × 560 px',
		'image_side'   => 'right',
	),

	array(
		'number'       => '04',
		'title'        => 'India POSH Training',
		'subtitle'     => 'Build awareness and capability across every POSH responsibility',
		'content'      => array(
			'India’s Sexual Harassment of Women at Workplace (Prevention, Prohibition and Redressal) Act, 2013 places specific responsibilities on employers relating to prevention, awareness and complaint redressal.',
			'Different audiences require different levels of knowledge. SucceedLEARN provides role-specific POSH learning for employees, managers and Internal Committee members.',
		),
		'best_suited'  => 'Organisations operating in India that need role-relevant POSH awareness and capability-building.',
		'cta'          => 'Explore India POSH Training',
		'cta_url'      => '#india-posh-training',
		'image_label'  => 'India POSH training',
		'image_size'   => 'Image placeholder — 620 × 560 px',
		'image_side'   => 'left',
	),
);
?>

<section
	class="sl-harassment-regional-training"
	id="training-by-region"
	aria-labelledby="sl-harassment-regional-training-title"
>

	<div class="container">

		<div class="sl-harassment-regional-training__heading">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Regional Training Solutions',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-harassment-regional-training-title">
				<?php
				esc_html_e(
					'Choose Workplace Harassment Prevention Training',
					'akaza-adventure'
				);
				?>
				<span>
					<?php
					esc_html_e(
						'by region',
						'akaza-adventure'
					);
					?>
				</span>
			</h2>

		</div>


		<div class="sl-harassment-regional-training__list">

			<?php foreach ( $regional_training as $training ) : ?>

				<article
					class="sl-harassment-regional-training__item sl-harassment-regional-training__item--<?php echo esc_attr( $training['image_side'] ); ?>"
				>

					<!-- =====================================
					     IMAGE
					===================================== -->

					<div class="sl-harassment-regional-training__visual">

						<div class="sl-harassment-regional-training__image-placeholder">

							<div class="sl-harassment-regional-training__image-mark">
								<?php echo esc_html( $training['number'] ); ?>
							</div>

							<span class="sl-harassment-regional-training__image-label">
								<?php echo esc_html( $training['image_label'] ); ?>
							</span>

							<span class="sl-harassment-regional-training__image-size">
								<?php echo esc_html( $training['image_size'] ); ?>
							</span>

						</div>

					</div>


					<!-- =====================================
					     CONTENT
					===================================== -->

					<div class="sl-harassment-regional-training__content">

						<span class="sl-harassment-regional-training__number">
							<?php echo esc_html( $training['number'] ); ?>
						</span>

						<h3>
							<?php echo esc_html( $training['title'] ); ?>
						</h3>

						<p class="sl-harassment-regional-training__subtitle">
							<?php echo esc_html( $training['subtitle'] ); ?>
						</p>


						<div class="sl-harassment-regional-training__body">

							<?php foreach ( $training['content'] as $paragraph ) : ?>

								<p>
									<?php echo esc_html( $paragraph ); ?>
								</p>

							<?php endforeach; ?>

						</div>


						<?php if ( 'India POSH Training' === $training['title'] ) : ?>

							<div class="sl-harassment-regional-training__roles">

								<div class="sl-harassment-regional-training__role">

									<strong>
										<?php
										esc_html_e(
											'POSH Foundation Training for employees',
											'akaza-adventure'
										);
										?>
									</strong>

									<p>
										<?php
										esc_html_e(
											'Helps employees recognise sexual harassment, understand the scope of the workplace, identify reporting options and learn about the role of the Internal Committee.',
											'akaza-adventure'
										);
										?>
									</p>

								</div>


								<div class="sl-harassment-regional-training__role">

									<strong>
										<?php
										esc_html_e(
											'POSH Training for managers',
											'akaza-adventure'
										);
										?>
									</strong>

									<p>
										<?php
										esc_html_e(
											'Helps managers receive concerns sensitively, explain available options, document information objectively, escalate matters appropriately and support employees during and after the complaint process.',
											'akaza-adventure'
										);
										?>
									</p>

								</div>


								<div class="sl-harassment-regional-training__role">

									<strong>
										<?php
										esc_html_e(
											'POSH Training for Internal Committee members',
											'akaza-adventure'
										);
										?>
									</strong>

									<p>
										<?php
										esc_html_e(
											'Develops deeper understanding of IC jurisdiction, conciliation, inquiry procedure, statutory timelines, natural justice, confidentiality, interim measures, inquiry reports and annual reporting responsibilities.',
											'akaza-adventure'
										);
										?>
									</p>

								</div>

							</div>

						<?php endif; ?>


						<div class="sl-harassment-regional-training__best-suited">

							<strong>
								<?php
								esc_html_e(
									'Best suited for:',
									'akaza-adventure'
								);
								?>
							</strong>

							<p>
								<?php echo esc_html( $training['best_suited'] ); ?>
							</p>

						</div>


						<div class="sl-content-actions">

							<a
								class="sl-content-btn sl-content-btn-primary"
								href="<?php echo esc_url( $training['cta_url'] ); ?>"
							>
								<?php echo esc_html( $training['cta'] ); ?>
								<span aria-hidden="true">→</span>
							</a>

						</div>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>

</section>