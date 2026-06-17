<?php
session_start();
include './config/db.php';

header("Content-Type: application/json");

if (!isset($_SESSION["user_id"])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit;
}

$user_id = (int)$_SESSION["user_id"];

$sql = "
SELECT 
    c.id AS cart_id,
    c.quantity,
    p.id AS product_id,
    p.short_title,
    p.dis_price,
    p.original_price,
    pi.image_path
FROM cart c
JOIN products p ON p.id = c.product_id
LEFT JOIN product_images pi 
    ON pi.product_id = p.id
    AND pi.sort_order = (
        SELECT MIN(sort_order) 
        FROM product_images 
        WHERE product_id = p.id
    )
WHERE c.user_id = $user_id
";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
    exit;
}

$cartItems = [];

while ($row = mysqli_fetch_assoc($result)) {
    $cartItems[] = [
        "cart_id"        => (int)$row["cart_id"],
        "product_id"     => (int)$row["product_id"],
        "short_title"    => $row["short_title"],
        "dis_price"      => (float)$row["dis_price"],
        "original_price" => (float)$row["original_price"],
        "quantity"       => (int)$row["quantity"],
        "image"          => "admin/uploads/products/" . $row["image_path"]
    ];
}

echo json_encode(["success" => true, "items" => $cartItems]);