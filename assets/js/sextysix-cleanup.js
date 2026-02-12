(() => {
  const body = document.body;
  if (!body) return;
  const first = body.firstChild;
  if (first && first.nodeType === Node.TEXT_NODE) {
    first.textContent = first.textContent.replace(/\uFEFF/g, "");
    if (!first.textContent.trim()) {
      body.removeChild(first);
    }
  }
})();
