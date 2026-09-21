<?php
define( 'WP_USE_THEMES', false );
require dirname( __DIR__, 4 ) . '/wp-load.php';

$plugin = SCF_Contact_Form_Plugin::instance();
$ref    = new ReflectionClass( $plugin );
$method = $ref->getMethod( 'enrich_page_url_with_utm' );
$method->setAccessible( true );

$_COOKIE['utm_medium']   = 'cpc';
$_COOKIE['utm_campaign'] = 'spring-demo';
$_COOKIE['utm_content']  = 'hero-cta';

$clean_url = home_url( '/contact-us/' );
$enriched  = $method->invoke(
	$plugin,
	$clean_url,
	array(
		'utm_source'   => 'google',
		'utm_medium'   => 'cpc',
		'utm_campaign' => 'spring-demo',
		'utm_term'     => '',
		'utm_content'  => 'hero-cta',
	)
);

echo "Clean URL:\n{$clean_url}\n\n";
echo "Enriched URL:\n{$enriched}\n\n";

$parsed = wp_parse_url( $enriched );
parse_str( $parsed['query'] ?? '', $params );

$expected = array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_content' );
foreach ( $expected as $key ) {
	$ok = ! empty( $params[ $key ] ) ? 'OK' : 'MISSING';
	echo "{$key}: " . ( $params[ $key ] ?? '(empty)' ) . " [{$ok}]\n";
}
