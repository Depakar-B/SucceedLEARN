(function() {
  'use strict';
  
  // Wait for DOM to be ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  function init() {
    // Remove bar on mobile/tablet devices (backup check)
    if (window.innerWidth <= 1024) {
      const bar = document.querySelector('.security-bar');
      if (bar) {
        bar.remove();
      }
      return;
    }
    
    const bar = document.querySelector('.security-bar');
    if (!bar) {
      // Retry after a short delay if bar not found immediately
      setTimeout(init, 100);
      return;
    }

    let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
    let ticking = false;
    let lastDirection = null;
    let scrollThreshold = 5; // Minimum scroll distance to trigger direction change
    let hideTimeout = null;

    // Initialize: show bar at top of page
    if (lastScrollTop <= 50) {
      bar.classList.remove('hide');
    }

    /* Improved scroll detection - show on scroll down, hide on scroll up */
    function handleScroll() {
      if (!ticking) {
        window.requestAnimationFrame(() => {
          const scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
          const scrollDiff = scrollTop - lastScrollTop;
          
          // Clear any pending hide timeout
          if (hideTimeout) {
            clearTimeout(hideTimeout);
            hideTimeout = null;
          }
          
          // Always show at top of page
          if (scrollTop <= 50) {
            bar.classList.remove('hide');
            lastScrollTop = scrollTop;
            ticking = false;
            return;
          }
          
          // Determine scroll direction - update direction for any scroll movement
          if (scrollDiff > 0) {
            lastDirection = 'down';
          } else if (scrollDiff < 0) {
            lastDirection = 'up';
          }
          
          // Handle scroll direction - only act on significant movement to prevent jitter
          if (Math.abs(scrollDiff) > scrollThreshold) {
            if (lastDirection === 'down') {
              // Scrolling down - show immediately
              bar.classList.remove('hide');
            } else if (lastDirection === 'up') {
              // Scrolling up - hide immediately (no delay for better responsiveness)
              bar.classList.add('hide');
            }
          }
          
          lastScrollTop = scrollTop;
          ticking = false;
        });
        ticking = true;
      }
    }

    // Use passive listener for better mobile performance
    window.addEventListener('scroll', handleScroll, { passive: true });
    
    // Also handle touch events for better mobile support
    let touchStartY = 0;
    window.addEventListener('touchstart', (e) => {
      touchStartY = e.touches[0].clientY;
    }, { passive: true });
    
    window.addEventListener('touchmove', (e) => {
      const touchY = e.touches[0].clientY;
      const touchDiff = touchStartY - touchY;
      
      if (Math.abs(touchDiff) > 10) {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
        
        if (scrollTop <= 50) {
          bar.classList.remove('hide');
        } else if (touchDiff > 0) {
          // Scrolling down
          bar.classList.remove('hide');
        } else {
          // Scrolling up
          bar.classList.add('hide');
        }
      }
    }, { passive: true });

    /* Professional timer with localStorage persistence */
    // Try to find timer element - check both possible structures
    let timerEl = document.querySelector('.timer-box .timer-text');
    // If not found, try direct child
    if (!timerEl) {
      timerEl = document.querySelector('.timer-text');
    }
    // If still not found, try finding by class in timer-box
    if (!timerEl) {
      const timerBox = document.querySelector('.timer-box');
      if (timerBox) {
        timerEl = timerBox.querySelector('.timer-text');
      }
    }
    
    const barEl = document.querySelector('.security-bar');
    
    // If timer element not found, try again after a short delay
    if (!timerEl && barEl) {
      setTimeout(function() {
        timerEl = document.querySelector('.timer-box .timer-text') || document.querySelector('.timer-text');
        if (timerEl) {
          initTimer(timerEl, barEl);
        }
      }, 200);
      return;
    }
    
    if (timerEl && barEl) {
      initTimer(timerEl, barEl);
    }
  }
  
  function initTimer(timerEl, barEl) {
    const timerEnabled = barEl.getAttribute('data-timer-enabled') === '1';
    
    // Only proceed if timer is enabled
    if (!timerEnabled) {
      return;
    }
      
      
    // Timer is enabled, initialize it
    const usePersistent = barEl.getAttribute('data-timer-persistent') === '1';
    const maxMinutes = parseInt(barEl.getAttribute('data-timer-max-min')) || 5;
    const maxSeconds = parseInt(barEl.getAttribute('data-timer-max-sec')) || 0;
    const maxTotalSeconds = (maxMinutes * 60) + maxSeconds;
    const storageKey = 'security_bar_timer';
    let minutes, seconds, startTime, elapsedSeconds = 0;
    
    // Check localStorage for persistent timer
    if (usePersistent && typeof Storage !== 'undefined') {
          const stored = localStorage.getItem(storageKey);
          if (stored) {
            try {
              const data = JSON.parse(stored);
              const now = Math.floor(Date.now() / 1000);
              const timeDiff = now - data.timestamp;
              
              // Continue from stored time if less than 1 hour old
              if (timeDiff < 3600) {
                elapsedSeconds = data.elapsed + timeDiff;
                const currentTotal = data.initialTotal - elapsedSeconds;
                
                if (currentTotal > 0) {
                  minutes = Math.floor(currentTotal / 60);
                  seconds = currentTotal % 60;
                  startTime = data.startTime;
                } else {
                  // Timer expired, generate new random time
                  const randomSeconds = Math.floor(Math.random() * maxTotalSeconds);
                  minutes = Math.floor(randomSeconds / 60);
                  seconds = randomSeconds % 60;
                  startTime = now;
                  elapsedSeconds = 0;
                }
              } else {
                // Stored data too old, generate new random time
                const randomSeconds = Math.floor(Math.random() * maxTotalSeconds);
                minutes = Math.floor(randomSeconds / 60);
                seconds = randomSeconds % 60;
                startTime = now;
                elapsedSeconds = 0;
              }
            } catch (e) {
              // Invalid stored data, generate new random time
              const randomSeconds = Math.floor(Math.random() * maxTotalSeconds);
              minutes = Math.floor(randomSeconds / 60);
              seconds = randomSeconds % 60;
              startTime = Math.floor(Date.now() / 1000);
              elapsedSeconds = 0;
            }
          } else {
            // No stored data, use initial values from data attributes
            minutes = parseInt(barEl.getAttribute('data-timer-min')) || 0;
            seconds = parseInt(barEl.getAttribute('data-timer-sec')) || 0;
            startTime = Math.floor(Date.now() / 1000);
            elapsedSeconds = 0;
          }
        } else {
          // Not using persistence, use initial values
          minutes = parseInt(barEl.getAttribute('data-timer-min')) || 0;
          seconds = parseInt(barEl.getAttribute('data-timer-sec')) || 0;
          startTime = Math.floor(Date.now() / 1000);
          elapsedSeconds = 0;
      }
      
      let initialTotal = (minutes * 60) + seconds;
      let isResetting = false;
      
      function updateTimer() {
        if (isResetting) return; // Prevent multiple resets
        
        if (usePersistent) {
          // Countdown timer - professional approach
          elapsedSeconds++;
          const remaining = initialTotal - elapsedSeconds;
          
          if (remaining <= 0) {
            // Timer reached zero, reset to new random time
            isResetting = true;
            const randomSeconds = Math.floor(Math.random() * maxTotalSeconds);
            minutes = Math.floor(randomSeconds / 60);
            seconds = randomSeconds % 60;
            initialTotal = (minutes * 60) + seconds; // Update initialTotal
            elapsedSeconds = 0;
            startTime = Math.floor(Date.now() / 1000);
            
            // Update localStorage immediately
            if (typeof Storage !== 'undefined') {
              localStorage.setItem(storageKey, JSON.stringify({
                initialTotal: initialTotal,
                elapsed: 0,
                startTime: startTime,
                timestamp: startTime
              }));
            }
            isResetting = false;
          } else {
            minutes = Math.floor(remaining / 60);
            seconds = remaining % 60;
            
            // Update localStorage every 5 seconds
            if (typeof Storage !== 'undefined' && elapsedSeconds % 5 === 0) {
              localStorage.setItem(storageKey, JSON.stringify({
                initialTotal: initialTotal,
                elapsed: elapsedSeconds,
                startTime: startTime,
                timestamp: Math.floor(Date.now() / 1000)
              }));
            }
          }
        } else {
          // Simple countdown without persistence
          if (seconds > 0) {
            seconds--;
          } else if (minutes > 0) {
            minutes--;
            seconds = 59;
          } else {
            // Reset to new random time
            const randomSeconds = Math.floor(Math.random() * maxTotalSeconds);
            minutes = Math.floor(randomSeconds / 60);
            seconds = randomSeconds % 60;
            initialTotal = (minutes * 60) + seconds; // Update for consistency
          }
        }
        
        const timeString = String(minutes).padStart(2, '0') + ' : ' + String(seconds).padStart(2, '0');
        
        // Update the timer display - handle both direct text and nested spans
        if (timerEl && document.body.contains(timerEl)) {
          // If there's a nested span (AMP structure), update the inner one
          const innerSpan = timerEl.querySelector('span');
          if (innerSpan && !innerSpan.hasAttribute('[text]')) {
            // Only update if it's not an AMP bound element
            innerSpan.textContent = timeString;
          } else if (!innerSpan) {
            timerEl.textContent = timeString;
          }
          timerEl.setAttribute('data-time', timeString);
        }
      }
      
      // Initial display
      const initialTimeString = String(minutes).padStart(2, '0') + ' : ' + String(seconds).padStart(2, '0');
      
      // Update initial display - handle both direct text and nested spans
      if (timerEl) {
        const innerSpan = timerEl.querySelector('span');
        if (innerSpan && !innerSpan.hasAttribute('[text]')) {
          // Only update if it's not an AMP bound element
          innerSpan.textContent = initialTimeString;
        } else if (!innerSpan) {
          timerEl.textContent = initialTimeString;
        }
        timerEl.setAttribute('data-time', initialTimeString);
      }
      
      // Update every second - make sure timer keeps running
      const timerInterval = setInterval(function() {
        if (timerEl && document.body.contains(timerEl)) {
          updateTimer();
        } else {
          // Timer element removed from DOM, clear interval
          clearInterval(timerInterval);
        }
      }, 1000);
      
      // Save initial state to localStorage
      if (usePersistent && typeof Storage !== 'undefined') {
        localStorage.setItem(storageKey, JSON.stringify({
          initialTotal: initialTotal,
          elapsed: elapsedSeconds,
          startTime: startTime,
          timestamp: Math.floor(Date.now() / 1000)
        }));
      }
    }
})();
