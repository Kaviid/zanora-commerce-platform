import {products} from "../products.js"

const categories = document.querySelectorAll(".category-popup li");

const container = document.getElementById("items-container"); //Catch items display container

const min_price = document.getElementById("min-price");
const max_price = document.getElementById("max-price");
const in_stock = document.getElementById("checkbox-in-stock");

let filters = { //Create object to store all filter things
  category: "all",
  minPrice: 0,
  maxPrice: Infinity,
  inStock: false,
  sort: "relevancy"
};

categories.forEach(item => {
  item.addEventListener("click", () => {
    const selectedCategory = item.dataset.category; //We store that clicked category in UI
    filters.category = selectedCategory; //And assign that selected category into filters.category
    applyFilters() //Call this func to filter matching items and store in variable
  });
});


min_price.addEventListener("input", (e) => {
filters.minPrice = Number(e.target.value) || 0;
applyFilters();
});

max_price.addEventListener("input", (e) => {
  filters.maxPrice = Number(e.target.value) || Infinity;
  applyFilters();
});

in_stock.addEventListener("change", (e) => {
  filters.inStock = e.target.checked;
  applyFilters();
});


//This func apply filters for our products.....
function applyFilters() { 
  let filtered = products; //If user select "all" then all products assign to filtered variable 
  if (filters.category !== "all") { //If user select "!all" then matching products assign to filtered var
    filtered = filtered.filter(item => item.category === filters.category);  
  }

  filtered = filtered.filter(item => item.dis_price >= filters.minPrice && item.dis_price <= filters.maxPrice);
  
  if (filters.inStock) {
    filtered = filtered.filter(item => item.stock >= 1);
  }

  renderProducts(filtered); //Call this func to render filtered items and we pass filtered items as a parameter
}


//This func render filtered items...........
function renderProducts(f_products) {
  container.innerHTML = ""; //Everytime clear current container first cause if we don't do that items duplicate
  f_products.forEach(f_item => { //Loop through parameter

    //From here do same thing in other js files create div and append into container element
    const card = document.createElement("div"); 
    card.innerHTML = ` 
      <div class = "item-today-super-deals">
        <div class="inner">
          <a href = "product-details.html?id=${f_item.id}"><img src="${f_item.image[0]}"></a>
          <div class="middle">
            <h3>${f_item.short_title}</h3>
            
            <div class = "rating">
              <img src="icons/Stars.png">
              <span>(${f_item.rating})</span>
            </div>
            <div class="price-with-dis-price">
              <span class="dis-price">USD ${f_item.dis_price}</span>
              <span class="real-price">USD ${f_item.original_price}</span>
            </div>
          </div>
          
          <button class="add-to-cart-button">
              <img src="icons/shopping-cart-for-add-to-cart.png">
              <span>Add to Cart</span>
          </button>
        </div>
      </div>
    `;
    container.appendChild(card); 
  })
}