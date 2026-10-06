<?php
/**
 * Global AMP Course Suite section (PE/VC and FCP card grids).
 *
 * Reusable across FCP / PE-VC course AMP pages. Cards are shared; eyebrow, H2,
 * intro and which card is highlighted can change per page.
 *
 * Pages using it must add 'global-course-suite' to their page styles in
 * succeedlearn_amp_output_page_styles().
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolve a public page URL by slug, with a fallback.
 *
 * @param string $slug Page slug.
 * @param string $fallback Fallback URL when the page is missing.
 * @return string
 */
function succeedlearn_amp_course_suite_page_url( $slug, $fallback = '#contact' ) {
	$slug = sanitize_title( (string) $slug );
	if ( '' === $slug ) {
		return $fallback;
	}

	if ( in_array( $slug, array( 'security-awareness', 'security-awareness-and-phishing' ), true ) ) {
		return home_url( '/security-awareness/' );
	}

	$page = get_page_by_path( $slug );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$link = get_permalink( $page );
		if ( $link ) {
			return $link;
		}
	}

	return $fallback;
}

/**
 * Current page slug used for automatic `is-active` highlighting.
 *
 * @return string
 */
function succeedlearn_amp_course_suite_current_slug() {
	$object = get_queried_object();
	if ( $object instanceof WP_Post && ! empty( $object->post_name ) ) {
		return (string) $object->post_name;
	}

	if ( function_exists( 'get_query_var' ) ) {
		$pagename = (string) get_query_var( 'pagename' );
		if ( '' !== $pagename ) {
			$parts = explode( '/', trim( $pagename, '/' ) );
			$last  = end( $parts );
			if ( is_string( $last ) && '' !== $last ) {
				return $last;
			}
		}
	}

	return '';
}

/**
 * Shared card lists for PE/VC and FCP suites.
 *
 * @param string $suite pevc|fcp.
 * @return array<int,array<string,mixed>>
 */
