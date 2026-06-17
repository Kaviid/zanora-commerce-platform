const addProductForm = document.getElementById("addProductForm");
const message = document.getElementById("message");

addProductForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    let hasError = false;

    const category = document.getElementById("category_id").value;
    const shortTitle = document.getElementById("short_title").value.trim();
    const title = document.getElementById("title").value.trim();
    const description = document.getElementById("description").value.trim();
    const disPrice = document.getElementById("dis_price").value.trim();
    const originalPrice = document.getElementById("original_price").value.trim();
    const stock = document.getElementById("stock").value.trim();
    const status = document.getElementById("status").value;

    if (
        category === "" ||
        shortTitle === "" ||
        title === "" ||
        description === "" ||
        disPrice === "" ||
        originalPrice === "" ||
        stock === "" ||
        status === ""
    ) {
        message.textContent = "All fields are required.";
        hasError = true;
        return;
    }

    if (!hasError) {
        const formData = new FormData(addProductForm);

        const response = await fetch(
            "api/add-product.php",
            {
                method: "POST",
                body: formData
            }
        );

        const result = await response.json();

        message.textContent = result.message;
    }
});