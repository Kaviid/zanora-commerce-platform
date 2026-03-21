const dropdown = document.querySelector(".dropdown");

const select = dropdown.querySelector(".select");
const menu = dropdown.querySelector(".menu");
const selected = dropdown.querySelector(".selected");
const options = dropdown.querySelectorAll(".menu li");

//open dropdown
  select.addEventListener("click", (e) => {
    menu.classList.toggle("menu-open");
    e.stopPropagation();
  });

//select option
options.forEach(option => {
  option.addEventListener("click", () => {

    //change UI text
    selected.innerText = option.innerText;

    //close menu
    menu.classList.remove("menu-open");

    //get value
    const value = option.dataset.value;

    console.log("Sort by:", value);

    //connect to your product sorting
    sortProducts(value);
  });
});

//close when clicking outside
document.addEventListener("click", (e) => {
  if (!dropdown.contains(e.target)) {
    menu.classList.remove("menu-open");
  }
});