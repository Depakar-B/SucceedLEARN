<?php
/**
 * Webinar Page Template
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $redux_builder_amp;
?>
<!doctype html>
<html amp lang="<?php echo esc_attr( get_bloginfo( 'language' ) ); ?>">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo esc_url( elearnposh_amp_get_favicon_url() ); ?>" type="image/png" />
	<title><?php esc_html_e( 'POSH Webinar for IC Members', 'elearnposh-amp' ); ?></title>
	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'webinar', array( 'amp-youtube' ) ); ?>
	<?php do_action( 'amp_post_template_head', $this ); ?>

	<style amp-custom>

		body {
			font-family: "Nunito Sans", Arial, sans-serif;
			margin: 0;
			padding: 0;
			padding-top: 100px !important;
			background: #fff;
			color: #333;
		}

		.banner img {
			width: 100%;
			height: auto;
		}

		.container {
			padding: 20px;
			max-width: 100%;
			margin: 0 auto;
		}

		h1 {
			color: #064E96;
			font-size: 28px;
			font-weight: 600;
			margin-bottom: 15px;
			text-align: center;
		}

		.date-time {
			font-size: 16px;
			margin-bottom: 15px;
			text-align: center;
		}

		.content p {
			line-height: 1.7;
			margin-bottom: 15px;
			font-size: 16px;
		}

		.register-btn {
			text-align: center;
			margin: 25px 0;
		}

		.register-btn a {
			background: #1472b2;
			color: #ffffff;
			padding: 12px 25px;
			text-decoration: none;
			border-radius: 4px;
			font-weight: 600;
			display: inline-block;
		}

		.topic-label {
			font-size: 20px;
			color: #1472ba;
			font-weight: 600;
			display: block;
			margin-top: 30px;
			margin-bottom: 10px;
		}

		h2 {
			font-size: 22px;
			color: #222;
			margin-bottom: 15px;
		}

		.hrtag {
			border-top: 2px solid #eee;
			margin: 30px 0;
		}
		h3 {
	font-size: 20px;
	color: #064E96;
	margin-top: 30px;
	margin-bottom: 15px;
}

.key-points {
	padding-left: 20px;
	margin-bottom: 30px;
}

.key-points li {
	margin-bottom: 10px;
	line-height: 1.6;
	font-size: 16px;
}

.speaker-section {
	text-align: center;
	margin-top: 40px;
}

.speaker-section amp-img {
	border-radius: 8px;
	margin-bottom: 15px;
}

.speaker-name {
	font-size: 20px;
	font-weight: 600;
	color: #064E96;
	margin-bottom: 5px;
}

.speaker-profession {
	font-size: 16px;
	color: #555;
	margin-bottom: 5px;
}

.speaker-designation {
	font-size: 15px;
	color: #777;
}
.video-section {
	margin-top: 60px;
	padding:0px;
}

.video-section h2 {
	text-align: center;
	font-weight: 700;
	color: #064E96;
	font-size: 24px;
	margin-bottom: 30px;
}

.video-grid {
	display: flex;
	flex-direction: column;
	gap: 30px;
}

.video-card {
	background: #ffffff;
	padding: 20px;
	border-radius: 8px;
	box-shadow: 0 2px 8px rgba(0,0,0,0.06);
	margin-top: 20px;  
}


.video-card h3 {
	text-align: center;
	font-weight: 600;
	margin-bottom: 15px!important;
	min-height: 50px;
	color: #1472ba;
	margin:0px ;
}

.video-card p {
	text-align: center;
	font-size: 15px;
	margin-top: 15px;
	min-height: 60px;
	line-height: 1.6;
}

.demo-row {
	text-align: center;
	margin-top: 40px;
}

.demo-row p {
	font-size: 18px;
	margin-bottom: 15px;
}

.demo-btn-dark a {
	background: var(--posh-demo-btn-bg, #01465d);
	color: #ffffff;
	padding: 12px 30px;
	text-decoration: none;
	border-radius: 4px;
	font-weight: 600;
	display: inline-block;
}
/* ============================= */
/* Tablet & Above (768px+) */
/* ============================= */

