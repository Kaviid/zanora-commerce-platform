async function loadCart() {
    const response = await fetch("backend/get_cart.php");
    const data = await response.json();

    if (!data.success) {
        if (data.message === "User not logged in") {
            window.location.href = "login.php";  // change to your login page
        }
        return;
    }

    const items = data.items;
    const container = document.querySelector(".item-details");
    container.innerHTML = "";

    items.forEach(item => renderItem(item, container));

    updateSummary(items);
}

function renderItem(item, container) {
    const subtotal = (item.dis_price * item.quantity).toFixed(2);

    const div = document.createElement("div");
    div.classList.add("per-item");
    div.dataset.cartId = item.cart_id;
    div.innerHTML = `
        <button class="delete-btn">
            <img src="icons/delete.png" alt="delete">
        </button>
        <img src="${item.image}" class="main-img">
        <p class="product-short-title">${item.short_title}</p>
        <div class="dis-and-ori-price">
            <p class="ori">USD ${item.original_price.toFixed(2)}</p>
            <p class="dis">USD ${item.dis_price.toFixed(2)}</p>
        </div>
        <div class="quantity-container">
            <div class="inc-decre">
                <button class="sign minus">−</button>
                <p class="value">${item.quantity}</p>
                <button class="sign plus">+</button>
            </div>
        </div>
        <p class="total-of-items">USD ${subtotal}</p>
    `;

    // Delete
    div.querySelector(".delete-btn").onclick = () => deleteItem(item.cart_id, div);

    // Increase
    div.querySelector(".plus").onclick = () => changeQuantity(item, div, 1);

    // Decrease
    div.querySelector(".minus").onclick = () => changeQuantity(item, div, -1);

    container.appendChild(div);
}

async function deleteItem(cartId, div) {
    const formData = new FormData();
    formData.append("cart_id", cartId);

    const response = await fetch("backend/delete_cart_item.php", {
        method: "POST",
        body: formData,
    });

    const result = await response.json();

    if (result.success) {
        div.remove();
        refreshSummary();
    }
}

async function changeQuantity(item, div, change) {
    const newQty = item.quantity + change;

    if (newQty < 1) {
        deleteItem(item.cart_id, div);
        return;
    }

    const formData = new FormData();
    formData.append("cart_id", item.cart_id);
    formData.append("quantity", newQty);

    const response = await fetch("backend/update_cart_item.php", {
        method: "POST",
        body: formData,
    });

    const result = await response.json();

    if (result.success) {
        item.quantity = newQty;
        div.querySelector(".value").textContent = newQty;
        div.querySelector(".total-of-items").textContent = `USD ${(item.dis_price * newQty).toFixed(2)}`;
        refreshSummary();
    }
}

function refreshSummary() {
    const allItems = [...document.querySelectorAll(".per-item")].map(div => ({
        original_price: parseFloat(div.querySelector(".ori").textContent.replace("USD ", "")),
        dis_price: parseFloat(div.querySelector(".dis").textContent.replace("USD ", "")),
        quantity: parseInt(div.querySelector(".value").textContent),
    }));

    updateSummary(allItems);
}

function updateSummary(items) {
    const subTotal  = items.reduce((sum, i) => sum + (i.original_price * i.quantity), 0);
    const totalDis  = items.reduce((sum, i) => sum + ((i.original_price - i.dis_price) * i.quantity), 0);
    const totalPrice = items.reduce((sum, i) => sum + (i.dis_price * i.quantity), 0);

    document.querySelector(".bill-row:nth-child(1) .value").textContent = items.length;
    document.querySelector(".bill-row:nth-child(2) .value").textContent = `USD ${subTotal.toFixed(2)}`;
    document.querySelector(".bill-row:nth-child(3) .value").textContent = `− USD ${totalDis.toFixed(2)}`;
    document.querySelector(".total-price").textContent = `USD ${totalPrice.toFixed(2)}`;
}

loadCart();