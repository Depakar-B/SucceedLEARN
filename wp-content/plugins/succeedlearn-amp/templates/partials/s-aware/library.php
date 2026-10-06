<?php
/**
 * S-Aware AMP — Course library (scroll table + card grid explorer).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$overview = succeedlearn_amp_get_sa_library_overview();
$cards    = succeedlearn_amp_get_sa_library_cards();
?>
<section class="sl-saware-library" aria-labelledby="sl-saware-library-title">
	<div class="sl-wrap">
		<div class="sl-saware-library__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'S-Aware Course Library', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-saware-library-title" class="sl-h2">
				<?php esc_html_e( 'Comprehensive Security & Privacy Awareness Course Library', 'succeedlearn-amp' ); ?>
			</h2>
			<h3 class="sl-panel-title"><?php esc_html_e( 'Find the Right Security Awareness Training for Your Organisation', 'succeedlearn-amp' ); ?></h3>
			<p><?php esc_html_e( 'Security awareness needs vary based on regulatory requirements, industry risks and evolving workplace threats. S-Aware brings these learning needs together in one comprehensive course library.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-saware-library__table-wrap">
			<table class="sl-saware-library__table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Training Category', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'What You\'ll Find', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Training Areas', 'succeedlearn-amp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $overview as $row ) : ?>
						<tr>
							<th scope="row"><?php echo esc_html( $row['category'] ); ?></th>
							<td><?php echo esc_html( $row['what'] ); ?></td>
							<td><?php echo esc_html( $row['areas'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<div class="sl-saware-library__explorer">
			<p class="sl-saware-library__explorer-note">
				<?php esc_html_e( 'Explore the S-Aware Course Library. Each card shows its category and links to the relevant training.', 'succeedlearn-amp' ); ?>
			</p>
			<div class="sl-saware-library__cards">
				<?php foreach ( $cards as $card ) : ?>
					<article class="sl-saware-library__card sl-saware-library__card--<?php echo esc_attr( $card['category_key'] ); ?>">
						<span class="sl-saware-library__cat-badge sl-saware-library__cat-badge--<?php echo esc_attr( $card['category_key'] ); ?>" aria-label="<?php echo esc_attr( $card['category'] ); ?>">
							<span class="sl-saware-library__cat-dot" aria-hidden="true"></span>
							<span class="sl-saware-library__cat-label"><?php echo esc_html( $card['category'] ); ?></span>
						</span>
						<a class="sl-saware-library__card-media" href="<?php echo esc_url( $card['url'] ); ?>" tabindex="-1" aria-hidden="true">
							<amp-img
								src="<?php echo esc_url( $card['image'] ); ?>"
								width="640"
								height="360"
								layout="responsive"
								alt=""
							></amp-img>
						</a>
						<div class="sl-saware-library__card-body">
							<h3 class="sl-saware-library__card-title">
								<a href="<?php echo esc_url( $card['url'] ); ?>"><?php echo esc_html( $card['title'] ); ?></a>
							</h3>
							<p class="sl-saware-library__card-excerpt"><?php echo esc_html( $card['description'] ); ?></p>
							<a class="sl-saware-library__card-link" href="<?php echo esc_url( $card['url'] ); ?>">
								<?php esc_html_e( 'View Course', 'succeedlearn-amp' ); ?>
								<span aria-hidden="true">→</span>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
