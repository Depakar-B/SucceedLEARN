<?php
/**
 * DIRECT AMP SECURITY BAR CODE
 * Copy and paste this entire code into your AMP template before </body>
 * This works independently without WordPress functions
 * 
 * IMPORTANT: Make sure your HTML document has <html ⚡> or <html amp> in the opening tag
 * Example: <html ⚡ lang="en">
 */

// Get settings from WordPress database (if WordPress is loaded)
$settings = array();
if (function_exists('get_option')) {
    $settings = get_option('security_bar_settings', array());
}

// Fallback defaults if settings not found
$headline = !empty($settings['headline']) ? $settings['headline'] : 'READY TO BUILD A SECURITY CULTURE YOUR EMPLOYEES ACTUALLY ADOPT?';
$subtext = !empty($settings['subtext']) ? $settings['subtext'] : 'Turn your workforce into a human firewall with engaging, behaviour-first training.';
$button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'Fortify Teams Today';
$button_link = !empty($settings['button_link']) ? esc_url($settings['button_link']) : '#contact';
$timer_enabled = isset($settings['timer_enabled']) ? $settings['timer_enabled'] : true;

// Generate random time
$timer_max_min = isset($settings['timer_max_minutes']) ? intval($settings['timer_max_minutes']) : 5;
$timer_max_sec = isset($settings['timer_max_seconds']) ? intval($settings['timer_max_seconds']) : 0;
$timer_use_persistent = isset($settings['timer_use_persistent']) ? $settings['timer_use_persistent'] : true;
$max_total_seconds = ($timer_max_min * 60) + $timer_max_sec;
$random_seconds = rand(0, max(0, $max_total_seconds - 1));
$timer_min = floor($random_seconds / 60);
$timer_sec = $random_seconds % 60;
$timer_display = sprintf('%02d : %02d', $timer_min, $timer_sec);
$initial_total_seconds = ($timer_min * 60) + $timer_sec;
?>

<!-- Security Bar CSS - Add this to your existing <style amp-custom> tag -->
<style amp-custom>
/* Security Bar Styles */
.security-bar {
    position: fixed;
    bottom: 20px;
    left: 20px;
    right: 20px;
    width: calc(100% - 40px);
    max-width: calc(100% - 40px);
    background: linear-gradient(90deg, #6B46C1 0%, #EC4899 100%);
    color: #fff;
    z-index: 9999;
    box-shadow: 0 -6px 30px rgba(0,0,0,0.3), 0 4px 20px rgba(0,0,0,0.2);
    border-radius: 16px;
    transform: translateY(100%);
    opacity: 0;
    visibility: hidden;
}

.security-bar-inner {
    max-width: 1600px;
    width: 100%;
    margin: 0 auto;
    padding: 24px 30px;
    display: grid;
    grid-template-columns: auto 1fr auto;
    align-items: center;
    gap: 30px;
    justify-content: center;
}

.timer-box {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.timer-icon {
    width: 24px;
    height: 24px;
    color: #fff;
    flex-shrink: 0;
    opacity: 0.9;
}

.timer-text {
    font-family: 'Courier New', 'Monaco', 'Consolas', monospace;
    font-weight: 700;
    font-size: 28px;
    line-height: 1;
    min-width: 90px;
    text-align: center;
    color: #fff;
    letter-spacing: 3px;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.5), 0 2px 4px rgba(0, 0, 0, 0.3);
}

.security-text {
    text-align: center;
    padding: 0 15px;
    min-width: 0;
    flex: 1;
    max-width: 100%;
}

.security-text h3 {
    font-size: 20px;
    font-weight: 700;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    line-height: 1.2;
    color: #fff;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
}

.security-text p {
    margin: 4px 0 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.95);
    line-height: 1.3;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
}

