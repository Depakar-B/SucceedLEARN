<?php
/**
 * Code of Conduct — Social proof stats.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$stats = array(
	array(
		'target' => 250,
		'suffix' => '+',
		'format' => 'plain',
		'label'  => __( 'Organisations', 'akaza-adventure' ),
	),
	array(
		'target' => 1200000,
		'suffix' => '+',
		'format' => 'million',
		'label'  => __( 'Learners', 'akaza-adventure' ),
	),
	array(
		'target' => 40,
		'suffix' => '+',
		'format' => 'plain',
		'label'  => __( 'Countries', 'akaza-adventure' ),
	),
	array(
		'target' => 94,
		'suffix' => '%',
		'format' => 'plain',
		'label'  => __( 'Average completion', 'akaza-adventure' ),
	),
);
?>

<section class="sl-coc-stats" aria-labelledby="sl-coc-stats-title">
	<div class="container">

		<div class="sl-coc-stats__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Social Proof', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-stats-title">
				<?php
				echo wp_kses(
					__( 'Trusted by Organizations Building <span>Stronger Workplace Cultures</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

		</div>

		<div class="sl-coc-stats__grid">

			<?php foreach ( $stats as $stat ) : ?>
				<div class="sl-coc-stats__item">
					<p class="sl-coc-stats__value">
						<strong
							class="sl-coc-stats__counter"
							data-target="<?php echo esc_attr( (string) $stat['target'] ); ?>"
							data-format="<?php echo esc_attr( $stat['format'] ); ?>"
						>0</strong><span><?php echo esc_html( $stat['suffix'] ); ?></span>
					</p>
					<p class="sl-coc-stats__label">
						<?php echo esc_html( $stat['label'] ); ?>
					</p>
				</div>
			<?php endforeach; ?>

		</div>

	</div>
</section>
