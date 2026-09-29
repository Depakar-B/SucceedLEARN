<?php
/**
 * Responsible Use of Generative AI Training - What the course covers.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gai_topics = array(
	__( 'The impact of generative AI', 'akaza-adventure' ),
	__( 'How generative AI works', 'akaza-adventure' ),
	__( 'Applications of generative AI', 'akaza-adventure' ),
	__( 'How generative AI creates images', 'akaza-adventure' ),
	__( 'AI laws and regulations', 'akaza-adventure' ),
	__( 'Understanding a risk-based approach', 'akaza-adventure' ),
	__( 'Risks and limitations of generative AI', 'akaza-adventure' ),
	__( 'Caution when uploading information or interacting with AI tools', 'akaza-adventure' ),
	__( 'Prior approval for system integration', 'akaza-adventure' ),
	__( 'The accuracy of AI-generated output', 'akaza-adventure' ),
	__( 'Regulatory risks across countries and use cases', 'akaza-adventure' ),
	__( 'Copyright considerations', 'akaza-adventure' ),
	__( 'AI washing', 'akaza-adventure' ),
	__( 'Knowledge checks and a final assessment', 'akaza-adventure' ),
);
?>

<section
	class="sl-gai-topics"
	id="course-topics"
	aria-labelledby="sl-gai-topics-title"
>
	<div class="container">

		<div class="sl-gai-topics__heading">
			<h2 id="sl-gai-topics-title">
				<?php esc_html_e( 'What the', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'course covers', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'The course introduces the following topics:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<ul class="sl-gai-topics__list">
			<?php foreach ( $gai_topics as $gai_topic ) : ?>
				<li class="sl-gai-topics__item">
					<?php echo esc_html( $gai_topic ); ?>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
