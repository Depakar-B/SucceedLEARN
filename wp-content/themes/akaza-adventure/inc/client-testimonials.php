<?php
/**
 * Shared client testimonial quotes (homepage and landing pages).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Client testimonials used on the homepage and compatible landing pages.
 *
 * @return array<int, array{quote: string, name: string, role: string, note?: string}>
 */
function akaza_get_client_testimonials() {
	return array(
		array(
			'quote' => 'The learning portal in Minda branding and integrated with our HRIS portal has made learner access seamless. I have recommended eLearnPOSH to my professional contacts.',
			'note'  => 'eLearnPOSH is a Product of SucceedLEARN. eLearnPOSH is for the POSH Compliance in India while SucceedLEARN is for Global Compliance.',
			'name'  => 'Mr. Sachchidanand Pande',
			'role'  => 'Group PR Head, UNO Minda Group',
		),
		array(
			'quote' => 'Succeed helped us make sure all of our workforce were trained and awareness was spread so effectively within a very short time. Your response to every email sent out by our employees was super quick and solution-oriented.',
			'name'  => 'Mr. Girisha Krishnappa',
			'role'  => 'People and Culture, AirAsia',
		),
		array(
			'quote' => 'An easy to use interface. The clarity and simplicity helps to navigate easily. The technical team is equally very good, their responses on queries are very prompt and they provide timely solutions.',
			'name'  => 'Ms. Gayatri Mishra',
			'role'  => 'L&D Specialist, Tata Smartfoodz Ltd',
		),
	);
}
