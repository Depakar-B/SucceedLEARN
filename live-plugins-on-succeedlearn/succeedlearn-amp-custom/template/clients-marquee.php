<?php
if ( ! function_exists( 'succeedlearn_get_client_logos' ) ) {
	function succeedlearn_get_client_logos() {
		return array(
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Autoliv.webp', 'alt' => 'Autoliv' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Shipbob.webp', 'alt' => 'Shipbob' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Sharechat.webp', 'alt' => 'Sharechat' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Saint-Gobin.webp', 'alt' => 'Saint Gobin' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Royal-Enfield.webp', 'alt' => 'Royal Enfield' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Redchilies.webp', 'alt' => 'Redchilies' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/RazorPay.webp', 'alt' => 'RazorPay' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/PowerGrid.webp', 'alt' => 'PowerGrid' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Phillips-Machine-Tool.webp', 'alt' => 'Phillips Machine Tool' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Ocrolus.webp', 'alt' => 'Ocrolus' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/NXP.webp', 'alt' => 'NXP' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Nippon-Express-1.webp', 'alt' => 'Nippon Express' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/MSC-1.webp', 'alt' => 'MSC' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Lupin-1.webp', 'alt' => 'Lupin' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Lenova-1.webp', 'alt' => 'Lenova' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/TATA.webp', 'alt' => 'TATA' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/LatentView-1.webp', 'alt' => 'LatentView' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Landmark-Group-1.webp', 'alt' => 'Landmark Group' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Inspira-1.webp', 'alt' => 'Inspira' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/GE-Appliances-1.webp', 'alt' => 'GE Appliances' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Experion-Technologies-1.webp', 'alt' => 'Experion Technologies' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/DHL-1.webp', 'alt' => 'DHL' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Cred.webp', 'alt' => 'Cred' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Chargebee.webp', 'alt' => 'Chargebee' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Aggreko.webp', 'alt' => 'Aggreko' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Abakkus-1.webp', 'alt' => 'Abakkus' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Broll.webp', 'alt' => 'Broll' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Berkidea.webp', 'alt' => 'Berkidea' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Arcil.webp', 'alt' => 'Arcil' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/AirIndia.webp', 'alt' => 'AirIndia' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/AirAsia.webp', 'alt' => 'AirAsia' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Tresvista.webp', 'alt' => 'Tresvista' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/Titan.webp', 'alt' => 'Titan' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/The-Economist.webp', 'alt' => 'The Economist' ),
			array( 'src' => 'https://succeedlearn.com/wp-content/uploads/2026/03/TCS.webp', 'alt' => 'TCS' ),
		);
	}
}

if ( ! function_exists( 'succeedlearn_get_clients_page_url' ) ) {
	function succeedlearn_get_clients_page_url() {
		$url = '';
		if ( function_exists( 'get_permalink' ) ) {
			$url = get_permalink( 61527 );
		}
		if ( ! $url ) {
			$url = home_url( '/clients/' );
		}
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			$url = add_query_arg( 'amp', '1', $url );
		}
		return esc_url( $url );
	}
}

if ( ! function_exists( 'succeedlearn_get_client_logo_image_data' ) ) {
	function succeedlearn_get_client_logo_image_data( $src ) {
		static $cache = array();
		$cache_key = (string) $src;
		if ( isset( $cache[ $cache_key ] ) ) {
			return $cache[ $cache_key ];
		}

		$data = array(
			'src'    => (string) $src,
			'srcset' => '',
			'sizes'  => '(max-width: 640px) 44vw, (max-width: 1023px) 30vw, 16vw',
		);

		if ( function_exists( 'attachment_url_to_postid' ) ) {
			$attachment_id = attachment_url_to_postid( (string) $src );
			if ( $attachment_id ) {
				if ( function_exists( 'wp_get_attachment_image_src' ) ) {
					$preferred = wp_get_attachment_image_src( $attachment_id, 'medium_large' );
					if ( ! empty( $preferred[0] ) ) {
						$data['src'] = (string) $preferred[0];
					}
				}
				if ( function_exists( 'wp_get_attachment_image_srcset' ) ) {
					$srcset = wp_get_attachment_image_srcset( $attachment_id, 'medium_large' );
					if ( ! empty( $srcset ) ) {
						$data['srcset'] = (string) $srcset;
					}
				}
			}
		}

		$cache[ $cache_key ] = $data;
		return $data;
	}
}

