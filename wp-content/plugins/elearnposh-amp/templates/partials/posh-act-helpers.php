<?php
/**
 * POSH Act AMP content helpers.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Build a single TOC node.
 *
 * @param string $id       Anchor id (without #).
 * @param string $title    Link label.
 * @param array  $children Nested items.
 * @param int    $level    Heading level (2–4).
 * @return array
 */
function elearnposh_amp_posh_act_toc_item( $id, $title, $children = array(), $level = 2, $url = '' ) {
	return array(
		'level'    => (int) $level,
		'id'       => $id,
		'title'    => $title,
		'url'      => $url,
		'children' => $children,
	);
}

/**
 * Resolve the SHe-Box guide page URL for AMP templates.
 *
 * @return string
 */
function elearnposh_amp_get_she_box_page_url() {
	static $url = null;

	if ( null !== $url ) {
		return elearnposh_amp_to_amp_url( $url );
	}

	if ( function_exists( 'elearnposh_get_she_box_page_url' ) ) {
		$url = elearnposh_get_she_box_page_url();
		return elearnposh_amp_to_amp_url( $url );
	}

	$config    = \ElearnPOSH\AMP\Plugin::get_instance()->get_config();
	$page_id   = $config->resolve_page_id_by_map_key( 'she-box' );
	$permalink = $page_id ? get_permalink( $page_id ) : '';

	$url = $permalink ? $permalink : home_url( '/she-box/' );

	return elearnposh_amp_to_amp_url( $url );
}

/**
 * Patch POSH Act TOC links that point to the dedicated SHe-Box page.
 *
 * @param array $items TOC tree (by reference).
 */
function elearnposh_amp_posh_act_apply_she_box_toc_links( array &$items ) {
	$she_box_url = elearnposh_amp_get_she_box_page_url();

	foreach ( $items as &$item ) {
		if ( empty( $item['id'] ) ) {
			continue;
		}

		if ( 'poshact-employerandorganisationresponsibilities' === $item['id'] ) {
			$item['url']   = $she_box_url . '#shebox-employer-role';
			$item['title'] = 'Employer and Organisation Responsibilities (SHe-Box)';
		}

		if ( ! empty( $item['children'] ) ) {
			elearnposh_amp_posh_act_apply_she_box_toc_links( $item['children'] );
		}
	}
}

/**
 * Build href for a TOC item (supports external/page URLs).
 *
 * @param array $item TOC item.
 * @return string
 */
function elearnposh_amp_posh_act_toc_href( $item ) {
	if ( ! empty( $item['url'] ) ) {
		return $item['url'];
	}

	return '#' . ( ! empty( $item['id'] ) ? $item['id'] : '' );
}

/**
 * Escape TOC href for output (esc_url strips fragment-only links).
 *
 * @param array $item TOC item.
 * @return string
 */
function elearnposh_amp_posh_act_esc_toc_href( $item ) {
	$href = elearnposh_amp_posh_act_toc_href( $item );
	if ( '' !== $href && '#' === $href[0] ) {
		return esc_attr( $href );
	}

	return esc_url( $href );
}

/**
 * Normalize legacy Bootstrap / desktop classes to AMP design-system classes.
 *
 * @param string $content HTML content.
 * @return string
 */
