<?php
/**
 * Global Workplace Compliance Training — AMP data helpers.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Include a GWCT section partial.
 *
 * @param string               $name Partial basename without .php.
 * @param array<string, mixed> $args Optional vars extracted into the partial scope.
 */
function succeedlearn_amp_gwct_partial( $name, $args = array() ) {
	$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'partials/gwct/' . sanitize_file_name( (string) $name ) . '.php';
	if ( ! is_readable( $path ) ) {
		return;
	}

	if ( ! empty( $args ) && is_array( $args ) ) {
		// phpcs:ignore WordPress.PHP.DontExtract.extract_extract -- scoped vars for AMP partials.
		extract( $args, EXTR_SKIP );
	}

	include $path;
}

/**
 * Render a Bootstrap-style SVG icon for GWCT AMP sections.
 *
 * @param string $name          Icon key without bi- prefix (e.g. journal-check).
 * @param string $wrapper_class Optional wrapper class. Default: sl-gwct-points__icon.
 */
function succeedlearn_amp_gwct_render_icon( $name, $wrapper_class = 'sl-gwct-points__icon' ) {
	$name = sanitize_key( (string) $name );

	// Accept legacy / Bootstrap class variants from desktop data.
	$aliases = array(
		'bi-journal-check'     => 'journal-check',
		'bi-people-fill'       => 'people-fill',
		'bi-diagram-3'         => 'diagram-3',
		'bi-shield-check'      => 'shield-check',
		'bi-chat-heart'        => 'chat-heart',
		'bi-collection-play'   => 'collection-play',
		'bi-bullseye'          => 'bullseye',
		'bi-mortarboard-fill'  => 'mortarboard-fill',
		'bi-globe2'            => 'globe',
		'bi-globe'             => 'globe',
		'bi-check-lg'          => 'check-lg',
		'bi-activity'          => 'activity',
		'bi-stars'             => 'stars',
		'globe'                => 'globe',
		'globe2'               => 'globe',
	);
	if ( isset( $aliases[ $name ] ) ) {
		$name = $aliases[ $name ];
	}

	$paths = array(
		'journal-check'    => '<path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/><path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/><path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>',
		'people-fill'      => '<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>',
		'diagram-3'        => '<path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>',
		'shield-check'     => '<path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/><path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>',
		'chat-heart'       => '<path fill-rule="evenodd" d="M2.965 12.695a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2m-.8 3.108.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>',
		'collection-play'  => '<path d="M2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3m2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1m2.765 5.576A.5.5 0 0 0 6 7v5a.5.5 0 0 0 .765.424l4-2.5a.5.5 0 0 0 0-.848z"/><path d="M1.5 14.5A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5zm13-1a.5.5 0 0 0 .5-.5V6a.5.5 0 0 0-.5-.5h-13A.5.5 0 0 0 1 6v7a.5.5 0 0 0 .5.5z"/>',
		'bullseye'         => '<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/><path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/><path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8"/><path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>',
		'mortarboard-fill' => '<path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/><path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>',
		'globe'            => '<path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z"/>',
		'activity'         => '<path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2"/>',
		'stars'            => '<path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>',
		'check-lg'         => '<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>',
	);

	if ( empty( $paths[ $name ] ) ) {
		return;
	}

	$wrapper_class = sanitize_html_class( (string) $wrapper_class );
	if ( '' === $wrapper_class ) {
		$wrapper_class = 'sl-gwct-points__icon';
	}

	echo '<span class="' . esc_attr( $wrapper_class ) . '" aria-hidden="true">';
	echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16" fill="currentColor" focusable="false">';
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted static SVG path markup.
	echo $paths[ $name ];
	echo '</svg></span>';
}

/**
 * Back-compat alias for point-row icons.
 *
 * @param string $name Icon key without bi- prefix.
 */
