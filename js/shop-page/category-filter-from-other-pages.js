import {products} from "../products.js"

const params = new URLSearchParams(window.location.search);
const category_from_url = params.get("category"); //We store that category in URL

const container = document.getElementById("items-container"); //Catch items display container

let filters = { //Create object to store all filter things
  category: "all",
  minPrice: 0,
  maxPrice: Infinity,
  inStock: false,
  sort: "relevancy"
};

filters.category = category_from_url; //And assign that selected category from URL into filters.category
applyFilters() //Call this func to filter matching items and store in variable

function applyFilters() {
  let filtered = products; //If user select "all" then all products assign to filtered variable 
  if (filters.category !== "all") { //If user select "!all" then matching products assign to filtered var
    filtered = filtered.filter(item => item.category === filters.category);  
  }
  renderProducts(filtered); //Call this func to render filtered items and we pass filtered items as a parameter
}

function renderProducts(f_products) {
  container.innerHTML = ""; //Everytime clear current container first cause if we don't do that items duplicate
  f_products.forEach(f_item => { //Loop through parameter

    //From here do same thing in other js files create div and append into container element
    const card = document.createElement("div"); 
    card.innerHTML = ` 
      <div class = "item-today-super-deals">
        <div class="inner">
          <a href = "product-details.php?id=${f_item.id}"><img src="${f_item.image[0]}"></a>
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