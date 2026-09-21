<?php
/**
 * Contact page highlights — single tick-list (AMP).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
.ep-contact-highlights {
	--line: #d9e6f6;
	background: linear-gradient(180deg, #fff 0%, #f8fbff 100%);
	border: 1px solid #dbe8f3;
	border-radius: 16px;
	padding: 24px 22px;
	box-shadow: 0 10px 28px rgba(0, 42, 56, 0.06);
	width: 100%;
	box-sizing: border-box;
}

.ep-contact-highlights__title {
	margin: 0 0 14px;
	text-align: center;
	font-size: clamp(1.15rem, 1.05rem + 0.5vw, 1.35rem);
	line-height: 1.3;
	font-weight: 700;
	color: #002a38;
}

.ep-contact-keypoints {
	list-style: none;
	margin: 0;
	padding: 0;
	display: block;
}

.ep-contact-keypoints__item {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	padding: 14px 16px;
	margin: 0 0 10px;
	border: 1px solid var(--line);
	border-radius: 12px;
	background: #fafbfd;
	color: #2f4358;
	font-weight: 600;
	line-height: 1.45;
	font-size: 0.95rem;
	list-style: none;
}

.ep-contact-keypoints__item:last-child {
	margin-bottom: 0;
}

.ep-contact-keypoints__icon {
	flex: 0 0 26px;
	width: 26px;
	height: 26px;
	border-radius: 50%;
	background: linear-gradient(135deg, #0d73d4 0%, #2f90ef 100%);
	display: inline-flex;
	align-items: center;
	justify-content: center;
	box-shadow: 0 4px 10px rgba(13, 115, 212, 0.28);
	margin-top: 1px;
	color: #fff;
	font-size: 14px;
	font-weight: 700;
	line-height: 1;
}

.ep-contact-keypoints__text {
	flex: 1;
	min-width: 0;
}

.ep-contact-conversion__grid .ep-contact-highlights {
	min-width: 0;
}
