<?php
header("Content-Type: application/json");

//Only see with POST methods only....
if($_SERVER["REQUEST_METHOD"] !== "POST"){
  echo "Access denied!";
    exit();
}

session_start();

//db access
include "../config/db.php";

//check email exist or not
$email = $_POST["email"];
$sql = "SELECT * FROM admin WHERE email = '$email'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) == 0 ){
  echo json_encode([
    "status" => "error",
    "message" => "Admin doesn't exist!"
  ]);
  exit();
}

$user = mysqli_fetch_assoc($res); //now we can access values like key value pair

$enter_password = $_POST["password"]; //User entered pass
$db_password = $user["password"]; //Get from db pass

if($db_password !== $enter_password){
    echo json_encode([
        "status" => "error",
        "message" => "Invalid email or password."
    ]);
    exit();
} else{
    $_SESSION["admin_id"] = $user["id"];
    $_SESSION["admin_fullname"] = $user["fullname"];
    $_SESSION["admin_email"] = $user["email"];

    echo json_encode([
        "status" => "success",
        "message" => "Login successful!"
    ]);
    exit();
}

?>


