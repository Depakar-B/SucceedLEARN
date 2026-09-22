<?php
/**
 * DEI&B — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = '';
$hr_url     = home_url( '/hr-compliance-suite/' );
$iwc_url    = home_url( '/inclusive-workplace-training/' );
$facts      = array(
	__( '60 minutes', 'akaza-adventure' ),
	__( 'Beginner level', 'akaza-adventure' ),
	__( 'Online learning', 'akaza-adventure' ),
	__( 'Employees, managers and HR teams', 'akaza-adventure' ),
);
?>
<section class="sl-deib-hero" aria-labelledby="sl-deib-hero-title">

	<div class="container">

		<div class="row sl-deib-hero__row align-items-stretch">

			<div class="col-lg-6">

				<nav class="sl-deib-hero__breadcrumbs slf-hero-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'akaza-adventure' ); ?>">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'akaza-adventure' ); ?></a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo esc_url( $hr_url ); ?>"><?php esc_html_e( 'Global HR Compliance Suite', 'akaza-adventure' ); ?></a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo esc_url( $iwc_url ); ?>"><?php esc_html_e( 'Inclusive Workplace', 'akaza-adventure' ); ?></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php esc_html_e( 'Diversity, Equality, Inclusion and Belonging', 'akaza-adventure' ); ?>
						</li>
					</ol>
				</nav>

				<div class="sl-deib-hero__content">

					<h1 id="sl-deib-hero-title">
						<?php esc_html_e( 'Diversity, Equality, Inclusion and Belonging Training', 'akaza-adventure' ); ?>
					</h1>

					<p class="sl-deib-hero__tagline">
						<?php
						echo wp_kses(
							__( 'Make <span>fair treatment</span> part of how your people work.', 'akaza-adventure' ),
							array( 'span' => array() )
						);
						?>
					</p>

					<p>
						<?php esc_html_e( 'Help employees recognise discrimination, understand inclusion and contribute to a workplace where people feel respected and valued.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'SucceedLEARN’s online course connects equality and diversity principles with everyday workplace decisions, relationships and responses to concerns.', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-deib-hero__actions sl-hero-actions">
						<a href="#contact" class="sl-hero-btn sl-hero-btn-primary">
							<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						</a>
					</div>

					<div class="sl-deib-hero__more">
						<p class="sl-deib-hero__more-title">
							<?php esc_html_e( 'Create a stronger foundation for fairness and inclusion at work.', 'akaza-adventure' ); ?>
						</p>

						<p>
							<?php esc_html_e( 'Equality and inclusion are reflected in everyday workplace experiences: how opportunities are offered, how decisions are made, whose perspectives are considered and how colleagues respond when concerns arise. Building a shared understanding of these principles can help employees approach such moments with greater awareness and consideration.', 'akaza-adventure' ); ?>
						</p>

						<p>
							<?php esc_html_e( 'SucceedLEARN’s online Equality, Diversity, Inclusion and Belonging course introduces employees to the meaning of equality and diversity, the different ways discrimination can occur and the importance of creating an environment where people feel respected, included and able to participate.', 'akaza-adventure' ); ?>
						</p>

						<p>
							<?php esc_html_e( 'The course connects key concepts with practical workplace situations, helping learners understand how their decisions, communication and conduct can contribute to a fairer and more inclusive working environment.', 'akaza-adventure' ); ?>
						</p>

						<div class="sl-deib-hero__actions sl-hero-actions">
							<a href="#contact" class="sl-hero-btn sl-hero-btn-primary">
								<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
							</a>
						</div>
					</div>

				</div>

			</div>

			<div class="col-lg-6">
				<div class="sl-deib-hero__media">
					<?php if ( $hero_image ) : ?>
						<img
							src="<?php echo esc_url( $hero_image ); ?>"
							alt="<?php esc_attr_e( 'Equality, Diversity and Inclusion course screenshot', 'akaza-adventure' ); ?>"
							width="960"
							height="720"
							loading="eager"
							fetchpriority="high"
							decoding="async"
						>
					<?php else : ?>
						<div class="sl-deib-hero__placeholder" role="img" aria-label="<?php esc_attr_e( 'Course screenshot placeholder', 'akaza-adventure' ); ?>">
							<span class="sl-deib-hero__placeholder-icon" aria-hidden="true"><i class="bi bi-display"></i></span>
							<span><?php esc_html_e( 'Approved EDI course screenshot', 'akaza-adventure' ); ?></span>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>

		<div class="sl-deib-facts" aria-label="<?php esc_attr_e( 'Course facts', 'akaza-adventure' ); ?>">
			<?php foreach ( $facts as $fact ) : ?>
				<span class="sl-deib-facts__item"><?php echo esc_html( $fact ); ?></span>
			<?php endforeach; ?>
		</div>

	</div>

</section>
