(() => {
  /* =========================
   * Mobile drawer
   * ========================= */
  const openBtn = document.querySelector(".mobile-menu-btn");
  const closeBtn = document.querySelector(".drawer__close");
  const drawer = document.querySelector(".drawer");
  const overlay = document.querySelector(".overlay");

  if (openBtn && closeBtn && drawer && overlay) {
    let lastFocusedEl = null;
    const TRANSITION_MS = 260;

    const getFocusable = (root) =>
      Array.from(
        root.querySelectorAll(
          'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
        )
      );

    const openDrawer = () => {
      lastFocusedEl = document.activeElement;

      drawer.classList.add("is-open");
      overlay.classList.add("is-open");
      drawer.setAttribute("aria-hidden", "false");
      openBtn.setAttribute("aria-expanded", "true");
      document.body.style.overflow = "hidden";

      const focusables = getFocusable(drawer);
      (focusables[0] || closeBtn).focus();
    };

    const closeDrawer = () => {
      drawer.classList.remove("is-open");
      overlay.classList.remove("is-open");
      drawer.setAttribute("aria-hidden", "true");
      openBtn.setAttribute("aria-expanded", "false");
      document.body.style.overflow = "";

      window.setTimeout(() => {
        if (lastFocusedEl && typeof lastFocusedEl.focus === "function") {
          lastFocusedEl.focus();
        }
      }, TRANSITION_MS);
    };

    const trapFocus = (e) => {
      if (!drawer.classList.contains("is-open")) return;
      if (e.key !== "Tab") return;

      const focusables = getFocusable(drawer);
      if (!focusables.length) return;

      const first = focusables[0];
      const last = focusables[focusables.length - 1];

      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    };

    openBtn.addEventListener("click", openDrawer);
    closeBtn.addEventListener("click", closeDrawer);
    overlay.addEventListener("click", closeDrawer);

    document.addEventListener("keydown", (e) => {
      if (drawer.classList.contains("is-open") && e.key === "Escape") {
        closeDrawer();
      }
      trapFocus(e);
    });
  }

  const searchOpeners = document.querySelectorAll("[data-search-open]");
  const searchOverlay = document.querySelector("[data-search-overlay]");
  const searchClose = document.querySelector("[data-search-close]");
  const searchInput = document.querySelector("[data-search-input]");

  if (searchOpeners.length && searchOverlay && searchClose) {
    let lastFocusedEl = null;
    const TRANSITION_MS = 220;

    const getFocusable = (root) =>
      Array.from(
        root.querySelectorAll(
          'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
        )
      );

    const openSearch = () => {
      lastFocusedEl = document.activeElement;
      searchOverlay.hidden = false;
      document.body.style.overflow = "hidden";

      requestAnimationFrame(() => {
        searchOverlay.classList.add("is-open");
        if (searchInput) searchInput.focus();
      });
    };

    const closeSearch = () => {
      searchOverlay.classList.remove("is-open");
      document.body.style.overflow = "";

      window.setTimeout(() => {
        searchOverlay.hidden = true;
        if (lastFocusedEl && typeof lastFocusedEl.focus === "function") {
          lastFocusedEl.focus();
        }
      }, TRANSITION_MS);
    };

    const trapFocus = (e) => {
      if (searchOverlay.hidden) return;
      if (e.key !== "Tab") return;

      const focusables = getFocusable(searchOverlay);
      if (!focusables.length) return;

      const first = focusables[0];
      const last = focusables[focusables.length - 1];

      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    };

    searchOpeners.forEach((btn) => btn.addEventListener("click", openSearch));
    searchClose.addEventListener("click", closeSearch);
    searchOverlay.addEventListener("click", (e) => {
      if (e.target === searchOverlay) closeSearch();
    });

    document.addEventListener("keydown", (e) => {
      if (!searchOverlay.hidden && e.key === "Escape") closeSearch();
      trapFocus(e);
    });
  }

  // Logo loop
  document.addEventListener("DOMContentLoaded", function () {
    const logoTrack = document.querySelector(".section--logos .logos");
    if (!logoTrack) return;

    logoTrack.innerHTML += logoTrack.innerHTML;
  });

})();
