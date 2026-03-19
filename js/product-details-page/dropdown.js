export function dropdownElement() {

  const dropdown = document.querySelector(".dropdown");

  // stop function if dropdown doesn't exist
  if (!dropdown) return;

  const select = dropdown.querySelector(".select");
  const menu = dropdown.querySelector(".menu");
  const selected = dropdown.querySelector(".selected");
  const options = dropdown.querySelectorAll(".menu li");

  // open dropdown
  select.addEventListener("click", (e) => {
    menu.classList.toggle("menu-open");
    e.stopPropagation();
  });

  // choose option
  options.forEach(option => {
    option.addEventListener("click", () => {
      selected.textContent = option.textContent;
      menu.classList.remove("menu-open");
    });
  });

  // close when clicking outside
  document.addEventListener("click", (e) => {
    if (!dropdown.contains(e.target)) {
      menu.classList.remove("menu-open");
    }
  });

}