<?php
/**
 * Code of Conduct — Course Coverage grid.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coverage_items = array(
	array(
		'title' => __( 'Understanding the Code of Conduct', 'akaza-adventure' ),
		'body'  => __( 'Understand organisational values, employee responsibilities and how the Code applies to everyday business decisions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Respectful Workplace & Inclusion', 'akaza-adventure' ),
		'body'  => __( 'Learn how respectful, equal opportunity and professional behaviour contribute to a safe and productive workplace.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Professional Conduct & Workplace Behaviour', 'akaza-adventure' ),
		'body'  => __( 'Explore expectations around professional behaviour, meetings, communication, workplace safety and personal accountability.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Conflicts of Interest', 'akaza-adventure' ),
		'body'  =>__( 'Learn to identify actual, potential and perceived conflicts involving personal relationships, outside employment, vendors, financial interests and business opportunities.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Gifts, Hospitality & Business Courtesies', 'akaza-adventure' ),
		'body'  => __( 'Understand when gifts, meals, entertainment and hospitality may be appropriate and when they could improperly influence a business decision.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Anti-Bribery & Anti-Corruption', 'akaza-adventure' ),
		'body'  => __( 'Recognize bribery, improper payments and other forms of corruption and understand the importance of ethical business relationships.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Fair Competition & Business Integrity', 'akaza-adventure' ),
		'body'  => __( 'Understand responsible interactions with competitors, customers, suppliers and other business partners, including risks such as price fixing, bid manipulation and other anti-competitive practices.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Financial Integrity & Responsible Recordkeeping', 'akaza-adventure' ),
		'body'  => __( 'Learn the importance of accurate financial records, appropriate expenses, documentation, contracts and preservation of records.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Data Privacy & Responsible Information Handling', 'akaza-adventure' ),
		'body'  => __( 'Understand how personal information should be collected, accessed, processed, stored and shared responsibly.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Confidential Information & Intellectual Property', 'akaza-adventure' ),
		'body'  => __( 'Learn how to protect confidential business information, intellectual property, customer information and other sensitive organizational assets.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Protecting Company Assets', 'akaza-adventure' ),
		'body'  => __( 'Understand responsible use of physical assets, technology, software, information, equipment and other company resources.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Social Media & External Communication', 'akaza-adventure' ),
		'body'  => __( 'Learn what employees can and cannot communicate publicly, how to behave responsibly on social media and when communication should be handled by authorized representatives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Working Responsibly with Third Parties', 'akaza-adventure' ),
		'body'  => __( 'Understand ethical expectations when interacting with suppliers, consultants, contractors, business partners and other third parties.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Speak Up, Reporting & Non-Retaliation', 'akaza-adventure' ),
		'body'  => __( 'Help employees recognize when concerns should be raised, understand available reporting channels and build confidence to speak up when something does not seem right.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Living the Code', 'akaza-adventure' ),
		'body'  => __( 'Bring the learning together through practical decision-making principles employees can use when they encounter situations that are not explicitly covered by a policy.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-coc-coverage" aria-labelledby="sl-coc-coverage-title">
	<div class="container">

		<div class="sl-coc-coverage__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Coverage', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-coverage-title">
				<?php
				echo wp_kses(
					__( 'What should your <span>Code of Conduct Training Cover?</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course can be configured around your organisation’s Code of Conduct, policies, industry and employee requirements.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-coc-coverage__grid">
			<?php foreach ( $coverage_items as $item ) : ?>
				<article class="sl-coc-coverage__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>

					<?php if ( is_array( $item['body'] ) ) : ?>
						<?php foreach ( $item['body'] as $paragraph ) : ?>
							<?php if ( is_array( $paragraph ) ) : ?>
								<p class="<?php echo esc_attr( $paragraph['class'] ?? '' ); ?>">
									<?php echo esc_html( $paragraph['text'] ); ?>
								</p>
							<?php else : ?>
								<p><?php echo esc_html( $paragraph ); ?></p>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else : ?>
						<p><?php echo esc_html( $item['body'] ); ?></p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