function elearnposh_amp_posh_act_normalize_markup( $content ) {
	$map = array(
		'class="main-title-text mb-2 px-3 py-2 mt-3"'       => 'class="pa-h2"',
		'class="main-title-text px-3 py-2 mt-2 mb-3"'       => 'class="pa-h2"',
		'class="main-title-text px-3 py-2 mt-3 mb-2"'       => 'class="pa-h2"',
		'class="main-title-text px-3 py-2 mt-3 mb-2"'       => 'class="pa-h2"',
		'class="sublevel-title-text mt-3 mb-1"'             => 'class="pa-h3"',
		'class="sublevel-title-text mt-3 mb-2"'             => 'class="pa-h3"',
		'class="sublevel-title-text mt-1 mb-2"'             => 'class="pa-h3"',
		'class="sublevel-title-text mt-1"'                  => 'class="pa-h3"',
		'class="sublevel-title-text mb-2"'                  => 'class="pa-h3"',
		'class="sublevel-title-text"'                       => 'class="pa-h3"',
		'class="sublevel-title-text mt-4 mb-2"'             => 'class="pa-h3"',
		'class="deeplevel-title-text mb-2"'                 => 'class="pa-h4"',
		'class="deeplevel-title-text mt-3 mb-2"'            => 'class="pa-h4"',
		'class="deeplevel-title-text mt-3 mb-1"'            => 'class="pa-h4"',
		'class="deeplevel-title-text mt-1"'                 => 'class="pa-h4"',
		'class="deeplevel-title-text mb-2 mt-4"'            => 'class="pa-h4"',
		'class="deeplevel-title-text mb-2 mt-3"'            => 'class="pa-h4"',
		'class="deeplevel-title-text mt-0 mb-2"'            => 'class="pa-h4"',
		'class="content-property mb-2"'                     => 'class="pa-p"',
		'class="less-priority-title mb-2"'                  => 'class="pa-lead"',
		'class="highlighter-box px-3"'                      => 'class="pa-callout"',
		'<ul class="list content-property ms-3 my-2">'      => '<ul class="pa-list">',
		'class="video-content-row non-compliance-feature"'  => 'class="pa-media-row"',
		'class="video-content-row"'                         => 'class="pa-media-row"',
		'<hr class="horizontal-line mt-1 mb-3">'            => '<hr class="pa-divider">',
		'<hr class="horizontal-line mt-3 mb-4">'            => '<hr class="pa-divider">',
		'<hr class="horizontal-line mt-4 mb-3">'            => '<hr class="pa-divider">',
		'<hr class="horizontal-line mt-3 mb-3">'            => '<hr class="pa-divider">',
	);

	$content = str_replace( array_keys( $map ), array_values( $map ), $content );

	$content = preg_replace(
		'/<li class="pa-list-item">\s*<span class="pa-bullet" aria-hidden="true"><\/span>/',
		'<li>',
		$content
	);

	$content = preg_replace(
		'/<li class="pa-list-item">\s*<span class="pa-bullet" aria-hidden="true"><\/span>\s*/',
		'<li>',
		$content
	);

	$content = preg_replace( '/\sclass="([^"]*\b(?:ms-\d+|px-\d+|py-\d+|mt-\d+|mb-\d+|my-\d+|m-0|pe-\w+)\b[^"]*)"/', ' class="$1"', $content );
	$content = preg_replace( '/\s(?:ms-\d+|px-\d+|py-\d+|mt-\d+|mb-\d+|my-\d+|m-0|pe-\w+)\b/', '', $content );
	$content = preg_replace( '/\sclass="\s*"/', '', $content );
	$content = preg_replace( '/\sclass=""/', '', $content );

	$content = preg_replace( '/<div class="video-box">\s*<div class="video-box">/', '<div class="pa-media-row__video">', $content );
	$content = str_replace( '<div class="video-content-copy">', '<div class="pa-media-row__copy">', $content );

	return $content;
}

/**
 * Add stable heading IDs and convert markup for AMP.
 *
 * @param string $content HTML content.
 * @return string
 */
