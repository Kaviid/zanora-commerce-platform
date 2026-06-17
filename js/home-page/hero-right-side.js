const container = document.getElementById("hero-right-side");

async function loadHeroItem() {
  try {
    const response = await fetch("backend/get_product_by_id.php?id=8"); // change id as needed
    const choose_item = await response.json();

    container.innerHTML = `
      <div class="inner">
        <a href="product-details.php?id=${choose_item.id}">
          <img src="${choose_item.image[0]}" alt="${choose_item.short_title}">
        </a>
        <div class="text">
          <h3>${choose_item.short_title}</h3>
          <p>${choose_item.description}</p>
          <img src="icons/Stars.png" alt="rating">
        </div>
        <div class="prices">
          <p class="dis-price">USD ${choose_item.dis_price}</p>
          <p class="original-price">USD ${choose_item.original_price}</p>
        </div>
      </div>`;

  } catch (error) {
    console.error("Failed to load hero item:", error);
    container.innerHTML = "<p>Failed to load product.</p>";
  }
}

loadHeroItem();