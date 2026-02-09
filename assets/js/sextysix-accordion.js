(() => {
  const accordions = document.querySelectorAll("[data-ssx-accordion]");
  accordions.forEach((accordion) => {
    const triggers = Array.from(
      accordion.querySelectorAll(".ssx-accordion__trigger")
    );

    const closeAll = (except) => {
      triggers.forEach((trigger) => {
        if (trigger === except) return;
        const panelId = trigger.getAttribute("aria-controls");
        const panel = panelId ? accordion.querySelector(`#${panelId}`) : null;
        trigger.setAttribute("aria-expanded", "false");
        if (panel) {
          panel.hidden = true;
        }
      });
    };

    triggers.forEach((trigger) => {
      trigger.addEventListener("click", () => {
        const isOpen = trigger.getAttribute("aria-expanded") === "true";
        const panelId = trigger.getAttribute("aria-controls");
        const panel = panelId ? accordion.querySelector(`#${panelId}`) : null;

        if (isOpen) {
          trigger.setAttribute("aria-expanded", "false");
          if (panel) {
            panel.hidden = true;
          }
          return;
        }

        closeAll(trigger);
        trigger.setAttribute("aria-expanded", "true");
        if (panel) {
          panel.hidden = false;
        }
      });
    });
  });
})();
