<section
    id="measure-campaign-performance"
    class="sl-s-phish-reporting"
    aria-labelledby="sl-s-phish-reporting-title"
>
    <div class="container">

        <div class="sl-s-phish-reporting__content">

            <span class="sl-home-sub-heading">
                <?php esc_html_e( 'Reporting & Behavioural Analytics', 'akaza-adventure' ); ?>
            </span>

            <h2 id="sl-s-phish-reporting-title">
                <?php esc_html_e( 'Measure More Than ', 'akaza-adventure' ); ?>
                <span><?php esc_html_e( 'Campaign Completion', 'akaza-adventure' ); ?></span>
            </h2>

            <h3 class="sl-panel-title">
                <?php esc_html_e( 'Powerful Reporting & Behavioural Analytics', 'akaza-adventure' ); ?>
            </h3>

            <p>
                <?php esc_html_e(
                    'A phishing campaign creates valuable behavioural data. S-Phish turns that data into visibility that security teams can use to understand campaign performance, identify potential areas of human risk and monitor changes over time.',
                    'akaza-adventure'
                ); ?>
            </p>

            <p>
                <?php esc_html_e( 'Campaign reports include:', 'akaza-adventure' ); ?>
            </p>

        </div>


        <div class="sl-s-phish-reporting__reports">

            <?php
            $report_items = array(
                __( 'Resiliency Score', 'akaza-adventure' ),
                __( 'Campaign Performance', 'akaza-adventure' ),
                __( 'Email Delivery Status', 'akaza-adventure' ),
                __( 'Email Opens', 'akaza-adventure' ),
                __( 'Link Clicks', 'akaza-adventure' ),
                __( 'Reporting Behaviour', 'akaza-adventure' ),
                __( 'Training Completion Status', 'akaza-adventure' ),
                __( 'Department-wise Performance', 'akaza-adventure' ),
                __( 'User-wise Risk Analysis', 'akaza-adventure' ),
            );
            ?>

            <ul class="sl-list">

                <?php foreach ( $report_items as $index => $report_item ) : ?>

                    <li class="sl-list-item">

                        <span
                            class="sl-list-item__label"
                            aria-hidden="true"
                        >
                            <?php
                            echo esc_html(
                                str_pad(
                                    (string) ( $index + 1 ),
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                )
                            );
                            ?>
                        </span>

                        <span class="sl-list-item__text">
                            <?php echo esc_html( $report_item ); ?>
                        </span>

                    </li>

                <?php endforeach; ?>

            </ul>

        </div>


        <div class="sl-s-phish-reporting__additional-content">

            <p>
                <?php esc_html_e(
                    'For broader organisational insights, S-Phish seamlessly integrates with S-Metrics, providing enterprise dashboards that consolidate organization wide phishing campaign performance, behavioural trends, and workforce security maturity into a single reporting interface.',
                    'akaza-adventure'
                ); ?>
            </p>

            <p>
                <?php esc_html_e(
                    'Reports can also be exported or printed to support management reporting, compliance audits, and continuous programme improvement.',
                    'akaza-adventure'
                ); ?>
            </p>

        </div>

    </div>
</section>