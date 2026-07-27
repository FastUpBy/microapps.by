(function () {

  function loadAnalyticsOnce() {
    if (window.__analyticsLoaded) return;
    window.__analyticsLoaded = true;
    (function (m, e, t, r, i, k, a) {
      m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
      m[i].l = 1 * new Date();
      for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
      k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js?id=105435626', 'ym');

    ym(105435626, 'init', { ssr: true, webvisor: true, clickmap: true, accurateTrackBounce: true, trackLinks: true });

    // --- Google Analytics 4 ---
    var gtagScript = document.createElement('script');
    gtagScript.src = "https://www.googletagmanager.com/gtag/js?id=G-DXPGWYVGVW";
    gtagScript.async = true;
    document.head.appendChild(gtagScript);

    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }

    gtag('js', new Date());
    gtag('config', 'G-DXPGWYVGVW');

      // Удаляем слушатели активности
      window.gtag = window.gtag || function() { window.dataLayer.push(arguments); };
      setTimeout(function() {
        if (!window.gtag) {
          window.gtag = function() { window.dataLayer.push(arguments); };
        }
      }, 1000);

  }

  
  if ('PerformanceObserver' in window) {
      const po = new PerformanceObserver(list => {
        const entries = list.getEntries();
        if (entries && entries.length) {
          // первая запись LCP
          loadAnalyticsOnce();
          try { po.disconnect(); } catch (e) { }
        }
      });
      po.observe({ type: 'largest-contentful-paint', buffered: true });  
  }
  // Фоллбек: если PerformanceObserver не сработал, запустим через 2s после полной загрузки
  try {
    var fallbackHandler = function() {
      setTimeout(function() {
        if (!window.__analyticsLoaded) loadAnalyticsOnce();
      }, 2000);
      window.removeEventListener('load', fallbackHandler);
    };
    window.addEventListener('load', fallbackHandler);
  } catch (e) { /* ignore */ }

})();