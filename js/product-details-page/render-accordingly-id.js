import { products } from "../products.js";
import { increase, decrease } from "./quantity.js";
import { initSlider } from "./image-slider.js";
import { dropdownElement } from "./dropdown.js";

const params = new URLSearchParams(window.location.search);
const productId = params.get('id');

const item = products.find(p => p.id == productId);

//console.log(item.title);

const container = document.getElementById("all-container-main");
const details = document.createElement("div");

const thumbnailsHTML = item.image.map((img, index) => {
  return `<img src="${img}" class="thumb ${index === 0 ? "active" : ""}">`;
}).join("");

const reviews = item.reviews;

function renderReviews() {
  return reviews.map(review => {
    return `
      <div class="review-box">
        <div class="name-date">
          <h3>${review.name}</h3>
          <p>${review.date}</p>
        </div>
        <p class="dis">${review.comment}</p>
      </div>
    `;
  }).join("");
}

function checkDropdown(){
  if (item.size_label){
    const sizes = item.sizes.map(size => `<li>${size}</li>`).join("");
    return    `
                <p>${item.size_label}</p>
              <div class="dropdown"> <!---css/dropdown.css--->
                <div class="select">
                  <span class="selected">Select an option</span>
                  <img src="icons/dropdown.png" class="caret">
                </div>
                <ul class="menu">
                  ${sizes}
                </ul>
              </div>
            `;
  } 
  return ""; //return empty if no size available in selected product
}

details.innerHTML = `

        <div class="hero"> <!--Hero-->

          <div class="product-gallery">

              <div class="main-image"> <!-- Main image -->
                <!-- <button class="prev"><img src="icons/left-arrow.png"></button> -->
                <img id="mainImage" src="${item.image[0]}">
                <!-- <button class="next"><img src="icons/right-arrow.png"></button> -->
                
              </div>
              
              <div class="thumbnail-wrapper">
                <button class="thumb-prev"><img src="icons/left-arrow.png"></button>
                <div class="thumbnails"> <!-- Thumbnails -->
                  ${thumbnailsHTML}
                </div>
                <button class="thumb-next"><img src="icons/right-arrow.png"></button>
              </div>
          </div>

          <div class="right">
            <div class="top">
              <div class="title-and-stars"> <!-- 1st -->
                <h1>${item.title}</h1>
                <div class="top-stars">
                  <p>Review for this item</p>
                  <img src="icons/Stars.png">
                </div>
              
              </div>

              <div class="price-and-select-section"> <!-- 2nd -->
                <div class="price-return">
                  <div class="orginal-discount">
                    <p class="dis">USD ${item.dis_price}</p>
                    <p class="ori">USD ${item.original_price}</p>
                  </div>
                  <div class="return-text">
                    <img src="icons/correct.png">
                    <p>Returns & exchanges accepted</p>
                  </div>
                </div>

                <div class="size-quantity">

                  <div id="size-container" class="size-container" >
                    ${checkDropdown()}
                  </div>

                  <div class="quantity-container">
                    <p>Quantity</p>
                    <div class="inc-decre">
                      <button class="sign minus">-</button>
                      <p class="value" id="q-value">1</p>
                      <button class="sign plus">+</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="add-cart-and-available"> <!-- 3rd -->
                <p>In available ${item.stock} peices</p>
                <button id="add-to-cart" class="add-to-cart">
                  <img src="icons/shopping-cart-for-add-to-cart.png">
                  <span>Add to Cart</span>
                </button>
              </div>
            </div>

            <div class="down"> <!---Pay with--->
              <h3>Payment Methods</h3>
              <div class="payment-methods-icons">
                <a href="#" class="visa">
                  <img src="icons/visa.png" class="methods">
                </a>
                <a href="#" class="paypal">
                  <img src="icons/paypal.png" class="methods">
                </a>
                <a href="#" class="payoneer">
                  <img src="icons/payoneer.png" class="methods">
                </a>
                <a href="#" class="master">
                  <img src="icons/master.png" class="methods">
                </a>
                <a href="#" class="bitcoin">
                  <img src="icons/bitcoin.png" class="methods">
                </a>
              </div>
            </div> <!---Pay with end--->
          </div> 
        </div> <!--Hero end-->

        <div class="description-reviews">
          <div class="reviews">
            <h1>Reviews (${item.rating})</h1>
            <div class="reviews-with-name-date">

              ${renderReviews()}

            </div>
          </div>
          <div class="description">
            <h1>Description</h1>
            <div class="para">
              <p>${item.description}</p>
            </div>
          </div>
        </div>

`;

container.appendChild(details);

initSlider();

dropdownElement();

document.querySelector(".plus").addEventListener("click", increase);
document.querySelector(".minus").addEventListener("click", decrease);