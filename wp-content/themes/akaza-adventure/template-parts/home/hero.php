<?php
/**
 * Homepage — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php
/**
 * Homepage Hero Section
 * Template Part
 */

?>

<section class="sl-hero">

    <!-- Background Image -->
    <div class="sl-hero__background" style="background-image:url('<?php echo esc_url( akaza_upload_url( '2026/08/Succeed-Home-Page-Banner-image-scaled.webp' ) ); ?>');"></div>

    <!-- Dark Overlay -->
    <div class="sl-hero__overlay"></div>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-11">

                <div class="sl-hero__content text-center">

                    <h1 class="sl-hero__title">
                        Global Compliance &amp; Security Training That Employees Actually Remember
                    </h1>

                    <p class="sl-hero__description">
                        SucceedLEARN is a global compliance training provider, helping teams transform
                        mandatory employee compliance training into measurable outcomes through
                        awareness, engagement, reinforcement, and analytics.
                    </p>

                    <div class="sl-hero__buttons sl-hero-actions">

                        <a href="#contact" class="sl-hero-btn sl-hero-btn-primary" data-cta="hero-trial">
                            Start Free Trial
                        </a>

                        <a href="<?php echo esc_url( akaza_page_url( 'contact-us' ) ); ?>" class="sl-hero-btn sl-hero-btn-secondary" data-cta="hero-demo">
                            Watch a Demo
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-12">

                <div class="sl-hero-features">

                    <!-- Feature 1 -->
                    <div class="sl-feature">

                        <div class="sl-feature__icon">

                            <img src="<?php echo esc_url( akaza_upload_url( '/uploads/2026/08/Reduce-human.svg' ) ); ?>" alt="" width="34" height="34" loading="lazy" decoding="async">

                        </div>

                        <h3 class="sl-feature__title">
                            Reduce Human Risk
                        </h3>

                    </div>

                    <!-- Feature 2 -->

                    <div class="sl-feature">

                        <div class="sl-feature__icon">

                            <img src="<?php echo esc_url( akaza_upload_url( '/uploads/2026/08/Simplify.svg' ) ); ?>" alt="" width="34" height="34" loading="lazy" decoding="async">

                        </div>

                        <h3 class="sl-feature__title">
                            Simplify Compliance Management
                        </h3>

                    </div>

                    <!-- Feature 3 -->

                    <div class="sl-feature">

                        <div class="sl-feature__icon">

                            <img src="<?php echo esc_url( akaza_upload_url( '/uploads/2026/08/Improve.svg' ) ); ?>" alt="" width="34" height="34" loading="lazy" decoding="async">

                        </div>

                        <h3 class="sl-feature__title">
                            Improve Employee Engagement
                        </h3>

                    </div>

                    <!-- Feature 4 -->

                    <div class="sl-feature">

                        <div class="sl-feature__icon">

                            <img src="<?php echo esc_url( akaza_upload_url( '/uploads/2026/08/Stay.svg' ) ); ?>" alt="" width="34" height="34" loading="lazy" decoding="async">

                        </div>

                        <h3 class="sl-feature__title">
                            Stay Audit Ready
                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
