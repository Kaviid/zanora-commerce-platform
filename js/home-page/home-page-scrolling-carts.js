
const container = document.getElementById("infinite-scroll-items");


async function loadDeals() {
  try {
    const response = await fetch("backend/get_products.php"); // update path if needed
    const products = await response.json();

    for(let i = 1; i <= 2; i++){ //I use for loop cause I wanna duplicate that 7 elemnt for infinit scroll
      products.forEach(item => {
        const dis = item.original_price - item.dis_price;
        if (((item.original_price * 40) / 100) <= dis) { // Only display if dis > 40%
          const cart = document.createElement("div");

          cart.innerHTML = `
                <div class = "item-today-super-deals">
                  <div class="inner">
                    <a href = "product-details.php?id=${item.id}"><img src="${item.image[0]}"></a>
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
                </div>`;
          container.appendChild(cart);
        }
      });
    }
  } catch (error) {
    console.error("Failed to load products:", error);
    container.innerHTML = "<p>Failed to load deals. Please try again.</p>";
  }
}

loadDeals();

