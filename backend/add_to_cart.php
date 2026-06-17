<?php
session_start();
include './config/db.php';

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

if (!isset($_SESSION["user_id"])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit;
}

$user_id    = (int)$_SESSION["user_id"];
$product_id = (int)$_POST["product_id"];
$quantity   = (int)$_POST["quantity"];

if (!$product_id || $quantity < 1) {
    echo json_encode(["success" => false, "message" => "Invalid data"]);
    exit;
}

// Check if already in cart
$check = mysqli_query($conn, "SELECT id, quantity FROM cart WHERE user_id = $user_id AND product_id = $product_id LIMIT 1");

if (mysqli_num_rows($check) > 0) {
    // Update quantity
    $row    = mysqli_fetch_assoc($check);
    $newQty = $row["quantity"] + $quantity;
    $sql    = "UPDATE cart SET quantity = $newQty WHERE id = {$row['id']}";
    $msg    = "Cart updated";
} else {
    // Insert new row
    $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
    $msg = "Added to cart";
}

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true, "message" => $msg]);
} else {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
}