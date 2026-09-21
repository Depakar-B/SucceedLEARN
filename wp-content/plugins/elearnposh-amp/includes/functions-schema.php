<?php
/**
 * Structured data helpers for AMP templates.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'elearnposh_amp_get_organization_schema_entity' ) ) {

	/**
	 * @return string
	 */
	function elearnposh_amp_schema_home_url() {
		return trailingslashit( home_url( '/' ) );
	}

	/**
	 * @return string
	 */
	function elearnposh_amp_schema_organization_id() {
		return elearnposh_amp_schema_home_url() . '#organization';
	}

	/**
	 * @return string
	 */
	function elearnposh_amp_schema_website_id() {
		return elearnposh_amp_schema_home_url() . '#website';
	}

	/**
	 * Canonical Organization entity (referenced as /#organization).
	 *
	 * @return array<string, mixed>
	 */
	function elearnposh_amp_get_organization_schema_entity() {
		$home_url = elearnposh_amp_schema_home_url();
		$org_id   = elearnposh_amp_schema_organization_id();
		$logo_url = 'https://elearnposh.com/wp-content/uploads/2020/11/eLearn-posh-Logo.png';

		return array(
			'@type'        => 'Organization',
			'@id'          => $org_id,
			'name'         => 'eLearnPOSH',
			'legalName'    => 'Succeed Technologies Private Limited',
			'url'          => $home_url,
			'logo'         => array(
				'@type'      => 'ImageObject',
				'@id'        => $org_id . '/logo',
				'url'        => $logo_url,
				'contentUrl' => $logo_url,
			),
			'image'        => $logo_url,
			'description'  => 'eLearnPOSH provides POSH (Prevention of Sexual Harassment) compliance training, Internal Committee programs, and workplace harassment awareness courses for organizations in India.',
			'email'        => 'sales@succeedtech.com',
			'contactPoint' => array(
				array(
					'@type'             => 'ContactPoint',
					'contactType'       => 'sales',
					'email'             => 'sales@succeedtech.com',
					'telephone'         => '+91-70190 12446',
					'areaServed'        => 'IN',
					'availableLanguage' => array( 'English' ),
				),
				array(
					'@type'             => 'ContactPoint',
					'contactType'       => 'customer support',
					'email'             => 'contact@elearnposh.com',
					'url'               => home_url( '/contact-us/' ),
					'areaServed'        => 'IN',
					'availableLanguage' => array( 'English' ),
				),
			),
			'sameAs'       => array(
				'https://in.linkedin.com/company/elearnposh2018',
				'https://x.com/elearnposh_',
				'https://www.youtube.com/@eLearnPOSH/featured',
				'https://www.instagram.com/elearnposh/',
				'https://www.facebook.com/eLearnPOSH',
			),
		);
	}

	/**
	 * Canonical WebSite entity (referenced as /#website).
	 *
	 * @return array<string, mixed>
	 */
	function elearnposh_amp_get_website_schema_entity() {
		$home_url = elearnposh_amp_schema_home_url();
		$org_id   = elearnposh_amp_schema_organization_id();

		return array(
			'@type'       => 'WebSite',
			'@id'         => elearnposh_amp_schema_website_id(),
			'url'         => $home_url,
			'name'        => 'eLearnPOSH',
			'description' => 'eLearnPOSH provides POSH compliance training, Internal Committee programs, and workplace harassment awareness courses for organizations in India via eLearning, webinars, and compliance tools.',
			'publisher'   => array( '@id' => $org_id ),
			'inLanguage'  => 'en-IN',
		);
	}

	/**
	 * Basic page schema for templates without custom JSON-LD.
	 *
	 * @param string $name        Page title.
	 * @param string $url         Canonical page URL.
	 * @param string $description Page description.
	 * @param string $type        Schema.org type (WebPage, CollectionPage, etc.).
	 * @return array<string, mixed>
	 */
	function elearnposh_amp_build_basic_page_schema( $name, $url, $description, $type = 'WebPage' ) {
		$url = trailingslashit( untrailingslashit( (string) $url ) );

		return array(
			'@type'       => $type,
			'@id'         => $url . '#webpage',
			'url'         => $url,
			'name'        => (string) $name,
			'description' => (string) $description,
			'inLanguage'  => 'en-IN',
		);
	}

	/**
	 * Homepage JSON-LD graph: Organization + WebSite + WebPage.
	 *
	 * @return array<string, mixed>
	 */
	function elearnposh_amp_get_homepage_schema_graph() {
		$home_url       = elearnposh_amp_schema_home_url();
		$website_id     = elearnposh_amp_schema_website_id();
		$webpage_id     = $home_url . '#webpage';
		$org_id         = elearnposh_amp_schema_organization_id();
		$homepage_title = 'eLearnPOSH - Best in Class & Comprehensive POSH eLearning';
		$homepage_desc  = 'Prevent workplace sexual harassment with comprehensive POSH eLearning, expert-led webinars, and practical tools for Internal Committee members that help organisations build safer workplaces.';

		$helpers = trailingslashit( get_stylesheet_directory() ) . 'posh-schema-helpers.php';
		if ( is_readable( $helpers ) ) {
			require_once $helpers;
		}

		$video_objects = function_exists( 'posh_schema_get_homepage_video_objects' )
			? posh_schema_get_homepage_video_objects()
			: array();

		$video_refs = array();
		foreach ( $video_objects as $video ) {
			if ( ! empty( $video['@id'] ) ) {
				$video_refs[] = array( '@id' => $video['@id'] );
			}
		}

		$webpage = array(
			'@type'              => 'WebPage',
			'@id'                => $webpage_id,
			'url'                => $home_url,
			'name'               => $homepage_title,
			'description'        => $homepage_desc,
			'isPartOf'           => array( '@id' => $website_id ),
			'about'              => array( '@id' => $org_id ),
			'primaryImageOfPage' => array(
				'@type' => 'ImageObject',
				'url'   => 'https://elearnposh.com/wp-content/uploads/2026/07/Best-Cost-effecient-eLearning-POSH-Training.webp',
			),
			'inLanguage'         => 'en-IN',
		);

		if ( ! empty( $video_refs ) ) {
			$webpage['video'] = $video_refs;
		}

		$graph = array(
			elearnposh_amp_get_organization_schema_entity(),
			elearnposh_amp_get_website_schema_entity(),
			$webpage,
		);

		foreach ( $video_objects as $video ) {
			$graph[] = $video;
		}

		return array(
			'@context' => 'https://schema.org',
			'@graph'   => $graph,
		);
	}

	/**
	 * Upgrade publisher/author/organizer and isPartOf to canonical @id references.
	 *
	 * @param array<string, mixed> $node      Schema node (by reference).
	 * @param string               $org_id    Organization @id.
	 * @param string               $website_id WebSite @id.
	 */
	function elearnposh_amp_schema_apply_site_refs( array &$node, $org_id, $website_id ) {
		foreach ( array( 'publisher', 'author', 'organizer', 'provider' ) as $key ) {
			if ( empty( $node[ $key ] ) || ! is_array( $node[ $key ] ) ) {
				continue;
			}
			if ( isset( $node[ $key ]['@type'] ) && 'Organization' === $node[ $key ]['@type'] && empty( $node[ $key ]['@id'] ) ) {
				$node[ $key ] = array( '@id' => $org_id );
			}
		}

		if ( ! empty( $node['isPartOf'] ) && is_array( $node['isPartOf'] ) && isset( $node['isPartOf']['@type'] ) && 'WebSite' === $node['isPartOf']['@type'] ) {
			$node['isPartOf'] = array( '@id' => $website_id );
		}
	}

	/**
	 * Merge Organization + WebSite into any page schema and link page entities to them.
	 *
	 * @param array<string, mixed> $schema    Page-specific schema.
	 * @param array<string, mixed> $page_meta Optional url, name, description.
	 * @return array<string, mixed>
	 */
	function elearnposh_amp_enrich_page_schema( array $schema, array $page_meta = array() ) {
		$org_id     = elearnposh_amp_schema_organization_id();
		$website_id = elearnposh_amp_schema_website_id();
		$page_nodes = array();

		if ( isset( $schema['@graph'] ) && is_array( $schema['@graph'] ) ) {
			$page_nodes = $schema['@graph'];
		} else {
			$page_node = $schema;
			unset( $page_node['@context'] );
			$page_nodes[] = $page_node;
		}

		$page_nodes = array_values(
			array_filter(
				$page_nodes,
				static function ( $node ) {
					if ( ! is_array( $node ) || empty( $node['@type'] ) ) {
						return true;
					}
					return ! in_array( $node['@type'], array( 'Organization', 'WebSite' ), true );
				}
			)
		);

		$page_url  = ! empty( $page_meta['url'] ) ? trailingslashit( untrailingslashit( (string) $page_meta['url'] ) ) : '';
		if ( '' === $page_url && function_exists( 'get_permalink' ) ) {
			$permalink = get_permalink();
			if ( $permalink ) {
				$page_url = trailingslashit( untrailingslashit( (string) $permalink ) );
			}
		}
		$page_name = isset( $page_meta['name'] ) ? (string) $page_meta['name'] : '';
		$page_desc = isset( $page_meta['description'] ) ? (string) $page_meta['description'] : '';

		foreach ( $page_nodes as &$node ) {
			if ( ! is_array( $node ) || empty( $node['@type'] ) ) {
				continue;
			}

			elearnposh_amp_schema_apply_site_refs( $node, $org_id, $website_id );

			if ( in_array( $node['@type'], array( 'Organization', 'WebSite' ), true ) ) {
				continue;
			}

			if ( $page_url && empty( $node['url'] ) ) {
				$node['url'] = $page_url;
			}
			if ( $page_url && empty( $node['@id'] ) ) {
				$node['@id'] = $page_url . '#webpage';
			}
			if ( $page_name && empty( $node['name'] ) && empty( $node['headline'] ) ) {
				$node['name'] = $page_name;
			}
			if ( $page_desc && empty( $node['description'] ) ) {
				$node['description'] = $page_desc;
			}
			if ( empty( $node['isPartOf'] ) ) {
				$node['isPartOf'] = array( '@id' => $website_id );
			}
			if ( empty( $node['inLanguage'] ) ) {
				$node['inLanguage'] = 'en-IN';
			}
		}
		unset( $node );

		return array(
			'@context' => 'https://schema.org',
			'@graph'   => array_merge(
				array(
					elearnposh_amp_get_organization_schema_entity(),
					elearnposh_amp_get_website_schema_entity(),
				),
				$page_nodes
			),
		);
	}

	/**
	 * Encode enriched page schema for JSON-LD script output.
	 *
	 * @param array<string, mixed> $schema    Page-specific schema.
	 * @param array<string, mixed> $page_meta Optional url, name, description.
	 * @return string
	 */
	function elearnposh_amp_encode_page_schema_json_ld( array $schema, array $page_meta = array() ) {
		return wp_json_encode(
			elearnposh_amp_enrich_page_schema( $schema, $page_meta ),
			JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
		);
	}

	/**
	 * Output JSON-LD for the current WordPress page (templates without custom schema).
	 *
	 * @param string $description Optional page description.
	 * @param string $type        Schema.org type.
	 */
	function elearnposh_amp_output_current_page_schema_json_ld( $description = '', $type = 'WebPage' ) {
		$url = function_exists( 'get_permalink' ) ? get_permalink() : '';
		$name = function_exists( 'get_the_title' ) ? get_the_title() : '';
		if ( ! $url || ! $name ) {
			return;
		}
		if ( '' === trim( (string) $description ) && function_exists( 'get_the_excerpt' ) ) {
			$description = wp_strip_all_tags( get_the_excerpt() );
		}
		if ( '' === trim( (string) $description ) ) {
			$description = $name . ' — eLearnPOSH POSH compliance training and workplace safety resources.';
		}

		echo '<script type="application/ld+json">';
		echo elearnposh_amp_encode_page_schema_json_ld(
			elearnposh_amp_build_basic_page_schema( $name, $url, $description, $type ),
			array( 'url' => $url, 'name' => $name, 'description' => $description )
		); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</script>';
	}
}
