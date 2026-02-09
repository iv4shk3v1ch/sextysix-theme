(() => {
  const escapeValue = (value) => {
    if (window.CSS && typeof CSS.escape === "function") {
      return CSS.escape(value);
    }
    return value.replace(/("|'|\\)/g, "\\$1");
  };

  const enhanceSelect = (select) => {
    if (select.dataset.ssxEnhanced) return;
    select.dataset.ssxEnhanced = "true";
    select.classList.add("ssx-variation-select");

    const wrapper = document.createElement("div");
    wrapper.className = "ssx-variation-buttons";

    const options = Array.from(select.options).filter((opt) => opt.value);
    options.forEach((opt) => {
      const button = document.createElement("button");
      button.type = "button";
      button.textContent = opt.text;
      button.dataset.value = opt.value;
      button.disabled = opt.disabled;
      if (select.value === opt.value) {
        button.classList.add("is-active");
      }
      button.addEventListener("click", () => {
        if (button.disabled) return;
        select.value = opt.value;
        select.dispatchEvent(new Event("change", { bubbles: true }));
      });
      wrapper.appendChild(button);
    });

    const updateButtons = () => {
      options.forEach((opt) => {
        const button = wrapper.querySelector(
          `button[data-value="${escapeValue(opt.value)}"]`
        );
        if (!button) return;
        button.disabled = opt.disabled;
        button.classList.toggle("is-active", select.value === opt.value);
      });
    };

    select.addEventListener("change", updateButtons);
    select.insertAdjacentElement("afterend", wrapper);

    const form = select.closest("form.variations_form");
    if (form) {
      form.addEventListener("woocommerce_update_variation_values", updateButtons);
      form.addEventListener("reset", () => {
        select.value = "";
        updateButtons();
      });
    }
  };

  const init = () => {
    document
      .querySelectorAll("form.variations_form select")
      .forEach(enhanceSelect);
  };

  init();
  document.body.addEventListener("wc_variation_form", init);
})();
