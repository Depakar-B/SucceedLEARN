<?php
/**
 * S-Phish — Why Phishing Simulation Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section
    id="why-phishing-simulation"
    class="sl-s-phish-why"
    aria-labelledby="sl-s-phish-why-title"
>
    <div class="container">

        <div class="sl-s-phish-why__content">

            <span class="sl-home-sub-heading">
                <?php esc_html_e( 'Why Phishing Simulation Matters', 'akaza-adventure' ); ?>
            </span>

            <h2 id="sl-s-phish-why-title">
                <?php esc_html_e( 'Why Phishing Simulation', 'akaza-adventure' ); ?>
                <span><?php esc_html_e( 'Matters', 'akaza-adventure' ); ?></span>
            </h2>

            <div class="sl-s-phish-why__body">

                <p>
                    <?php esc_html_e(
                        'Modern phishing attacks are no longer limited to poorly written emails with suspicious links. Attackers now leverage AI-generated content, QR code phishing, credential harvesting pages, malicious attachments, and highly personalised social engineering tactics to deceive even experienced employees.',
                        'akaza-adventure'
                    ); ?>
                </p>

                <p>
                    <?php esc_html_e(
                        'Although organisations continue investing heavily in firewalls, endpoint protection, and email security solutions, the human element remains one of the most targeted attack surfaces. Security awareness training builds knowledge, but organisations also need a practical way to measure whether employees can recognise and respond correctly when confronted with real phishing attempts.',
                        'akaza-adventure'
                    ); ?>
                </p>

                <div class="sl-s-phish-why__key-message">

                    <p>
                        <?php esc_html_e(
                            'Security awareness training helps employees understand phishing.',
                            'akaza-adventure'
                        ); ?>
                    </p>

                    <p>
                        <?php esc_html_e(
                            'Phishing simulation helps organisations understand whether employees can apply that knowledge in practice.',
                            'akaza-adventure'
                        ); ?>
                    </p>

                </div>

                <p>
                    <?php esc_html_e(
                        "S-Phish safely puts employees' awareness to the test through controlled simulations, giving organisations visibility into behaviour while creating opportunities for targeted learning and improvement.",
                        'akaza-adventure'
                    ); ?>
                </p>

            </div>

        </div>

    </div>
</section>