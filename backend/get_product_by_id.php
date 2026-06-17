<?php

include './config/db.php';

$productId = (int)$_GET['id'];

$sql = "
SELECT
    id,
    short_title,
    title,
    description,
    dis_price,
    original_price,
    stock
FROM products
WHERE id = $productId
LIMIT 1
";

$result = mysqli_query($conn, $sql);

$product = mysqli_fetch_assoc($result);

$imageSql = "
SELECT image_path
FROM product_images
WHERE product_id = $productId
ORDER BY sort_order
";

$imageResult = mysqli_query($conn, $imageSql);

$images = [];

while ($img = mysqli_fetch_assoc($imageResult)) {
    $images[] = "admin/uploads/products/" . $img["image_path"];
}

$product["image"] = $images;

header("Content-Type: application/json");
echo json_encode($product);