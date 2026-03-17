export function initSlider(){

  // Main large image
  const mainImage = document.getElementById("mainImage");

  // All thumbnail images
  const thumbnails = document.querySelectorAll(".thumb");

  // Buttons under the thumbnails
  const nextBtn = document.querySelector(".thumb-next");
  const prevBtn = document.querySelector(".thumb-prev");

  // Current image index
  let currentIndex = 0;

  // Function to update the main image
  function updateImage(index) {

    // Change main image
    mainImage.src = thumbnails[index].src;

    // Remove active class from all thumbnails
    thumbnails.forEach(t => t.classList.remove("active"));

    // Add active class to current thumbnail
    thumbnails[index].classList.add("active");

    // 👇 Important: auto-scroll thumbnails so active one is visible
    thumbnails[index].scrollIntoView({
      behavior: "smooth",   // smooth animation
      inline: "center",
      block: "nearest"     // keep the active thumbnail centered
    });
  }

  // When a thumbnail is clicked
  thumbnails.forEach((thumb, index) => {
    thumb.addEventListener("click", () => {

      // Update current index
      currentIndex = index;

      // Change image
      updateImage(currentIndex);

    });
  });

  // When NEXT button is clicked
  nextBtn.addEventListener("click", () => {

    // Move to next image
    currentIndex++;

    // If last image reached → go back to first
    if(currentIndex >= thumbnails.length){
      currentIndex = 0;
    }

    updateImage(currentIndex);
  });

  // When PREV button is clicked
  prevBtn.addEventListener("click", () => {

    // Move to previous image
    currentIndex--;

    // If before first image → go to last
    if(currentIndex < 0){
      currentIndex = thumbnails.length - 1;
    }

    updateImage(currentIndex);
  });

}