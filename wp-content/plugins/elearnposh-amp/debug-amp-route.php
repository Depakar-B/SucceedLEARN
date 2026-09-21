<?php
/**
 * Temporary AMP routing debug — delete after use.
 * Visit: /wp-content/plugins/elearnposh-amp/debug-amp-route.php?slug=posh-training-for-managers
 */
define( 'SHORTINIT', false );
require dirname( __DIR__, 3 ) . '/wp-load.php';

header( 'Content-Type: text/plain; charset=utf-8' );

$slug = isset( $_GET['slug'] ) ? sanitize_title( wp_unslash( $_GET['slug'] ) ) : 'posh-training-for-managers';
$paths = array(
	'solutions/' . $slug,
	'posh-courses/' . $slug,
	$slug,
);

echo "Active AMP plugins:\n";
foreach ( get_option( 'active_plugins', array() ) as $p ) {
	if ( false !== strpos( $p, 'elearnposh-amp' ) ) {
		echo "  $p\n";
	}
}

echo "\nPage lookup for slug: $slug\n";
foreach ( $paths as $path ) {
	$page = get_page_by_path( $path );
	echo "  $path => " . ( $page ? "ID {$page->ID} ({$page->post_name})" : 'NOT FOUND' ) . "\n";
}

$page = get_page_by_path( 'solutions/' . $slug );
if ( ! $page ) {
	$page = get_page_by_path( $slug );
}

if ( $page && class_exists( 'ElearnPOSH\\AMP\\Config' ) ) {
	$config = new ElearnPOSH\AMP\Config();
	echo "\nConfig checks for ID {$page->ID} slug {$page->post_name}:\n";
	echo '  is_plugin_custom_amp_page: ' . ( $config->is_plugin_custom_amp_page( $page->ID ) ? 'yes' : 'no' ) . "\n";
	echo '  is_course_page: ' . ( $config->is_course_page( $page->ID ) ? 'yes' : 'no' ) . "\n";
	echo '  get_amp_template_for_post: ' . ( $config->get_amp_template_for_post( $page->ID, $page->post_name ) ?: '(empty)' ) . "\n";
}

if ( defined( 'ELEARNPOSH_AMP_TEMPLATES_DIR' ) ) {
	$tpl = ELEARNPOSH_AMP_TEMPLATES_DIR . 'pages/posh-for-managers.php';
	echo "\nTemplate file: $tpl\n";
	echo '  exists: ' . ( file_exists( $tpl ) ? 'yes' : 'no' ) . "\n";
	echo '  ELEARNPOSH_AMP_PLUGIN_DIR: ' . ( defined( 'ELEARNPOSH_AMP_PLUGIN_DIR' ) ? ELEARNPOSH_AMP_PLUGIN_DIR : 'undefined' ) . "\n";
}
