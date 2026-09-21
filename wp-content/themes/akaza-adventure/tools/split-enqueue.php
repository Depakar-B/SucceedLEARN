<?php
/**
 * Helper: extract enqueue blocks from functions.php into inc/assets/.
 *
 * @package Akaza_Adventure
 */

$theme = dirname( __DIR__ );
$src   = $theme . '/functions.php';
$lines = file( $src, FILE_IGNORE_NEW_LINES );

if ( ! $lines ) {
	fwrite( STDERR, "Cannot read functions.php\n" );
	exit( 1 );
}

function extract_lines( array $lines, int $start, int $end ): array {
	return array_slice( $lines, $start - 1, $end - $start + 1 );
}

function unindent_block( array $lines ): array {
	return array_map(
		static function ( $line ) {
			if ( str_starts_with( $line, "\t" ) ) {
				return substr( $line, 1 );
			}
			return $line;
		},
		$lines
	);
}

function write_enqueue_page( string $theme, string $filename, string $func, int $start, int $end, array $prefix = array() ): void {
	$body    = unindent_block( extract_lines( file( $theme . '/functions.php', FILE_IGNORE_NEW_LINES ), $start, $end ) );
	$header  = array(
		'<?php',
		'/**',
		' * Page assets: ' . $func,
		' * @package Akaza_Adventure',
		' */',
		'',
		"if ( ! defined( 'ABSPATH' ) ) {",
		"\texit;",
		'}',
		'',
		"function {$func}() {",
	);
	$content = implode( "\n", array_merge( $header, $prefix, $body, array( '}' ) ) ) . "\n";
	file_put_contents( $theme . '/inc/assets/' . $filename, $content );
	echo "Wrote {$filename}\n";
}

$dir = $theme . '/inc/assets';
if ( ! is_dir( $dir ) ) {
	mkdir( $dir, 0755, true );
}

$pages = array(
	array( 'enqueue-home.php', 'akaza_enqueue_home_assets', 93, 243 ),
	array( 'enqueue-legal.php', 'akaza_enqueue_legal_assets', 272, 277 ),
	array( 'enqueue-fcp.php', 'akaza_enqueue_fcp_assets', 286, 380 ),
	array( 'enqueue-sap.php', 'akaza_enqueue_sap_assets', 384, 566 ),
	array( 'enqueue-coc.php', 'akaza_enqueue_coc_assets', 570, 837 ),
	array( 'enqueue-csa.php', 'akaza_enqueue_csa_assets', 841, 860 ),
	array( 'enqueue-clients.php', 'akaza_enqueue_clients_assets', 937, 964 ),
	array( 'enqueue-inclusive.php', 'akaza_enqueue_inclusive_training_assets', 968, 1054 ),
	array( 'enqueue-iwc.php', 'akaza_enqueue_iwc_course_assets', 1058, 1110 ),
	array( 'enqueue-gwct.php', 'akaza_enqueue_gwct_assets', 1114, 1240 ),
	array( 'enqueue-gdpr.php', 'akaza_enqueue_gdpr_assets', 1244, 1303 ),
	array( 'enqueue-dpdpa.php', 'akaza_enqueue_dpdpa_assets', 1307, 1497 ),
);

foreach ( $pages as $page ) {
	write_enqueue_page( $theme, $page[0], $page[1], $page[2], $page[3] );
}

$about_body = unindent_block( extract_lines( $lines, 864, 933 ) );
$about      = array(
	'<?php',
	'/**',
	' * About / Contact page assets.',
	' * @package Akaza_Adventure',
	' */',
	'',
	"if ( ! defined( 'ABSPATH' ) ) {",
	"\texit;",
	'}',
	'',
	'/**',
	' * @param string $page One of about|contact.',
	' */',
	'function akaza_enqueue_about_contact_assets( $page ) {',
	"\takaza_enqueue_solutions_carousel();",
	"\t\$is_about_page = ( 'about' === \$page );",
	"\t\$is_contact_page = ( 'contact' === \$page );",
);
file_put_contents(
	$dir . '/enqueue-about-contact.php',
	implode( "\n", array_merge( $about, $about_body, array( '}' ) ) ) . "\n"
);
echo "Wrote enqueue-about-contact.php\n";

file_put_contents(
	$dir . '/enqueue-defensive-driving.php',
	"<?php\n/**\n * Defensive driving course marketing assets.\n * @package Akaza_Adventure\n */\n\nif ( ! defined( 'ABSPATH' ) ) {\n\texit;\n}\n\nfunction akaza_enqueue_defensive_driving_assets() {\n\takaza_enqueue_course_marketing_styles( 'defensive-driving' );\n}\n"
);
echo "Wrote enqueue-defensive-driving.php\n";

$core_start = unindent_block( extract_lines( $lines, 65, 90 ) );
$core_tail  = unindent_block( extract_lines( $lines, 1500, 1541 ) );
$core       = array_merge(
	array(
		'<?php',
		'/**',
		' * Core theme assets loaded on every page.',
		' * @package Akaza_Adventure',
		' */',
		'',
		"if ( ! defined( 'ABSPATH' ) ) {",
		"\texit;",
		'}',
		'',
		'function akaza_enqueue_core_assets() {',
	),
	$core_start,
	array( '' ),
	$core_tail,
	array( '}' )
);
file_put_contents( $dir . '/enqueue-core.php', implode( "\n", $core ) . "\n" );
echo "Wrote enqueue-core.php\n";
