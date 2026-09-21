<?php
/**
 * SHe-Box AMP content helpers.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ELEARNPOSH_AMP_TEMPLATES_DIR . 'partials/posh-act-helpers.php';

/**
 * Structured TOC for the SHe-Box AMP page.
 *
 * @return array<int, array{id:string, label:string, items:array<int, array{id:string, title:string}>}>
 */
function elearnposh_amp_she_box_page_toc() {
	return array(
		array(
			'id'    => 'shebox-introduction',
			'label' => 'SHe-Box Introduction',
			'items' => array(
				array( 'id' => 'shebox-what-is', 'title' => 'What is SHe-Box?' ),
				array( 'id' => 'shebox-why-introduced', 'title' => 'Why was SHe-Box introduced?' ),
				array( 'id' => 'shebox-who-can-use', 'title' => 'Who can use SHe-Box?' ),
				array( 'id' => 'shebox-complaint-types', 'title' => 'What complaints can be filed?' ),
			),
		),
		array(
			'id'    => 'shebox-filing-complaint',
			'label' => 'Filing a POSH Complaint on SHe-Box',
			'items' => array(
				array( 'id' => 'shebox-complaint-process', 'title' => 'How does the POSH complaint process work?' ),
				array( 'id' => 'shebox-file-on-behalf', 'title' => 'Can someone file a complaint on behalf of the woman?' ),
				array( 'id' => 'shebox-complaint-details', 'title' => 'What details may be needed while filing a complaint?' ),
				array( 'id' => 'shebox-confidentiality', 'title' => 'Is confidentiality maintained?' ),
				array( 'id' => 'shebox-track-complaint', 'title' => 'Can the complaint be tracked?' ),
				array( 'id' => 'shebox-after-committee', 'title' => 'What happens after the complaint reaches the committee?' ),
			),
		),
		array(
			'id'    => 'shebox-org-registration-section',
			'label' => 'Organisation Registration on SHe-Box',
			'items' => array(
				array( 'id' => 'shebox-org-registration', 'title' => 'How can an organisation register on SHe-Box?' ),
				array( 'id' => 'shebox-registration-guide', 'title' => 'SHe-Box: A Single-Window Platform for POSH Compliance' ),
				array( 'id' => 'shebox-registration-videos', 'title' => 'SHe-Box registration video tutorials' ),
				array( 'id' => 'shebox-registration-details', 'title' => 'What details should an organisation keep ready before registration on SHe-Box portal?' ),
				array( 'id' => 'shebox-nodal-officer', 'title' => 'Who is a nodal officer for SHe-Box?' ),
				array( 'id' => 'shebox-nodal-responsibilities', 'title' => 'What are the responsibilities of the organisation’s nodal officer according to SHe-Box or MWCD Guidelines?' ),
				array( 'id' => 'shebox-mandatory-registration', 'title' => 'Is SHe-Box registration mandatory for organisations?' ),
				array( 'id' => 'shebox-employer-role', 'title' => 'What is the role of employers in SHe-Box?' ),
			),
		),
		array(
			'id'    => 'shebox-posh-courses',
			'label' => 'Our POSH Courses',
			'items' => array(),
		),
	);
}

/**
 * Prepare SHe-Box article markup for AMP output.
 *
 * @param string $content HTML content.
 * @return string
 */
function elearnposh_amp_she_box_prepare_content( $content ) {
	$content = elearnposh_amp_posh_act_prepare_content( $content );

	if ( function_exists( 'elearnposh_capitalize_key_points_in_html' ) ) {
		$content = elearnposh_capitalize_key_points_in_html( $content );
	}

	return $content;
}

/**
 * Render nested sidebar links for SHe-Box groups.
 *
 * @param array $items Sub-items.
 */
