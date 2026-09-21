<?php
/**
 * Site header / primary navigation — Figma-aligned overlay header.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$variant     = isset( $args['variant'] ) ? $args['variant'] : ( is_front_page() ? 'overlay' : 'solid' );
$courses_url = function_exists( 'akaza_courses_url' ) ? akaza_courses_url() : home_url( '/courses/' );
$solutions   = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'solutions' ) : home_url( '/solutions/' );
$about       = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'about-us' ) : home_url( '/about-us/' );
$contact     = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );
$header_class = 'slf-header slf-header--' . esc_attr( $variant );

$solution_links = array();
if ( class_exists( 'AHF_Menu_Items' ) ) {
	$solution_links = AHF_Menu_Items::get_succeedlearn_solutions();
} else {
	$solution_links = array(
		array( 'label' => __( 'Security Awareness', 'akaza-adventure' ), 'url' => home_url( '/security-awareness/' ) ),
		array( 'label' => __( 'HR Compliance Suite', 'akaza-adventure' ), 'url' => home_url( '/hr-compliance-suite/' ) ),
		array( 'label' => __( 'Financial Crime Prevention', 'akaza-adventure' ), 'url' => home_url( '/financial-crime-prevention/' ) ),
		array( 'label' => __( 'Workplace Health and Safety', 'akaza-adventure' ), 'url' => home_url( '/workplace-health-and-safety/' ) ),
		array( 'label' => __( 'Code of Conduct', 'akaza-adventure' ), 'url' => home_url( '/code-of-conduct/' ) ),
		array( 'label' => __( 'Private Equity and Venture Capital Suite', 'akaza-adventure' ), 'url' => home_url( '/private-equity-and-venture-capital-suite/' ) ),
		array( 'label' => __( 'India ESG Awareness', 'akaza-adventure' ), 'url' => home_url( '/india-esg-awareness/' ) ),
	);
}

/**
 * Resolve menu URL helper.
 *
 * @param string $url Path or absolute URL.
 * @return string
 */
