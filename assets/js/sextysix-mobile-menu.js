(() => {
  const body = document.body;
  const toggle = document.querySelector(".ssx-menu-toggle");
  const menu = document.querySelector(".ssx-mobile-menu");
  const close = document.querySelector(".ssx-mobile-menu__close");

  if (!toggle || !menu || !close) return;

  const setState = (open) => {
    body.classList.toggle("ssx-menu-open", open);
    toggle.setAttribute("aria-expanded", open ? "true" : "false");
    menu.setAttribute("aria-hidden", open ? "false" : "true");
  };

  toggle.addEventListener("click", () => setState(true));
  close.addEventListener("click", () => setState(false));
  menu.addEventListener("click", (event) => {
    if (event.target === menu) {
      setState(false);
    }
  });
})();
