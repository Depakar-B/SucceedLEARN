<?php
/**
 * Posts page index — custom blog listing.
 *
 * When Settings → Reading assigns a static "Posts page" (e.g. /blog/),
 * WordPress loads home.php instead of the page template selected in admin.
 * Route that request to our Blog listing template.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

require get_template_directory() . '/page-templates/blog.php';
