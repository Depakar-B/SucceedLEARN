<?php
echo '<!-- MY CUSTOM SINGLE COURSE TEMPLATE -->';
get_header();
?>

<style>
    body {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
    }

    /* Tick bullet for tick-list and package-details-content ul */
    .course-description.tick-list ul,
    .package-details-content ul {
        list-style: none;
        padding-left: 0;
        margin-left: 0;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    }

    .course-description.tick-list ul li,
    .package-details-content ul li {
        position: relative;
        padding-left: 2em;
        margin-bottom: 0.6em;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    }

    .course-description.tick-list ul li:before,
    .package-details-content ul li:before {
        content: '';
        position: absolute;
        left: 0.5em;
        top: 0.2em;
        width: 1.1em;
        height: 1.1em;
        background: url('data:image/svg+xml;utf8,<svg fill="%231472ba" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M6.173 12.067a1 1 0 0 1-1.414 0l-3.173-3.173a1 1 0 1 1 1.414-1.414l2.466 2.466 5.466-5.466a1 1 0 1 1 1.414 1.414l-6.173 6.173z"/></svg>') no-repeat center center;
        background-size: contain;
        border-radius: 50%;
        display: inline-block;
    }

    /* Reduce font size for all ul/li globally */
    ul,
    li {
        font-size: 16px;
        font-family: 'Open Sans', sans-serif;
    }

    .course-section-title,
    .topic-label,
    .related-course-title {
        font-size: 1.25rem;
        /* ~20px */
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
    }

    /* Keep all other text at 16px */
    .course-description,
    .package-details-content,
    .price-value,
    .course-summary,
    .course-main-left,
    .course-main-right,
    .right-card,
    .related-courses-content,
    .related-course-card,
    .package-and-related-section,
    .related-courses-section {
        font-size: 16px;
        font-family: 'Open Sans', sans-serif;
    }

    .course-banner {
        background: linear-gradient(135deg, #1472ba 0%, #20bced 100%);
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        padding: 0;
    }

    .course-banner .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .banner-content {
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .course-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 0.3em;
        color: #fff;
        line-height: 1.1;
        display: block;
        text-align: center;
    }

    .course-section-title {
        font-size: 1.35rem;
        font-weight: 500;
        color: #1472ba;
        margin-bottom: 16px;
        margin-top: 24px;
        letter-spacing: 0.2px;
        line-height: 1.2;
        text-align: left;
    }

    .course-summary {
        font-size: 1.1rem;
        color: #F5F3EF;
        margin: 0;
        line-height: 1.5;
        background: none;
        padding: 0;
        border-radius: 0;
        box-shadow: none;
        display: block;
        text-align: center;
    }

    .course-main-section {
        display: flex;
        align-items: flex-start;
        gap: 40px;
        max-width: 1290px;
        width: 100%;
        margin: 40px auto 0 auto;
        padding: 0 20px;
    }

    .course-main-left {
        width: 70%;
        max-width: 70%;
        padding-top: 0;
    }

    .course-main-right {
        min-width: 300px;
        max-width: 40%;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 32px;
        background: none;
        border-radius: 0;
        box-shadow: none;
        padding: 0;
        align-self: flex-start;
    }

    .right-card {
        background: white !important;
        border-radius: 14px;
        box-shadow: 0 4px 24px 0 rgba(20, 114, 186, 0.08);
        padding: 32px 28px 28px 28px;
        display: flex;
        flex-direction: column;
        align-items: stretch;
    }

    .topic-label {
        font-size: 1.35rem;
        color: #1472ba;
        font-weight: 800;
        letter-spacing: 0.5px;
        padding: 12px 0 10px 0;
        border-radius: 6px 6px 0 0;
        text-align: center;
    }

    .price-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: #353636ff;
        margin: 8px 0 8px 0;
        text-align: left;
        letter-spacing: 0.5px;
        padding: 8px 0 8px 12px;
    }

    .price-value .price-amount {
        font-weight: 400;
        color: #999;
        margin-left: 4px;
    }

    .buy-now-btn,
    .request-demo-btn {
        display: block;
        width: 100%;
        padding: 10px 0;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        margin-top: 12px;
        margin-bottom: 0;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        outline: none;
        background: #ea3e24;
        color: #fff;
        box-shadow: 0 2px 8px 0 rgba(234, 62, 36, 0.08);
    }

    .buy-now-btn:hover,
    .buy-now-btn:focus,
    .request-demo-btn:hover,
    .request-demo-btn:focus {
        background: #f68c1e;
        color: #fff;
        box-shadow: 0 4px 16px 0 rgba(246, 140, 30, 0.12);
    }

    .right-divider {
        border: none;
        border-top: 2px solid #e0e7ef;
        margin: 32px 0 24px 0;
        width: 100%;
    }

    @media (max-width: 900px) {
        .course-main-section {
            flex-direction: column;
            gap: 24px;
        }

        .course-main-left,
        .course-main-right {
            max-width: 100%;
            flex: 1 1 100%;
            min-width: 0;
            padding: 22px 10px;
        }

        .course-main-right {
            align-self: stretch;
        }
    }

    .right-card.green-card {
        background: linear-gradient(135deg, #eafbf3 0%, #d2f5e3 100%);
    }

    .right-card.green-card .topic-label {
        color: #0d723b;
    }

    .course-description ul {
        list-style: none;
        padding-left: 0;
        margin-left: 0;
    }

    .course-description ul li {
        position: relative;
        padding-left: 2em;
        margin-bottom: 0.6em;
        font-size: 1.05em;
    }

    .course-description ul li:before {
        content: '';
        position: absolute;
        left: 0.5em;
        top: 0.2em;
        width: 1.1em;
        height: 1.1em;
        background: url('data:image/svg+xml;utf8,<svg fill="%231472ba" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M6.173 12.067a1 1 0 0 1-1.414 0l-3.173-3.173a1 1 0 1 1 1.414-1.414l2.466 2.466 5.466-5.466a1 1 0 1 1 1.414 1.414l-6.173 6.173z"/></svg>') no-repeat center center;
        background-size: contain;
        border-radius: 50%;
        display: inline-block;
    }

    .course-main-section.equal-cols {
        display: flex;
        align-items: stretch;
    }

    .course-main-section.equal-cols .course-main-left {
        width: 70%;
        max-width: 70%;
        min-width: 0;
        padding-top: 0;
    }

    .course-main-section.equal-cols .course-main-right {
        width: 30%;
        max-width: 30%;
        min-width: 0;
        align-items: stretch;
    }

    .course-main-section.equal-cols .course-main-right {
        align-items: stretch;
    }

    .course-main-section.equal-cols .right-card.green-card {
        flex: 1 1 auto;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    /* Reduce video height (aspect ratio 40%) */
    .course-video-section .video-wrapper {
        position: relative;
        padding-bottom: 40%;
        height: 0;
        overflow: hidden;
        border-radius: 12px;
        background: #F5F3EF;
        align-items: center !important;
        margin: 0 auto;
        max-width: 1100px;
    }

    .course-video-section {
        max-width: 1290px;
        margin: 48px auto 0 auto;
        padding: 20px 20px 60px 20px !important;
        background-color: #F5F3EF !important;
        border-radius: 12px;
        align-self: center;
        text-align: center;
    }
    .vedio-section-title{
        font-size: 1.6rem;
        font-weight: 500;
        color: #1472ba;
        margin-bottom: 16px;
        margin-top: 24px;
        letter-spacing: 0.2px;
        line-height: 1.2;
        text-align: left;
        padding-bottom: 18px;
    }

    .course-video-section .video-wrapper video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 12px;
        align-items: center;
        justify-content: center;
        display: block;
        margin: 0 auto;
    }

    .course-main-section .right-card {
        min-height: 350px;
        /* Adjust as needed */
    }

    .right-card.split-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 36px;
        height: 100%;
    }

    .course-main-section.equal-cols-first {
        display: flex;
        align-items: center;
    }

    .course-main-section.equal-cols-first .course-main-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-self: auto;
    }

    /* Only apply tick bullets to list items inside .course-description.tick-list */
    .course-description.tick-list ul {
        list-style: none;
        padding-left: 0;
        margin-left: 0;
    }

    .course-description.tick-list ul li {
        position: relative;
        padding-left: 2em;
        margin-bottom: 0.6em;
        font-size: 1.05em;
    }

    .course-description.tick-list ul li:before {
        content: '';
        position: absolute;
        left: 0.5em;
        top: 0.2em;
        width: 1.1em;
        height: 1.1em;
        background: url('data:image/svg+xml;utf8,<svg fill="%231472ba" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M6.173 12.067a1 1 0 0 1-1.414 0l-3.173-3.173a1 1 0 1 1 1.414-1.414l2.466 2.466 5.466-5.466a1 1 0 1 1 1.414 1.414l-6.173 6.173z"/></svg>') no-repeat center center;
        background-size: contain;
        border-radius: 50%;
        display: inline-block;
    }

    .right-card.green-card>* {
        margin-bottom: 18px;
    }

    .right-card.green-card>*:last-child {
        margin-bottom: 0;
    }

    .right-card.green-card .course-description ul li:before {
        background: url('data:image/svg+xml;utf8,<svg fill="%230d723b" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M6.173 12.067a1 1 0 0 1-1.414 0l-3.173-3.173a1 1 0 1 1 1.414-1.414l2.466 2.466 5.466-5.466a1 1 0 1 1 1.414 1.414l-6.173 6.173z"/></svg>') no-repeat center center;
        background-size: contain;
    }

    .screenshots-section {
        max-width: 1290px;
        width: 100%;
        margin: 40px auto 0 auto;
        padding: 0 20px 0 20px;
        background-color: #F5F3EF !important;
        border-radius: 12px !important;
        padding: 20px 20px 32px 20px !important;
    }

    .screenshots-title {
        color: #1472ba;
        font-size: 1.6rem !important;
        font-weight: 500;
        margin-bottom: 18px;
        text-align: left;

    }

    .screenshots-gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        justify-content: space-evenly;
    }

    .screenshot-item {
        flex: 0 1 320px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px 0 rgba(20, 114, 186, 0.10);
        background: #f5f7fa;
        transition: box-shadow 0.2s, transform 0.2s;
        position: relative;
    }

    .screenshot-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        border-radius: 12px;
        transition: transform 0.2s;
    }

    .screenshot-item:hover {
        box-shadow: 0 6px 24px 0 rgba(20, 114, 186, 0.18);
        transform: translateY(-4px) scale(1.03);
    }

    .screenshot-item:hover img {
        transform: scale(1.06);
    }

    @media (max-width: 900px) {
        .screenshots-gallery {
            gap: 12px;
        }

        .screenshot-item {
            flex-basis: 48%;
        }

        .screenshot-item img {
            height: 100px;
        }
    }

    @media (max-width: 600px) {
        .screenshot-item {
            flex-basis: 100%;
        }
    }

    .screenshot-caption {
        font-size: 0.95em;
        color: #555;
        text-align: center;
        margin-top: 6px;
        padding: 0 6px 8px 6px;
    }

    .course-main-section.equal-cols {
        background: #f5f3ef !important;
        border-radius: 18px;
        box-shadow: 0 2px 16px 0 rgba(20, 114, 186, 0.06);
        padding: 32px 20px;
    }

    .course-main-section.equal-cols-first {
        background: #f5f3ef !important;
        border-radius: 18px;
        box-shadow: 0 2px 16px 0 rgba(20, 114, 186, 0.06);
        padding: 32px 20px;
    }

    .buy-now-btn.green-btn {
        background: #0d723b;
        color: #fff;
        box-shadow: 0 2px 8px 0 rgba(13, 114, 59, 0.08);
    }

    .buy-now-btn.green-btn:hover,
    .buy-now-btn.green-btn:focus {
        background: #1bbf6b;
        color: #fff;
        box-shadow: 0 4px 16px 0 rgba(27, 191, 107, 0.12);
    }

    .package-details-section,
    .related-courses-section {
        max-width: 1290px;
        width: 100%;
        margin: 48px auto 0 auto;
        padding: 20px;
        border-radius: 18px;
    }

    .package-details-content,
    .related-courses-content {
        background: transparent !important;
        border-radius: 14px;
        padding: 0px 24px !important;
    }

    .related-courses-carousel {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        padding-bottom: 8px;
        scroll-snap-type: x mandatory;
    }

    .related-course-card {
        min-width: 240px;
        background: #fff;
        border-radius: 12px;
        padding-bottom: 16px !important;
        flex: 0 0 auto;
        scroll-snap-align: start;
        text-align: center;
        transition: box-shadow 0.2s, transform 0.2s;
    }

    .related-course-card:hover {
        box-shadow: 0 6px 24px 0 rgba(20, 114, 186, 0.18);
        transform: translateY(-4px) scale(1.03);
    }

    .related-course-thumb img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .related-course-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1472ba;
        margin-top: 8px;
    }

    .package-and-related-section {
        max-width: 1290px;
        width: 100%;
        margin: 48px auto 0 auto;
        padding: 20px;
        background: linear-gradient(135deg, #f0f7ff 0%, #eaf6fb 100%);
        border-radius: 18px;
        box-shadow: 0 2px 16px 0 rgba(20, 114, 186, 0.06);
    }

    .package-and-related-section .package-details-content,
    .package-and-related-section .related-courses-content {
        background: transparent;
        border-radius: 14px;
        box-shadow: none;
        padding: 0px !important;
        margin-top: 18px;
    }

    .package-and-related-section .related-courses-carousel {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        padding-bottom: 8px;
        scroll-snap-type: x mandatory;
    }

    .package-and-related-section .related-course-card {
        min-width: 240px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 12px 0 rgba(20, 114, 186, 0.10);
        padding: 16px;
        flex: 0 0 auto;
        scroll-snap-align: start;
        text-align: center;
        transition: box-shadow 0.2s, transform 0.2s;
    }

    .package-and-related-section .related-course-card:hover {
        box-shadow: 0 6px 24px 0 rgba(20, 114, 186, 0.18);
        transform: translateY(-4px) scale(1.03);
    }

    .package-and-related-section .related-course-thumb img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .package-and-related-section .related-course-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1472ba;
        margin-top: 8px;
    }

    .package-and-related-section .tick-list {
        list-style: none;
        padding-left: 0;
        margin-left: 0;
        margin-top: 12px;
    }

    .package-and-related-section .tick-list li {
        position: relative;
        padding-left: 2em;
        margin-bottom: 0.6em;
        font-size: 1.05em;
    }

    .package-and-related-section .tick-list li:before {
        content: '';
        position: absolute;
        left: 0.5em;
        top: 0.2em;
        width: 1.1em;
        height: 1.1em;
        background: url('data:image/svg+xml;utf8,<svg fill="%231472ba" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M6.173 12.067a1 1 0 0 1-1.414 0l-3.173-3.173a1 1 0 1 1 1.414-1.414l2.466 2.466 5.466-5.466a1 1 0 1 1 1.414 1.414l-6.173 6.173z"/></svg>') no-repeat center center;
        background-size: contain;
        border-radius: 50%;
        display: inline-block;
    }

    .related-courses-carousel-outer {
        display: flex;
        align-items: center;
        position: relative;
        width: 100%;
        margin: 0 auto;
    }

    .related-courses-arrow {
        background: #ffffff !important;
        color: #1472ba;
        border: 2px solid #1472ba;
        border-radius: 50%;
        width: 48px !important;
        height: 48px !important;
        min-width: 48px !important;
        min-height: 48px !important;
        max-width: 48px !important;
        max-height: 48px !important;
        aspect-ratio: 1 / 1;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
        margin: 0 8px;
        padding: 0;
        line-height: 1;
        box-sizing: border-box;
        transition: background 0.2s, color 0.2s, border-color 0.2s, box-shadow 0.2s;
        box-shadow: none;
    }

    .related-courses-arrow svg {
        display: block;
        width: 24px;
        height: 24px;
    }

    .related-courses-arrow:hover {
        background: #eaf6fb;
        color: #0d723b;
        border-color: #0d723b;
        box-shadow: 0 2px 8px 0 rgba(20, 114, 186, 0.10);
    }

    .related-courses-carousel {
        overflow: hidden;
        flex: 1 1 auto;
        padding-top: 32px !important;
        padding: 0px 24px 0px 24px;
    }

    .related-courses-slides {
        display: flex;
        gap: 24px;
        transition: transform 0.6s cubic-bezier(.4, 0, .2, 1);
        will-change: transform;
    }

    .related-course-card {
        width: 328px;
        min-width: 328px;
        max-width: 328px;
        margin-right: 0;
        /* or adjust gap in parent only */
    }

    .related-course-card:hover {
        box-shadow: 0 6px 24px 0 rgba(20, 114, 186, 0.18);
        transform: translateY(-4px) scale(1.03);
    }

    .related-course-thumb img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .related-course-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1472ba;
        margin-top: 8px;
    }

    .related-courses-section {
        max-width: 1290px;
        width: 100%;
        margin: 48px auto 0 auto;
        padding: 32px 20px 32px 20px;
        border-radius: 18px;
        box-shadow: 0 2px 16px 0 rgba(20, 114, 186, 0.06);
        background-color: #F5F3EF !important;
    }

    .related-course-card {
        min-width: 300px;
        max-width: 300px;
        min-height: 250px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 12px 0 rgba(20, 114, 186, 0.10);
        padding: 0px;
        flex: 0 0 auto;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    .related-course-thumb img {
        width: 100%;
        height: 70%;
        max-height: 70%;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
        margin-bottom: 0;
        flex-shrink: 0;
    }

    .related-course-title {
        padding: 12px 8px 0 8px;
        flex: 1 1 auto;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }
.related-course-section-title
{        font-size: 1.6rem;
        font-weight: 500;
        color: #1472ba;
        margin-bottom: 16px;
        margin-top: 24px;
        letter-spacing: 0.2px;
        line-height: 1.2;
        text-align: center;

}.lead-section {
    max-width: 1290px;
    margin: 48px auto 0 auto;
    padding: 32px 0 24px 0;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    align-items: center;
    background: #F5F3EF !important;
    border-radius: 16px;
    box-shadow: 0 2px 16px 0 rgba(20, 114, 186, 0.06);
    justify-content: center;
}

.lead-left {
    flex: 1 1 380px;
    min-width: 320px;
    max-width: 480px;
    padding: 32px 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.lead-right {
    display: flex; 
    flex-direction: column;
    justify-content: center; 
    align-items: center;    
    padding: 24px; 
    background-color: #ffffff !important;
    border-radius: 12px;
    box-shadow: 0 2px 16px 0 rgba(20, 114, 186, 0.06);

}



    .lead-title {
        font-size: 1.6rem;
        color: #1472ba;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .lead-desc {
        margin-bottom: 0;
        color: #444;
        font-size: 1.12rem;
        line-height: 1.7;
        max-width: 480px;
    }

    @media (max-width: 900px) {
        .lead-section {
            flex-direction: column;
            gap: 24px;
            padding: 24px 0 16px 0;
        }

        .lead-left,
        .lead-right {
            max-width: 100%;
            min-width: 0;
            padding: 22px 10px;
        }

        .lead-right {
            align-items: center;
            text-align: center;
        }
    }

    /* --- FAQ Section Enhancements --- */
    .faq-section-bg {
        background: linear-gradient(135deg, #f5f3ef 60%, #eaf6fb 100%);
        padding: 0 0 48px 0;
    }
    .course-faq-section {
        max-width: 1290px;
        margin: 48px auto 0 auto;
        padding: 40px 24px 32px 24px;
        background: transparent;
        border-radius: 18px;
        box-shadow: 0 6px 32px 0 rgba(20, 114, 186, 0.10);
        text-align: center;
    }
    .faq-title, .course-faq-section .course-section-title {
        font-size: 2rem;
        color: #1472ba;
        font-weight: 800;
        margin-bottom: 32px;
        text-align: center;
        position: relative;
        display: inline-block;
    }
    .faq-title::after, .course-faq-section .course-section-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 4px;
        background: #1472ba;
        border-radius: 2px;
        margin: 12px auto 0 auto;
    }
    .faq-accordion {
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .faq-item {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 12px 0 rgba(20, 114, 186, 0.08);
        margin-bottom: 24px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        border-left: 5px solid transparent;
        transition: box-shadow 0.2s, border 0.2s, transform 0.2s;
        position: relative;
    }
    .faq-item.active {
        border-left: 5px solid #1472ba;
        box-shadow: 0 6px 24px 0 rgba(20, 114, 186, 0.16);
        transform: translateY(-2px) scale(1.01);
    }
    .faq-item:hover {
        box-shadow: 0 8px 32px 0 rgba(20, 114, 186, 0.18);
        transform: translateY(-2px) scale(1.01);
    }
    .faq-question-btn {
        width: 100%;
        background: transparent !important;
        border: none;
        outline: none;
        text-align: left;
        padding: 22px 24px 22px 24px;
        font-size: 1.18rem;
        font-weight: 700;
        color: #1472ba;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 14px;
        margin-bottom: 0;
        box-shadow: none;
        transition: color 0.2s, background 0.2s;
        position: relative;
        z-index: 2;
    }
    .faq-question-btn:hover,
    .faq-question-btn[aria-expanded="true"] {
        background: #f5f3ef;
        color: #0d723b;
    }
    .faq-item.active .faq-question-btn {
        color: #0d723b;
        background: #f5f3ef;
    }
    .faq-arrow {
        display: flex;
        align-items: center;
        margin-left: 16px;
        transition: transform 0.3s cubic-bezier(.4,0,.2,1);
    }
    .faq-question-btn[aria-expanded="true"] .faq-arrow {
        transform: rotate(180deg);
    }
    .faq-arrow svg {
        width: 24px;
        height: 24px;
        fill: #1472ba;
        transition: fill 0.2s;
    }
    .faq-question-btn[aria-expanded="true"] .faq-arrow svg {
        fill: #0d723b;
    }
    .faq-answer-panel {
        padding: 0 24px 0 24px;
        color: #333;
        font-size: 1.12rem;
        line-height: 1.8;
        background: none;
        text-align: left;
        width: 100%;
        max-height: 0;
        opacity: 0;
        min-height: 0;
        overflow: hidden;
        transition: max-height 0.45s cubic-bezier(.4,0,.2,1), opacity 0.35s cubic-bezier(.4,0,.2,1), padding-bottom 0.3s, padding-top 0.3s;
    }
    .faq-answer-panel[hidden] {
        max-height: 0;
        opacity: 0;
        padding-bottom: 0;
        transition: max-height 0.3s, opacity 0.2s, padding-bottom 0.2s;
    }
    .faq-item.active .faq-answer-panel {
        max-height: 1000px; /* Increase if you expect very long answers */
        opacity: 1;
        min-height: 32px;
        padding-bottom: 18px;
        padding-top: 8px;
        color: #333;
        transition: max-height 0.45s cubic-bezier(.4,0,.2,1), opacity 0.35s cubic-bezier(.4,0,.2,1), padding-bottom 0.3s, padding-top 0.3s;
    }
    @keyframes fadeInSlide {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 700px) {
        .course-faq-section {
            padding: 24px 4vw 16px 4vw;
        }
        .faq-accordion {
            max-width: 100%;
        }
        .faq-item {
            border-radius: 10px;
            margin-bottom: 16px;
        }
        .faq-question-btn {
            font-size: 1.05rem;
            padding: 16px 12px 16px 16px;
        }
        .faq-answer-panel {
            padding: 0 12px 12px 16px;
            font-size: 1rem;
        }
    }

    .testimonial-item {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px 0 rgba(20, 114, 186, 0.08);
        padding: 36px 28px 28px 28px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 320px;
        max-width: 400px;
        width: 100%;
    }
.testimonial-section-title{
    font-size: 1.6rem;
        font-weight: 500;
        color: #1472ba;
        margin-bottom: 16px;
        margin-top: 24px;
        letter-spacing: 0.2px;
        line-height: 1.2;
        text-align: center;
        padding-bottom: 32px;
}
    .testimonial-photo {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-bottom: 18px;
        box-shadow: 0 2px 8px rgba(20, 114, 186, 0.10);
    }

    .testimonial-content {
        font-style: italic;
        color: #333;
        font-size: 1.08rem;
        margin: 0 0 18px 0;
        text-align: center;
        line-height: 1.6;
    }

    .testimonial-author {
        margin-top: auto;
        font-weight: 600;
        color: #1472ba;
        text-align: center;
    }

    .course-testimonials {
        max-width: 1290px;
        margin: 48px auto 0 auto;
        padding: 20px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 32px;
        width: 100%;
        justify-items: center;
    }

    .faq-section-bg {
        background: none;
    }
</style>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        $course_summary = get_field('course_summary');
        $course_description = get_field('course_description');
        $why_this_course = get_field('why_this_course');
        $laws_complied = get_field('laws_complied');
        $individual_price = get_field('individual_price');
?>
        <section class="course-banner">
            <div class="container">
                <div class="banner-content">
                    <h1 class="course-title"><?php the_title(); ?></h1>
                    <?php if ($course_summary) : ?>
                        <p class="course-summary"><?php echo esc_html($course_summary); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="course-main-section equal-cols-first">
            <!-- Left Column -->
            <div class="course-main-left">
                <?php if ($course_description) : ?>
                    <div>
                        <h2 class="course-section-title">Course Description</h2>
                        <div class="course-description tick-list"><?php echo wp_kses_post($course_description); ?></div>
                    </div>
                <?php endif; ?>
                <?php if ($why_this_course) : ?>
                    <div>
                        <h3 class="course-section-title">Why this Course?</h3>
                        <div class="course-description tick-list"><?php echo wp_kses_post($why_this_course); ?></div>
                    </div>
                <?php endif; ?>
                <?php if ($laws_complied) : ?>
                    <div>
                        <h3 class="course-section-title">Laws that are complied with this course</h3>
                        <div class="course-description tick-list"><?php echo wp_kses_post($laws_complied); ?></div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Right Column -->
            <div class="course-main-right">
                <div class="right-card split-card ">
                    <div>
                        <div class="topic-label">Individuals</div>
                        <?php if ($individual_price) : ?>
                            <div class="price-value"><strong>Price:</strong><span class="price-amount"> $<?php echo esc_html($individual_price); ?></span></div>
                        <?php endif; ?>
                        <button class="buy-now-btn">Buy Now</button>
                    </div>
                    <hr class="right-divider" />
                    <div>
                        <div class="topic-label">Corporate</div>
                        <button class="request-demo-btn">Request a Demo / Quote</button>
                    </div>
                </div>
            </div>
        </section>
        <?php
        // Demo Video Section (after main content)
        $demo_video = get_field('demo_video'); // ACF field for video URL or file
        if ($demo_video) : ?>
            <section class="course-video-section">
                <h2 class="vedio-section-title">Course Demo Video</h2>
                <div class="video-wrapper">
                    <video src="<?php echo esc_url($demo_video); ?>" controls></video>
                </div>
            </section>
        <?php endif; ?>
        <?php
        // Two-column section: Course Objectives/Topics and Specifications
        $course_objectives = get_field('course_objectives');
        $course_topics = get_field('course_topics');
        $course_duration = get_field('course_duration');
        $training_level = get_field('training_level');
        $target_audience = get_field('target_audience');
        $all_employees = get_field('all_employees');
        $ciso = get_field('ciso');
        if ($course_objectives || $course_topics || $course_specifications || $course_duration || $training_level || $target_audience || $all_employees || $ciso) : ?>
            <section class="course-main-section equal-cols" style="margin-top: 48px;">
                <!-- Left Column -->
                <div class="course-main-left">
                    <?php if ($course_objectives) : ?>
                        <div>
                            <h2 class="course-section-title">Course Objectives</h2>
                            <div class="course-description tick-list"><?php echo wp_kses_post($course_objectives); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if ($course_topics) : ?>
                        <div>
                            <h2 class="course-section-title">Course Topics</h2>
                            <div class="course-description tick-list"><?php echo wp_kses_post($course_topics); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Right Column -->
                <div class="course-main-right">
                    <div class="right-card green-card">
                        <div class="topic-label">Course Specifications</div>
                        <?php if ($course_duration) : ?>
                            <div class="course-description"><strong>Duration:</strong> <?php echo esc_html($course_duration); ?></div>
                        <?php endif; ?>
                        <?php if ($training_level) : ?>
                            <div class="course-description"><strong>Training Level:</strong> <?php echo esc_html($training_level); ?></div>
                        <?php endif; ?>
                        <?php if ($target_audience) : ?>
                            <div class="course-description"><strong>Target Audience:</strong> <?php echo wp_kses_post($target_audience); ?></div>
                        <?php endif; ?>
                        <?php if ($all_employees !== null && $all_employees !== '') : ?>
                            <div class="course-description"><strong>All Employees:</strong> <?php echo $all_employees ? 'Yes' : 'No'; ?></div>
                        <?php endif; ?>
                        <?php if ($ciso !== null && $ciso !== '') : ?>
                            <div class="course-description"><strong>CISO:</strong> <?php echo $ciso ? 'Yes' : 'No'; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php
        $screenshots = [];
        for ($i = 1; $i <= 6; $i++) { // Adjust 6 to however many fields you have
            $img = get_field("screenshot_$i");
            if ($img) {
                $screenshots[] = $img;
            }
        }
        if ($screenshots) : ?>
            <section class="screenshots-section">
                <h2 class="screenshots-title">Course Screenshots</h2>
                <div class="screenshots-gallery">
                    <?php foreach ($screenshots as $screenshot) : ?>
                        <div class="screenshot-item">
                            <img src="<?php echo esc_url($screenshot['url']); ?>" alt="<?php echo esc_attr($screenshot['alt'] ?: 'Course Screenshot'); ?>" />
                            <?php if (!empty($screenshot['caption'])): ?>
                                <div class="screenshot-caption"><?php echo esc_html($screenshot['caption']); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php
        $package_details = get_field('package_details');
        $show_package = !empty($package_details);
        $current_id = get_the_ID();
        $categories = get_the_terms($current_id, 'course_category');
        $category_ids = [];
        if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $cat) {
                $category_ids[] = $cat->term_id;
            }
        }
        $related_args = array(
            'post_type' => 'lp_course',
            'posts_per_page' => 12,
            'post__not_in' => array($current_id),
            'ignore_sticky_posts' => 1,
            'tax_query' => array(),
        );
        if (!empty($category_ids)) {
            $related_args['tax_query'][] = array(
                'taxonomy' => 'course_category',
                'field'    => 'term_id',
                'terms'    => $category_ids,
            );
        }
        $related_query = new WP_Query($related_args);
        if (!$related_query->have_posts()) {
            $recent_args = array(
                'post_type' => 'lp_course',
                'posts_per_page' => 12,
                'post__not_in' => array($current_id),
                'ignore_sticky_posts' => 1,
            );
            $related_query = new WP_Query($recent_args);
        }
        if ($show_package) : ?>
            <section class="package-and-related-section">
                <h2 class="course-section-title">Package Details</h2>
                <div class="package-details-content">
                    <?php echo wp_kses_post($package_details); ?>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($related_query->have_posts()) : ?>
            <section class="related-courses-section">
                <h2 class="related-course-section-title">Related Courses</h2>
                <div class="related-courses-content">
                    <div class="related-courses-carousel-outer">
                        <button class="related-courses-arrow left" id="relatedPrev" aria-label="Previous">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5 19L9.5 12L15.5 5" stroke="#1472ba" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div class="related-courses-carousel" id="relatedCoursesCarousel">
                            <div class="related-courses-slides">
                                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                    <div class="related-course-card">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="related-course-thumb"><?php the_post_thumbnail('medium'); ?></div>
                                            <?php endif; ?>
                                            <div class="related-course-title"><?php the_title(); ?></div>
                                        </a>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <button class="related-courses-arrow right" id="relatedNext" aria-label="Next">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 5L14.5 12L8.5 19" stroke="#1472ba" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="lead-section">
            <div class="lead-left">
                <?php echo do_shortcode('[custom_posh_form]'); ?>
                <script>
                    // UTM and location tracking for the form
                    document.addEventListener('DOMContentLoaded', function() {
                        var form = document.querySelector('.lead-left form');
                        if (!form) return;
                        // Add hidden field for location
                        var locationInput = document.createElement('input');
                        locationInput.type = 'hidden';
                        locationInput.name = 'lead_location';
                        locationInput.value = 'single-course-testimonial-lead';
                        form.appendChild(locationInput);
                        // Add hidden field for course title
                        var courseTitleInput = document.createElement('input');
                        courseTitleInput.type = 'hidden';
                        courseTitleInput.name = 'course_title';
                        courseTitleInput.value = document.title.replace(' – SucceedLearn', ''); // Adjust if your site title is different
                        form.appendChild(courseTitleInput);
                        // Add hidden field for course permalink
                        var coursePermalinkInput = document.createElement('input');
                        coursePermalinkInput.type = 'hidden';
                        coursePermalinkInput.name = 'course_permalink';
                        coursePermalinkInput.value = window.location.href;
                        form.appendChild(coursePermalinkInput);
                        // Add UTM fields if present in URL
                        var params = new URLSearchParams(window.location.search);
                        ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'].forEach(function(utm) {
                            if (params.has(utm)) {
                                var input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = utm;
                                input.value = params.get(utm);
                                form.appendChild(input);
                            }
                        });
                    });
                </script>
            </div>
            <div class="lead-right">
                <h2 class="lead-title">Get More Info or Request a Demo</h2>
                <p class="lead-desc">We’d love to hear from you! Please fill out the form below, and a member of our team will get back to you as soon as possible. Whether you have a question, need more information about our services, or require assistance, we’re here to help. Your inquiry is important to us, and we aim to provide you with the best possible support.</p>
            </div>
        </section>

        <?php

        // Query to fetch latest 3 testimonials
        $args = array(
            'post_type'      => 'testimonial',
            'posts_per_page' => 3, // Change number as needed
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        $testimonial_query = new WP_Query($args);
        if ($testimonial_query->have_posts()): ?>
            <section class="course-testimonials">
                <h2 class="testimonial-section-title">What Our Students Say</h2>
                <div class="testimonials-grid">
                    <?php while ($testimonial_query->have_posts()): $testimonial_query->the_post();
                        // Get ACF fields
                        $author_name_designation = get_field('author_name_designation');
                        $author_photo = get_field('author_photo');
                        $testimonial_content = get_field('testimonial_content');
                        $author_photo_url = $author_photo ? $author_photo['url'] : '';
                    ?>
                        <div class="testimonial-item">
                            <?php if ($author_photo_url): ?>
                                <img src="<?php echo esc_url($author_photo_url); ?>" alt="<?php echo esc_attr($author_name_designation); ?>" class="testimonial-photo">
                            <?php endif; ?>
                            <blockquote class="testimonial-content">“<?php echo esc_html($testimonial_content); ?>”</blockquote>
                            <p class="testimonial-author">
                                <?php echo esc_html($author_name_designation); ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif;
        wp_reset_postdata(); ?>

        <?php
        // After testimonials, show FAQ section if any FAQ fields are filled
        $faqs = [];
        for ($i = 1; $i <= 7; $i++) {
            $title = get_field('faq_' . $i . '_title');
            $content = get_field('faq_' . $i . '_content');
            if ($title || $content) {
                $faqs[] = [
                    'title' => $title,
                    'content' => $content
                ];
            }
        }
        if (!empty($faqs)) : ?>
            <section class="faq-section-bg">
                <div class="course-faq-section">
                    <h2 class="course-section-title">Frequently Asked Questions</h2>
                    <div class="faq-accordion" id="faqAccordion">
                        <?php foreach ($faqs as $idx => $faq): ?>
                            <div class="faq-item<?php echo $idx === 0 ? ' active' : ''; ?>">
                                <button class="faq-question-btn" aria-expanded="<?php echo $idx === 0 ? 'true' : 'false'; ?>" aria-controls="faq-answer-<?php echo $idx; ?>" id="faq-question-<?php echo $idx; ?>">
                                    <span><?php echo esc_html($faq['title']); ?></span>
                                    <span class="faq-arrow" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 10l5 5 5-5"/></svg></span>
                                </button>
                                <div class="faq-answer-panel" id="faq-answer-<?php echo $idx; ?>" role="region" aria-labelledby="faq-question-<?php echo $idx; ?>">
                                    <?php echo wp_kses_post(nl2br($faq['content'])); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var buttons = document.querySelectorAll('.faq-question-btn');
                    buttons.forEach(function(btn, idx) {
                        btn.addEventListener('click', function() {
                            var expanded = btn.getAttribute('aria-expanded') === 'true';
                            // Close all
                            buttons.forEach(function(b) {
                                b.setAttribute('aria-expanded', 'false');
                                b.parentElement.classList.remove('active');
                            });
                            // Open this one if it was not already open
                            if (!expanded) {
                                btn.setAttribute('aria-expanded', 'true');
                                btn.parentElement.classList.add('active');
                            }
                        });
                    });
                    // Ensure first is open on load only
                    if (buttons.length > 0) {
                        buttons[0].setAttribute('aria-expanded', 'true');
                        buttons[0].parentElement.classList.add('active');
                    }
                });
            </script>
        <?php endif; ?>

