import {products} from "../products.js"

const container = document.getElementById("items-container");

products.forEach(item => {
  const dis = item.original_price - item.dis_price;
  if(((item.original_price * 40) / 100) <= dis) { //Only display if dis > 40%
    const cart = document.createElement("div");

    cart.innerHTML = `
          <div class = "item-today-super-deals">
            <div class="inner">
              <a href = "product-details.html?id=${item.id}"><img src="${item.image[0]}"></a>
              <div class="middle">
                <h3>${item.short_title}</h3>
                
                <div class = "rating">
                  <img src="icons/Stars.png">
                  <span>(${item.rating})</span>
                </div>
                <div class="price-with-dis-price">
                  <span class="dis-price">USD ${item.dis_price}</span>
                  <span class="real-price">USD ${item.original_price}</span>
                </div>
              </div>
              
              <button class="add-to-cart-button">
                  <img src="icons/shopping-cart-for-add-to-cart.png">
                  <span>Add to Cart</span>
              </button>
            </div>
          </div> `;

    container.appendChild(cart);
  }
});
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
