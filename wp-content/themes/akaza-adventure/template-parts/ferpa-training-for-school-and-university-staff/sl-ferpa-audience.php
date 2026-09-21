<?php
/**
 * SucceedLEARN — FERPA Staff Awareness
 *
 * Section: Who Needs This Training
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ferpa_audiences = array(
	array(
		'title' => 'K-12 districts and schools',
		'text'  => 'Teachers and aides, front office and attendance staff, counsellors, special education teams, coaches and activity leads, substitute and temporary staff, and district administration.',
	),
	array(
		'title' => 'Colleges and universities',
		'text'  => 'Faculty and teaching assistants, registrar and admissions, financial aid, advising and student affairs, athletics compliance, residence life, and IT staff administering the student information system.',
	),
	array(
		'title' => 'Vendors and contractors',
		'text'  => 'Edtech platforms, student information system providers, tutoring and assessment partners, and any outside party acting as a school official under the institution’s direct control.',
	),
);
?>

<section
	class="sl-ferpa-audience"
	id="who-needs-this-training"
	aria-labelledby="sl-ferpa-audience-title"
>
	<div class="container">

		<div class="sl-ferpa-audience__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Who Needs This Training', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ferpa-audience-title">
				<?php esc_html_e( 'Anyone with access to student records,', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'which is more people than you think.', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<p>
				<?php esc_html_e( 'FERPA obligations follow the record, not the job title. Institutions consistently underestimate how many staff touch education records in a normal week.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-ferpa-audience__grid">

			<?php foreach ( $ferpa_audiences as $audience ) : ?>

				<article class="sl-ferpa-audience__card">

					<div class="sl-ferpa-audience__card-content">

						<h3>
							<?php echo esc_html( $audience['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $audience['text'] ); ?>
						</p>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>