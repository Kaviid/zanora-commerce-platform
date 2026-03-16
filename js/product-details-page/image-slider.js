export function initSlider(){

  const mainImage = document.getElementById("mainImage");
  const thumbnails = document.querySelectorAll(".thumb");

  let currentIndex = 0;

  function updateImage(index) {
    mainImage.src = thumbnails[index].src;
    thumbnails.forEach(t => t.classList.remove("active"));
    thumbnails[index].classList.add("active");
  }

  thumbnails.forEach((thumb, index) => {
    thumb.addEventListener("click", () => {
      currentIndex = index;
      updateImage(currentIndex);
    });
});

}