<?php
/**
 * HIPAA Audit Readiness Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audit_features = array(
	array(
		'title'       => __( 'Per-learner dated certificates', 'akaza-adventure' ),
		'description' => __( 'Issued automatically on completion and retrievable at any time. No manual issuing and no missing records for the person who left in June.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Coverage reports by department', 'akaza-adventure' ),
		'description' => __( 'Filter by department, manager or individual and export to Excel or PDF. This is the artefact you hand to an auditor or attach to a client response.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Automated reminder trail', 'akaza-adventure' ),
		'description' => __( 'Reminders are logged, so you can demonstrate that non-completers were followed up rather than ignored, which matters when culpability is assessed.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Annual cycle built in', 'akaza-adventure' ),
		'description' => __( 'Reassign the course each year and the historic records stay intact, so you keep a multi-year training history rather than only the current snapshot.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-hipaa-audit"
	aria-labelledby="sl-hipaa-audit-title"
>
	<div class="container">

		<header class="sl-hipaa-audit__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Audit readiness', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-hipaa-audit-title">
				<?php esc_html_e( 'The documentation problem, ', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'solved before you need it.', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The training itself is the easy part. What gets organisations into difficulty is being unable to prove, months later, exactly who was trained and when. Everything below comes as standard rather than as a paid add-on.',
					'akaza-adventure'
				);
				?>
			</p>

		</header>

		<div class="sl-hipaa-audit__grid">

			<?php foreach ( $audit_features as $feature ) : ?>

				<article class="sl-hipaa-audit__card">

					<h3>
						<?php echo esc_html( $feature['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $feature['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>