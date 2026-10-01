<?php
/**
 * Financial Crime Prevention — Why it matters now section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$acfe_url = 'https://www.acfe.com/about-the-acfe/newsroom-for-media/press-releases/press-release-detail?s=2024-Report-to-the-Nations';

$statistics = array(
	array(
		'value'  => '5%',
		'text'   => __( 'ACFE estimates that organisations lose 5% of revenue to fraud each year.', 'akaza-adventure' ),
		'source' => __( 'ACFE Report to the Nations 2024', 'akaza-adventure' ),
		'url'    => $acfe_url,
	),
	array(
		'value'  => '43%',
		'text'   => __( 'ACFE reported that 43% of occupational fraud cases examined were detected through tips.', 'akaza-adventure' ),
		'source' => __( 'ACFE Report to the Nations 2024', 'akaza-adventure' ),
		'url'    => $acfe_url,
	),
	array(
		'value'  => '$500m+',
		'text'   => __( 'INTERPOL reported that its I-GRIP mechanism had helped member countries intercept more than US$500 million in criminal proceeds since 2022.', 'akaza-adventure' ),
		'source' => __( 'INTERPOL assessment', 'akaza-adventure' ),
		'url'    => 'https://www.interpol.int/en/News-and-Events/News/2024/INTERPOL-Financial-Fraud-assessment-A-global-threat-boosted-by-technology',
	),
);
?>
<section
	id="why-it-matters"
	class="sl-fcp-section sl-fcp-statistics"
	aria-labelledby="sl-fcp-statistics-title"
>
	<div class="container">

		<div class="sl-fcp-heading-row">
			<div>
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Why It Matters', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-fcp-statistics-title">
					<?php esc_html_e( 'Why Financial Crime Prevention Matters Now', 'akaza-adventure' ); ?>
				</h2>
			</div>

			<p>
				<?php esc_html_e( 'Employee awareness remains an important part of wider organisational controls designed to identify, prevent and respond to financial crime risks.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-fcp-statistics__grid">
			<?php foreach ( $statistics as $stat ) : ?>
				<article class="sl-fcp-statistics__card">
					<span class="sl-fcp-statistics__value"><?php echo esc_html( $stat['value'] ); ?></span>

					<p><?php echo esc_html( $stat['text'] ); ?></p>

					<a
						class="sl-fcp-statistics__source"
						href="<?php echo esc_url( $stat['url'] ); ?>"
						target="_blank"
						rel="noopener"
					>
						<?php echo esc_html( $stat['source'] ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