<?php
    endwhile;
endif;
get_footer();
?>
<script>
    (function() {
        var outer = document.querySelector('.related-courses-carousel-outer');
        if (!outer) return;
        var slides = outer.querySelector('.related-courses-slides');
        var cards = slides.querySelectorAll('.related-course-card');
        var prev = outer.querySelector('#relatedPrev');
        var next = outer.querySelector('#relatedNext');
        var visible = 3;
        var cardWidth = outer.querySelector('.related-course-card') ? outer.querySelector('.related-course-card').offsetWidth + 24 : 328;
        if (window.innerWidth < 900) {
            visible = 1;
            cardWidth = outer.querySelector('.related-course-card') ? outer.querySelector('.related-course-card').offsetWidth + 12 : 320;
        }
        var total = cards.length;
        // If not enough courses to scroll, show statically and hide arrows
        if (total <= visible) {
            slides.style.transition = 'none';
            slides.style.transform = 'translateX(0px)';
            if (prev) prev.style.display = 'none';
            if (next) next.style.display = 'none';
            return;
        } else {
            if (prev) prev.style.display = '';
            if (next) next.style.display = '';
        }
        // Remove any previous clones (if resizing)
        var clones = slides.querySelectorAll('.clone');
        clones.forEach(function(clone) {
            clone.remove();
        });
        // Clone last N to the start, first N to the end
        for (var i = 0; i < visible; i++) {
            if (cards[i]) {
                var cloneEnd = cards[i].cloneNode(true);
                cloneEnd.classList.add('clone');
                slides.appendChild(cloneEnd);
            }
            if (cards[total - 1 - i]) {
                var cloneStart = cards[total - 1 - i].cloneNode(true);
                cloneStart.classList.add('clone');
                slides.insertBefore(cloneStart, slides.firstChild);
            }
        }
        // Update cards and total after cloning
        cards = slides.querySelectorAll('.related-course-card');
        total = cards.length - 2 * visible;
        var current = visible; // Start at first real slide
        function goTo(idx, animate) {
            if (typeof animate === 'undefined') animate = true;
            if (animate) {
                slides.style.transition = 'transform 0.6s cubic-bezier(.4,0,.2,1)';
            } else {
                slides.style.transition = 'none';
            }
            slides.style.transform = 'translateX(' + (-idx * cardWidth) + 'px)';
            current = idx;
        }
        // Autoplay seamless infinite loop
        var autoplay = setInterval(function() {
            goTo(current + 1, true);
        }, 3500);
        outer.addEventListener('mouseenter', function() {
            clearInterval(autoplay);
        });
        outer.addEventListener('mouseleave', function() {
            autoplay = setInterval(function() {
                goTo(current + 1, true);
            }, 3500);
        });
        if (prev && next) {
            prev.addEventListener('click', function() {
                goTo(current - 1, true);
            });
            next.addEventListener('click', function() {
                goTo(current + 1, true);
            });
        }
        // Handle transition end for seamless looping
        slides.addEventListener('transitionend', function() {
            if (current < visible) {
                // Jump to end real slide
                goTo(total + current, false);
            } else if (current >= total + visible) {
                // Jump to start real slide
                goTo(current - total, false);
            }
        });
        // Responsive: recalc cardWidth and reset on resize
        function resetCarousel() {
            if (window.innerWidth < 900) {
                visible = 1;
                cardWidth = outer.querySelector('.related-course-card') ? outer.querySelector('.related-course-card').offsetWidth + 12 : 320;
            } else {
                visible = 3;
                cardWidth = outer.querySelector('.related-course-card') ? outer.querySelector('.related-course-card').offsetWidth + 24 : 328;
            }
            // Remove all clones and re-clone
            var allClones = slides.querySelectorAll('.clone');
            allClones.forEach(function(clone) {
                clone.remove();
            });
            // Re-clone
            var realCards = slides.querySelectorAll('.related-course-card:not(.clone)');
            total = realCards.length;
            if (total <= visible) {
                slides.style.transition = 'none';
                slides.style.transform = 'translateX(0px)';
                if (prev) prev.style.display = 'none';
                if (next) next.style.display = 'none';
                return;
            } else {
                if (prev) prev.style.display = '';
                if (next) next.style.display = '';
            }
            for (var i = 0; i < visible; i++) {
                if (realCards[i]) {
                    var cloneEnd = realCards[i].cloneNode(true);
                    cloneEnd.classList.add('clone');
                    slides.appendChild(cloneEnd);
                }
                if (realCards[total - 1 - i]) {
                    var cloneStart = realCards[total - 1 - i].cloneNode(true);
                    cloneStart.classList.add('clone');
                    slides.insertBefore(cloneStart, slides.firstChild);
                }
            }
            cards = slides.querySelectorAll('.related-course-card');
            total = cards.length - 2 * visible;
            current = visible;
            goTo(current, false);
        }
        window.addEventListener('resize', resetCarousel);
        // Initial position
        goTo(current, false);
    })();
</script>