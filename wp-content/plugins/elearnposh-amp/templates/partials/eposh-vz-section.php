<?php
/**
 * Zig-zag video showcase section (desktop #eposh-vz parity).
 *
 * Optional vars: $eposh_vz_demo_url, $eposh_vz_eposh_bytes_url, $eposh_vz_live_action_url
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pfe_page_url             = elearnposh_amp_get_employees_page_url();
$eposh_vz_demo_url        = isset( $eposh_vz_demo_url ) ? $eposh_vz_demo_url : elearnposh_amp_url( '/contact-us/#demo' );
$eposh_vz_eposh_bytes_url = isset( $eposh_vz_eposh_bytes_url ) ? $eposh_vz_eposh_bytes_url : esc_url( $pfe_page_url . '#eposh-bytes' );
$eposh_vz_live_action_url = isset( $eposh_vz_live_action_url ) ? $eposh_vz_live_action_url : esc_url( $pfe_page_url . '#posh-live-action' );
$eposh_vz_show_card_links = isset( $eposh_vz_show_card_links ) ? (bool) $eposh_vz_show_card_links : true;
?>
<section class="eposh-vz" id="eposh-vz" aria-label="<?php esc_attr_e( 'POSH training videos', 'elearnposh-amp' ); ?>">
	<div class="eposh-vz-shell">
		<header class="eposh-vz-head">
			<h2 class="eposh-vz-head__title"><?php esc_html_e( 'POSH Compliance Made Easy - Simple, Effective & Stress-Free', 'elearnposh-amp' ); ?></h2>
			<p class="eposh-vz-head__lead">
				<?php esc_html_e( 'See how eLearnPOSH combines engaging video learning, micro-modules, and real workplace scenarios to drive lasting compliance outcomes.', 'elearnposh-amp' ); ?>
			</p>
		</header>

		<div class="eposh-vz-list">
			<article class="eposh-vz-card eposh-vz-card--media-start eposh-vz-card--no-cta">
				<div class="eposh-vz-card__inner">
					<div class="eposh-vz-card__media">
						<amp-youtube
							class="eposh-vz-card__player"
							data-videoid="2u_YZty7nd4"
							layout="responsive"
							width="16"
							height="9"
							data-param-rel="0"
							data-param-modestbranding="1"
							data-param-iv_load_policy="3"
							data-param-fs="0"
							data-param-playsinline="1"
							data-param-cc_load_policy="0">
							<amp-img
								src="https://i.ytimg.com/vi/2u_YZty7nd4/hqdefault.jpg"
								layout="fill"
								placeholder
								alt="<?php esc_attr_e( 'Why POSH Training Fails and How We Fix It', 'elearnposh-amp' ); ?>">
							</amp-img>
						</amp-youtube>
					</div>
					<div class="eposh-vz-card__body">
						<span class="eposh-vz-card__eyebrow"><?php esc_html_e( 'Platform overview', 'elearnposh-amp' ); ?></span>
						<h3 class="eposh-vz-card__title"><?php esc_html_e( 'Why POSH Training Fails', 'elearnposh-amp' ); ?></h3>
						<p class="eposh-vz-card__lead">
							<?php esc_html_e( 'Getting every employee to attend live webinars or in-person sessions can be difficult, especially across teams, shifts, and locations. Our platform gives employees the flexibility to complete POSH training anytime, while helping HR and leaders track progress, send reminders, and maintain proof of completion.', 'elearnposh-amp' ); ?>
						</p>
						<amp-accordion class="eposh-vz-card__accordion" animate disable-session-states>
							<section>
								<h4 class="eposh-vz-card__accordion-header"><?php esc_html_e( 'Read more', 'elearnposh-amp' ); ?></h4>
								<div class="eposh-vz-card__extra">
									<p class="eposh-vz-card__lead">
										<?php esc_html_e( 'From training access and policy awareness to IC details and an end-to-end complaint management system, everything stays available under one roof.', 'elearnposh-amp' ); ?>
									</p>
									<ul class="eposh-vz-card__points">
										<li><?php esc_html_e( 'Anytime training access for employees', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Easy course assignments and automated reminders', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Assessments and certificates as proof of completion', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'POSH policy, IC details, and complaint filing guidance in one place', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Admin access for real-time tracking and compliance visibility', 'elearnposh-amp' ); ?></li>
									</ul>
								</div>
							</section>
						</amp-accordion>
						<p class="eposh-vz-card__note"><?php esc_html_e( 'Your One-Stop POSH Compliance Solution', 'elearnposh-amp' ); ?></p>
					</div>
				</div>
			</article>

			<article class="eposh-vz-card eposh-vz-card--media-end">
				<div class="eposh-vz-card__inner">
					<div class="eposh-vz-card__media">
						<amp-youtube
							class="eposh-vz-card__player"
							data-videoid="m7Lleni4zug"
							layout="responsive"
							width="16"
							height="9"
							data-param-rel="0"
							data-param-modestbranding="1"
							data-param-iv_load_policy="3"
							data-param-fs="0"
							data-param-playsinline="1"
							data-param-cc_load_policy="0">
							<amp-img
								src="https://i.ytimg.com/vi/m7Lleni4zug/hqdefault.jpg"
								layout="fill"
								placeholder
								alt="<?php esc_attr_e( 'ePOSH Bytes micro-learning', 'elearnposh-amp' ); ?>">
							</amp-img>
						</amp-youtube>
					</div>
					<div class="eposh-vz-card__body">
						<span class="eposh-vz-card__eyebrow"><?php esc_html_e( 'Micro-learning', 'elearnposh-amp' ); ?></span>
						<h3 class="eposh-vz-card__title"><?php esc_html_e( 'ePOSH Bytes - Fast & Engaging Micro-Learnings', 'elearnposh-amp' ); ?></h3>
						<p class="eposh-vz-card__lead">
							<?php esc_html_e( 'Long training sessions are not always easy to repeat, but POSH awareness needs regular reinforcement. ePOSH Bytes delivers short, engaging 3-5 minute video modules that fit into busy work schedules and keep key POSH concepts fresh throughout the year.', 'elearnposh-amp' ); ?>
						</p>
						<amp-accordion class="eposh-vz-card__accordion" animate disable-session-states>
							<section>
								<h4 class="eposh-vz-card__accordion-header"><?php esc_html_e( 'Read more', 'elearnposh-amp' ); ?></h4>
								<div class="eposh-vz-card__extra">
									<p class="eposh-vz-card__lead">
										<?php esc_html_e( 'Designed with real-world workplace scenarios, these bite-sized refreshers can be delivered weekly, monthly, quarterly, or bi-annually via Teams, WhatsApp, Slack, or email.', 'elearnposh-amp' ); ?>
									</p>
									<ul class="eposh-vz-card__points">
										<li><?php esc_html_e( 'Quick 3-5 minute video modules', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Login-free, trackable access', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Delivered via Teams, WhatsApp, Slack, or email', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Real-world scenarios for practical understanding', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Flexible delivery: weekly, monthly, quarterly, or bi-annually', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Customizable scenario-based learning modules', 'elearnposh-amp' ); ?></li>
									</ul>
								</div>
							</section>
						</amp-accordion>
						<p class="eposh-vz-card__note"><?php esc_html_e( 'Micro-learning that reinforces POSH awareness throughout the year.', 'elearnposh-amp' ); ?></p>
						<?php if ( $eposh_vz_show_card_links ) : ?>
						<div class="eposh-vz-card__actions">
							<a class="eposh-vz-card__btn" href="<?php echo esc_url( $eposh_vz_eposh_bytes_url ); ?>"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</article>

			<article class="eposh-vz-card eposh-vz-card--media-start">
				<div class="eposh-vz-card__inner">
					<div class="eposh-vz-card__media">
						<amp-youtube
							class="eposh-vz-card__player"
							data-videoid="qgj2RAD9Pk4"
							layout="responsive"
							width="16"
							height="9"
							data-param-rel="0"
							data-param-modestbranding="1"
							data-param-iv_load_policy="3"
							data-param-fs="0"
							data-param-playsinline="1"
							data-param-cc_load_policy="0">
							<amp-img
								src="https://i.ytimg.com/vi/qgj2RAD9Pk4/hqdefault.jpg"
								layout="fill"
								placeholder
								alt="<?php esc_attr_e( 'Live action POSH scenarios', 'elearnposh-amp' ); ?>">
							</amp-img>
						</amp-youtube>
					</div>
					<div class="eposh-vz-card__body">
						<span class="eposh-vz-card__eyebrow"><?php esc_html_e( 'Behaviour change', 'elearnposh-amp' ); ?></span>
						<h3 class="eposh-vz-card__title"><?php esc_html_e( 'Live Action Scenarios - Real Conversations, Real Impact', 'elearnposh-amp' ); ?></h3>
						<p class="eposh-vz-card__lead">
							<?php esc_html_e( 'Sexual harassment at work is rarely black and white. It often shows up through subtle comments, uncomfortable silences, power dynamics, body language, or situations where employees are unsure how to respond. Our POSH Live Action Series brings these grey areas to life through realistic workplace stories that help learners understand impact, intent, and appropriate action.', 'elearnposh-amp' ); ?>
						</p>
						<amp-accordion class="eposh-vz-card__accordion" animate disable-session-states>
							<section>
								<h4 class="eposh-vz-card__accordion-header"><?php esc_html_e( 'Read more', 'elearnposh-amp' ); ?></h4>
								<div class="eposh-vz-card__extra">
									<p class="eposh-vz-card__lead">
										<?php esc_html_e( 'Filmed with professional actors and legally vetted scripts, these scenario-based modules go beyond PPT based training to build empathy, awareness, and better decision-making in real workplace situations.', 'elearnposh-amp' ); ?>
									</p>
									<ul class="eposh-vz-card__points">
										<li><?php esc_html_e( 'Realistic workplace scenarios for deeper understanding', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Covers verbal, visual, physical, written, and virtual forms of harassment', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Explains hostile work environment, quid pro quo, and power dynamics', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Highlights bystander intervention and speak-up behaviour', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Helps employees recognise grey areas before issues escalate', 'elearnposh-amp' ); ?></li>
										<li><?php esc_html_e( 'Encourages empathy, respectful conduct, and safer workplace culture', 'elearnposh-amp' ); ?></li>
									</ul>
								</div>
							</section>
						</amp-accordion>
						<p class="eposh-vz-card__note"><?php esc_html_e( 'Realistic scenarios that turn POSH awareness into workplace behaviour change.', 'elearnposh-amp' ); ?></p>
						<?php if ( $eposh_vz_show_card_links ) : ?>
						<div class="eposh-vz-card__actions">
							<a class="eposh-vz-card__btn" href="<?php echo esc_url( $eposh_vz_live_action_url ); ?>"><?php esc_html_e( 'Know More', 'elearnposh-amp' ); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</article>
		</div>

		<div class="eposh-vz-cta">
			<p class="eposh-vz-cta__lead"><?php esc_html_e( 'Experience the Difference', 'elearnposh-amp' ); ?></p>
			<a class="eposh-vz-cta__btn" href="<?php echo esc_url( $eposh_vz_demo_url ); ?>">
				<?php esc_html_e( 'Schedule a Demo', 'elearnposh-amp' ); ?>
			</a>
		</div>
	</div>
</section>
