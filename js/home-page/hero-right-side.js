import {products} from "../products.js"

const container = document.getElementById("hero-right-side");

const choose_item = products[5];

container.innerHTML = `
          <div class="inner">
            <a href="product-details.html?id=${choose_item.id}"><img src="${choose_item.image[0]}"></a>
            <div class="text">
              <h3>${choose_item.short_title}</h3>
              <p>${choose_item.description}</p>
              <img src="icons/Stars.png">
            </div>
            <div class="prices">
              <p class="dis-price">USD ${choose_item.dis_price}</p>
              <p class="original-price">USD ${choose_item.original_price}</p>
            </div>
          </div>
      `;

"${choose_item.description}"