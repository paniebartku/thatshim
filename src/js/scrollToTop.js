const scrollToTop = (() => {
  let createButton = () => {
    let element = document.createElement("button");
    element.classList.add("scrollToTop", "hidden");
    document.body.appendChild(element);
    return element;
  };
  let button = createButton();
  window.addEventListener(
    "scroll",
    () => {
      if (window.scrollY >= 100) {
        button.classList.remove("hidden");
      } else {
        button.classList.add("hidden");
      }
    },
    false,
  );

  button.addEventListener(
    "click",
    e => {
      e.stopPropagation();
      window.scrollTo({ top: 0, behavior: "smooth" });
    },
    false,
  );
})();

export default scrollToTop;
