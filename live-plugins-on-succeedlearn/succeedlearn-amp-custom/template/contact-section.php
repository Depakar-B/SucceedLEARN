<?php
if ( ! function_exists( 'render_succeedlearn_common_cta_section' ) ) {
	function render_succeedlearn_common_cta_section( $args = array() ) {
		$defaults = array(
			'section_id'    => '',
			'heading_html'  => '<span class="black">See How </span><span class="blue"> Succeed</span><span class="black"> will work for your Organization</span>',
			'image_src'     => 'https://succeedlearn.com/wp-content/uploads/2025/08/your-Organization-2.svg',
			'image_alt'     => 'SucceedLEARN contact form for inquiries with fields for name, email, organization, and message.',
			'shortcode'     => '[contact_form]',
            'show_form'     => true,
            'cta_text'      => 'Request Demo',
            'cta_url'       => '',
		);
		$args = array_merge( $defaults, $args );
		if ( '' === $args['cta_url'] && function_exists( 'succeedlearn_get_amp_link' ) ) {
			$args['cta_url'] = succeedlearn_get_amp_link( 87 );
		}
		$section_id_attr = '' !== $args['section_id'] ? ' id="' . esc_attr( $args['section_id'] ) . '"' : '';
		?>
		<section class="common-cta-section"<?php echo $section_id_attr; ?>>
			<h2 class="heading">
				<?php echo $args['heading_html']; ?>
			</h2>
			<div class="cta-image-wrapper">
				<amp-img
					src="<?php echo esc_url( $args['image_src'] ); ?>"
					width="600"
					height="500"
					layout="responsive"
					class="cta-image"
					alt="<?php echo esc_attr( $args['image_alt'] ); ?>">
				</amp-img>
			</div>
			<div class="cta-form-wrapper">
                <?php if ( ! empty( $args['show_form'] ) ) : ?>
					<?php echo do_shortcode( $args['shortcode'] ); ?>
                <?php else : ?>
                    <a class="button cta-button" href="<?php echo esc_url( $args['cta_url'] ); ?>">
                        <?php echo esc_html( $args['cta_text'] ); ?>
                    </a>
                <?php endif; ?>
			</div>
		</section>
		<?php
	}
}
