<?php
/**
 * POSH course cards for the SHe-Box AMP page.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="she-box-courses" id="shebox-posh-courses" aria-labelledby="shebox-posh-courses-title">
	<h2 class="pa-h2 she-box-courses__title" id="shebox-posh-courses-title">Our POSH Courses</h2>
	<p class="pa-p">Build POSH awareness across your workforce with interactive, role-specific eLearning for employees, people managers, and Internal Committee members - aligned with the POSH Act and SHe-Box compliance requirements.</p>

	<div class="she-box-course-grid">
		<article class="course-showcase__item">
			<div class="course-showcase__card">
				<a href="https://elearnposh.com/solutions/posh-training-for-employees/" class="course-showcase__image">
					<amp-img src="https://elearnposh.com/wp-content/uploads/2026/06/POSH-Employess-Training.webp" width="640" height="400" layout="responsive" alt="POSH Training for Employees online workplace harassment awareness training for employees"></amp-img>
				</a>
				<span class="course-showcase__category course-showcase__category--posh">POSH Courses</span>
				<div class="course-showcase__body">
					<h3>POSH Training for Employees</h3>
					<p class="course-showcase__desc">POSH awareness training to help employees understand the law, recognize inappropriate behaviour, and contribute to a safer, more respectful workplace.</p>
					<a href="https://elearnposh.com/solutions/posh-training-for-employees/" class="course-showcase__cta">Know More</a>
				</div>
			</div>
		</article>

		<article class="course-showcase__item">
			<div class="course-showcase__card">
				<a href="https://elearnposh.com/solutions/posh-training-for-managers/" class="course-showcase__image">
					<amp-img src="https://elearnposh.com/wp-content/uploads/2026/06/POSH-Manager-Training.webp" width="640" height="400" layout="responsive" alt="POSH for Managers training on workplace harassment prevention and team leadership responsibilities"></amp-img>
				</a>
				<span class="course-showcase__category course-showcase__category--posh">POSH Courses</span>
				<div class="course-showcase__body">
					<h3>POSH Training For Managers</h3>
					<p class="course-showcase__desc">Equip people managers to handle complaints fairly, work with the Internal Committee, and take proactive measures against workplace sexual harassment.</p>
					<a href="https://elearnposh.com/solutions/posh-training-for-managers/" class="course-showcase__cta">Know More</a>
				</div>
			</div>
		</article>

		<article class="course-showcase__item">
			<div class="course-showcase__card">
				<a href="<?php echo esc_url( elearnposh_amp_get_ic_members_page_url() ); ?>" class="course-showcase__image">
					<amp-img src="https://elearnposh.com/wp-content/uploads/2026/06/POSH-%E2%80%93-Internal-Committee-Training.webp" width="640" height="400" layout="responsive" alt="POSH for Internal Committee members workplace inquiry and compliance training course"></amp-img>
				</a>
				<span class="course-showcase__category course-showcase__category--posh">POSH Courses</span>
				<div class="course-showcase__body">
					<h3>POSH Training For IC Members</h3>
					<p class="course-showcase__desc">Structured IC training and compliance tools so committee members handle complaints with confidence, sensitivity, and accuracy - not just check-the-box workshops.</p>
					<a href="<?php echo esc_url( elearnposh_amp_get_ic_members_page_url() ); ?>" class="course-showcase__cta">Know More</a>
				</div>
			</div>
		</article>
	</div>
</section>
