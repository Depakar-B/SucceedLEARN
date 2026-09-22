<?php
/**
 * DEI&B — Course content / syllabus section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$covers_image = '';

$modules = array(
	array(
		'number' => '01',
		'title'  => __( 'Equality and diversity', 'akaza-adventure' ),
		'body'   => array(
			__( 'Understand the principles behind fair treatment and respect at work. Explore how these principles relate to working relationships, participation and opportunities.', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '02',
		'title'  => __( 'The consequences of discrimination', 'akaza-adventure' ),
		'body'   => array(
			__( 'Consider how inequality can affect individuals, team morale, trust and confidence in the organisation. Understand why concerns deserve attention.', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '03',
		'title'  => __( 'Types and forms of discrimination', 'akaza-adventure' ),
		'body'   => array(
			__( 'Explore discrimination associated with characteristics and circumstances such as age, disability, race, religion or belief, gender, sexual orientation, pregnancy and maternity.', 'akaza-adventure' ),
			__( 'The course also examines direct and indirect discrimination, discrimination by association or perception, harassment, and victimisation or retaliation.', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '04',
		'title'  => __( 'International legal context', 'akaza-adventure' ),
		'body'   => array(
			__( 'Gain an introduction to equality and discrimination frameworks across multiple jurisdictions, including India, Canada, Australia, the United Arab Emirates, Hong Kong, Japan, Korea, the United Kingdom, the United States, China, Brazil, the European Union and Singapore.', 'akaza-adventure' ),
			__( 'This provides general awareness. Your organisation’s policies and applicable local guidance supply the context for workplace decisions.', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '05',
		'title'  => __( 'Responding to discrimination', 'akaza-adventure' ),
		'body'   => array(
			__( 'Consider options such as providing feedback, raising a matter with an appropriate manager or contacting HR. Understand how the situation and organisational procedures inform the next step.', 'akaza-adventure' ),
		),
	),
	array(
		'number' => '06',
		'title'  => __( 'Encouraging inclusion', 'akaza-adventure' ),
		'body'   => array(
			__( 'Explore how employees can support respectful working relationships, consider different perspectives and recognise barriers to participation.', 'akaza-adventure' ),
		),
	),
);
?>
<section id="course-covers" class="sl-deib-covers" aria-labelledby="sl-deib-covers-heading">

	<div class="container">

		<div class="sl-deib-covers__intro">
			<h2 id="sl-deib-covers-heading">
				<?php esc_html_e( 'What the course covers', 'akaza-adventure' ); ?>
			</h2>
		</div>

		<div class="sl-deib-covers__layout">

			<div class="sl-deib-covers__syllabus">
				<ol class="sl-deib-covers__list">
					<?php foreach ( $modules as $index => $module ) : ?>
						<li class="sl-deib-covers__item<?php echo $index < 3 ? ' sl-deib-covers__item--top' : ''; ?>">
							<span class="sl-deib-covers__number" aria-hidden="true"><?php echo esc_html( $module['number'] ); ?></span>
							<div class="sl-deib-covers__body">
								<h3><?php echo esc_html( $module['title'] ); ?></h3>
								<?php foreach ( $module['body'] as $para ) : ?>
									<p><?php echo esc_html( $para ); ?></p>
								<?php endforeach; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>

				<div class="sl-deib-covers__actions">
					<a href="#contact" class="sl-content-btn sl-content-btn-secondary">
						<?php esc_html_e( 'Request the Course Outline', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

			<aside class="sl-deib-covers__media" aria-hidden="<?php echo $covers_image ? 'false' : 'true'; ?>">
				<?php if ( $covers_image ) : ?>
					<img
						src="<?php echo esc_url( $covers_image ); ?>"
						alt="<?php esc_attr_e( 'Diversity, equality, inclusion and belonging course screenshot', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				<?php else : ?>
					<div class="sl-deib-covers__placeholder">
						<span aria-hidden="true"><i class="bi bi-laptop"></i></span>
						<span><?php esc_html_e( 'Course screenshot', 'akaza-adventure' ); ?></span>
					</div>
				<?php endif; ?>
			</aside>

		</div>

	</div>

</section>