function succeedlearn_amp_get_course_suite_cards( $suite ) {
	$suite = sanitize_key( (string) $suite );

	if ( 'fcp' === $suite ) {
		return array(
			array(
				'num'           => '01',
				'title'         => __( 'AML Training', 'succeedlearn-amp' ),
				'text'          => __( 'Build awareness of CDD, EDD, MLRO responsibilities, CFT, CPF and key financial crime risks.', 'succeedlearn-amp' ),
				'slug'          => 'aml-pe-vc',
				'active_anchor' => '#overview',
			),
			array(
				'num'   => '02',
				'title' => __( 'Anti-Bribery and Anti-Corruption (ABAC)', 'succeedlearn-amp' ),
				'text'  => __( 'Build awareness of bribery, corruption and inappropriate incentives in commercial activity.', 'succeedlearn-amp' ),
				'slug'  => 'anti-bribery-anti-corruption',
			),
			array(
				'num'   => '03',
				'title' => __( 'Preventing Facilitation of Tax Evasion', 'succeedlearn-amp' ),
				'text'  => __( 'Recognise risks associated with enabling or facilitating unlawful tax evasion.', 'succeedlearn-amp' ),
				'slug'  => 'tax-evasion-facilitation',
			),
			array(
				'num'   => '04',
				'title' => __( 'Insider Trading', 'succeedlearn-amp' ),
				'text'  => __( 'Build awareness of confidential information and risks associated with improper trading activity.', 'succeedlearn-amp' ),
				'slug'  => 'insider-trading',
			),
			array(
				'num'   => '05',
				'title' => __( 'Trade Compliance and Sanctions', 'succeedlearn-amp' ),
				'text'  => __( 'Understand sanctions and trade-related compliance risks affecting transactions and counterparties.', 'succeedlearn-amp' ),
				'slug'  => 'trade-compliance-and-sanctions',
			),
			array(
				'num'   => '06',
				'title' => __( 'Failure to Prevent Fraud', 'succeedlearn-amp' ),
				'text'  => __( 'Build awareness of fraud risk, organisational responsibility and preventive controls.', 'succeedlearn-amp' ),
				'slug'  => 'failure-to-prevent-fraud',
			),
			array(
				'num'   => '07',
				'title' => __( 'Modern Slavery Awareness', 'succeedlearn-amp' ),
				'text'  => __( 'Build awareness of modern slavery risks and why responsible business practices, supply-chain awareness and appropriate escalation matter.', 'succeedlearn-amp' ),
				'slug'  => 'modern-slavery-awareness',
			),
			array(
				'num'   => '08',
				'title' => __( 'Responsible Use of Gen AI', 'succeedlearn-amp' ),
				'text'  => __( 'A practical course on using Generative AI responsibly in the workplace while understanding its benefits, risks, limitations, and legal requirements.', 'succeedlearn-amp' ),
				'slug'  => 'responsible-use-of-gen-ai',
			),
		);
	}

	// Default: PE/VC Compliance Learning Suite.
	return array(
		array(
			'num'   => '01',
			'title' => __( 'Security Awareness Training', 'succeedlearn-amp' ),
			'text'  => __( 'Build practical awareness of cyber security, information protection and safer employee behaviours.', 'succeedlearn-amp' ),
			'slug'  => 'security-awareness',
		),
		array(
			'num'   => '02',
			'title' => __( 'Phishing Simulation', 'succeedlearn-amp' ),
			'text'  => __( 'Reinforce phishing awareness through realistic simulation exercises.', 'succeedlearn-amp' ),
			'slug'  => 's-phish',
		),
		array(
			'num'   => '03',
			'title' => __( 'Data Privacy', 'succeedlearn-amp' ),
			'text'  => __( 'Strengthen responsible handling of personal information and privacy awareness.', 'succeedlearn-amp' ),
			'slug'  => 'gdpr-employee-awareness-training',
		),
		array(
			'num'   => '04',
			'title' => __( 'Preventing Sexual Harassment', 'succeedlearn-amp' ),
			'text'  => __( 'Build awareness of workplace conduct and appropriate employee responsibilities.', 'succeedlearn-amp' ),
			'slug'  => 'uk-sexual-harassment-prevention-training',
		),
		array(
			'num'           => '05',
			'title'         => __( 'AML Training', 'succeedlearn-amp' ),
			'text'          => __( 'KYC, CDD, EDD, MLRO, CFT, CPF and practical financial crime awareness.', 'succeedlearn-amp' ),
			'slug'          => 'aml-pe-vc',
			'active_anchor' => '#overview',
		),
		array(
			'num'           => '06',
			'title'         => __( 'Gifts and Entertainment', 'succeedlearn-amp' ),
			'text'          => __( 'Understand compliance considerations involving gifts, hospitality and entertainment.', 'succeedlearn-amp' ),
			'slug'          => 'gifts-and-entertainment',
			'active_anchor' => '#overview',
		),
		array(
			'num'           => '07',
			'title'         => __( 'Whistleblowing', 'succeedlearn-amp' ),
			'text'          => __( 'Build awareness of speaking up and appropriate reporting channels.', 'succeedlearn-amp' ),
			'slug'          => 'whistleblowing-pe-vc',
			'active_anchor' => '#overview',
		),
		array(
			'num'           => '08',
			'title'         => __( 'Political Donations', 'succeedlearn-amp' ),
			'text'          => __( 'Awareness of political donations within organisational governance and compliance.', 'succeedlearn-amp' ),
			'slug'          => 'political-donations-compliance-training',
			'active_anchor' => '#overview',
		),
		array(
			'num'           => '09',
			'title'         => __( 'SMCR Training: Employees', 'succeedlearn-amp' ),
			'text'          => __( 'Employee-focused awareness of SMCR and regulated-firm conduct responsibilities.', 'succeedlearn-amp' ),
			'slug'          => 'smcr-pe-vc',
			'active_anchor' => '#employees-learning',
		),
		array(
			'num'           => '10',
			'title'         => __( 'SMCR Training: Senior Managers', 'succeedlearn-amp' ),
			'text'          => __( 'Senior-manager awareness of SMCR, accountability and regulatory responsibilities.', 'succeedlearn-amp' ),
			'slug'          => 'smcr-pe-vc',
			'active_anchor' => '#senior-managers-learning',
		),
		array(
			'num'           => '11',
			'title'         => __( 'Includes All Financial Crime Prevention Courses', 'succeedlearn-amp' ),
			'text'          => __( 'Access the wider Financial Crime Prevention learning range as part of the broader PE/VC compliance proposition.', 'succeedlearn-amp' ),
			'slug'          => 'financial-crime-prevention-suite',
			'active_anchor' => '#fcp-suite',
			'is_fcp_bundle' => true,
		),
	);
}

