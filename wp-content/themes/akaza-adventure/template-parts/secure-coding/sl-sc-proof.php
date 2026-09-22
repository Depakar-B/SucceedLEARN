<?php
/**
 * Secure Coding — Proof / approach strip.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	__( 'Secure SDLC & shift-left mindset', 'akaza-adventure' ),
	__( 'OWASP-relevant coding controls', 'akaza-adventure' ),
	__( 'NIST SSDF-aligned principles', 'akaza-adventure' ),
);
?>

<section class="sl-sc-proof" aria-label="<?php esc_attr_e( 'Course approach', 'akaza-adventure' ); ?>">
	<div class="container">
		<div class="sl-sc-proof__grid">
			<div class="sl-sc-proof__label">
				<?php esc_html_e( 'Built around modern secure-development thinking', 'akaza-adventure' ); ?>
			</div>
			<?php foreach ( $items as $item ) : ?>
				<div class="sl-sc-proof__item">
					<span class="sl-sc-proof__dot" aria-hidden="true"></span>
					<?php echo esc_html( $item ); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
