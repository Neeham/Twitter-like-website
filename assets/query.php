<?php
session_start();
include '../assets/config.php';

/*
$pass = '1234qwe';
$secured_password = generateHash($pass);
$sql = "INSERT INTO user (first,last,username,password,email,telephone,accesslvl) VALUES ('Neeham','Khalid','Neeham','$secured_password','Neehamk@gmail.com','5149655050','3')";
$result = $conn->query($sql);
*/

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
	header("Location: http://www.haxstar.com/pages/login");
	exit;

}
else {
mysqli_close($conn);
header("Location: http://www.haxstar.com/pages/login?error");
}
}
else {
mysqli_close($conn);
header("Location: http://www.haxstar.com/pages/login?error");
}
}

// ################################# Register an Account #################################

//Add another security measure here, verify that a person is in session and that they are either access level 2 or 3.

if(isset($_POST['register'])) {
$fName = $_POST['first'];
$lName = $_POST['last'];
$username = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

$sql = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($sql);
$usernamecheck = mysqli_num_rows($result);
if($usernamecheck > 0) { //Checking if username already exists
header("Location: http://www.haxstar.com/pages/login?errorNameExists");
exit;
} else {
	$secured_password = generateHash($pass);
$sql = "INSERT INTO user (first,last,username,password,email) VALUES ('$fName','$lName','$username','$secured_password','$email')";
$result = $conn->query($sql);
header("Location: http://www.haxstar.com");
exit;
}
}

// ################################# Update an Account #################################

// ################################# Delete an Account #################################
?>
