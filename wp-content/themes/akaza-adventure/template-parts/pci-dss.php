<?php
/**
 * PCI DSS page content wrapper.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="main-content" class="sl-training-page sl-pci-page">
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-hero' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-why' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-learn' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-laws' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-structure' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-topics' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-screenshots' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-cases' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-choose' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-audience' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-strengthen' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-faq' ); ?>
	<?php get_template_part( 'template-parts/pci-dss/sl-pci-contact' ); ?>
</main>