.security-btn {
    position: relative;
    padding: 14px 28px;
    background-image: linear-gradient(90deg, #6C3FB5 0%, #FF4D8F 100%);
    color: #FFFFFF;
    fill: #FFFFFF;
    text-decoration: none;
    font-weight: 700;
    font-size: 15px;
    overflow: hidden;
    border-radius: 8px;
    display: inline-block;
    transition-duration: 0.4s;
    z-index: 1;
    white-space: nowrap;
    box-shadow: 0 4px 15px rgba(108, 63, 181, 0.4);
    flex-shrink: 0;
    border: none;
}

.security-btn span {
    position: relative;
    z-index: 2;
    color: #FFFFFF;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .security-bar {
        bottom: 15px;
        left: 15px;
        right: 15px;
        width: calc(100% - 30px);
        max-width: calc(100% - 30px);
        border-radius: 12px;
    }
    
    .security-bar-inner {
        grid-template-columns: auto 1fr auto;
        gap: 15px;
        padding: 18px 18px;
    }
    
    .timer-box {
        padding: 6px 10px;
        gap: 8px;
    }
    
    .timer-icon {
        width: 18px;
        height: 18px;
    }
    
    .timer-text {
        font-size: 20px;
        min-width: 75px;
        letter-spacing: 2px;
    }
    
    .security-text {
        padding: 0 8px;
    }
    
    .security-text h3 {
        font-size: 13px;
    }
    
    .security-text p {
        font-size: 11px;
    }
    
    .security-btn {
        padding: 10px 18px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .security-bar {
        bottom: 10px;
        left: 10px;
        right: 10px;
        width: calc(100% - 20px);
        max-width: calc(100% - 20px);
    }
    
    .security-bar-inner {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 10px;
        padding: 18px 15px;
    }
    
    .timer-box {
        padding: 6px 12px;
        justify-content: center;
        gap: 8px;
    }
    
    .timer-text {
        font-size: 22px;
        min-width: 80px;
    }
    
    .security-text h3 {
        font-size: 13px;
        white-space: normal;
        line-height: 1.3;
    }
    
    .security-text p {
        font-size: 11px;
        white-space: normal;
    }
    
    .security-btn {
        padding: 11px 22px;
        font-size: 13px;
    }
}
</style>

<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>
<script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>

<?php if ($timer_enabled) { 
    // Format initial time with leading zeros
    $formatted_min = str_pad($timer_min, 2, '0', STR_PAD_LEFT);
    $formatted_sec = str_pad($timer_sec, 2, '0', STR_PAD_LEFT);
    $formatted_time = $formatted_min . ' : ' . $formatted_sec;
    
    // Pre-calculate some random reset values for when timer reaches 0
    $reset_values = array();
    for ($i = 0; $i < 20; $i++) {
        $reset_seconds = rand(0, max(0, $max_total_seconds - 1));
        $reset_min = floor($reset_seconds / 60);
        $reset_sec = $reset_seconds % 60;
        $reset_formatted_min = str_pad($reset_min, 2, '0', STR_PAD_LEFT);
        $reset_formatted_sec = str_pad($reset_sec, 2, '0', STR_PAD_LEFT);
        $reset_values[] = array(
            'min' => $reset_min,
            'sec' => $reset_sec,
            'total' => $reset_seconds,
            'formatted' => $reset_formatted_min . ' : ' . $reset_formatted_sec
        );
    }
?>
<!-- AMP Timer State -->
<amp-state id="timerState">
    <script type="application/json">
    {
        "totalSeconds": <?php echo $initial_total_seconds; ?>,
        "minutes": <?php echo $timer_min; ?>,
        "seconds": <?php echo $timer_sec; ?>,
        "resetIndex": 0,
        "resetValues": <?php echo json_encode($reset_values); ?>
    }
    </script>
</amp-state>


<!-- Helper element for timer animation with event listener -->
<div id="timerTickHelper" 
     on="animationiteration:timerTick:AMP.setState({
         timerState: {
             totalSeconds: timerState.totalSeconds > 0 ? timerState.totalSeconds - 1 : timerState.resetValues[timerState.resetIndex % <?php echo count($reset_values); ?>].total,
             minutes: timerState.totalSeconds > 0 ? Math.floor((timerState.totalSeconds - 1) / 60) : timerState.resetValues[timerState.resetIndex % <?php echo count($reset_values); ?>].min,
             seconds: timerState.totalSeconds > 0 ? (timerState.totalSeconds - 1) % 60 : timerState.resetValues[timerState.resetIndex % <?php echo count($reset_values); ?>].sec,
             resetIndex: timerState.totalSeconds > 0 ? timerState.resetIndex : (timerState.resetIndex + 1) % <?php echo count($reset_values); ?>
         }
     })"
     style="position: fixed; top: -9999px; opacity: 0; pointer-events: none; width: 1px; height: 1px;">.</div>

<!-- AMP Animation for Timer Tick -->
<amp-animation id="timerTick" layout="nodisplay" on="visibility:play">
    <script type="application/json">
    {
        "duration": "1s",
        "iterations": "infinite",
        "animations": [{
            "selector": "#timerTickHelper",
            "keyframes": { "opacity": [0.99, 1] }
        }]
    }
    </script>
</amp-animation>
<?php } ?>

<!-- Scroll Observer for Show/Hide Animation -->
<div style="height: 1px;">
    <amp-position-observer
        on="scroll:showBar.start; up:hideBar.start"
        layout="nodisplay">
    </amp-position-observer>
</div>

<!-- Show Bar Animation (Scroll Down) -->
<amp-animation id="showBar" layout="nodisplay">
    <script type="application/json">
    {
        "duration": "0.3s",
        "easing": "ease-out",
        "fill": "both",
        "animations": [{
            "selector": "#security-bar",
            "keyframes": [
                { "transform": "translateY(100%)", "opacity": 0, "visibility": "hidden" },
                { "transform": "translateY(0)", "opacity": 1, "visibility": "visible" }
            ]
        }]
    }
    </script>
</amp-animation>

<!-- Hide Bar Animation (Scroll Up) -->
<amp-animation id="hideBar" layout="nodisplay">
    <script type="application/json">
    {
        "duration": "0.3s",
        "easing": "ease-out",
        "fill": "both",
        "animations": [{
            "selector": "#security-bar",
            "keyframes": [
                { "transform": "translateY(0)", "opacity": 1, "visibility": "visible" },
                { "transform": "translateY(100%)", "opacity": 0, "visibility": "hidden" }
            ]
        }]
    }
    </script>
</amp-animation>

<!-- Security Bar HTML -->
<div class="security-bar" id="security-bar">
    <div class="security-bar-inner">
        <?php if ($timer_enabled) { ?>
        <div class="timer-box">
            <svg class="timer-icon" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="0" y1="8" x2="6" y2="8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <line x1="0" y1="16" x2="6" y2="16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <line x1="0" y1="24" x2="6" y2="24" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <circle cx="19" cy="16" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                <path d="M19 6 L19 4 L23 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
                <line x1="19" y1="16" x2="19" y2="10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <line x1="19" y1="16" x2="24" y2="16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            <span class="timer-text">
                <span [text]="(timerState.minutes < 10 ? '0' : '') + timerState.minutes + ' : ' + (timerState.seconds < 10 ? '0' : '') + timerState.seconds">
                    <?php echo esc_html($timer_display); ?>
                </span>
            </span>
        </div>
        <?php } ?>
        <div class="security-text">
            <h3><?php echo esc_html($headline); ?></h3>
            <p><?php echo esc_html($subtext); ?></p>
        </div>
        <a href="<?php echo esc_url($button_link); ?>" class="security-btn">
            <span><?php echo esc_html($button_text); ?></span>
        </a>
    </div>
</div>

