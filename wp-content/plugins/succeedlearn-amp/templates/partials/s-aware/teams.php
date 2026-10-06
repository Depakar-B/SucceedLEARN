<?php
/**
 * S-Aware AMP — Security teams cards.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$groups = succeedlearn_amp_get_sa_teams();
?>
<section class="sl-saware-security-teams" aria-labelledby="sl-saware-security-teams-title">
	<div class="sl-wrap">
		<div class="sl-saware-security-teams__heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Supporting Security Culture Across the Organisation', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-saware-security-teams-title" class="sl-h2">
				<?php esc_html_e( 'Designed for the Teams Driving', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Culture', 'succeedlearn-amp' ); ?></span>
			</h2>
			<div class="sl-saware-security-teams__intro">
				<p><?php esc_html_e( 'Building a security-aware workforce often requires collaboration across multiple organisational functions.', 'succeedlearn-amp' ); ?></p>
				<p><?php esc_html_e( 'S-Aware provides a common learning foundation that helps these teams support their respective security awareness objectives.', 'succeedlearn-amp' ); ?></p>
			</div>
		</div>
		<div class="sl-saware-security-teams__grid">
			<?php foreach ( $groups as $index => $group ) : ?>
				<article class="sl-saware-security-teams__card">
					<div class="sl-saware-security-teams__card-title">
						<span class="sl-saware-security-teams__number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="sl-panel-title"><?php echo esc_html( $group['title'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $group['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
