<?php
/**
 * Shared AMP FAQ accordion helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the shared numbered AMP FAQ accordion.
 *
 * Use this UI on all AMP pages regardless of desktop FAQ styling.
 *
 * @param array  $items FAQ items with question/answer keys.
 * @param string $extra_class Optional extra wrapper class.
 */
function succeedlearn_amp_render_faq_accordion( $items, $extra_class = '' ) {
	if ( empty( $items ) || ! is_array( $items ) ) {
		return;
	}

	$classes = trim( 'sl-amp-faq ' . (string) $extra_class );
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
		<amp-accordion class="sl-amp-faq__accordion" animate expand-single-section disable-session-states>
			<?php
			$is_first = true;
			foreach ( $items as $index => $item ) :
				$question = isset( $item['question'] ) ? (string) $item['question'] : '';
				$answer   = isset( $item['answer'] ) ? (string) $item['answer'] : '';
				if ( '' === $question || '' === $answer ) {
					continue;
				}
				$num      = str_pad( (string) ( (int) $index + 1 ), 2, '0', STR_PAD_LEFT ) . '.';
				$has_html = false !== strpos( $answer, '<' );
				?>
				<section class="sl-amp-faq__item"<?php echo $is_first ? ' expanded' : ''; ?>>
					<h3 class="sl-amp-faq__summary">
						<span class="sl-amp-faq__num" aria-hidden="true"><?php echo esc_html( $num ); ?></span>
						<span class="sl-amp-faq__q"><?php echo esc_html( $question ); ?></span>
					</h3>
					<div class="sl-amp-faq__panel">
						<?php if ( $has_html ) : ?>
							<div class="sl-amp-faq__answer">
								<?php echo wp_kses_post( $answer ); ?>
							</div>
						<?php else : ?>
							<p><?php echo esc_html( $answer ); ?></p>
						<?php endif; ?>
					</div>
				</section>
				<?php
				$is_first = false;
			endforeach;
			?>
		</amp-accordion>
	</div>
	<?php
}

/**
 * Critical FAQ accordion CSS with !important.
 *
 * AMPforWP strips !important from amp-custom, then AMP runtime forces
 * `amp-accordion > section > * { display:block !important }`. Re-inject
 * after that strip so the shared numbered FAQ stays a flex row.
 *
 * @return string
 */
function succeedlearn_amp_get_faq_accordion_force_css() {
	return '.sl-amp-faq{margin:12px 0 0}'
		. '.sl-amp-faq__item{border:1px solid rgba(107,124,147,.18);border-radius:12px;margin:0 0 10px;background:#fff;overflow:hidden}'
		. '.sl-amp-faq__item:last-child{margin-bottom:0}'
		. 'amp-accordion.sl-amp-faq__accordion>section>.sl-amp-faq__summary,.sl-amp-faq__summary{'
		. 'display:flex!important;align-items:center!important;justify-content:space-between!important;gap:12px!important;'
		. 'width:100%!important;margin:0!important;padding:16px 20px!important;box-sizing:border-box!important;'
		. 'font-size:15px!important;line-height:1.45!important;font-weight:700!important;color:#16234e!important;'
		. 'background:#fff!important;background-image:none!important;border:0!important;cursor:pointer}'
		. 'amp-accordion.sl-amp-faq__accordion>section>.sl-amp-faq__summary::after,.sl-amp-faq__summary::after{'
		. 'content:"+";display:flex!important;align-items:center!important;justify-content:center!important;'
		. 'flex:0 0 1.5rem!important;width:1.5rem!important;height:1.5rem!important;margin:0 0 0 auto!important;'
		. 'padding:0!important;border:0!important;color:#1472ba!important;font-size:1.4rem!important;'
		. 'font-weight:400!important;line-height:1!important;text-align:center!important}'
		. '.sl-amp-faq__num{display:inline-block!important;flex:0 0 auto!important;min-width:1.75rem;color:#000;'
		. 'font-size:14px;font-weight:700;font-variant-numeric:tabular-nums;line-height:1.45}'
		. '.sl-amp-faq__q{flex:1 1 auto!important;min-width:0;padding-right:12px;color:#16234e}'
		. '.sl-amp-faq__item[expanded] .sl-amp-faq__summary{color:#1472ba!important}'
		. '.sl-amp-faq__item[expanded] .sl-amp-faq__summary::after{content:"-"}'
		. '.sl-amp-faq__panel{padding:0 20px 16px;font-size:14px;line-height:1.65;color:#4A4A4A;background:#fff}'
		. '@media(max-width:480px){amp-accordion.sl-amp-faq__accordion>section>.sl-amp-faq__summary,.sl-amp-faq__summary{padding:14px 16px!important}.sl-amp-faq__panel{padding:0 16px 14px}}';
}

