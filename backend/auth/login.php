<?php

//Only see with POST methods only....
if($_SERVER["REQUEST_METHOD"] !== "POST"){
  echo "Access denied!";
    exit();
}

session_start();

//db access
include "../config/db.php";

/* check all connected correctly register.html and php....
if this work mean POST method done!
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

//check email exist or not
$email = $_POST["email"];

//check email exist already in db
$sql = "SELECT * FROM users WHERE email='$email'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) == 0 ){
  echo json_encode([
    "status" => "error",
    "feild" => "email",
    "message" => "Email doesn't exist, Please register as a new user!"
  ]);
  exit();
}

$user = mysqli_fetch_assoc($res); //now we can access values like key value pair

$enter_password = $_POST["password"]; //User entered pass
$hashed_password = $user["password"]; //Get from db pass

if(password_verify($enter_password, $hashed_password)){
  //store user data in session...
  $_SESSION["user_id"] = $user["id"];
  $_SESSION["fullname"] = $user["fullname"];
  $_SESSION["email"] = $user["email"];

  echo json_encode([
      "status" => "success",
      "message" => "Login successful!"
  ]);
  exit();
}else{
  echo json_encode([
    "status" => "error",
    "feild" => "pass",
    "message" => "Incorrect password!"
  ]);
  exit();
}

?>