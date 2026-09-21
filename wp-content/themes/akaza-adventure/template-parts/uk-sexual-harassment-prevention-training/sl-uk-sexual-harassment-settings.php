<?php
/**
 * UK Sexual Harassment Prevention — Workplace Settings.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$workplace_settings = array(
    __( 'Offices and operational locations', 'akaza-adventure' ),
    __( 'Remote and hybrid environments', 'akaza-adventure' ),
    __( 'Digital communication channels', 'akaza-adventure' ),
    __( 'Client and customer locations', 'akaza-adventure' ),
    __( 'Conferences, events and work-related social occasions', 'akaza-adventure' ),
);
?>

<section
    id="workplace-settings"
    class="sl-uk-sexual-harassment-settings"
    aria-labelledby="sl-uk-sexual-harassment-settings-title"
>
    <div class="container">

        <div class="sl-uk-sexual-harassment-settings__grid">

            <!-- Left: Image -->
            <div class="sl-uk-sexual-harassment-settings__media">
                <div class="sl-uk-sexual-harassment-settings__image">
                    <div class="sl-uk-sexual-harassment-settings__image-placeholder">
                        <?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="sl-uk-sexual-harassment-settings__content">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'Workplace Context', 'akaza-adventure' ); ?>
                </span>

                <h2 id="sl-uk-sexual-harassment-settings-title">
                    <?php esc_html_e( 'Suitable Wherever', 'akaza-adventure' ); ?>
                    <span><?php esc_html_e( 'Work Happens', 'akaza-adventure' ); ?></span>
                </h2>

                <p>
                    <?php esc_html_e(
                        'Workplace interactions are no longer limited to a shared office. The learning is relevant across:',
                        'akaza-adventure'
                    ); ?>
                </p>

                <ul class="sl-list">
                    <?php foreach ( $workplace_settings as $index => $setting ) : ?>
                        <li class="sl-list-item">
                            <span class="sl-list-item__label" aria-hidden="true">
                                <?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
                            </span>

                            <span class="sl-list-item__text">
                                <?php echo esc_html( $setting ); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <p class="sl-uk-sexual-harassment-settings__closing">
                    <?php esc_html_e(
                        'This makes the course suitable for organisations with employees working across different roles, locations and working arrangements.',
                        'akaza-adventure'
                    ); ?>
                </p>

            </div>

        </div>

    </div>
</section>