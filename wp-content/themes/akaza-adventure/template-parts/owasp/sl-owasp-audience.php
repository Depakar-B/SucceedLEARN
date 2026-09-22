<?php
/**
 * OWASP — Target audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'icon'  => '</>',
		'title' => __( 'Software Developers', 'akaza-adventure' ),
		'text'  => __( 'Understand how coding decisions affect application security and how common vulnerabilities can be reduced during development.', 'akaza-adventure' ),
	),
	array(
		'icon'  => 'QA',
		'title' => __( 'QA & Software Testers', 'akaza-adventure' ),
		'text'  => __( 'Learn to test not only how applications are intended to work, but also how functionality might be misused.', 'akaza-adventure' ),
	),
	array(
		'icon'  => '∞',
		'title' => __( 'DevOps & DevSecOps', 'akaza-adventure' ),
		'text'  => __( 'Understand security risks across dependencies, configuration, build pipelines, deployment and monitoring.', 'akaza-adventure' ),
	),
	array(
		'icon'  => '◇',
		'title' => __( 'Software Architects', 'akaza-adventure' ),
		'text'  => __( 'Incorporate security requirements, trust boundaries, threat modelling and secure design principles earlier.', 'akaza-adventure' ),
	),
	array(
		'icon'  => '↗',
		'title' => __( 'Engineering Managers', 'akaza-adventure' ),
		'text'  => __( 'Establish a common application-security understanding across development teams.', 'akaza-adventure' ),
	),
	array(
		'icon'  => '□',
		'title' => __( 'Technical Product Teams', 'akaza-adventure' ),
		'text'  => __( 'Understand how requirements, workflows and business logic can introduce security risks before development begins.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-owasp-audience" id="audience" aria-labelledby="sl-owasp-audience-title">
	<div class="container">

		<div class="sl-owasp-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Target audience', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-owasp-audience-title">
				<?php
				echo wp_kses(
					__( 'Designed for Teams That <span>Build and Maintain Software</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-owasp-audience__grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-owasp-audience__card">
					<div class="sl-owasp-audience__icon" aria-hidden="true">
						<?php echo esc_html( $audience['icon'] ); ?>
					</div>
					<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p><?php echo esc_html( $audience['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
