(function () {
      var drawer = document.getElementById('drawer');
      var nav = document.querySelector('.nav');
      var menuBtn = document.getElementById('menuBtn');
      var closeMenu = document.getElementById('closeMenu');
      if (menuBtn && drawer) menuBtn.onclick = function () { drawer.classList.add('open'); };
      if (closeMenu && drawer) closeMenu.onclick = function () { drawer.classList.remove('open'); };
      if (drawer) {
        drawer.querySelectorAll('a').forEach(function (a) {
          a.onclick = function () { drawer.classList.remove('open'); };
        });
      }

      var more = [
        "Moisture and Mold in Your Home: Understanding, Prevention, and Solutions",
        "Mold in Your Home: What You Need to Know and How to Address It",
        "The Hidden Dangers of Mold",
        "Seasonal Mold Prevention",
        "The Benefits of Mold-Resistant Paint for Your Home",
        "Common Household Habits That Contribute to Moisture Problems",
        "Why You Should Never Ignore a Damp Wall",
        "Top 10 Signs Your Home May Have a Mold Problem",
        "The Role of Dehumidifiers in Managing Indoor Moisture",
        "The Link Between Poor Ventilation and Moisture Problems",
        "How to Spot and Fix Moisture Issues Before They Lead to Mold",
        "Seasonal Moisture Control: Keeping Your Home Dry Year-Round",
        "10 Ways to Prevent Moisture Build-Up in Your Home",
        "The Science of Moisture: Why It’s a Problem in Your Home",
        "How to Keep Your Basement Dry and Mold-Free",
        "The Impact of Climate Change on Mold Growth",
        "How to Prevent Mold Growth in High-Humidity Areas of Your Home",
        "The Science Behind Mold: How It Spreads and Thrives"
      ];
      var box = document.getElementById('artMore');
      if (box && !box.dataset.filled) {
        more.forEach(function (title, i) {
          var a = document.createElement('a');
          a.href = '#articles';
          a.innerHTML = '<span class="n">' + String(i + 4).padStart(2, '0') + '</span><span>' + title + '</span>';
          box.appendChild(a);
        });
        box.dataset.filled = '1';
      }

      var photos = document.getElementById('photos');
      var fileList = document.getElementById('fileList');
      var uploadBox = document.getElementById('uploadBox');
      var quoteForm = document.getElementById('quoteForm');
      if (uploadBox && photos) uploadBox.onclick = function () { photos.click(); };
      if (photos && fileList) photos.onchange = function (e) {
        fileList.textContent = Array.prototype.map.call(e.target.files || [], function (f) { return f.name; }).join(', ');
      };
      if (quoteForm) quoteForm.onsubmit = function (e) {
        e.preventDefault();
        var ok = document.getElementById('formOk');
        if (ok) {
          ok.style.display = 'block';
          ok.classList.remove('in');
          void ok.offsetWidth;
          ok.classList.add('fx', 'fx-pop', 'in');
        }
        e.target.reset();
        if (fileList) fileList.textContent = '';
      };

      /* Live scroll nav + back to top */
      var backTop = document.getElementById('backTop');
      var moldGrow = document.querySelector('.mold-grow');
      var moldRaf = 0;
      var reduceMold = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      function setMoldProgress() {
        moldRaf = 0;
        if (!moldGrow || reduceMold || isEditing()) return;
        var max = document.documentElement.scrollHeight - window.innerHeight;
        var p = max > 0 ? window.scrollY / max : 0;
        if (p < 0) p = 0;
        if (p > 1) p = 1;
        document.documentElement.style.setProperty('--mold', p.toFixed(4));
      }
      function onScroll() {
        if (nav) {
          if (window.scrollY > 20) nav.classList.add('is-scrolled');
          else nav.classList.remove('is-scrolled');
        }
        if (backTop) {
          if (window.scrollY > 280) backTop.classList.add('is-visible');
          else backTop.classList.remove('is-visible');
        }
        if (moldGrow && !reduceMold && !moldRaf) {
          moldRaf = requestAnimationFrame(setMoldProgress);
        }
      }
      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll();
      if (backTop) {
        backTop.addEventListener('click', function () {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      }

      /* Motion engine */
      var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      function mark(el, cls, d) {
        if (!el || el.classList.contains('fx')) return;
        el.classList.add('fx');
        if (cls) el.classList.add(cls);
        if (d != null) el.style.setProperty('--d', String(d));
      }
      function stagger(root, sel, cls, base) {
        if (!root) return;
        root.querySelectorAll(sel).forEach(function (el, i) {
          mark(el, cls, (base || 0) + i);
        });
      }

      function revealEditorFx() {
        document.querySelectorAll('.fx').forEach(function (el) { el.classList.add('in'); });
        document.body.classList.add('is-ready');
        document.querySelectorAll('.europe').forEach(function (el) { el.classList.add('is-live'); });
      }

      function isEditing() {
        return document.body.classList.contains('elementor-editor-active')
          || document.body.classList.contains('elementor-editor-preview')
          || document.body.classList.contains('elementor-editor')
          || !!(window.elementorFrontend && elementorFrontend.isEditMode && elementorFrontend.isEditMode());
      }

      function wireMotion() {
        if (isEditing()) {
          revealEditorFx();
          return;
        }

        /* Hero */
        var heroInner = document.querySelector('.hero-inner');
        if (heroInner) {
          Array.prototype.forEach.call(heroInner.children, function (el, i) {
            mark(el, i === 0 ? 'fx-fade' : (i < 3 ? 'fx-up' : 'fx-pop'), i);
          });
          stagger(heroInner.querySelector('.tags'), '.tag', 'fx-pop', 4);
        }

        /* Stats */
        stagger(document.querySelector('.stats-row'), '.stat', 'fx-scale', 0);

        /* About */
        mark(document.querySelector('.about-media'), 'fx-left', 0);
        stagger(document.querySelector('.about-copy'), ':scope > *', 'fx-right', 1);

        /* Services */
        stagger(document.querySelector('.services .section-head'), ':scope > *', 'fx-up', 0);
        stagger(document.querySelector('.service-grid'), '.service', 'fx-scale', 1);

        /* Europe */
        stagger(document.querySelector('.europe-top'), ':scope > *', 'fx-up', 0);
        stagger(document.querySelector('.europe-notes'), 'article', 'fx-right', 2);

        /* Assess */
        stagger(document.querySelector('.assess-copy'), ':scope > *', 'fx-left', 0);
        mark(document.querySelector('.assess-media'), 'fx-right', 2);

        /* Partners */
        stagger(document.querySelector('.partners .section-head'), ':scope > *', 'fx-up', 0);
        stagger(document.querySelector('.partner-grid'), '.partner', 'fx-scale', 1);

        /* Contact */
        stagger(document.querySelector('.contact-copy'), ':scope > *', 'fx-left', 0);
        mark(document.querySelector('.form'), 'fx-right', 1);
        stagger(document.querySelector('#quoteForm'), 'label, .upload, .form-bottom', 'fx-up', 2);

        /* Articles */
        stagger(document.querySelector('.articles .section-head'), ':scope > *', 'fx-up', 0);
        stagger(document.querySelector('.art-grid'), '.art', 'fx-scale', 1);
        stagger(document.getElementById('artMore'), 'a', 'fx-up', 0);

        /* Footer */
        stagger(document.querySelector('.foot-top'), ':scope > *', 'fx-up', 0);
        stagger(document.querySelector('.foot-links'), 'a', 'fx-pop', 1);

        if (reduce) {
          document.querySelectorAll('.fx').forEach(function (el) { el.classList.add('in'); });
          document.body.classList.add('is-ready');
          return;
        }

        requestAnimationFrame(function () { document.body.classList.add('is-ready'); });

        var io = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('in');
            io.unobserve(entry.target);
          });
        }, { threshold: 0.08, rootMargin: '0px 0px 12% 0px' });

        document.querySelectorAll('.fx').forEach(function (el) {
          if (el.getBoundingClientRect().top < innerHeight * 0.92) el.classList.add('in');
          else io.observe(el);
        });

        /* Europe live cascade */
        var europe = document.querySelector('.europe');
        if (europe) {
          var euroIo = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
              if (!entry.isIntersecting) return;
              europe.classList.add('is-live');
              euroIo.unobserve(europe);
            });
          }, { threshold: 0.25 });
          euroIo.observe(europe);
        }

        /* Service inspect on enter */
        document.querySelectorAll('.service').forEach(function (card) {
          var sIo = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
              if (!entry.isIntersecting) return;
              card.classList.add('is-inspecting');
              setTimeout(function () { card.classList.remove('is-inspecting'); }, 900);
              sIo.unobserve(card);
            });
          }, { threshold: 0.45 });
          sIo.observe(card);
        });

        /* Magnetic-ish pointer on buttons (desktop) */
        if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
          document.querySelectorAll('.btn').forEach(function (btn) {
            btn.addEventListener('pointermove', function (e) {
              var r = btn.getBoundingClientRect();
              var x = (e.clientX - r.left) / r.width - 0.5;
              var y = (e.clientY - r.top) / r.height - 0.5;
              btn.style.transform = 'translate3d(' + (x * 8) + 'px,' + (y * 6 - 2) + 'px,0) scale(1.03)';
            });
            btn.addEventListener('pointerleave', function () {
              btn.style.transform = '';
            });
          });
        }
      }

      function bindElementorEditor() {
        if (!window.elementorFrontend || !elementorFrontend.hooks) return;
        elementorFrontend.hooks.addAction('frontend/element_ready/global', function () {
          if (isEditing()) revealEditorFx();
        });
      }

      if (window.elementorFrontend && elementorFrontend.hooks) {
        bindElementorEditor();
      } else {
        window.addEventListener('elementor/frontend/init', bindElementorEditor);
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', wireMotion);
      } else {
        wireMotion();
      }
    })();