if ( ! function_exists( 'render_succeedlearn_clients_marquee' ) ) {
	function render_succeedlearn_clients_marquee( $args = array() ) {
		$defaults = array(
			'title_tag'   => 'h3',
			'title_class' => 'heading',
			'title_html'  => '<span class="black">Trusted </span><span class="blue">By</span>',
			'max_logos'   => 0,
			'clone_track' => true,
			'show_view_all' => true,
			'view_all_text' => 'View all clients',
			'view_all_url'  => '',
		);
		$args = array_merge( $defaults, $args );

		$title_tag   = in_array( $args['title_tag'], array( 'h1', 'h2', 'h3' ), true ) ? $args['title_tag'] : 'h3';
		$title_class = $args['title_class'];
		$title_html  = $args['title_html'];
		$max_logos   = max( 0, intval( $args['max_logos'] ) );
		$clone_track = ! empty( $args['clone_track'] );
		$show_view_all = ! empty( $args['show_view_all'] );
		$view_all_text = (string) $args['view_all_text'];
		$view_all_url  = (string) $args['view_all_url'];
		if ( '' === $view_all_url ) {
			$view_all_url = succeedlearn_get_clients_page_url();
		}
		$section_classes = 'section clients-logos-section';
		if ( $show_view_all ) {
			$section_classes .= ' clients-logos-limited';
		}

		$client_logos = succeedlearn_get_client_logos();

		if ( $max_logos > 0 ) {
			$client_logos = array_slice( $client_logos, 0, $max_logos );
		}

		?>
		<section class="<?php echo esc_attr( $section_classes ); ?>">
			<?php if ( 'h1' === $title_tag ) : ?>
				<h1 class="<?php echo esc_attr( $title_class ); ?>"><?php echo $title_html; ?></h1>
			<?php elseif ( 'h2' === $title_tag ) : ?>
				<h2 class="<?php echo esc_attr( $title_class ); ?>"><?php echo $title_html; ?></h2>
			<?php else : ?>
				<h3 class="<?php echo esc_attr( $title_class ); ?>"><?php echo $title_html; ?></h3>
			<?php endif; ?>
			<div class="clients-logos-grid" role="list" aria-label="<?php echo esc_attr__( 'Client logos', 'elearnposh-amp' ); ?>">
				<?php foreach ( $client_logos as $logo ) : ?>
					<?php $logo_image = succeedlearn_get_client_logo_image_data( $logo['src'] ); ?>
					<div class="clients-logos-item" role="listitem">
						<amp-img
							src="<?php echo esc_url( $logo_image['src'] ); ?>"
							<?php if ( ! empty( $logo_image['srcset'] ) ) : ?>
								srcset="<?php echo esc_attr( $logo_image['srcset'] ); ?>"
								sizes="<?php echo esc_attr( $logo_image['sizes'] ); ?>"
							<?php endif; ?>
							width="180"
							height="100"
							layout="responsive"
							alt="<?php echo esc_attr( $logo['alt'] ); ?>"
						></amp-img>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if ( $show_view_all ) : ?>
				<div class="clients-logos-cta">
					<a class="clients-logos-viewall-btn" href="<?php echo esc_url( $view_all_url ); ?>">
						<?php echo esc_html( $view_all_text ); ?>
					</a>
				</div>
			<?php endif; ?>
		</section>
		<?php
	}
}
