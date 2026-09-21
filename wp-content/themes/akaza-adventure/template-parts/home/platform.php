<?php
/**
 * Homepage — Platform / How SucceedLEARN Helps section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = array(
	array(
		'icon'  => 'icons/platform/security.svg',
		'title' => 'Security Awareness Training',
		'text'  => 'Reduce human cyber risk through phishing simulations, microlearning, gamified learning and analytics.',
	),
	array(
		'icon'  => 'icons/platform/hr-compliance.svg',
		'title' => 'HR Compliance Training',
		'text'  => 'Create respectful workplaces through workplace conduct, anti-harassment, ethics and compliance learning.',
	),
	array(
		'icon'  => 'icons/platform/financial.svg',
		'title' => 'Financial Crime Prevention',
		'text'  => 'Support AML, anti-bribery, anti-corruption and fraud awareness initiatives.',
	),
	array(
		'icon'  => 'icons/platform/workplace.svg',
		'title' => 'Workplace Health & Safety',
		'text'  => 'Help employees identify risks and contribute to safer workplaces.',
	),
	array(
		'icon'  => 'icons/platform/code-of-conduct.svg',
		'title' => 'Code of Conduct Training',
		'text'  => 'Turn policies into practical workplace decisions through scenario-based learning.',
	),
	array(
		'icon'  => 'icons/platform/private-equity.svg',
		'title' => 'Private Equity & VC Compliance',
		'text'  => 'Help organizations remain investor-ready through targeted compliance programmes.',
	),
	array(
		'icon'  => 'icons/platform/compliance-lms.svg',
		'title' => 'Compliance LMS',
		'text'  => 'A compliance-focused LMS with automation, reporting, branding and enterprise integrations.',
	),
);
?>
<section id="solutions" class="sl-home-platform-section" aria-labelledby="platform-heading">

    <div class="container">

        <div class="sl-home-platform-heading">

            <span class="sl-home-sub-heading">
                How SucceedLEARN Helps
            </span>

            <h2 id="platform-heading">
                <?php
                echo wp_kses(
                    __( 'One platform for security, <span>compliance &amp; workplace learning</span>', 'akaza-adventure' ),
                    array( 'span' => array() )
                );
                ?>
            </h2>

            <p>
                Bring training and compliance together through one intelligent,
                scalable eLearning platform.
            </p>

        </div>

        <div class="row g-4">

            <?php foreach ( $cards as $card ) : ?>
                <div class="col-md-6 col-lg-3">
                    <div class="sl-home-platform-card">
                        <?php if ( ! empty( $card['icon'] ) ) : ?>
                            <span class="sl-home-platform-card__icon" aria-hidden="true">
                                <?php echo akaza_inline_theme_svg( $card['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            </span>
                        <?php endif; ?>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['text'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="col-md-6 col-lg-3">
                <div class="sl-home-platform-card sl-home-cta-card">
                    <h3>See the full solution set</h3>
                    <a href="<?php echo esc_url( akaza_page_url( 'solutions' ) ); ?>" class="sl-content-btn sl-content-btn-primary">
                        Explore All Solutions →
                    </a>
                </div>
            </div>

        </div>

    </div>

</section>
