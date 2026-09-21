<amp-consent id="cookie-consent" layout="nodisplay">
  <script type="application/json">
  {
    "consentInstanceId": "cookie-consent-v1",
    "consentRequired": true,
    "promptUI": "cookie-consent-ui"
  }
  </script>

  <!-- Consent UI -->
  <div id="cookie-consent-ui" style="
      position:fixed;
      bottom:0;
      left:0;
      width:100%;
      background:#fff;
      box-shadow:0 -4px 12px rgba(0,0,0,0.15);
      padding:20px 15px;
      display:flex;
      flex-direction:column;
      justify-content:center;
      align-items:center;
      font-family:Arial, sans-serif;
      font-size:14px;
      color:#333;
      z-index:9999;
    ">

    <div style="margin-bottom:15px; text-align:center; max-width:500px;">
      <h3 style="margin:0 0 8px; font-size:16px; color:#000;">
        We value your privacy
      </h3>

      <p style="margin:0; line-height:1.5;">
        We use cookies to enhance your browsing experience, serve personalised ads
        or content, and analyse our traffic.
        By clicking <strong>“Accept All”</strong>, you consent to our use of cookies.
        <a href="/cookie-policy"
           style="color:#0073e6; text-decoration:none;">
          Cookie Policy
        </a>.
      </p>
    </div>

    <!-- Buttons -->
    <div style="display:flex; flex-direction:column; gap:10px; width:200px;">

      <button on="tap:cookie-consent.accept"
        style="
          background:#0073e6;
          color:#fff;
          border:none;
          padding:10px 20px;
          border-radius:5px;
          font-weight:600;
          width:100%;
        ">
        Accept All
      </button>

      <button on="tap:cookie-consent.reject"
        style="
          background:#ccc;
          color:#000;
          border:none;
          padding:10px 20px;
          border-radius:5px;
          font-weight:600;
          width:100%;
        ">
        Reject All
      </button>

    </div>

  </div>
</amp-consent>
