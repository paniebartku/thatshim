const polaroidGallery = (function() {
  const activeGallery = function activeGallery(container) {
    container.addEventListener("click", function(e) {
      let element = e.target;

      const src = element.querySelector("img").getAttribute("src");
      const descrip = element.querySelector("img").getAttribute("alt");

      const galleryOverlay = document.createElement("div");
      galleryOverlay.classList.add("polaroidGallery-overlay");
      galleryOverlay.innerHTML = `
        <figure class="polaroidGallery__container active">
        <div class="polaroidGallery__photo"> 
        <img src="${src}" alt="${descrip}" class="polaroidGallery__img"/>
        </div>
        <figcaption class="polaroidGallery__caption"><h3 class="polaroidGallery__text">${descrip}</h3></figcaption>
        <button class="polaroidGallery__button" id="button-close">\u2715</button>         
        </figure>
        `;

      document.body.appendChild(galleryOverlay);
      setTimeout(function() {
        galleryOverlay.classList.add("active");
      }, 1);
      document.body.style.overflow = "hidden";

      document.getElementById("button-close").addEventListener("click", function() {
        galleryOverlay.classList.remove("active");
        setTimeout(function() {
          document.body.removeChild(galleryOverlay);
        }, 500);
        document.body.style.overflow = "auto";
      });
      window.addEventListener("keyup", function(e) {
        if (e.key === "Escape") document.getElementById("button-close").click();
      });
    });
  };

  window.addEventListener("load", activeGallery(document.getElementById("polaroidGallery")));
})();

export default polaroidGallery;
