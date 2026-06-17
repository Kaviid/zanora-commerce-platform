const container = document.getElementById("items-container");

async function loadDeals() {
  try {
    const response = await fetch("backend/get_products.php"); // update path if needed
    const products = await response.json();

    products.forEach(item => {
      const dis = item.original_price - item.dis_price;
      if (((item.original_price * 40) / 100) <= dis) { // Only display if dis > 40%
        const cart = document.createElement("div");

        cart.innerHTML = `
          <div class="item-today-super-deals">
            <div class="inner">
              <a href="product-details.php?id=${item.id}">
                <img src="${item.image[0]}" alt="${item.short_title}">
              </a>
              <div class="middle">
                <h3>${item.short_title}</h3>
                <div class="rating">
                  <img src="icons/Stars.png" alt="rating">
                  <span>(${item.rating})</span>
                </div>
                <div class="price-with-dis-price">
                  <span class="dis-price">USD ${item.dis_price}</span>
                  <span class="real-price">USD ${item.original_price}</span>
                </div>
              </div>
              <button class="add-to-cart-button">
                <img src="icons/shopping-cart-for-add-to-cart.png" alt="cart">
                <span>Add to Cart</span>
              </button>
            </div>
          </div>`;

        container.appendChild(cart);
      }
    });

  } catch (error) {
    console.error("Failed to load products:", error);
    container.innerHTML = "<p>Failed to load deals. Please try again.</p>";
  }
}

loadDeals();