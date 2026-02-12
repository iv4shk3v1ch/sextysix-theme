(() => {
  const related = document.querySelector(".single-product .related .products");
  const heading = document.querySelector(".single-product .related > h2");
  if (!related || !heading) return;

  let paginator = heading.querySelector(".ssx-related-paginator");
  if (!paginator) {
    paginator = document.createElement("span");
    paginator.className = "ssx-related-paginator";
    heading.appendChild(paginator);
  }

  const items = Array.from(related.querySelectorAll("li.product"));
  const perSlide = 2;
  const total = Math.max(1, Math.ceil(items.length / perSlide));

  const update = () => {
    const slideWidth = related.clientWidth;
    if (!slideWidth) return;
    const current = Math.min(
      total,
      Math.max(1, Math.round(related.scrollLeft / slideWidth) + 1)
    );
    paginator.textContent = `${current}/${total}`;
  };

  update();
  related.addEventListener("scroll", () => {
    window.requestAnimationFrame(update);
  });
  window.addEventListener("resize", update);
})();
