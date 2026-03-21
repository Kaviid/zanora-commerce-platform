const btn = document.querySelector(".all-categories-btn");
const popup = document.querySelector(".category-popup");

// Toggle when button clicked
btn.addEventListener("click", (e) => {
  e.stopPropagation(); // prevent document click from firing
  popup.classList.toggle("category-popup-open");
});

// Close when clicking outside
document.addEventListener("click", (e) => {
  if (!popup.contains(e.target) && !btn.contains(e.target)) {
    popup.classList.remove("category-popup-open");
  }
});