/**
 * After AMPforWP strips !important, restore shared FAQ accordion layout CSS.
 *
 * @param string $html Full AMP HTML.
 * @return string
 */
/**
 * Critical Infosec terms accordion CSS with !important (multi-expand layout).
 *
 * @return string
 */
function succeedlearn_amp_get_terms_accordion_force_css() {
	return 'amp-accordion.sl-infosec-2026-terms__accordion{display:flex!important;flex-direction:column!important;gap:12px!important}'
		. 'amp-accordion.sl-infosec-2026-terms__accordion>section.sl-infosec-2026-terms__item,.sl-infosec-2026-terms__item{'
		. 'display:block!important;margin:0!important;border:1px solid rgba(107,124,147,.18)!important;border-radius:14px!important;'
		. 'background:#fff!important;box-shadow:0 8px 22px rgba(22,35,78,.04)!important;overflow:hidden!important;box-sizing:border-box!important}'
		. 'amp-accordion.sl-infosec-2026-terms__accordion>section[expanded],.sl-infosec-2026-terms__item[expanded]{'
		. 'border-color:rgba(20,114,186,.35)!important;box-shadow:0 12px 28px rgba(22,35,78,.08)!important}'
		. 'amp-accordion.sl-infosec-2026-terms__accordion>section>.sl-infosec-2026-terms__summary,.sl-infosec-2026-terms__summary{'
		. 'display:flex!important;align-items:center!important;justify-content:space-between!important;gap:16px!important;'
		. 'width:100%!important;margin:0!important;padding:16px 16px 16px 18px!important;box-sizing:border-box!important;'
		. 'font-size:17px!important;line-height:1.4!important;font-weight:700!important;color:#16234e!important;'
		. 'background:transparent!important;background-image:none!important;border:0!important;border-left:3px solid transparent!important;cursor:pointer}'
		. 'amp-accordion.sl-infosec-2026-terms__accordion>section>.sl-infosec-2026-terms__summary::after,.sl-infosec-2026-terms__summary::after{'
		. 'content:""!important;display:block!important;flex:0 0 34px!important;width:34px!important;height:34px!important;'
		. 'margin:0 0 0 auto!important;padding:0!important;border:0!important;border-radius:10px!important;'
		. 'background-color:rgba(20,114,186,.1)!important;'
		. 'background-image:url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\'%3E%3Cpath d=\'M6 9l6 6 6-6\' stroke=\'%231472ba\' stroke-width=\'2.25\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/%3E%3C/svg%3E")!important;'
		. 'background-repeat:no-repeat!important;background-position:center!important;background-size:16px 16px!important}'
		. 'amp-accordion.sl-infosec-2026-terms__accordion>section[expanded]>.sl-infosec-2026-terms__summary,.sl-infosec-2026-terms__item[expanded]>.sl-infosec-2026-terms__summary{'
		. 'color:#1472ba!important;border-left-color:#1472ba!important;background:rgba(20,114,186,.04)!important}'
		. 'amp-accordion.sl-infosec-2026-terms__accordion>section[expanded]>.sl-infosec-2026-terms__summary::after,.sl-infosec-2026-terms__item[expanded]>.sl-infosec-2026-terms__summary::after{'
		. 'content:""!important;transform:rotate(180deg);background-color:rgba(20,114,186,.16)!important}'
		. '.sl-infosec-2026-terms__panel{padding:4px 18px 18px 21px;border-top:1px solid rgba(107,124,147,.12);font-size:14px;line-height:1.7;color:#4A4A4A}';
}

function succeedlearn_amp_reinforce_faq_accordion_css( $html ) {
	if ( ! is_string( $html ) || '' === $html ) {
		return $html;
	}
	if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && ! succeedlearn_amp_is_serving_amp() ) {
		return $html;
	}

	$extra_css = '';
	if ( false !== strpos( $html, 'sl-amp-faq' ) ) {
		$extra_css .= succeedlearn_amp_get_faq_accordion_force_css();
	}
	if ( false !== strpos( $html, 'sl-infosec-2026-terms__accordion' ) ) {
		$extra_css .= succeedlearn_amp_get_terms_accordion_force_css();
	}
	if ( '' === $extra_css ) {
		return $html;
	}

	if ( preg_match( '/<style\b[^>]*\bamp-custom\b[^>]*>.*?<\/style>/is', $html ) ) {
		return (string) preg_replace(
			'/(<style\b[^>]*\bamp-custom\b[^>]*>)(.*?)(<\/style>)/is',
			'$1$2' . $extra_css . '$3',
			$html,
			1
		);
	}

	return $html;
}
