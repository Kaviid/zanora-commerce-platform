import {products} from "../products.js";
const container = document.getElementById("items-container");

products.forEach(item => {
  const cart_div = document.createElement("div");
  cart_div.innerHTML = `
      <div class = "item-today-super-deals">
        <div class="inner">
          <a href = "product-details.html?id=${item.id}"><img src="${item.image[0]}"></a>
          <div class="middle">
            <h3>${item.short_title}</h3>
            
            <div class = "rating">
              <img src="icons/Stars.png">
              <span>(123)</span>
            </div>
            <div class="price-with-dis-price">
              <span class="real-price">USD 25</span>
              <span class="dis-price">USD 45.67</span>
            </div>
          </div>
          
          <button class="add-to-cart-button">
              <img src="icons/shopping-cart-for-add-to-cart.png">
              <span>Add to Cart</span>
          </button>
        </div>
      </div>
  `;

  container.appendChild(cart_div);
})