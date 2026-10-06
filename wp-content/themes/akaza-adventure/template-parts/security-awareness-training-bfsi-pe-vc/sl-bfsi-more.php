<?php
/**
 * BFSI & PE/VC — More Training for BFSI & PE/VC Organisations.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_url = static function ( $slug, $fallback = '#contact' ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : $fallback;
};

$pevc_home = $course_url(
	'private-equity-venture-capital-compliance-training',
	home_url( '/private-equity-venture-capital-compliance-training/' )
);

$courses = array(
	array(
		'title' => __( 'Security Tips for Remote Workforce', 'akaza-adventure' ),
		'href'  => $course_url( 'remote-workforce-security-training', 'https://succeedlearn.com/courses/remote-workforce-security-training/' ),
	),
	array(
		'title' => __( 'Political Donations', 'akaza-adventure' ),
		'href'  => $course_url( 'political-donations-pe-vc' ),
	),
	array(
		'title' => __( 'Security & Privacy Awareness Training – UK', 'akaza-adventure' ),
		'href'  => $course_url( 'information-security-awareness-training-for-uk-cyber-essentials' ),
	),
	array(
		'title' => __( 'Gifts and Entertainment', 'akaza-adventure' ),
		'href'  => $course_url( 'gifts-and-entertainment' ),
	),
	array(
		'title' => __( 'Whistleblowing', 'akaza-adventure' ),
		'href'  => $course_url( 'whistleblowing-pe-vc' ),
	),
	array(
		'title' => __( 'SMCR Training – Senior Managers', 'akaza-adventure' ),
		'href'  => $course_url( 'smcr-pe-vc' ),
	),
	array(
		'title' => __( 'SMCR Training – Employees', 'akaza-adventure' ),
		'href'  => $course_url( 'smcr-pe-vc' ),
	),
	array(
		'title' => __( 'Modern Slavery Awareness', 'akaza-adventure' ),
		'href'  => $course_url( 'modern-slavery-awareness' ),
	),
);
?>

<section
	class="sl-bfsi-more"
	id="more-training-for-bfsi-pe-vc"
	aria-labelledby="sl-bfsi-more-title"
>
	<div class="container">

		<div class="sl-bfsi-more__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Related Training', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-more-title">
				<?php esc_html_e( 'More Training for BFSI & PE/VC', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Organisations', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Looking for broader BFSI & PE/VC workforce training?', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php
				esc_html_e(
					'In addition to Cybersecurity Awareness Training, SucceedLEARN offers other training modules designed for financial-services organisations.',
					'akaza-adventure'
				);
				?>
			</p>

			<h3 class="sl-bfsi-more__subtitle">
				<?php esc_html_e( 'Other Training Available', 'akaza-adventure' ); ?>
			</h3>
		</div>

		<div class="sl-bfsi-more__grid">
			<?php foreach ( $courses as $course ) : ?>
				<a class="sl-bfsi-more__card" href="<?php echo esc_url( $course['href'] ); ?>">
					<h3><?php echo esc_html( $course['title'] ); ?></h3>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="sl-bfsi-more__cta">
			<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_url( $pevc_home ); ?>">
				<?php esc_html_e( 'Explore BFSI & PE/VC Training', 'akaza-adventure' ); ?>
			</a>
		</div>

	</div>
</section>
