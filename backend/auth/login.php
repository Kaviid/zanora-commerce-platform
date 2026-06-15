<?php
session_start();

//db access
include "../config/db.php";

/* check all connected correctly register.html and php....
if this work mean POST method done!
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

$email = $_POST["email"];
$enter_password = $_POST["password"];

//check email exist already in db
$sql = "SELECT * FROM users WHERE email='$email'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) == 0 ){
  die("Email doesn't exist!<br>Please register as a new user!");
}

$user = mysqli_fetch_assoc($res); //now we can access values like key value pair

$hashed_password = $user["password"];

if(password_verify($enter_password, $hashed_password)){
  //store user data in session...
  $_SESSION["user_id"] = $user["id"];
  $_SESSION["fullname"] = $user["fullname"];
  $_SESSION["email"] = $user["email"];

  //redirect to home page...
  header("Location: ../../index.php");
  exit();
}else{
  die("Incorect passowrd!");
}

?>