function elearnposh_amp_she_box_render_sidebar_items( $items ) {
	if ( empty( $items ) ) {
		return;
	}

	echo '<ul class="posh-act-nav-subs">';
	foreach ( $items as $item ) {
		echo '<li class="posh-act-nav-sub-item">';
		printf(
			'<a class="posh-act-nav-sub-link" href="#%1$s">%2$s</a>',
			esc_attr( $item['id'] ),
			esc_html( $item['title'] )
		);
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * Desktop sidebar for SHe-Box page.
 *
 * @param array $groups TOC groups.
 */
function elearnposh_amp_she_box_render_desktop_sidebar( $groups ) {
	?>
	<aside class="pa-sidebar posh-act-toc" aria-label="<?php echo esc_attr__( 'SHe-Box guide table of contents', 'elearnposh-amp' ); ?>">
		<div class="pa-sidebar__card">
			<h2 class="pa-sidebar__title"><?php esc_html_e( 'On this page', 'elearnposh-amp' ); ?></h2>
			<div class="pa-sidebar__scroll">
				<ul class="posh-act-nav-list">
					<?php foreach ( $groups as $group ) : ?>
					<li class="posh-act-nav-item">
						<a class="posh-act-nav-link" href="#<?php echo esc_attr( $group['id'] ); ?>">
							<span class="posh-act-nav-text"><strong><?php echo esc_html( $group['label'] ); ?></strong></span>
						</a>
						<?php elearnposh_amp_she_box_render_sidebar_items( $group['items'] ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="pa-sidebar__contact pa-sidebar__form">
				<?php
				if ( function_exists( 'elearnposh_amp_render_guide_contact_form' ) ) {
					echo elearnposh_amp_render_guide_contact_form( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						__( 'SHe-Box Page', 'elearnposh-amp' ),
						'ep-she-box-sidebar',
						'she-box'
					);
				} else {
					?>
					<p><?php esc_html_e( 'Need help with POSH training or SHe-Box compliance?', 'elearnposh-amp' ); ?></p>
					<a href="#pa-guide-contact-mobile"><?php esc_html_e( "Let's Connect", 'elearnposh-amp' ); ?></a>
					<?php
				}
				?>
			</div>
		</div>
	</aside>
	<?php
}

/**
 * Mobile quick-jump chips for top-level SHe-Box sections.
 *
 * @param array $groups TOC groups.
 */
function elearnposh_amp_she_box_render_quick_chips( $groups ) {
	if ( empty( $groups ) ) {
		return;
	}

	$index = 0;
	echo '<div class="posh-act-chips" role="navigation" aria-label="' . esc_attr__( 'Jump to section', 'elearnposh-amp' ) . '">';
	foreach ( $groups as $group ) {
		++$index;
		printf(
			'<a class="posh-act-chip" href="#%1$s"><span class="posh-act-chip-num">%2$s</span>%3$s</a>',
			esc_attr( $group['id'] ),
			esc_html( str_pad( (string) $index, 2, '0', STR_PAD_LEFT ) ),
			esc_html( wp_trim_words( $group['label'], 4, '…' ) )
		);
	}
	echo '</div>';
}

/**
 * Mobile expandable TOC (amp-accordion) for SHe-Box groups.
 *
 * @param array $groups TOC groups.
 */
function elearnposh_amp_she_box_render_mobile_toc( $groups ) {
	if ( empty( $groups ) ) {
		return;
	}

	$is_first = true;
	?>
	<amp-accordion id="she-box-toc-accordion" class="posh-act-toc-accordion" animate expand-single-section disable-session-states>
		<?php foreach ( $groups as $group ) : ?>
		<section<?php echo $is_first ? ' expanded' : ''; ?>>
			<h4 class="posh-act-acc-trigger">
				<span class="posh-act-acc-label"><?php echo esc_html( $group['label'] ); ?></span>
				<span class="posh-act-acc-chevron" aria-hidden="true"></span>
			</h4>
			<div class="posh-act-acc-body">
				<ul class="posh-act-acc-links">
					<li class="posh-act-acc-links__item posh-act-acc-links__item--section">
						<a class="posh-act-acc-link posh-act-acc-link--section" href="#<?php echo esc_attr( $group['id'] ); ?>"><?php esc_html_e( 'Go to section', 'elearnposh-amp' ); ?></a>
					</li>
					<?php foreach ( $group['items'] as $item ) : ?>
					<li class="posh-act-acc-links__item">
						<a class="posh-act-acc-link" href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
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
