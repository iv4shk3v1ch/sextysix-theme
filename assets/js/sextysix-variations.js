(() => {
  const escapeValue = (value) => {
    if (window.CSS && typeof CSS.escape === "function") {
      return CSS.escape(value);
    }
    return value.replace(/("|'|\\)/g, "\\$1");
  };

  const parseColorMap = (select) => {
    const raw = select.dataset.ssxColorMap;
    if (!raw) return {};
    try {
      return JSON.parse(raw);
    } catch (err) {
      return {};
    }
  };

  const updateLabelValue = (select, valueText) => {
    const label = select.closest("tr")?.querySelector("th.label label");
    if (!label) return;
    let valueSpan = label.querySelector(".ssx-variation-label-value");
    if (!valueSpan) {
      valueSpan = document.createElement("span");
      valueSpan.className = "ssx-variation-label-value";
      label.appendChild(valueSpan);
    }
    valueSpan.textContent = valueText ? `: ${valueText}` : "";
  };

  const getVariations = (form) => {
    if (!form) return [];
    const raw = form.dataset.product_variations;
    if (!raw) return [];
    try {
      return JSON.parse(raw);
    } catch (err) {
      return [];
    }
  };

  const getCurrentSelections = (form) => {
    const selections = {};
    if (!form) return selections;
    form.querySelectorAll("select").forEach((sel) => {
      if (sel.name) {
        selections[sel.name] = sel.value || "";
      }
    });
    return selections;
  };

  const enhanceSelect = (select) => {
    if (select.dataset.ssxEnhanced) return;
    select.dataset.ssxEnhanced = "true";
    select.classList.add("ssx-variation-select");

    const wrapper = document.createElement("div");
    wrapper.className = "ssx-variation-buttons";
    const isColor = select.dataset.ssxType === "color";
    if (isColor) {
      wrapper.classList.add("ssx-variation-buttons--color");
    } else {
      wrapper.classList.add("ssx-variation-buttons--size");
    }

    const options = Array.from(select.options).filter((opt) => opt.value);
    const colorMap = isColor ? parseColorMap(select) : {};

    options.forEach((opt) => {
      const button = document.createElement("button");
      button.type = "button";
      if (isColor) {
        const valueKey = opt.value || "";
        const textKey = opt.text || "";
        const color =
          colorMap[valueKey] ||
          colorMap[valueKey.toLowerCase?.()] ||
          colorMap[textKey] ||
          colorMap[textKey.toLowerCase?.()] ||
          "";
        if (color) {
          button.style.setProperty("--ssx-swatch-color", color);
        }
        button.setAttribute("aria-label", opt.text);
/*        const label = document.createElement("span");
        label.className = "ssx-color-label";
        label.textContent = opt.text;
        button.appendChild(label);*/
      } else {
        button.textContent = opt.text;
      }
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
      const form = select.closest("form.variations_form");
      const variations = getVariations(form);
      const selections = getCurrentSelections(form);

      if (isColor) {
        const selected = options.find((opt) => opt.value === select.value);
        updateLabelValue(select, selected ? selected.text : "");
      } else {
        const label = select.closest("tr")?.querySelector("th.label label");
        label?.querySelector(".ssx-variation-label-value")?.remove();
      }
      options.forEach((opt) => {
        const button = wrapper.querySelector(
          `button[data-value="${escapeValue(opt.value)}"]`
        );
        if (!button) return;
        let disabled = opt.disabled;
        if (variations.length && select.name) {
          const attrName = select.name;
          const isAvailable = variations.some((variation) => {
            if (!variation || !variation.attributes) return false;
            if (variation.attributes[attrName] !== opt.value) return false;
            if (!variation.is_in_stock) return false;
            return Object.keys(variation.attributes).every((key) => {
              if (key === attrName) return true;
              const selectedValue = selections[key];
              if (!selectedValue) return true;
              return variation.attributes[key] === selectedValue;
            });
          });
          disabled = !isAvailable;
        }
        button.disabled = disabled;
        button.classList.toggle("is-active", select.value === opt.value);
      });
    };

    select.addEventListener("change", updateButtons);
    select.insertAdjacentElement("afterend", wrapper);
    updateButtons();

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
    document
      .querySelectorAll(".reset_variations_alert")
      .forEach((node) => node.remove());
  };

  init();
  document.body.addEventListener("wc_variation_form", init);
})();