/**
 * Default pricing notes for a suite.
 *
 * @param string $suite pevc|fcp.
 * @return array{label:string,value:string,extra:string}
 */
function succeedlearn_amp_get_course_suite_pricing_defaults( $suite ) {
	if ( 'fcp' === sanitize_key( (string) $suite ) ) {
		return array(
			'label' => __( 'FCP Suite:', 'succeedlearn-amp' ),
			'value' => __( '$1.50/user/month for organisations with 10+ users', 'succeedlearn-amp' ),
			'extra' => __( 'Billed annually at $18 per user', 'succeedlearn-amp' ),
		);
	}

	return array(
		'label' => __( 'PE/VC Suite:', 'succeedlearn-amp' ),
		'value' => __( '$2/user/month for organisations with 10+ users', 'succeedlearn-amp' ),
		'extra' => __( 'Billed annually at $24 per user', 'succeedlearn-amp' ),
	);
}

/**
 * Render the global course suite section.
 *
 * @param array $args {
 *     @type string               $suite         pevc|fcp. Default 'pevc'.
 *     @type string               $id            Section id.
 *     @type string               $eyebrow       Eyebrow text.
 *     @type string               $title_html    H2 HTML (may include <span>).
 *     @type string               $intro         Intro paragraph.
 *     @type string               $cta_label     Header CTA label.
 *     @type string               $cta_href      Header CTA href. Default '#contact'.
 *     @type array                $pricing       Optional pricing overrides (label, value, extra).
 *     @type string|array<string> $active_slug   Override current slug(s) for is-active.
 *     @type string               $active_href   Fallback in-page anchor for active cards. Default '#overview'.
 *     @type bool                 $has_fcp_suite Whether this page also renders #fcp-suite. Default false.
 *     @type string               $background    white|soft. Default 'soft'.
 *     @type string               $section_class Extra section classes.
 * }
 */