@media (min-width: 768px) {
	.container{
		padding:32px;
	}
  .speakers-section,
  .speakers-grid,
  .speaker-card {
    text-align: left !important;
  }

  .speakers-grid {
    justify-content: flex-start !important;
  }

  .speaker-card {
    align-items: flex-start !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
  }

	.video-card h3 {
	text-align: center;
	font-weight: 500;
	margin-bottom: 15px!important;
	min-height: 50px;
	color: #1472ba;
	margin:0px ;
	font-size:18px;
}
	.video-grid {
		flex-direction: row;
		gap: 20px;
	}

	.video-card {
		flex: 1;
		margin-top: 0; 
	}

	.register-btn,
	.demo-row {
		text-align: left;
	}

	.demo-row p {
		text-align: left;
	}


  .demo-row {
    text-align: left;
    justify-content: flex-start;
    align-items: flex-start;
  }

  .demo-row a,
  .register-btn {
    margin-left: 0;
    margin-right: auto;
  }

  .demo-row p {
    text-align: left;
  }

}


		<?php 
		$optimizer = \ElearnPOSH\AMP\Performance_Optimizer::get_instance();
		echo $optimizer->get_optimized_css( 'webinar', array( 'menu', 'footer' ) );
		?>

	</style>

	<?php elearnposh_amp_output_current_page_schema_json_ld(); ?>

	<?php elearnposh_amp_output_components( 'webinar', array() ); ?>

</head>

<body>

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/menu.php'; ?>

<div class="amp-content-wrapper">
<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/user-notification.php'; ?>
<?php elearnposh_amp_render_breadcrumbs(); ?>

	<!-- Banner -->
	<div class="banner">
		<amp-img 
			src="https://elearnposh.com/wp-content/uploads/2026/02/POSH-Webinar-for-IC-Member.jpg"
			width="1200"
			height="500"
			layout="responsive"
			alt="POSH Webinar for IC Members">
		</amp-img>
	</div>

	<div class="container">

		<h1>POSH Webinar for IC Members</h1>

		<div class="date-time">
			<strong>Date and Time: March 18, 2026 | 3:00 PM to 4:30PM IST</strong>
		</div>

		<div class="content">

			<p>
			Internal Committees often encounter procedural uncertainties while conducting inquiries. Questions frequently arise around evidence assessment, fairness in hearings, documentation standards, timelines, jurisdiction boundaries, and adherence to principles of natural justice.
			</p>

			<p>
			Members may wonder whether processes are being followed correctly, whether parties are being given adequate opportunity to be heard, and whether inquiry reports are structured appropriately.
			</p>

			<p>
			With evolving judicial interpretations and increasing scrutiny, even procedural gaps can lead to challenges or appeals. ICs are therefore expected to ensure that their inquiries are not only sensitive and balanced, but also structured, consistent, and legally defensible. This webinar attempts to impart knowledge on these aspects.
			</p>

			<p><strong>Live on Zoom</strong></p>

		</div>

		<!---<div class="register-btn">
			<a href="https://pages.razorpay.com/pl_SHc8r5HPhcM7sr/view" target="_blank">
				Register Now
			</a>
		</div>---->

		<div class="hrtag"></div>

		<span class="topic-label">Topic 1:</span>

		<h2>Jurisdiction of the Internal Committee & the Supreme Court’s Position on Third-Party Cases</h2>

		<div class="content">
			<p>
			Jurisdiction remains one of the most debated and misunderstood aspects of Internal Committee functioning. Questions frequently arise when complaints involve third parties, cross-organisational interactions, consultants, vendors, or individuals not directly employed within the same establishment.
			</p>

			<p>
			Determining whether the IC has the authority to proceed is not merely procedural. It directly impacts the validity of the inquiry itself.
			</p>

			<p>
			Recent judicial interpretations, including observations of the Supreme Court, have added further nuance to how jurisdiction must be understood. This session will unpack the legal boundaries of IC authority and provide clarity on how committees should approach complex jurisdictional scenarios with confidence and caution.
			</p>
		</div>
		<h3>What You Will Learn:</h3>

<ul class="key-points">
	<li>When does an IC legally have jurisdiction?</li>
	<li>How should ICs approach complaints involving third parties?</li>
	<li>How to avoid jurisdictional errors that may invalidate proceedings</li>
	<li>Practical interpretation of service rules and inter-organisation complaints</li>
</ul>

<div class="hrtag"></div>

<div class="speaker-section">

	<amp-img 
		src="https://elearnposh.com/wp-content/uploads/2026/02/Palak-Jain.jpg"
		width="120"
		height="120"
		layout="fixed"
		alt="Ms. Palak Jain">
	</amp-img>

	<div class="speaker-name">Ms. Palak Jain</div>
	<div class="speaker-profession">High Court Advocate </div>
	<div class="speaker-designation">Former Sr. Legal Consultant, National Commission for Women</div>

</div>

		
		<div class="hrtag"></div>

		<span class="topic-label">Topic 2:</span>

		<h2>Principles of Natural Justice & Standard of Proof During IC Inquiry</h2>

		<div class="content">
			<p>
			A procedurally sound inquiry is the backbone of a defensible IC decision. Internal Committees are required to ensure fairness, impartiality, and equal opportunity to both parties. But what does this mean in practice? How should principles of natural justice be applied within a workplace inquiry setting?</p>
			
		</div>
		<h3>This session will clarify:</h3>

