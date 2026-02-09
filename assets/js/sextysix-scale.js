(() => {
  const DESIGN_WIDTH = 1600;
  const DESKTOP_MIN = 768;

  const setScale = () => {
    const width = window.innerWidth || document.documentElement.clientWidth || DESIGN_WIDTH;
    const scale = width >= DESKTOP_MIN ? Math.min(1, width / DESIGN_WIDTH) : 1;
    document.documentElement.style.setProperty("--ssx-scale", scale.toFixed(4));
  };

  setScale();
  window.addEventListener("resize", setScale);
})();
