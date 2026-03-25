export let cartQuantity = 1;


export function increase() {
  const value = document.getElementById("q-value");
  cartQuantity++;
  value.innerText = cartQuantity;
}

export function decrease() {
  const value = document.getElementById("q-value");
  if (cartQuantity > 1) {
    cartQuantity--;
    value.innerText = cartQuantity;
  }
}