<ul class="key-points">
	<li>What do principles of natural justice practically mean in an IC inquiry?</li>
	<li>What is the correct standard of proof under the POSH framework?</li>
	<li>Is it “beyond reasonable doubt” or “preponderance of probability”?</li>
	<li>How should ICs balance fairness and sensitivity?</li>
	<li>How to ensure inquiry reports are legally defensible</li>
</ul>

<div class="hrtag"></div>

<div class="speaker-section">

	<amp-img 
		src="https://elearnposh.com/wp-content/uploads/2026/02/Sandya-Advani.png"
		width="120"
		height="120"
		layout="fixed"
		alt="Dr. Sandya Advani">
	</amp-img>

	<div class="speaker-name">Dr. Sandya Advani</div>
	<div class="speaker-designation">POSH Expert Principal Consultant at POSH Systems.com</div>

</div>
		<div class="hrtag"></div>

<span class="topic-label">Who Should Attend</span>

<h3 style="color:#000000; margin-top:8px; font-weight:500;">This webinar is ideal for:</h3>

<ul class="key-points">
	<li>Internal Committee Members</li>
	<li>Presiding Officers</li>
	<li>HR Professionals</li>
	<li>Compliance Professionals</li>
	<li>POSH Consultants</li>
	<li>Employers & Senior Management</li>
	<li>External Members</li>
</ul>

		<div class="hrtag"></div>

<h3>Free for Annual IC Program Subscribers</h3>

<!---<div class="content">
	<p>
		This webinar is free for existing IC Members enrolled in eLearnPOSH’s POSH for IC Members Program.
	</p>

	<p>
		Others may register through paid access.
	</p>

	<p>
		The Zoom link will be shared via email upon successful registration/payment confirmation.
	</p>
</div>

<div class="register-btn">
	<a href="https://pages.razorpay.com/pl_SHc8r5HPhcM7sr/view" target="_blank">
		Register and Pay
	</a>
</div>---->
		
		<div class="content">
			<p>
				The registration is closed. For any enquiries, please contact us at 
<a href="mailto:support@succeedtech.com">support@succeedtech.com</a>.
			</p>
		</div>

		<div class="video-section">

	<h2>POSH Compliance Made Easy - Simple, Effective & Stress-Free</h2>

	<div class="video-grid">

		<!-- VIDEO 1 -->
		<div class="video-card">
			<h3>Why POSH Training Fails - And How We Fix It</h3>

			<amp-youtube
				data-videoid="2u_YZty7nd4"
				layout="responsive"
				width="480"
				height="270">

				<amp-img
					src="https://img.youtube.com/vi/2u_YZty7nd4/hqdefault.jpg"
					layout="fill"
					placeholder
					alt="Why POSH Training Fails">
				</amp-img>

			</amp-youtube>

			<p>
				We solve common HR & IC challenges with smart tracking,
				assessments, certificates & reminders.
			</p>
		</div>

		<!-- VIDEO 2 -->
		<div class="video-card">
			<h3>ePOSH Bytes - Fast & Engaging Micro-Learnings</h3>

			<amp-youtube
				data-videoid="m7Lleni4zug"
				layout="responsive"
				width="480"
				height="270">

				<amp-img
					src="https://img.youtube.com/vi/m7Lleni4zug/hqdefault.jpg"
					layout="fill"
					placeholder
					alt="ePOSH Bytes">
				</amp-img>

			</amp-youtube>

			<p>
				Bite-sized, high-retention micro-videos for modern learners.
			</p>
		</div>

		<!-- VIDEO 3 -->
		<div class="video-card">
			<h3>Live Action Scenarios - Real Conversations → Real Impact</h3>

			<amp-youtube
				data-videoid="qgj2RAD9Pk4"
				layout="responsive"
				width="480"
				height="270">

				<amp-img
					src="https://img.youtube.com/vi/qgj2RAD9Pk4/hqdefault.jpg"
					layout="fill"
					placeholder
					alt="Live Action Scenarios">
				</amp-img>

			</amp-youtube>

			<p>
				Realistic workplace stories that drive behavioural change.
			</p>
		</div>

	</div>

	<div class="demo-row">
		<p>Experience the Difference</p>

		<div class="demo-btn-dark">
			<a href="https://elearnposh.com/contact-us/" target="_blank">
				Schedule a Demo
			</a>
		</div>
	</div>

</div>

	</div>
</div><!-- .amp-content-wrapper -->

<?php include ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php'; ?>

</body>
</html>
