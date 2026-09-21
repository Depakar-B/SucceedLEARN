<?php
/**
 * Homepage — Today's challenges section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-home-challenges-section" aria-labelledby="challenges-heading">

    <div class="container">

        <!-- Section Heading -->

        <div class="sl-home-section-heading">

            <span class="sl-home-sub-heading">
                Why Traditional Ways Are Failing
            </span>

            <h2 id="challenges-heading">
                <?php
                echo wp_kses(
                    __( "Today's challenges run on both<br><span>sides of the org chart</span>", 'akaza-adventure' ),
                    array(
                        'br'   => array(),
                        'span' => array(),
                    )
                );
                ?>
            </h2>

        </div>


        <!-- Two Cards -->

        <div class="row g-4">

            <!-- Employees -->

            <div class="col-lg-6">

                <div class="sl-home-challenge-card">

                    <span class="sl-home-card-tag">
                        For Employees
                    </span>

                    <h3>Training that doesn't land</h3>

                    <ul>
                        <li>Forget what they learned within weeks</li>
                        <li>Training feels like a box to check, not a skill to build</li>
                        <li>Content that doesn't relate to their actual role</li>
                    </ul>

                </div>

            </div>


            <!-- Employers -->

            <div class="col-lg-6">

                <div class="sl-home-challenge-card">

                    <span class="sl-home-card-tag">
                        For Employers
                    </span>

                    <h3>Compliance that doesn't scale</h3>

                    <ul>
                        <li>Compliance obligations keep growing across jurisdictions</li>
                        <li>Juggling multiple disconnected tools creates unnecessary complexity</li>
                        <li>Manual administration eats up valuable time</li>
                    </ul>

                </div>

            </div>

        </div>


        <!-- Bottom Reality Card -->

        <div class="sl-home-reality-card">

            <div class="row align-items-center">

                <div class="col-md-3">

                    <img src="<?php echo esc_url( akaza_upload_url( '2026/08/Reality.webp' ) ); ?>"
                         alt="<?php esc_attr_e( 'Professional reviewing compliance training outcomes', 'akaza-adventure' ); ?>"
                         class="img-fluid rounded"
                         width="409"
                         height="273"
                         loading="lazy"
                         decoding="async">

                </div>


                <div class="col-md-9">

                    <span class="sl-home-card-tag">
                        The Reality
                    </span>

                    <h3>
                        Does finishing a course actually change behaviour? Rarely.
                    </h3>

                    <p>
                        Employees need training that sticks. Employers need proof it worked.
                        Both come from continuous reinforcement, real-world application,
                        and a compliance training provider that tracks outcomes, not just completions.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