function succeedlearn_amp_render_course_suite( $args = array() ) {
	$args = wp_parse_args(
		(array) $args,
		array(
			'suite'         => 'pevc',
			'id'            => '',
			'eyebrow'       => '',
			'title_html'    => '',
			'intro'         => '',
			'cta_label'     => '',
			'cta_href'      => '#contact',
			'pricing'       => array(),
			'active_slug'   => '',
			'active_href'   => '#overview',
			'has_fcp_suite' => false,
			'background'    => 'soft',
			'section_class' => '',
		)
	);

	$suite = sanitize_key( (string) $args['suite'] );
	if ( 'fcp' !== $suite ) {
		$suite = 'pevc';
	}

	$id = sanitize_html_class( (string) $args['id'] );
	if ( '' === $id ) {
		$id = ( 'fcp' === $suite ) ? 'fcp-suite' : 'pevc-suite';
	}

	$eyebrow = (string) $args['eyebrow'];
	if ( '' === $eyebrow ) {
		$eyebrow = ( 'fcp' === $suite )
			? __( 'Financial Crime Prevention Learning Suite', 'succeedlearn-amp' )
			: __( 'PE/VC Compliance Learning Suite', 'succeedlearn-amp' );
	}

	$cta_label = (string) $args['cta_label'];
	if ( '' === $cta_label ) {
		$cta_label = ( 'fcp' === $suite )
			? __( 'Avail the Whole Suite at $1.5/user/month', 'succeedlearn-amp' )
			: __( 'Avail the Whole Suite at $2/user/month', 'succeedlearn-amp' );
	}

	$pricing = wp_parse_args(
		(array) $args['pricing'],
		succeedlearn_amp_get_course_suite_pricing_defaults( $suite )
	);

	$active_slugs = array();
	if ( is_array( $args['active_slug'] ) ) {
		foreach ( $args['active_slug'] as $slug ) {
			$slug = sanitize_title( (string) $slug );
			if ( '' !== $slug ) {
				$active_slugs[] = $slug;
			}
		}
	} elseif ( '' !== (string) $args['active_slug'] ) {
		$active_slugs[] = sanitize_title( (string) $args['active_slug'] );
	} else {
		$current = succeedlearn_amp_course_suite_current_slug();
		if ( '' !== $current ) {
			$active_slugs[] = $current;
		}
	}
	$active_slugs = array_values( array_unique( $active_slugs ) );

	$active_href   = (string) $args['active_href'];
	$has_fcp_suite = ! empty( $args['has_fcp_suite'] );
	$cards         = succeedlearn_amp_get_course_suite_cards( $suite );

	$section_classes = array( 'sl-section', 'sl-course-suite', 'sl-course-suite--' . $suite );
	if ( 'soft' === $args['background'] ) {
		$section_classes[] = 'sl-section--alt';
		$section_classes[] = 'sl-course-suite--bg-soft';
	}
	$extra = trim( (string) $args['section_class'] );
	if ( '' !== $extra ) {
		$section_classes[] = $extra;
	}
	?>
<section
	id="<?php echo esc_attr( $id ); ?>"
	class="<?php echo esc_attr( implode( ' ', $section_classes ) ); ?>"
	aria-labelledby="<?php echo esc_attr( $id ); ?>-title"
>
	<div class="sl-wrap">
		<div class="sl-course-suite__header">
			<div class="sl-course-suite__intro">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php echo esc_html( $eyebrow ); ?>
				</span>

				<?php if ( '' !== (string) $args['title_html'] ) : ?>
					<h2 id="<?php echo esc_attr( $id ); ?>-title" class="sl-h2">
						<?php
						echo wp_kses(
							(string) $args['title_html'],
							array( 'span' => array() )
						);
						?>
					</h2>
				<?php endif; ?>

				<?php if ( '' !== (string) $args['intro'] ) : ?>
					<p><?php echo esc_html( (string) $args['intro'] ); ?></p>
				<?php endif; ?>
			</div>

			<div class="sl-content-actions sl-course-suite__header-cta">
				<a class="sl-content-btn sl-content-btn-primary" href="<?php echo esc_url( (string) $args['cta_href'] ); ?>">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			</div>
		</div>

		<div class="sl-course-suite__pricing">
			<span class="sl-course-suite__note">
				<?php echo esc_html( $pricing['label'] ); ?>
				<strong><?php echo esc_html( $pricing['value'] ); ?></strong>
			</span>
			<?php if ( '' !== (string) $pricing['extra'] ) : ?>
				<span class="sl-course-suite__note">
					<?php echo esc_html( (string) $pricing['extra'] ); ?>
				</span>
			<?php endif; ?>
		</div>

		<div class="sl-course-suite__grid">
			<?php foreach ( $cards as $card ) : ?>
				<?php
				$slug     = isset( $card['slug'] ) ? (string) $card['slug'] : '';
				$is_active = ( '' !== $slug && in_array( $slug, $active_slugs, true ) );

				if ( ! empty( $card['is_fcp_bundle'] ) ) {
					$href = $has_fcp_suite
						? '#fcp-suite'
						: succeedlearn_amp_course_suite_page_url( $slug, '#contact' );
				} elseif ( $is_active ) {
					$href = ! empty( $card['active_anchor'] )
						? (string) $card['active_anchor']
						: $active_href;
				} else {
					$href = succeedlearn_amp_course_suite_page_url( $slug, '#contact' );
				}

				$tile_class = 'sl-course-suite__tile';
				if ( $is_active ) {
					$tile_class .= ' is-active';
				}
				?>
				<a
					class="<?php echo esc_attr( $tile_class ); ?>"
					href="<?php echo esc_url( $href ); ?>"
				>
					<div class="sl-course-suite__chrome">
						<span class="sl-course-suite__dash" aria-hidden="true"></span>
						<span class="sl-course-suite__num" aria-hidden="true">
							<?php echo esc_html( (string) $card['num'] ); ?>
						</span>
					</div>
					<h3 class="sl-panel-title"><?php echo esc_html( (string) $card['title'] ); ?></h3>
					<p><?php echo esc_html( (string) $card['text'] ); ?></p>
					<span class="sl-course-suite__cta">
						<?php esc_html_e( 'Explore More', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
	<?php
}
