
<?php
include "../config/db.php"; //db access

/* check all connected correctly register.html and php....
if this work mean POST method done!
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

//echo $firstname." ".$lastname."<br>";
//echo $email

//Check that email already register or not
$sql = "SELECT * FROM users WHERE email='$email'";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) >= 1){ //check $res contain rows more that or same to 1...
  die("Email already taken!");
}

//Validate pass and confirm pass
if($password != $confirm_password){
  die("Passwords do not match!");
}

//combine first and last names
$fullname = $firstname." ".$lastname; 

//password encrypt for safety...
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//sql query
$sql = "INSERT INTO users(fullname, email, password) VALUES('$fullname', '$email', '$hashed_password')";

if(mysqli_query($conn, $sql)){
  echo "Registation Successful!";
} else{
  echo "Registration Failed";
}

?>
