<?php
/**
 * UK Cyber Essentials AMP — How the training relates to the five controls.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rows = succeedlearn_amp_get_ukce_control_rows();
?>
<section
	class="sl-ukce-controls"
	id="how-training-relates-to-controls"
	aria-labelledby="sl-ukce-controls-title"
>
	<div class="sl-wrap">
		<div class="sl-ukce-controls__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Control Mapping', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-ukce-controls-title" class="sl-h2">
				<?php esc_html_e( 'How the Training Relates to the', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Five Cyber Essentials Controls', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-ukce-controls__table-wrap">
			<table class="sl-ukce-controls__table">
				<caption class="sl-ukce-controls__caption">
					<?php esc_html_e( 'How security awareness topics support the five Cyber Essentials technical controls', 'succeedlearn-amp' ); ?>
				</caption>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Cyber Essentials Technical Control', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Relevant Training Topics', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'How Employee Awareness Can Support It', 'succeedlearn-amp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<td>
								<span class="sl-ukce-controls__cell sl-ukce-controls__cell--strong">
									<?php echo esc_html( $row['control'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-ukce-controls__cell">
									<?php echo esc_html( $row['topics'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-ukce-controls__cell">
									<?php echo esc_html( $row['support'] ); ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<div class="sl-ukce-controls__note">
			<strong><?php esc_html_e( 'Important Mapping Note', 'succeedlearn-amp' ); ?></strong>
			<p>
				<?php esc_html_e( 'Cyber Essentials is a technical certification scheme, not a prescribed employee-training curriculum.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'The S-Aware modules above are mapped based on their relevance to secure employee behaviours around the five Cyber Essentials controls. Completing security awareness training alone does not satisfy Cyber Essentials certification requirements.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
