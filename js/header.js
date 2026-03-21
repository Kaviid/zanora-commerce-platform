const btn = document.querySelector(".all-categories-btn");
const popup = document.querySelector(".category-popup");
const items = document.querySelectorAll(".category-popup li");

// Toggle dropdown
btn.addEventListener("click", (e) => {
  e.stopPropagation();
  popup.classList.toggle("category-popup-open");
});

// Close when clicking outside
document.addEventListener("click", (e) => {
  if (!popup.contains(e.target) && !btn.contains(e.target)) {
    popup.classList.remove("category-popup-open");
  }
});

// Close when clicking a category
items.forEach(item => {
  item.addEventListener("click", () => {
    popup.classList.remove("category-popup-open");
  });
});