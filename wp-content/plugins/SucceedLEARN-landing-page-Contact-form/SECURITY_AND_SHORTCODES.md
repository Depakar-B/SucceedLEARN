# Security Features & Shortcodes Documentation

## Shortcodes

### Main Form Shortcode
```
[succeed_landing_page_form]
```
**Usage:** Place this shortcode anywhere on your WordPress page or post to display the contact form.

**Example:**
```
Add the form to your landing page by using: [succeed_landing_page_form]
```

---

## Security Features

The form includes multiple layers of security protection:

### 1. **WordPress Nonce Verification**
- **Location:** Line 722
- **Purpose:** Prevents CSRF (Cross-Site Request Forgery) attacks
- **Implementation:** Verifies that form submissions come from the actual form page
- **Status:** ✅ Always Active

### 2. **Honeypot Field**
- **Location:** Lines 245-248 (Standard), 372-375 (AMP)
- **Purpose:** Catches automated bots that fill all form fields
- **Implementation:** Hidden field named "website" that users can't see but bots will fill
- **Status:** ✅ Always Active

### 3. **Math Captcha (Security Question)**
- **Location:** Lines 293-306 (Standard), 425-438 (AMP)
- **Purpose:** Requires human calculation to prevent bot submissions
- **Implementation:** Random addition problem (e.g., "What is 5 + 3?")
- **Status:** ✅ Always Active

### 4. **Time-Based Validation**
- **Location:** Lines 243, 550-561
- **Purpose:** Prevents instant bot submissions
- **Implementation:** 
  - Form must be visible for at least 5 seconds before submission
  - Form expires after 1 hour (prevents stale submissions)
- **Status:** ✅ Always Active

### 5. **User-Agent Validation**
- **Location:** Lines 518-532
- **Purpose:** Blocks known bot user agents
- **Implementation:** 
  - Checks for missing or suspicious User-Agent strings
  - Blocks common bot patterns (bot, crawler, spider, scraper, curl, wget, python, java, php)
  - Allows Googlebot for legitimate indexing
- **Status:** ✅ Always Active

### 6. **IP-Based Rate Limiting**
- **Location:** Lines 534-547, 809-815
- **Purpose:** Prevents rapid spam submissions from the same IP
- **Implementation:** 
  - Blocks submissions from the same IP within 30 seconds
  - Uses WordPress transients for temporary storage
- **Status:** ✅ Always Active

### 7. **Spam Pattern Detection**
- **Location:** Lines 563-590
- **Purpose:** Identifies spam content in submissions
- **Implementation:** 
  - Checks for suspicious patterns (http://, https://, www., .com, .net, .org, viagra, casino, poker, loan, mortgage, "click here", "buy now")
  - Blocks submissions with multiple spam patterns (3+ matches)
  - Limits excessive links in messages (more than 2 links)
- **Status:** ✅ Always Active

### 8. **Disposable Email Domain Blocking**
- **Location:** Lines 592-608
- **Purpose:** Blocks temporary/disposable email addresses
- **Implementation:** 
  - Blocks common disposable email domains (tempmail, guerrillamail, mailinator, 10minutemail, throwaway)
  - Detects suspicious email patterns (many numbers + long length)
- **Status:** ✅ Always Active

### 9. **Google reCAPTCHA v3**
- **Location:** Lines 610-653, 136-138 (AMP), 175-183 (Standard)
- **Purpose:** Advanced bot detection using Google's machine learning
- **Implementation:** 
  - Invisible reCAPTCHA that scores user behavior (0.0 = bot, 1.0 = human)
  - Configurable score threshold (default: 0.5)
  - Verifies token with Google's API
- **Status:** ⚙️ Optional (requires configuration in Settings)
- **Configuration:** WordPress Admin → Landing Page Contact Submissions → Settings

### 10. **Input Sanitization**
- **Location:** Throughout the code
- **Purpose:** Prevents XSS (Cross-Site Scripting) attacks
- **Implementation:** 
  - `sanitize_text_field()` for text inputs
  - `sanitize_email()` for email addresses
  - `wp_kses_post()` for message content
  - `esc_url_raw()` for URLs
  - `esc_html()`, `esc_attr()`, `esc_url()` for output
- **Status:** ✅ Always Active

### 11. **SQL Injection Prevention**
- **Location:** Lines 1072-1080
- **Purpose:** Prevents database injection attacks
- **Implementation:** Uses `$wpdb->prepare()` for all database queries
- **Status:** ✅ Always Active

### 12. **Data Validation**
- **Location:** Lines 761-779
- **Purpose:** Ensures required fields are filled and valid
- **Implementation:** 
  - Validates required fields (name, email, organization, privacy)
  - Email format validation
  - Privacy policy acceptance check
- **Status:** ✅ Always Active

---

## Security Summary

### Always Active (No Configuration Required):
1. ✅ WordPress Nonce Verification
2. ✅ Honeypot Field
3. ✅ Math Captcha
4. ✅ Time-Based Validation
5. ✅ User-Agent Validation
6. ✅ IP-Based Rate Limiting
7. ✅ Spam Pattern Detection
8. ✅ Disposable Email Blocking
9. ✅ Input Sanitization
10. ✅ SQL Injection Prevention
11. ✅ Data Validation

### Optional (Requires Configuration):
1. ⚙️ Google reCAPTCHA v3 (configure in Settings page)

---

## Bot Detection Flow

When a form is submitted, the system checks in this order:

1. **Nonce Verification** → If fails, reject immediately
2. **Honeypot Check** → If filled, reject (bot detected)
3. **Math Captcha** → If incorrect, reject
4. **User-Agent Check** → If suspicious, reject
5. **Rate Limiting** → If too frequent, reject
6. **Time Validation** → If too fast/slow, reject
7. **Spam Patterns** → If detected, reject
8. **Email Validation** → If disposable/suspicious, reject
9. **reCAPTCHA v3** → If enabled and fails, reject
10. **Data Validation** → If invalid, reject

Only if all checks pass, the submission is accepted and saved.

---

## Notes

- All security features work together to provide multi-layered protection
- The form supports both standard WordPress pages and AMP pages
- Security checks are performed server-side for maximum protection
- Failed submissions are logged for monitoring (rate limit violations)
- User-friendly error messages are shown for legitimate users who make mistakes