function elearnposh_amp_posh_act_prepare_content( $content ) {
	if ( '' === trim( $content ) ) {
		return $content;
	}

	$content = elearnposh_amp_posh_act_normalize_markup( $content );

	$content = preg_replace_callback(
		'/<(h[2-4])(\s[^>]*)?>(.*?)<\/\1>/is',
		static function ( $matches ) {
			$tag   = $matches[1];
			$attrs = isset( $matches[2] ) ? $matches[2] : '';
			$inner = $matches[3];
			$text  = wp_strip_all_tags( $inner );
			$id    = sanitize_title( $text );

			if ( '' === $id ) {
				return $matches[0];
			}

			if ( preg_match( '/\bid\s*=\s*["\'][^"\']*["\']/i', $attrs ) ) {
				return '<' . $tag . $attrs . '>' . $inner . '</' . $tag . '>';
			}

			return '<' . $tag . $attrs . ' id="' . esc_attr( $id ) . '">' . $inner . '</' . $tag . '>';
		},
		$content
	);

	$content = preg_replace_callback(
		'/<img([^>]+)>/i',
		static function ( $matches ) {
			$img_tag = $matches[0];
			if ( ! preg_match( '/src=["\']([^"\']+)["\']/', $img_tag, $src_match ) ) {
				return $img_tag;
			}

			$src = $src_match[1];
			preg_match( '/width=["\']?(\d+)["\']?/', $img_tag, $width_match );
			preg_match( '/height=["\']?(\d+)["\']?/', $img_tag, $height_match );
			$width  = ! empty( $width_match[1] ) ? $width_match[1] : '600';
			$height = ! empty( $height_match[1] ) ? $height_match[1] : '400';

			preg_match( '/alt=["\']([^"\']*)["\']/', $img_tag, $alt_match );
			$alt = ! empty( $alt_match[1] ) ? $alt_match[1] : '';

			return '<amp-img src="' . esc_url( $src ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" alt="' . esc_attr( $alt ) . '" layout="responsive"></amp-img>';
		},
		$content
	);

	$content = preg_replace( '/<iframe\b[^>]*>[\s\S]*?<\/iframe>/i', '', $content );
	$content = preg_replace( '/<script\b[^>]*>[\s\S]*?<\/script>/i', '', $content );
	$content = preg_replace( '/\sstyle=(["\']).*?\1/i', '', $content );
	$content = preg_replace( '/\s(?:loading|decoding)(?:=(?:["\'][^\s"\']*["\']|[^\s>]+))?/i', '', $content );

	if ( function_exists( 'elearnposh_amp_sanitize_amp_fragment' ) ) {
		$content = elearnposh_amp_sanitize_amp_fragment( $content );
	}

	return $content;
}

/**
 * Build nested TOC items from heading markup.
 *
 * @param string $content HTML with h2–h4 ids.
 * @return array<int, array{level:int, id:string, title:string, children:array}>
 */
function elearnposh_amp_posh_act_build_toc( $content ) {
	$toc = array();

	if ( ! preg_match_all( '/<h([2-4])\s+[^>]*\bid=["\']([^"\']+)["\'][^>]*>(.*?)<\/h\1>/is', $content, $matches, PREG_SET_ORDER ) ) {
		return $toc;
	}

	$stack = array(
		array(
			'level'    => 1,
			'children' => &$toc,
		),
	);

	foreach ( $matches as $match ) {
		$level = (int) $match[1];
		$item  = array(
			'level'    => $level,
			'id'       => $match[2],
			'title'    => wp_strip_all_tags( $match[3] ),
			'children' => array(),
		);

		while ( count( $stack ) > 1 && $stack[ count( $stack ) - 1 ]['level'] >= $level ) {
			array_pop( $stack );
		}

		$parent   = &$stack[ count( $stack ) - 1 ]['children'];
		$parent[] = $item;
		$stack[]  = &$parent[ count( $parent ) - 1 ];
	}

	return $toc;
}

/**
 * Full POSH Act page table of contents (anchor IDs match article content).
 *
 * @return array<int, array{level:int, id:string, title:string, children:array}>
 */
function elearnposh_amp_posh_act_default_toc() {
	$h4 = 'elearnposh_amp_posh_act_toc_item';

	return array(
		$h4(
			'poshact-compliancetoposhact',
			'Compliance to POSH Act',
			array(
				$h4( 'poshact-dutiesofemployeraccordingtoposhact', 'Duties of Employer according to POSH Act', array(
					$h4( 'poshact-constitutesnon-compliance', 'What constitutes non-compliance to POSH Act?', array(), 4 ),
					$h4( 'poshact-penaltyfornon-compliance', 'Penalty for Non-Compliance of POSH Act', array(), 4 ),
				), 3 ),
				$h4( 'poshact-formulationoforganization', 'Formulation of organization’s POSH Policy', array(
					$h4( 'poshact-poshpolicybegenderneutral', 'Can the Organization’s POSH Policy be gender neutral?', array(), 4 ),
				), 3 ),
				$h4( 'poshact-whatisinternalcommittee', 'What is Internal Committee or Internal Complaints Committee according to POSH Act?', array(
					$h4( 'poshact-constitutionofinternalcommittee', 'Constitution of Internal Committee', array(), 4 ),
					$h4( 'poshact-internalcommitte', 'Tenure of Internal Committee', array(), 4 ),
				), 3 ),
				$h4( 'poshact-shebox', 'SHe-Box', array(), 3 ),
				$h4( 'poshact-employeeawareness', 'Employee Awareness under POSH Act', array(
					$h4( 'poshact-effectiveposhtraining', 'Features of an Effective POSH Training', array(), 4 ),
				), 3 ),
				$h4( 'poshact-submissionofannualreport', 'Submission of Annual Report', array(
					$h4( 'poshact-annualreportsubmittedbyic', 'Annual Report submitted by the Internal Committee to the Employer and the District officer', array(), 4 ),
					$h4( 'poshact-directorreporttoroc', 'Directors\' Report to the ROC', array(), 4 ),
					$h4( 'poshact-whoisthedistrictofficer', 'Who is the District Officer?', array(), 4 ),
				), 3 ),
			)
		),
		$h4(
			'poshact-definitions',
			'Definitions',
			array(
				$h4( 'poshact-sexualharassment', 'How is sexual harassment defined under POSH Act?', array(), 3 ),
				$h4( 'poshact-workplalce', 'What is Workplace according to POSH Act?', array(
					$h4( 'poshact-homeconsideredworkplace', 'Is Home Considered Workplace When Working Remotely?', array(), 4 ),
				), 3 ),
				$h4( 'poshact-employeracctoposhact', 'Who is an Employer according to POSH Act?', array(), 3 ),
			)
		),
		$h4(
			'poshact-features',
			'Features',
			array(
				$h4( 'poshact-scopeofposhact', 'What is the scope of POSH Act?', array(), 3 ),
				$h4( 'poshact-genderneutrallocalcommittee', 'POSH Act and Gender-Neutrality', array(), 3 ),
				$h4( 'poshact-localcomplaintscommittee', 'What is Local Committee or Local Complaints Committee according to POSH Act?', array(
					$h4( 'poshact-constitutionoflocalcommittee', 'Constitution of Local Committee', array(), 4 ),
					$h4( 'poshact-jurisdictionoflocalcommittee', 'Jurisdiction of Local Committee', array(), 4 ),
					$h4( 'poshact-remunerationlocalcommitteemembers', 'Remuneration for Local Committee Members', array(), 4 ),
					$h4( 'poshact-tenureanddisqualification', 'Tenure and Disqualification of Local Committee Member', array(), 4 ),
				), 3 ),
			)
		),
		$h4(
			'poshact-complainingprocedure',
			'Complaining Procedure',
			array(
				$h4( 'poshact-complainaboutsexualharassment', 'Who can complain about sexual harassment under POSH Act?', array(), 3 ),
				$h4( 'poshact-complaint-faq', 'FAQ', array(), 3 ),
			)
		),
		$h4(
			'poshact-redressalprocess',
			'Redressal Process',
			array(
				$h4( 'poshact-conciliation', 'Conciliation', array(), 3 ),
				$h4( 'poshact-respondentfromanotherorganization', 'What should the IC do if the respondent is from another organization or a third-party?', array(), 3 ),
				$h4( 'poshact-inquiry', 'Inquiry', array(), 3 ),
				$h4( 'poshact-inquiryreportbyinternalcommittee', 'Inquiry Report by the Internal Committee', array(
					$h4( 'poshact-draftinginquiryreport', 'Drafting the Inquiry Report', array(), 4 ),
				), 3 ),
				$h4( 'poshact-falsecomplaints', 'What does POSH Act say about False Complaints?', array(
					$h4( 'poshact-maliciouscomplaint', 'Punishment for false or malicious complaint and false evidence', array(), 4 ),
					$h4( 'poshact-lackofevidence', 'Lack of Evidence = False Complaint?', array(), 4 ),
					$h4( 'poshact-penaltiesforfalsecomplaints', 'What are the Penalties for False Complaints?', array(), 4 ),
				), 3 ),
			)
		),
		$h4(
			'poshact-confidentiality',
			'Confidentiality',
			array(
				$h4( 'poshact-maintainingconfidentiality', 'Maintaining Confidentiality is mandatory under POSH Act', array(), 3 ),
				$h4( 'poshact-poshstipulatesconfidentiality', 'POSH stipulates Confidentiality and not complete Anonymity', array(), 3 ),
				$h4( 'poshact-confidentialinformation', 'What information must be kept confidential?', array(), 3 ),
				$h4( 'poshact-employerandorganisationresponsibilities', 'Employer and Organisation Responsibilities', array(), 3 ),
				$h4( 'poshact-penaltyforbreachofconfidentiality', 'Penalty for breach of confidentiality', array(), 3 ),
				$h4( 'poshact-icdotomaintainconfidentiality', 'What can the IC do to maintain confidentiality?', array(), 3 ),
			)
		),
		$h4(
			'poshact-appeal',
			'Appeal',
			array(
				$h4( 'poshact-appealagainstfindings', 'Appeal against the findings of Internal Committee', array(), 3 ),
				$h4( 'poshact-timelinetofileappeal', 'Timeline to File an Appeal', array(), 3 ),
			)
		),
		$h4(
			'poshact-backgroundofposhact',
			'Background of POSH Act',
			array(
				$h4( 'poshact-pacomeintoexistence', 'Why did POSH Act come into existence?', array(), 3 ),
			)
		),
	);
}

/**
 * Structured TOC for POSH Act AMP page (anchor IDs match page content).
 *
 * @return array<int, array{level:int, id:string, title:string, children:array}>
 */
function elearnposh_amp_posh_act_page_toc() {
	$toc = elearnposh_amp_posh_act_default_toc();
	elearnposh_amp_posh_act_apply_she_box_toc_links( $toc );

	return $toc;
}

/**
 * Top-level TOC sections only (level 2).
 *
 * @param array $items Full TOC.
 * @return array
 */
function elearnposh_amp_posh_act_top_sections( $items ) {
	$top = array();
	foreach ( $items as $item ) {
		if ( empty( $item['title'] ) || empty( $item['id'] ) ) {
			continue;
		}
		if ( 2 === (int) $item['level'] ) {
			$top[] = $item;
		}
	}
	return $top;
}

/**
 * Count all descendant TOC nodes.
 *
 * @param array $item TOC item.
 * @return int
 */
function elearnposh_amp_posh_act_count_descendants( $item ) {
	if ( empty( $item['children'] ) ) {
		return 0;
	}

	$count = 0;
	foreach ( $item['children'] as $child ) {
		++$count;
		$count += elearnposh_amp_posh_act_count_descendants( $child );
	}

	return $count;
}

/**
 * Short label for nav subtext.
 *
 * @param array $item TOC item.
 * @return string
 */
function elearnposh_amp_posh_act_section_hint( $item ) {
	$count = elearnposh_amp_posh_act_count_descendants( $item );
	if ( $count > 0 ) {
		/* translators: %d: number of subtopics */
		return sprintf( _n( '%d subtopic', '%d subtopics', $count, 'elearnposh-amp' ), $count );
	}
	return __( 'View section', 'elearnposh-amp' );
}

/**
 * Horizontal quick-jump chips (mobile).
 *
 * @param array $items Full TOC tree.
 */
function elearnposh_amp_posh_act_render_quick_chips( $items ) {
	$top = elearnposh_amp_posh_act_top_sections( $items );
	if ( empty( $top ) ) {
		return;
	}
	$index = 0;
	echo '<div class="posh-act-chips" role="navigation" aria-label="' . esc_attr__( 'Jump to section', 'elearnposh-amp' ) . '">';
	foreach ( $top as $item ) {
		++$index;
		printf(
			'<a class="posh-act-chip" href="%1$s"><span class="posh-act-chip-num">%2$s</span>%3$s</a>',
			elearnposh_amp_posh_act_esc_toc_href( $item ),
			esc_html( str_pad( (string) $index, 2, '0', STR_PAD_LEFT ) ),
			esc_html( wp_trim_words( $item['title'], 4, '…' ) )
		);
	}
	echo '</div>';
}

/**
 * Flatten nested TOC nodes for mobile accordion links.
 *
 * @param array $children TOC children.
 * @return array<int, array{id:string, title:string, url?:string}>
 */
function elearnposh_amp_posh_act_collect_section_links( $children ) {
	$links = array();

	foreach ( $children as $child ) {
		if ( empty( $child['id'] ) || empty( $child['title'] ) ) {
			continue;
		}

		$links[] = $child;

		if ( ! empty( $child['children'] ) ) {
			$links = array_merge( $links, elearnposh_amp_posh_act_collect_section_links( $child['children'] ) );
		}
	}

	return $links;
}

/**
 * Render level-4 sidebar links under a section.
 *
 * @param array $items Deepest TOC items.
 */
function elearnposh_amp_posh_act_render_sidebar_deep_items( $items ) {
	if ( empty( $items ) ) {
		return;
	}

	echo '<ul class="posh-act-nav-deep">';
	foreach ( $items as $item ) {
		echo '<li class="posh-act-nav-sub-item">';
		printf(
			'<a href="%1$s">%2$s</a>',
			elearnposh_amp_posh_act_esc_toc_href( $item ),
			esc_html( $item['title'] )
		);
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * Render nested sidebar links for POSH Act sections.
 *
 * @param array $children Level-3 TOC items.
 */
function elearnposh_amp_posh_act_render_sidebar_items( $children ) {
	if ( empty( $children ) ) {
		return;
	}

	echo '<ul class="posh-act-nav-subs">';
	foreach ( $children as $child ) {
		echo '<li class="posh-act-nav-sub-item">';
		printf(
			'<a class="posh-act-nav-sub-link" href="%1$s">%2$s</a>',
			elearnposh_amp_posh_act_esc_toc_href( $child ),
			esc_html( $child['title'] )
		);
		if ( ! empty( $child['children'] ) ) {
			elearnposh_amp_posh_act_render_sidebar_deep_items( $child['children'] );
		}
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * Mobile: expandable TOC (amp-accordion) — matches SHe-Box pattern.
 *
 * @param array $items Full TOC tree.
 */
function elearnposh_amp_posh_act_render_mobile_toc( $items ) {
	$top = elearnposh_amp_posh_act_top_sections( $items );
	if ( empty( $top ) ) {
		return;
	}

	$is_first = true;
	?>
	<amp-accordion id="posh-act-toc-accordion" class="posh-act-toc-accordion" animate expand-single-section disable-session-states>
		<?php foreach ( $top as $section ) : ?>
		<section<?php echo $is_first ? ' expanded' : ''; ?>>
			<h4 class="posh-act-acc-trigger">
				<span class="posh-act-acc-label"><?php echo esc_html( $section['title'] ); ?></span>
				<span class="posh-act-acc-chevron" aria-hidden="true"></span>
			</h4>
			<div class="posh-act-acc-body">
				<ul class="posh-act-acc-links">
					<li class="posh-act-acc-links__item posh-act-acc-links__item--section">
						<a class="posh-act-acc-link posh-act-acc-link--section" href="<?php echo elearnposh_amp_posh_act_esc_toc_href( $section ); ?>"><?php esc_html_e( 'Go to section', 'elearnposh-amp' ); ?></a>
					</li>
					<?php foreach ( elearnposh_amp_posh_act_collect_section_links( $section['children'] ) as $link ) : ?>
					<li class="posh-act-acc-links__item">
						<a class="posh-act-acc-link" href="<?php echo elearnposh_amp_posh_act_esc_toc_href( $link ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
		<?php
		$is_first = false;
		endforeach;
		?>
	</amp-accordion>
	<?php
}

/**
 * Desktop sidebar card (flat nav list — matches SHe-Box AMP sidebar).
 *
 * @param array $items Full TOC tree.
 */
function elearnposh_amp_posh_act_render_desktop_sidebar( $items ) {
	$top = elearnposh_amp_posh_act_top_sections( $items );
	if ( empty( $top ) ) {
		return;
	}
	?>
	<aside class="pa-sidebar posh-act-toc" aria-label="<?php echo esc_attr__( 'POSH Act guide table of contents', 'elearnposh-amp' ); ?>">
		<div class="pa-sidebar__card">
			<h2 class="pa-sidebar__title"><?php esc_html_e( 'On this page', 'elearnposh-amp' ); ?></h2>
			<div class="pa-sidebar__scroll">
				<ul class="posh-act-nav-list posh-act-nav-list--h2-only">
					<?php foreach ( $top as $section ) : ?>
					<li class="posh-act-nav-item">
						<a class="posh-act-nav-link" href="<?php echo elearnposh_amp_posh_act_esc_toc_href( $section ); ?>">
							<span class="posh-act-nav-text"><strong><?php echo esc_html( $section['title'] ); ?></strong></span>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="pa-sidebar__contact pa-sidebar__form">
				<?php
				if ( function_exists( 'elearnposh_amp_render_guide_contact_form' ) ) {
					echo elearnposh_amp_render_guide_contact_form( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						__( 'POSH Act Page', 'elearnposh-amp' ),
						'ep-posh-act-sidebar',
						'posh-act'
					);
				} else {
					?>
					<p><?php esc_html_e( 'Need help with POSH compliance and training?', 'elearnposh-amp' ); ?></p>
					<a href="#pa-guide-contact-mobile"><?php esc_html_e( "Let's Connect", 'elearnposh-amp' ); ?></a>
					<?php
				}
				?>
			</div>
		</div>
	</aside>
	<?php
}
