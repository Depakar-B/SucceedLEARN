<?php
define( 'WP_USE_THEMES', false );
require dirname( __DIR__, 4 ) . '/wp-load.php';

$plugin = SCF_Contact_Form_Plugin::instance();

$pages = array(
	'home' => get_option( 'page_on_front' ),
	'about' => get_page_by_path( 'about-us' ),
	'gwct' => get_page_by_path( 'global-workplace-compliance-training-for-employees' ),
);

echo "Page journey segment resolver test\n\n";

foreach ( $pages as $label => $page ) {
	if ( ! $page ) {
		echo "{$label}: page not found\n";
		continue;
	}
	// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	$GLOBALS['wp_query'] = new WP_Query(
		array(
			'page_id' => $page->ID,
		)
	);
	$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];
	$GLOBALS['wp_query']->is_singular = true;
	$GLOBALS['wp_query']->is_page     = true;
	$GLOBALS['wp_query']->queried_object    = $page;
	$GLOBALS['wp_query']->queried_object_id = $page->ID;

	$segment = $plugin->get_page_journey_segment();
	echo "{$label} ({$page->post_name}): {$segment}\n";
}

echo "\nEmail format preview:\n";
$path = 'home>page-about-us>page-global-workplace-compliance-training-for-employees';
$ref  = new ReflectionClass( $plugin );
$method = $ref->getMethod( 'format_custom_lead_path_display' );
$method->setAccessible( true );
echo $method->invoke( $plugin, $path ) . "\n";
