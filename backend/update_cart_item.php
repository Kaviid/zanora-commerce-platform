<?php
session_start();
include './config/db.php';
header("Content-Type: application/json");

$cart_id  = (int)$_POST["cart_id"];
$quantity = (int)$_POST["quantity"];
$user_id  = (int)$_SESSION["user_id"];

$sql = "UPDATE cart SET quantity = $quantity WHERE id = $cart_id AND user_id = $user_id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
}