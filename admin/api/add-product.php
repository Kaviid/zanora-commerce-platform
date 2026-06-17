<?php

header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    echo json_encode([
        "status" => "error",
        "message" => "Access denied!"
    ]);
    exit();
}

include "../config/db.php";

$category_id = trim($_POST["category_id"] ?? "");
$short_title = trim($_POST["short_title"] ?? "");
$title = trim($_POST["title"] ?? "");
$description = trim($_POST["description"] ?? "");
$dis_price = trim($_POST["dis_price"] ?? "");
$original_price = trim($_POST["original_price"] ?? "");
$stock = trim($_POST["stock"] ?? "");
$status = trim($_POST["status"] ?? "");

if(
    $category_id === "" ||
    $short_title === "" ||
    $title === "" ||
    $description === "" ||
    $dis_price === "" ||
    $original_price === "" ||
    $stock === "" ||
    $status === ""
){
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required."
    ]);
    exit();
}

$sql = "INSERT INTO products
(
    category_id,
    short_title,
    title,
    description,
    dis_price,
    original_price,
    stock,
    status
)
VALUES
(
    '$category_id',
    '$short_title',
    '$title',
    '$description',
    '$dis_price',
    '$original_price',
    '$stock',
    '$status'
)";

$res = mysqli_query($conn, $sql);

if($res){
  $product_id = mysqli_insert_id($conn);
  if(isset($_FILES["images"])){
    $totalFiles = count($_FILES["images"]["name"]);

    for($i = 0; $i < $totalFiles; $i++){
      $fileName = $_FILES["images"]["name"][$i];
      $tmpName = $_FILES["images"]["tmp_name"][$i];
      $newFileName = time() . "_" . $fileName;
      $uploadPath = "../uploads/products/" . $newFileName;
      move_uploaded_file($tmpName, $uploadPath);
      $imageSql = "INSERT INTO product_images
      (
          product_id,
          image_path,
          sort_order
      )
      VALUES
      (
          '$product_id',
          '$newFileName',
          '$i'
      )";
      mysqli_query($conn, $imageSql);
    }
  }
    echo json_encode([
        "status" => "success",
        "message" => "Product added successfully!"
    ]);
} else{
    echo json_encode([
        "status" => "error",
        "message" => "Failed to add product."
    ]);
}

?>