function succeedlearn_amp_gwct_render_point_icon( $name ) {
	succeedlearn_amp_gwct_render_icon( $name, 'sl-gwct-points__icon' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_gwct_canonical_url() {
	$canonical = home_url( '/global-workplace-compliance-training-for-employees/' );
	$page      = get_page_by_path( 'global-workplace-compliance-training-for-employees' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			return $link;
		}
	}
	return $canonical;
}

/**
 * @return string
 */
function succeedlearn_amp_get_gwct_hero_image() {
	$uploads   = content_url( '/uploads' );
	$hero_img  = $uploads . '/2026/08/Collaborative-Compliance-Learning.png';
	$local_img = WP_CONTENT_DIR . '/uploads/2026/08/Collaborative-Compliance-Learning.png';
	if ( ! file_exists( $local_img ) ) {
		$hero_img = 'https://succeedlearn.com/wp-content/uploads/2026/08/Collaborative-Compliance-Learning.png';
	}
	return $hero_img;
}

/**
 * @return string
 */
function succeedlearn_amp_get_gwct_page_title() {
	return __( 'Global Workplace Compliance Training for Employees', 'succeedlearn-amp' );
}

/**
 * @return string
 */
function succeedlearn_amp_get_gwct_meta_description() {
	return __( 'Build workplaces where people and performance thrive with engaging, scenario-based global workplace compliance training for employees.', 'succeedlearn-amp' );
}

/**
 * Behaviour section image URL. Empty until the asset is ready.
 *
 * @return string
 */
function succeedlearn_amp_get_gwct_behaviour_image() {
	return '';
}

/**
 * @return array<int, array<string, mixed>>
 */
function succeedlearn_amp_get_gwct_solutions() {
	return array(
		array(
			'id'        => 'inclusive-workplace-training',
			'title'     => __( 'Inclusive Workplace Training', 'succeedlearn-amp' ),
			'subtitle'  => __( 'Create workplaces where everyone can contribute, collaborate, and belong.', 'succeedlearn-amp' ),
			'intro'     => __( 'Inclusive workplaces are built through everyday actions that encourage respect, reduce bias, and create a sense of belonging.', 'succeedlearn-amp' ),
			'body'      => __( 'Our Inclusive Workplace learning solutions help employees and leaders recognise unconscious bias, build inclusive behaviours, strengthen collaboration, and develop the confidence to support colleagues through positive everyday interactions.', 'succeedlearn-amp' ),
			'courses'   => array(
				__( 'Diversity, Equality, Inclusion and Belonging [DEIB]', 'succeedlearn-amp' ),
				__( 'Unconscious Bias Training', 'succeedlearn-amp' ),
				__( 'Bystander Intervention Training', 'succeedlearn-amp' ),
			),
			'outcomes'  => array(
				__( 'Build awareness of diverse perspectives.', 'succeedlearn-amp' ),
				__( 'Recognise and reduce unconscious bias.', 'succeedlearn-amp' ),
				__( 'Strengthen inclusive leadership behaviours.', 'succeedlearn-amp' ),
				__( 'Foster psychological safety and belonging.', 'succeedlearn-amp' ),
			),
			'cta_label' => __( 'Explore Inclusive Workplace Training', 'succeedlearn-amp' ),
			'cta_url'   => '#inclusive-workplace-training',
		),
		array(
			'id'         => 'workplace-harassment-prevention-training',
			'title'      => __( 'Workplace Harassment Prevention Training', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Create respectful workplaces built on dignity, accountability, and trust.', 'succeedlearn-amp' ),
			'intro'      => __( 'Respect is the foundation of every successful workplace.', 'succeedlearn-amp' ),
			'body'       => __( 'Our workplace conduct training helps organisations prevent workplace harassment, promote respectful behaviour, and ensure employees understand their responsibilities.', 'succeedlearn-amp' ),
			'body_extra' => __( 'Designed to support regional compliance requirements while building a positive workplace culture.', 'succeedlearn-amp' ),
			'courses'    => array(
				array(
					'label' => __( 'Sexual Harassment Prevention Training (United States)', 'succeedlearn-amp' ),
					'flag'  => 'us',
				),
				array(
					'label' => __( 'Prevention of Workplace Harassment Training (United Kingdom)', 'succeedlearn-amp' ),
					'flag'  => 'gb',
				),
				array(
					'label' => __( 'Prevention of Sexual Harassment (POSH) - Global Framework', 'succeedlearn-amp' ),
					'icon'  => 'globe',
				),
				array(
					'label' => __( 'Prevention of Sexual Harassment (POSH) - India', 'succeedlearn-amp' ),
					'flag'  => 'in',
				),
			),
			'outcomes'   => array(
				__( 'Prevent workplace harassment.', 'succeedlearn-amp' ),
				__( 'Understand employee and manager responsibilities.', 'succeedlearn-amp' ),
				__( 'Respond appropriately to workplace concerns.', 'succeedlearn-amp' ),
				__( 'Promote respectful workplace behaviours.', 'succeedlearn-amp' ),
				__( 'Strengthen workplace accountability.', 'succeedlearn-amp' ),
			),
			'cta_label'  => __( 'Explore Workplace Harassment Prevention', 'succeedlearn-amp' ),
			'cta_url'    => '#workplace-harassment-prevention-training',
		),
		array(
			'id'         => 'responsible-use-of-generative-ai-training',
			'title'      => __( 'Responsible Use of Generative AI Training', 'succeedlearn-amp' ),
			'subtitle'   => __( 'Empower employees to use Artificial Intelligence responsibly and ethically.', 'succeedlearn-amp' ),
			'intro'      => __( 'Artificial Intelligence is transforming how organisations work, but responsible AI adoption requires informed human decisions.', 'succeedlearn-amp' ),
			'body'       => __( 'Our Responsible Use of AI training helps employees understand AI ethics, recognise bias, protect confidential information, and use generative AI responsibly in everyday work.', 'succeedlearn-amp' ),
			'body_extra' => __( 'Responsible technology begins with responsible people.', 'succeedlearn-amp' ),
			'outcomes'   => array(
				__( 'Understand responsible AI principles.', 'succeedlearn-amp' ),
				__( 'Recognise AI bias and limitations.', 'succeedlearn-amp' ),
				__( 'Protect privacy and confidential information.', 'succeedlearn-amp' ),
				__( 'Use AI confidently and ethically.', 'succeedlearn-amp' ),
				__( 'Apply responsible AI practices at work.', 'succeedlearn-amp' ),
			),
			/* Set image URL when the asset is ready. */
			'image'      => '',
			'image_alt'  => __( 'Responsible Use of Generative AI training', 'succeedlearn-amp' ),
			'cta_label'  => __( 'Explore Responsible Use of Generative AI Training', 'succeedlearn-amp' ),
			'cta_url'    => '#responsible-use-of-generative-ai-training',
		),
	);
}

/**
 * @return array<int, array{title:string,text:string}>
 */
function succeedlearn_amp_get_gwct_why_choose_cards() {
	return array(
		array(
			'title' => __( 'Scenario-Based Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Learners practise making decisions in realistic workplace situations that reflect everyday challenges.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Globally Relevant Content', 'succeedlearn-amp' ),
			'text'  => __( 'Learning experiences designed for international workforces across industries and cultures.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Behaviour-Focused Learning', 'succeedlearn-amp' ),
			'text'  => __( 'Training that encourages lasting behaviour change rather than short-term knowledge retention.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Interactive Learning Experience', 'succeedlearn-amp' ),
			'text'  => __( 'Videos, branching scenarios, reflection activities, and knowledge checks improve engagement and learning outcomes.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'Accessible Learning Design', 'succeedlearn-amp' ),
			'text'  => __( 'Built using accessibility and inclusive learning principles to support diverse learners.', 'succeedlearn-amp' ),
		),
		array(
			'title' => __( 'LMS Compatible', 'succeedlearn-amp' ),
			'text'  => __( 'Seamlessly integrates with leading Learning Management Systems and enterprise learning platforms.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{icon:string,highlight:string,text:string,dashboard_title:string,dashboard_meta:string,dashboard_value:string,done:bool}>
 */
function succeedlearn_amp_get_gwct_impact_themes() {
	return array(
		array(
			'icon'            => 'diagram-3',
			'highlight'       => __( 'Every interaction', 'succeedlearn-amp' ),
			'text'            => __( 'shapes workplace culture.', 'succeedlearn-amp' ),
			'dashboard_title' => __( 'Workplace Culture', 'succeedlearn-amp' ),
			'dashboard_meta'  => __( 'Daily interactions build respectful habits', 'succeedlearn-amp' ),
			'dashboard_value' => '96%',
			'done'            => true,
		),
		array(
			'icon'            => 'shield-check',
			'highlight'       => __( 'Every decision', 'succeedlearn-amp' ),
			'text'            => __( 'builds trust.', 'succeedlearn-amp' ),
			'dashboard_title' => __( 'Trust & Accountability', 'succeedlearn-amp' ),
			'dashboard_meta'  => __( 'Better decisions strengthen team confidence', 'succeedlearn-amp' ),
			'dashboard_value' => '93%',
			'done'            => true,
		),
		array(
			'icon'            => 'chat-heart',
			'highlight'       => __( 'Every conversation', 'succeedlearn-amp' ),
			'text'            => __( 'creates opportunities for inclusion.', 'succeedlearn-amp' ),
			'dashboard_title' => __( 'Inclusion Opportunities', 'succeedlearn-amp' ),
			'dashboard_meta'  => __( 'Open dialogue supports belonging at work', 'succeedlearn-amp' ),
			'dashboard_value' => '91%',
			'done'            => false,
		),
	);
}

/**
 * @return array<int, array{question:string,answer:string}>
 */
function succeedlearn_amp_get_gwct_faq_items() {
	return array(
		array(
			'question' => __( 'Who should take these courses?', 'succeedlearn-amp' ),
			'answer'   => __( 'The courses are suitable for employees, managers, supervisors, and leaders. Specific modules can be assigned based on role, location, and applicable compliance requirements.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the training be customised for our organisation?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Course content, branding, policies, scenarios, assessments, and supporting resources can be tailored to your organisation’s requirements.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Is the training suitable for a global workforce?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Organisations can create learning pathways based on each employee’s country, role, and responsibilities, helping deliver relevant training across a global workforce. We have a Global module which can be delivered to employees in multiple countries.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How are the courses delivered?', 'succeedlearn-amp' ),
			'answer'   => __( 'The modules are delivered online and can be accessed through SucceedLEARN or, subject to technical compatibility, deployed through your organisation’s learning management system.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can we track employee completion and assessment scores?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Administrators can monitor enrolment, course progress, completion status, and assessment scores to support internal compliance reporting.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How long does each module take to complete?', 'succeedlearn-amp' ),
			'answer'   => __( 'Completion time varies by topic and course version. Each course page provides the expected duration, intended audience, and learning objectives.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How often is the course content reviewed?', 'succeedlearn-amp' ),
			'answer'   => __( 'The content is periodically reviewed to maintain relevance. Organisations should also ensure that training is supported by current internal policies and jurisdiction-specific legal advice.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'How can we request a demo or discuss our requirements?', 'succeedlearn-amp' ),
			'answer'   => __( 'Contact the SucceedLEARN team through the enquiry form to request a demonstration, explore relevant modules, and discuss customisation, deployment, and pricing.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Does the training include assessments or knowledge checks?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Modules can include quizzes, scenario-based questions, and assessments to reinforce learning and measure understanding.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Will employees receive a certificate after completing a course?', 'succeedlearn-amp' ),
			'answer'   => __( 'Certificates of completion can be provided for eligible modules, helping organisations maintain training records and demonstrate participation.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Can the courses incorporate our workplace policies?', 'succeedlearn-amp' ),
			'answer'   => __( 'Yes. Relevant internal policies, reporting procedures, escalation routes, leadership messages, and contact information can be incorporated into the learning experience.', 'succeedlearn-amp' ),
		),
		array(
			'question' => __( 'Are the modules accessible on mobile devices?', 'succeedlearn-amp' ),
			'answer'   => __( 'The online modules are designed for flexible learning and can be accessed on compatible desktops, tablets, and mobile devices.', 'succeedlearn-amp' ),
		),
	);
}

/**
 * @return array<int, array{quote:string,name:string,role:string,note?:string}>
 */
function succeedlearn_amp_get_gwct_testimonials() {
	if ( function_exists( 'akaza_get_client_testimonials' ) ) {
		return akaza_get_client_testimonials();
	}

	return array(
		array(
			'quote' => 'The learning portal in Minda branding and integrated with our HRIS portal has made learner access seamless. I have recommended eLearnPOSH to my professional contacts.',
			'note'  => 'eLearnPOSH is a Product of SucceedLEARN. eLearnPOSH is for the POSH Compliance in India while SucceedLEARN is for Global Compliance.',
			'name'  => 'Mr. Sachchidanand Pande',
			'role'  => 'Group PR Head, UNO Minda Group',
		),
		array(
			'quote' => 'Succeed helped us make sure all of our workforce were trained and awareness was spread so effectively within a very short time. Your response to every email sent out by our employees was super quick and solution-oriented.',
			'name'  => 'Mr. Girisha Krishnappa',
			'role'  => 'People and Culture, AirAsia',
		),
		array(
			'quote' => 'An easy to use interface. The clarity and simplicity helps to navigate easily. The technical team is equally very good, their responses on queries are very prompt and they provide timely solutions.',
			'name'  => 'Ms. Gayatri Mishra',
			'role'  => 'L&D Specialist, Tata Smartfoodz Ltd',
		),
	);
}

/**
 * Prepare client logo vars used by the clients partial.
 *
 * @return array{client_logos:array,uploads_base:string,show_view_all:bool,clients_page_url:string}
 */
function succeedlearn_amp_prepare_gwct_clients_context() {
	require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';
	return succeedlearn_amp_prepare_home_clients_context();
}
