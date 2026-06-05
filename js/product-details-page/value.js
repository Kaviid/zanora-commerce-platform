import { products } from "../products.js";
import {cartQuantity} from "./quantity.js"

const btn = document.querySelector(".add-to-cart"); // correct

const params = new URLSearchParams(window.location.search);
const productId = params.get("id");

const item = products.find(p => p.id == productId);


btn.onclick = function () {
  console.log("Product Id:", productId);
  console.log("Price:", item.dis_price);
  console.log("Quantity : ", cartQuantity);
  console.log("Total:", cartQuantity * item.dis_price);
};