<?php
session_start();
include '../assets/config.php';

//Function to Encrypte a Password
function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

//Function to Decrypte a Password
function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

// ################################# VERIFY LOGIN #################################
if(isset($_POST['login'])) {
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT username, password FROM User WHERE username = '$username'";
$result = $conn->query($sql);
if ($row = $result->fetch_assoc()){

	$DBPass = $row['password'];

 if (verify($password, $DBPass)){
	$_SESSION["session_user"]=$row['username'];
	header("Location: http://www.haxstar.com/pages/feed");
	exit;

}
else {
header("Location: http://www.haxstar.com/?error");
}
}
else {
header("Location: http://www.haxstar.com/?error");
}
}

// ################################# Register an Account #################################

if(isset($_POST['register'])) {
$fName = $_POST['firstname'];
$lName = $_POST['lastname'];
$username = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

$sql = "SELECT * FROM User WHERE username = '$username'";
$result = $conn->query($sql);
$usernamecheck = mysqli_num_rows($result);
if($usernamecheck > 0) { //Checking if username already exists
header("Location: http://www.haxstar.com/pages/register?errorNameExists");
exit;
} else {
	$secured_password = generateHash($pass);
$sql = "INSERT INTO User (firstName,lastName,username,password,email) VALUES ('$fName','$lName','$username','$secured_password','$email')";
$result = $conn->query($sql);
header("Location: http://www.haxstar.com/pages/feed");
exit;
}
}

// ################################# Update an Account #################################

// ################################# Delete an Account #################################

mysqli_close($conn);
?>