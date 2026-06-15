
<?php

//Only see with POST methods only....
if($_SERVER["REQUEST_METHOD"] !== "POST"){
  echo "Access denied!";
    exit();
}

include "../config/db.php"; //db access

/* check all connected correctly register.html and php....
if this work mean POST method done!
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

//Check that email already register or not
$email = $_POST["email"];

$sql = "SELECT * FROM users WHERE email='$email'";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) >= 1){ //check $res contain rows more that or same to 1...
  echo json_encode([
    "status" => "error",
    "message" => "Email already taken!"
  ]);
  exit();
}

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];

$fullname = $firstname." ".$lastname;
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(fullname, email, password) VALUES('$fullname', '$email', '$hashed_password')";

if(mysqli_query($conn, $sql)){
    echo json_encode([
        "status" => "success",
        "message" => "Registration successful!"
    ]);

} else {
    echo json_encode([
        "status" => "error",
        "message" => "Registration failed!"
    ]);
}












?>
