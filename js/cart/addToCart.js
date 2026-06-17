const params = new URLSearchParams(window.location.search);
const productId = params.get("id");

async function getProduct() {
    const response = await fetch(`backend/get_product_by_id.php?id=${productId}`);
    const item = await response.json();
    return item;
}

document.addEventListener("click", async function (e) {
    if (e.target.closest(".add-to-cart")) {
        const item = await getProduct();
        const quantity = parseInt(document.getElementById("q-value").innerText);

        const formData = new FormData();
        formData.append("product_id", productId);
        formData.append("quantity", quantity);

        const response = await fetch("backend/add_to_cart.php", {
            method: "POST",
            body: formData,
        });

        const result = await response.json();
        console.log(result.message);
    }
});