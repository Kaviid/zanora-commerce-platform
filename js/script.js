const container = document.getElementById("today-super-deals");

const scrollProducts = products.slice(0,2);

scrollProducts.forEach(item => {
  const card = document.createElement("div");

  card.innerHTML = `
        <div class = "item-today-super-deals">
          <div class="inner">
            <img src="${item.image[0]}">
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
              <div class="b-element">
                <img src="icons/shopping-cart.png">
                <span>Add to Cart</span>
              </div>

            </button>
          </div>
        </div>
  `;

  container.appendChild(card);
});