$slf_url = static function ( $url ) {
	if ( class_exists( 'AHF_Config' ) ) {
		return AHF_Config::menu_url( $url );
	}
	return $url;
};
?>
<header class="<?php echo esc_attr( trim( $header_class ) ); ?>" role="banner">
	<div class="slf-header__inner">
		<a class="slf-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="SucceedLEARN home">
			<span class="slf-logo__default">
				<img class="slf-logo__mark" src="<?php echo esc_url( akaza_img( 'logo-mark.svg' ) ); ?>" alt="" width="54" height="56" fetchpriority="high" decoding="async">
				<span class="slf-logo__text">
					<img class="slf-logo__word" src="<?php echo esc_url( akaza_img( 'logo-word.svg' ) ); ?>" alt="SucceedLEARN" width="114" height="18" fetchpriority="high" decoding="async">
					<img class="slf-logo__tag" src="<?php echo esc_url( akaza_img( 'logo-tag.svg' ) ); ?>" alt="" width="60" height="13" decoding="async">
				</span>
			</span>
			<img
				class="slf-logo__scrolled"
				src="https://succeedlearn.com/wp-content/uploads/2025/12/logo.webp"
				alt="SucceedLEARN"
				width="150"
				height="50"
				decoding="async"
			/>
		</a>

		<button class="slf-nav-toggle" type="button" aria-expanded="false" aria-controls="slf-primary-nav" data-slf-nav-toggle>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'akaza-adventure' ); ?></span>
			<span></span><span></span><span></span>
		</button>

		<nav id="slf-primary-nav" class="slf-nav" aria-label="<?php esc_attr_e( 'Primary', 'akaza-adventure' ); ?>">
			<ul class="slf-nav__list">
				<li class="slf-nav__item slf-nav__item--has-sub" data-slf-dropdown>
					<button type="button" class="slf-nav__link slf-nav__trigger" aria-expanded="false" aria-haspopup="true">
						<span><?php esc_html_e( 'By Solution', 'akaza-adventure' ); ?></span>
						<span class="slf-nav__caret" aria-hidden="true"></span>
					</button>
					<ul class="slf-nav__sub">
						<?php foreach ( $solution_links as $link ) : ?>
							<li>
								<a href="<?php echo esc_url( $slf_url( $link['url'] ?? $solutions ) ); ?>">
									<?php echo esc_html( $link['label'] ?? '' ); ?>
								</a>
							</li>
						<?php endforeach; ?>
						<li class="slf-nav__sub-foot">
							<a href="<?php echo esc_url( $solutions ); ?>"><?php esc_html_e( 'Explore all solutions', 'akaza-adventure' ); ?></a>
						</li>
					</ul>
				</li>

				<?php
				// Try multiple taxonomy slugs so it works regardless of LearnPress version.
				$_course_cats = array();
				foreach ( array( 'course_category', 'lp_course_category' ) as $_tax_try ) {
					if ( taxonomy_exists( $_tax_try ) ) {
						$_terms = get_terms( array(
							'taxonomy'   => $_tax_try,
							'hide_empty' => false,
							'orderby'    => 'name',
							'order'      => 'ASC',
						) );
						if ( ! is_wp_error( $_terms ) && ! empty( $_terms ) ) {
							$_course_cats = $_terms;
							break;
						}
					}
				}
				$_courses_is_active = ( function_exists( 'akaza_is_courses_archive' ) && akaza_is_courses_archive() ) || ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() );
				?>
				<li class="slf-nav__item slf-nav__item--has-sub" data-slf-dropdown>
					<button type="button" class="slf-nav__link slf-nav__trigger" aria-expanded="false" aria-haspopup="true">
						<span><?php esc_html_e( 'By Courses', 'akaza-adventure' ); ?></span>
						<span class="slf-nav__caret" aria-hidden="true"></span>
					</button>
					<ul class="slf-nav__sub">
						<?php foreach ( $_course_cats as $_cat ) : ?>
							<li>
								<a href="<?php echo esc_url( get_term_link( $_cat ) ); ?>">
									<?php echo esc_html( $_cat->name ); ?>
									<?php if ( $_cat->count > 0 ) : ?>
										<span class="slf-nav__count">(<?php echo (int) $_cat->count; ?>)</span>
									<?php endif; ?>
								</a>
							</li>
						<?php endforeach; ?>
						<li class="slf-nav__sub-foot">
							<a href="<?php echo esc_url( $courses_url ); ?>"<?php echo $_courses_is_active ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'Explore all courses', 'akaza-adventure' ); ?></a>
						</li>
					</ul>
				</li>

				<li class="slf-nav__item">
					<a class="slf-nav__link" href="<?php echo esc_url( $about ); ?>"><?php esc_html_e( 'About Us', 'akaza-adventure' ); ?></a>
				</li>

				<li class="slf-nav__item">
					<a class="slf-nav__link" href="<?php echo esc_url( $contact ); ?>"><?php esc_html_e( 'Contact Us', 'akaza-adventure' ); ?></a>
				</li>
			</ul>

			<div class="slf-header__actions">
				<a class="slf-header-cta" href="<?php echo esc_url( $contact ); ?>"><?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?></a>

				<button type="button" class="slf-search-toggle" data-slf-search-toggle aria-expanded="false" aria-controls="slf-header-search" aria-label="<?php esc_attr_e( 'Open search', 'akaza-adventure' ); ?>">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="2"/>
						<path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
					</svg>
				</button>

				<a class="slf-nav__email" href="mailto:sales@succeedtech.com">sales@succeedtech.com</a>
			</div>
		</nav>
	</div>

	<div id="slf-header-search" class="slf-header-search" hidden>
		<form class="slf-header-search__form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="slf-header-search-input"><?php esc_html_e( 'Search SucceedLEARN', 'akaza-adventure' ); ?></label>
			<input
				id="slf-header-search-input"
				class="slf-header-search__input"
				type="search"
				name="s"
				placeholder="<?php esc_attr_e( 'Search SucceedLEARN…', 'akaza-adventure' ); ?>"
				autocomplete="off"
			>
			<button type="submit" class="slf-header-cta"><?php esc_html_e( 'Search', 'akaza-adventure' ); ?></button>
			<button type="button" class="slf-header-search__close" data-slf-search-close aria-label="<?php esc_attr_e( 'Close search', 'akaza-adventure' ); ?>">&times;</button>
		</form>
	</div>
</header>
