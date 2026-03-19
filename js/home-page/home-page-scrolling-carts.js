import { products } from "../products.js";
const container = document.getElementById("infinite-scroll-items");

const scrollProducts = products.slice(0,7);

for(let i = 1; i <= 2; i++){ //I use for loop cause I wanna duplicate that 7 elemnt for infinit scroll
  scrollProducts.forEach(item => {
    const card = document.createElement("div");

    card.innerHTML = `
          <div class = "item-today-super-deals">
            <div class="inner">
              <a href = "product-details.html?id=${item.id}"><img src="${item.image[0]}"></a>
              <div class="middle">
                <h3>Custom Toddler Backpack</h3>
                <p>Custom Toddler Backpack, the perfect companion for your little one's 
                  preschool adventures! Designed with both style and functionality in mind, 
                  this Preschool Backpack is ideal for carrying books, snacks, and toys, 
                  making it a must-have for any child on the go.</p>
                <div class = "rating">
                  <img src="icons/Stars.png">
                  <span>(123)</span>
                </div>
                <div class="price-with-dis-price">
                  <span class="real-price">USD ${item.dis_price}</span>
                  <span class="dis-price">USD ${item.original_price}+</span>
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
  });
}

