<?php
/**
 * AI discoverability: meta descriptions, robots.txt, desktop schema output.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output homepage JSON-LD on desktop (AMP home template outputs its own block).
 */
function elearnposh_amp_output_home_schema_head() {
	if ( ! is_front_page() || ! function_exists( 'elearnposh_amp_get_homepage_schema_graph' ) ) {
		return;
	}

	echo '<script type="application/ld+json">';
	echo wp_json_encode( elearnposh_amp_get_homepage_schema_graph(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	echo '</script>' . "\n";
}
add_action( 'wp_head', 'elearnposh_amp_output_home_schema_head', 20 );

/**
 * Default homepage meta description (aligned with homepage schema copy).
 *
 * @return string
 */
function elearnposh_amp_get_home_meta_description() {
	return 'Prevent workplace sexual harassment with comprehensive POSH eLearning, expert-led webinars, and practical tools for Internal Committee members that help organisations build safer workplaces.';
}

/**
 * Fallback meta descriptions when Rank Math has none set.
 *
 * @return array<string, string> Page slug => description.
 */
function elearnposh_amp_get_page_meta_description_fallbacks() {
	return array(
		'solutions' => 'Explore eLearnPOSH solutions: POSH training for employees, managers, IC members, HEIs, POCSO, unconscious bias, and compliance management for safer workplaces.',
		'site-map'  => 'Browse the eLearnPOSH site map to find POSH training courses, compliance resources, webinars, blog articles, and key company pages in one place.',
		'sitemap'   => 'Browse the eLearnPOSH site map to find POSH training courses, compliance resources, webinars, blog articles, and key company pages in one place.',
	);
}

/**
 * Factual homepage + page meta description fallbacks (visible page copy unchanged).
 *
 * @param string $description Existing description.
 * @return string
 */
function elearnposh_amp_filter_home_meta_description( $description ) {
	$description = is_string( $description ) ? trim( $description ) : '';

	if ( is_front_page() ) {
		return elearnposh_amp_get_home_meta_description();
	}

	if ( '' !== $description || ! is_page() ) {
		return $description;
	}

	$fallbacks = elearnposh_amp_get_page_meta_description_fallbacks();
	$slug      = get_post_field( 'post_name', get_queried_object_id() );

	if ( is_string( $slug ) && isset( $fallbacks[ $slug ] ) ) {
		return $fallbacks[ $slug ];
	}

	return $description;
}
add_filter( 'rank_math/frontend/description', 'elearnposh_amp_filter_home_meta_description', 20 );
add_filter( 'wpseo_metadesc', 'elearnposh_amp_filter_home_meta_description', 20 );

/**
 * Noindex WooCommerce Uncategorized product category archives.
 *
 * @param array<string, string> $robots Robots directives.
 * @return array<string, string>
 */
function elearnposh_amp_noindex_uncategorized_product_cat( $robots ) {
	if ( ! function_exists( 'is_product_category' ) || ! is_product_category( 'uncategorized' ) ) {
		return $robots;
	}

	$robots['index']  = 'noindex';
	$robots['follow'] = 'follow';

	return $robots;
}
add_filter( 'rank_math/frontend/robots', 'elearnposh_amp_noindex_uncategorized_product_cat', 20 );

/**
 * Mirror Uncategorized noindex for core wp_robots when Rank Math is absent.
 *
 * @param array<string, bool|string> $robots Robots directives.
 * @return array<string, bool|string>
 */
function elearnposh_amp_wp_robots_uncategorized_product_cat( $robots ) {
	if ( ! function_exists( 'is_product_category' ) || ! is_product_category( 'uncategorized' ) ) {
		return $robots;
	}

	$robots['noindex'] = true;

	return $robots;
}
add_filter( 'wp_robots', 'elearnposh_amp_wp_robots_uncategorized_product_cat', 20 );

/**
 * Fix malformed relative TOC/image href that resolves to a 404 path segment.
 *
 * Live cause: href="Indirect-Harassment" (missing #) on clarifying-indirect-harassment.
 *
 * @param string $content Post content.
 * @return string
 */
function elearnposh_amp_fix_indirect_harassment_relative_href( $content ) {
	if ( ! is_string( $content ) || '' === $content ) {
		return $content;
	}

	if ( ! is_singular( 'post' ) ) {
		return $content;
	}

	$post = get_post();
	if ( ! $post || 'clarifying-indirect-harassment' !== $post->post_name ) {
		return $content;
	}

	return str_replace(
		array( 'href="Indirect-Harassment"', "href='Indirect-Harassment'" ),
		array( 'href="#Indirect-Harassment"', "href='#Indirect-Harassment'" ),
		$content
	);
}
add_filter( 'the_content', 'elearnposh_amp_fix_indirect_harassment_relative_href', 12 );

/**
 * Allow AI search crawlers and point to llms.txt in robots.txt.
 *
 * @param string $output Existing robots.txt content.
 * @param bool   $public Whether site is public.
 * @return string
 */
function elearnposh_amp_append_ai_crawler_robots_txt( $output, $public ) {
	if ( ! $public || false !== strpos( $output, 'OAI-SearchBot' ) ) {
		return $output;
	}

	$block  = "\n# AI search and answer crawlers (ChatGPT, Claude, Perplexity, Gemini training)\n";
	$block .= "User-agent: OAI-SearchBot\nAllow: /\n\n";
	$block .= "User-agent: Claude-SearchBot\nAllow: /\n\n";
	$block .= "User-agent: Claude-User\nAllow: /\n\n";
	$block .= "User-agent: PerplexityBot\nAllow: /\n\n";
	$block .= "User-agent: Perplexity-User\nAllow: /\n\n";
	$block .= "User-agent: Google-Extended\nAllow: /\n\n";
	$block .= '# Curated site map for AI agents: ' . home_url( '/llms.txt' ) . "\n";

	return rtrim( $output ) . "\n" . $block;
}
add_filter( 'robots_txt', 'elearnposh_amp_append_ai_crawler_robots_txt', 99, 2 );

/**
 * Improve generic CTA semantics on desktop homepage without template edits.
 */
function elearnposh_amp_improve_home_cta_accessibility() {
	if ( ! is_front_page() ) {
		return;
	}
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function () {
	  var selectors = [
	    ['a.course-showcase__cta', 'Know more about this training course'],
	    ['a.eposh-vz-card__btn', 'Know more about this POSH solution'],
	    ['a.btn.btn-schedule', 'Know more about this POSH program']
	  ];

	  selectors.forEach(function (entry) {
	    var selector = entry[0];
	    var fallback = entry[1];
	    document.querySelectorAll(selector).forEach(function (link) {
	      if (link.getAttribute('aria-label')) return;
	      var card = link.closest('article, .course-showcase__card, .eposh-vz-card__body, .pricing-card');
	      var title = card ? card.querySelector('h3, h4, .pricing-card h3') : null;
	      var label = title && title.textContent ? ('Know more about ' + title.textContent.trim()) : fallback;
	      link.setAttribute('aria-label', label);
	    });
	  });
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'elearnposh_amp_improve_home_cta_accessibility', 99 );
