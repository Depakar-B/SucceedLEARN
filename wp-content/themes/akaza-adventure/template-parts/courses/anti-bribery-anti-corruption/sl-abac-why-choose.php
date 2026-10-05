<?php
/**
 * ABAC Why Choose SucceedLEARN section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$why_items = array(
    array(
        'title' => __( 'CPD certified', 'akaza-adventure' ),
        'text'  => __( 'UK ABAC course', 'akaza-adventure' ),
    ),
    array(
        'title' => __( 'Practical scenarios', 'akaza-adventure' ),
        'text'  => __( 'Workplace decisions', 'akaza-adventure' ),
    ),
);
?>

<section
    id="abac-why-choose"
    class="sl-abac-why-choose"
    aria-labelledby="sl-abac-why-choose-title"
>
    <div class="container">

        <div class="sl-abac-why-choose__inner">

            <div class="sl-abac-why-choose__intro">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e( 'Supported Credibility', 'akaza-adventure' ); ?>
                </span>

                <h2 id="sl-abac-why-choose-title">
                    <?php esc_html_e( 'Why choose SucceedLEARN for', 'akaza-adventure' ); ?>
                    <span><?php esc_html_e( 'ABAC training?', 'akaza-adventure' ); ?></span>
                </h2>

            </div>

            <ul class="sl-abac-why-choose__list">
                <?php foreach ( $why_items as $item ) : ?>
                    <li class="sl-abac-why-choose__item">
                        <strong><?php echo esc_html( $item['title'] ); ?></strong>
                        <span><?php echo esc_html( $item['text'] ); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

    </div>
</section>
