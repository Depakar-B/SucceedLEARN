<?php
/**
 * Failure to Prevent Fraud — Your role banner.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="ftpf-section ftpf-section--white ftpf-responsibility" aria-labelledby="ftpf-responsibility-title">
	<div class="ftpf-container">
		<div class="ftpf-responsibility__panel">

			<div>
				<span class="ftpf-responsibility__eyebrow"><?php esc_html_e( 'Your role', 'akaza-adventure' ); ?></span>
				<h2 id="ftpf-responsibility-title">
					<?php esc_html_e( 'Fraud prevention begins with', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'everyday choices', 'akaza-adventure' ); ?></span>
				</h2>
				<p><?php esc_html_e( "Honesty, transparency, appropriate challenge and a willingness to raise concerns all contribute to an organisation's fraud-risk culture.", 'akaza-adventure' ); ?></p>
			</div>

			<div class="ftpf-responsibility__mark" aria-label="<?php esc_attr_e( 'Question. Check. Raise.', 'akaza-adventure' ); ?>">
				<?php esc_html_e( 'Question.', 'akaza-adventure' ); ?><br>
				<?php esc_html_e( 'Check.', 'akaza-adventure' ); ?><br>
				<?php esc_html_e( 'Raise.', 'akaza-adventure' ); ?>
			</div>

		</div>
	</div>
</section>
