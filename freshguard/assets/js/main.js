(function () {
  var menuBtn = document.getElementById('menuBtn');
  var closeMenu = document.getElementById('closeMenu');
  var drawer = document.getElementById('drawer');
  if (menuBtn && drawer) menuBtn.addEventListener('click', function () { drawer.classList.add('open'); });
  if (closeMenu && drawer) closeMenu.addEventListener('click', function () { drawer.classList.remove('open'); });
  if (drawer) drawer.querySelectorAll('a').forEach(function (a) {
    a.addEventListener('click', function () { drawer.classList.remove('open'); });
  });

  var form = document.getElementById('quoteForm');
  var formOk = document.getElementById('formOk');
  var photos = document.getElementById('photos');
  var fileList = document.getElementById('fileList');
  var uploadBox = document.getElementById('uploadBox');
  if (uploadBox && photos) uploadBox.addEventListener('click', function () { photos.click(); });
  if (photos && fileList) photos.addEventListener('change', function () {
    fileList.textContent = Array.prototype.map.call(photos.files || [], function (f) { return f.name; }).join(', ');
  });
  if (form && formOk) form.addEventListener('submit', function (e) {
    e.preventDefault();
    formOk.style.display = 'block';
    form.reset();
    if (fileList) fileList.textContent = '';
  });

  /* Motion — same as index.html (IntersectionObserver, once) */
  function initMotion() {
    var editing = document.body.classList.contains('elementor-editor-active')
      || document.body.classList.contains('elementor-editor-preview')
      || !!(window.elementorFrontend && elementorFrontend.isEditMode && elementorFrontend.isEditMode());
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function mark(el, cls, d) {
      if (!el || el.classList.contains('fx')) return;
      el.classList.add('fx');
      if (cls) el.classList.add(cls);
      if (d != null) el.style.setProperty('--d', String(d));
    }
    function staggerKids(parent, sel, cls) {
      if (!parent) return;
      parent.querySelectorAll(sel).forEach(function (el, i) { mark(el, cls, i); });
    }

    mark(document.querySelector('.brand'), 'fx-fade', 0);
    staggerKids(document.querySelector('header nav'), 'a', 'fx-fade');
    staggerKids(document.querySelector('.head-right'), ':scope > *', 'fx-fade');

    var heroInner = document.querySelector('.hero-copy .inner');
    if (heroInner) {
      Array.prototype.forEach.call(heroInner.children, function (el, i) {
        mark(el, i === 0 ? 'fx-fade' : 'fx-up', i);
      });
      staggerKids(heroInner.querySelector('.chips'), '.chip', 'fx-scale');
    }

    document.querySelectorAll('section').forEach(function (sec) {
      sec.querySelectorAll('.idx').forEach(function (el, i) { mark(el, 'fx-fade', i); });
      sec.querySelectorAll('h1, h2, h3').forEach(function (el, i) { mark(el, 'fx-up', i + 1); });
      sec.querySelectorAll('p, .lead').forEach(function (el, i) { mark(el, 'fx-up', i + 2); });
      staggerKids(sec.querySelector('.stats'), ':scope > div', 'fx-scale');
      staggerKids(sec.querySelector('.svc-grid'), '.svc', 'fx-scale');
      staggerKids(sec.querySelector('.chips'), '.chip', 'fx-scale');
      staggerKids(sec.querySelector('.places'), 'span', 'fx-fade');
      staggerKids(sec.querySelector('.split-notes'), 'article', 'fx-up');
      staggerKids(sec.querySelector('.partner-grid'), ':scope > div', 'fx-scale');
      staggerKids(sec.querySelector('.art-grid'), '.art', 'fx-scale');
      staggerKids(sec.querySelector('.art-list'), 'a', 'fx-up');
      sec.querySelectorAll('.welcome-visual, .map, .assess-mobile-img, .hero-actions').forEach(function (el, i) {
        mark(el, 'fx-scale', i + 2);
      });
      sec.querySelectorAll('.quote-copy, .quote-form').forEach(function (el, i) {
        mark(el, i % 2 ? 'fx-right' : 'fx-left', i);
      });
      sec.querySelectorAll('form input, form textarea, form select, form .upload, form .btn, #formOk').forEach(function (el, i) {
        mark(el, 'fx-up', Math.min(i, 8));
      });
    });

    document.querySelectorAll('footer .foot > *, footer .brand, footer nav a, footer p, footer a').forEach(function (el, i) {
      mark(el, 'fx-up', i % 6);
    });

    if (reduce || editing) {
      document.querySelectorAll('.fx').forEach(function (el) { el.classList.add('in'); });
      document.body.classList.add('is-loaded');
      return;
    }

    requestAnimationFrame(function () { document.body.classList.add('is-loaded'); });

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('in');
        io.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });

    document.querySelectorAll('.fx').forEach(function (el) {
      var r = el.getBoundingClientRect();
      if (r.top < window.innerHeight * 0.92) el.classList.add('in');
      else io.observe(el);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMotion);
  } else {
    initMotion();
  }

  // Re-run after Elementor frontend render
  if (window.jQuery) {
    jQuery(window).on('elementor/frontend/init', function () {
      setTimeout(initMotion, 50);
    });
  }
})();
