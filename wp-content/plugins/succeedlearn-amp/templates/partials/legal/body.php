<?php
/**
 * Legal AMP — Body content from theme sections file.
 *
 * Expected vars: $sections_path
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="sl-legal-amp__body">
	<?php
	if ( ! empty( $sections_path ) && is_readable( $sections_path ) ) {
		include $sections_path;
	}
	?>
</div>
