<amp-sidebar id="sidebar" layout="nodisplay" side="right" class="sidebar-main">
  <div class="sidebar-header" on="tap:sidebar.close" role="button" tabindex="0">×</div>
  
  <!-- Home -->
  <div class="menu-section menu-home">
    <a href="<?php echo succeedlearn_get_amp_link(47613); ?>" class="menu-link menu-link-home">Home</a>
  </div>
  
  <!-- By Solution -->
  <div class="menu-section menu-solutions">
    <amp-accordion disable-session-states class="accordion accordion-solutions">
      <section class="menu-item-section section-solutions">
        <div class="menu-title title-solutions">By Solution</div>
        <div class="submenu submenu-solutions">
          <a href="<?php echo succeedlearn_get_amp_link(37337); ?>" class="submenu-link">Security Awareness</a>
          <a href="<?php echo succeedlearn_get_amp_link(43515); ?>" class="submenu-link">HR Compliance Suite</a>
          <a href="<?php echo succeedlearn_get_amp_link(50893); ?>" class="submenu-link">Financial Crime Prevention</a>
          <a href="<?php echo succeedlearn_get_amp_link(50712); ?>" class="submenu-link">Workplace Health & Safety </a>
          <a href="<?php echo succeedlearn_get_amp_link(51624); ?>" class="submenu-link">Code of Conduct</a>
		  <a href="<?php echo succeedlearn_get_amp_link(50754); ?>" class="submenu-link">Private Equity & Venture Capital Suite</a>
		  <a href="<?php echo succeedlearn_get_amp_link(53448);?>" class="submenu-link">India ESG Awareness</a>
        </div>
      </section>
    </amp-accordion>
  </div>

  <!-- By Courses -->
  <div class="menu-section menu-courses">
    <a href="<?php echo succeedlearn_get_amp_link(54398); ?>" class="menu-link menu-link-courses">By Courses</a>
  </div>
  
  <!-- About Us -->
  <div class="menu-section menu-about">
    <amp-accordion disable-session-states class="accordion accordion-about">
      <section class="menu-item-section section-about">
        <div class="menu-title title-about">Who We Are?</div>
        <div class="submenu submenu-about">
		  <a href="<?php echo succeedlearn_get_amp_link(87); ?>" class="submenu-link">Contact Us</a>
          <a href="<?php echo succeedlearn_get_amp_link(2901); ?>" class="submenu-link">About Us</a>
        </div>
      </section>
    </amp-accordion>
  </div>

  <!-- CTA Button -->
  <div class="menu-section menu-cta">
    <a href="<?php echo succeedlearn_get_amp_link(87); ?>" class="cta-btn btn-request-demo">Request Demo</a>
  </div>

  <!-- Contact Info -->
  <div class="menu-section menu-contact">
    <p class="contact-email">
      <a href="mailto:Sales@succeedtech.com" class="contact-link">Sales@succeedtech.com</a>
    </p>
    <p class="hidden-phone contact-phone">Phone: +91 98765 43210</p>
  </div>
</amp-sidebar>

<amp-state id="scrollProgress">
  <script type="application/json">
    {"p": 0}
  </script>
</amp-state>

<!-- Scroll Target -->
<div id="top"></div>

<!-- Header -->
<header class="site-header header-main">
  <div class="header-logo">
    <a href="<?php echo succeedlearn_get_amp_link(47613); ?>" class="logo-link">
      <amp-img
        src="https://succeedlearn.com/wp-content/uploads/2025/11/logo.webp"
        width="120"
        height="40"
        layout="fixed"
        alt="SucceedLearn Logo"
        class="logo-img">
      </amp-img>
    </a>
  </div>
  <div
  role="button"
  tabindex="0"
  aria-label="Open menu"
  class="menu-icon icon-toggle"
  on="tap:sidebar.toggle">
  ☰
</div>

</header>

<!-- Global bottom progress bar -->
<div class="global-progress-bar" aria-hidden="true">
  <span class="global-progress-fill"></span>
</div>

<!-- Scroll to Top Button -->
<button
  id="scrollTopBtn"
  aria-label="Scroll to top"
  class="scroll-top-btn progress-step-0"
  [class]="'scroll-top-btn progress-step-' + (scrollProgress.p > 0.8 ? 4 : scrollProgress.p > 0.6 ? 3 : scrollProgress.p > 0.4 ? 2 : scrollProgress.p > 0.2 ? 1 : 0)"
  on="tap:top.scrollTo(duration=500)">
  <svg class="progress-square" width="50" height="50" aria-hidden="true">
    <rect class="progress-square__rect" x="2" y="2" width="46" height="46" rx="6" ry="6"></rect>
  </svg>
  <span class="arrow-up" aria-hidden="true"></span>
</button>


