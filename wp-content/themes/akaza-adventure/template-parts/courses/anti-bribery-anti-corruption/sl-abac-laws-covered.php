<?php
/**
 * ABAC Laws Covered section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section
    id="laws"
    class="sl-abac-laws-covered"
    aria-labelledby="sl-abac-laws-covered-title"
>
    <div class="container">

        <div class="sl-abac-laws-covered__layout">

            <!-- Left Content -->
            <div class="sl-abac-laws-covered__intro">

                <span class="sl-home-sub-heading">
                    <?php esc_html_e(
                        'Laws Covered',
                        'akaza-adventure'
                    ); ?>
                </span>

                <h2 id="sl-abac-laws-covered-title">
                    <?php esc_html_e(
                        'What do the UK Bribery Act 2010, US FCPA and India’s anti-corruption law cover?',
                        'akaza-adventure'
                    ); ?>
                </h2>

                <p>
                    <?php esc_html_e(
                        'Explore the legal context behind the course content, in UK, US and India order.',
                        'akaza-adventure'
                    ); ?>
                </p>


                <!-- Jurisdiction Tabs -->
                <div
                    class="sl-abac-laws-covered__tabs"
                    role="tablist"
                    aria-label="<?php esc_attr_e(
                        'Laws covered by jurisdiction',
                        'akaza-adventure'
                    ); ?>"
                >

                    <button
                        type="button"
                        class="sl-abac-laws-covered__tab is-active"
                        id="sl-abac-law-tab-uk"
                        role="tab"
                        aria-selected="true"
                        aria-controls="sl-abac-law-panel-uk"
                        data-law-tab="uk"
                    >
                        <?php esc_html_e(
                            'United Kingdom',
                            'akaza-adventure'
                        ); ?>
                    </button>

                    <button
                        type="button"
                        class="sl-abac-laws-covered__tab"
                        id="sl-abac-law-tab-us"
                        role="tab"
                        aria-selected="false"
                        aria-controls="sl-abac-law-panel-us"
                        data-law-tab="us"
                        tabindex="-1"
                    >
                        <?php esc_html_e(
                            'United States',
                            'akaza-adventure'
                        ); ?>
                    </button>

                    <button
                        type="button"
                        class="sl-abac-laws-covered__tab"
                        id="sl-abac-law-tab-india"
                        role="tab"
                        aria-selected="false"
                        aria-controls="sl-abac-law-panel-india"
                        data-law-tab="india"
                        tabindex="-1"
                    >
                        <?php esc_html_e(
                            'India',
                            'akaza-adventure'
                        ); ?>
                    </button>

                </div>

            </div>


            <!-- Right Cards -->
            <div class="sl-abac-laws-covered__panels">


                <!-- United Kingdom -->
                <article
                    id="sl-abac-law-panel-uk"
                    class="sl-abac-laws-covered__card is-active"
                    role="tabpanel"
                    aria-labelledby="sl-abac-law-tab-uk"
                    data-law-panel="uk"
                >

                    <span
                        class="sl-abac-laws-covered__year"
                        aria-hidden="true"
                    >
                        2010
                    </span>

                    <div class="sl-abac-laws-covered__card-content">

                        <h3>
                            <?php esc_html_e(
                                'UK Bribery Act 2010',
                                'akaza-adventure'
                            ); ?>
                        </h3>

                        <p>
                            <?php esc_html_e(
                                'The Bribery Act 2010 covers offering or giving bribes, requesting or accepting bribes, bribery of foreign public officials and failure by commercial organisations to prevent bribery by associated persons.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                        <p>
                            <?php esc_html_e(
                                'The adequate-procedures defence relates to the corporate failure-to-prevent offence. Ministry of Justice guidance sets out six principles: proportionate procedures, top-level commitment, risk assessment, due diligence, communication including training, and monitoring and review.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                        <p>
                            <?php esc_html_e(
                                'Where useful for international business, the course contrasts the UK approach with the US Foreign Corrupt Practices Act, including the different treatment of facilitation payments.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                    </div>

                </article>


                <!-- United States -->
                <article
                    id="sl-abac-law-panel-us"
                    class="sl-abac-laws-covered__card"
                    role="tabpanel"
                    aria-labelledby="sl-abac-law-tab-us"
                    data-law-panel="us"
                    hidden
                >

                    <span
                        class="sl-abac-laws-covered__year"
                        aria-hidden="true"
                    >
                        1977
                    </span>

                    <div class="sl-abac-laws-covered__card-content">

                        <h3>
                            <?php esc_html_e(
                                'US Foreign Corrupt Practices Act (FCPA)',
                                'akaza-adventure'
                            ); ?>
                        </h3>

                        <p>
                            <?php esc_html_e(
                                'The FCPA prohibits covered individuals and businesses from bribing foreign officials to obtain or retain business. It also contains accounting requirements for issuers, including books and records and internal accounting controls.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                        <p>
                            <?php esc_html_e(
                                'Its narrow exception for certain routine governmental action does not make facilitation payments universally lawful. The UK Bribery Act has no equivalent exception, and organisational policy may prohibit such payments.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                        <p>
                            <?php esc_html_e(
                                'The UK ABAC course introduces the FCPA alongside UK law to support awareness of cross-border bribery risks.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                    </div>

                </article>


                <!-- India -->
                <article
                    id="sl-abac-law-panel-india"
                    class="sl-abac-laws-covered__card"
                    role="tabpanel"
                    aria-labelledby="sl-abac-law-tab-india"
                    data-law-panel="india"
                    hidden
                >

                    <span
                        class="sl-abac-laws-covered__year"
                        aria-hidden="true"
                    >
                        1988
                    </span>

                    <div class="sl-abac-laws-covered__card-content">

                        <h3>
                            <?php esc_html_e(
                                'Prevention of Corruption Act 1988',
                                'akaza-adventure'
                            ); ?>
                        </h3>

                        <p>
                            <?php esc_html_e(
                                'The India-focused course covers the Prevention of Corruption Act 1988, including changes introduced by the 2018 amendment. It explains bribery involving public servants and the giving or promising of an undue advantage.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                        <p>
                            <?php esc_html_e(
                                'It introduces the offence relating to bribery of a public servant by a commercial organisation, the role of associated persons and potential liability for persons in charge where the statutory conditions are met.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                        <p>
                            <?php esc_html_e(
                                'The content can also be aligned with the organisation\'s Code of Conduct, gifts and hospitality policy, whistleblowing process and internal approval controls.',
                                'akaza-adventure'
                            ); ?>
                        </p>

                    </div>

                </article>

            </div>

        </div>

    </div>
</section>