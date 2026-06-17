<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include './config/db.php';

$sql = "
SELECT
    p.id,
    p.short_title,
    p.title,
    p.dis_price,
    p.original_price,
    p.stock,
    pi.image_path
FROM products p

LEFT JOIN product_images pi
    ON pi.product_id = p.id
    AND pi.sort_order = (
        SELECT MIN(sort_order)
        FROM product_images
        WHERE product_id = p.id
    )

WHERE p.status = 'active'
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die(mysqli_error($conn));
}

$products = [];

while ($row = mysqli_fetch_assoc($result)) {

    $products[] = [
        "id" => (int)$row["id"],
        "short_title" => $row["short_title"],
        "title" => $row["title"],
        "dis_price" => (float)$row["dis_price"],
        "original_price" => (float)$row["original_price"],
        "stock" => (int)$row["stock"],
        "category" => "all",
        "rating" => 5,
        "image" => [
            "admin/uploads/products/" . $row["image_path"]
        ]
    ];
}

header("Content-Type: application/json");
echo json_encode($products);