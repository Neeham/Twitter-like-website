// ################################# Modify this according to new DB #################################

<?php
session_start();
include '/assets/config.php';

/**
$pass = '1234qwe';
$secured_password = generateHash($pass);
$sql = "INSERT INTO user (first,last,uID,pwd,email,telephone,accesslvl) VALUES ('Neeham','Khalid','Neeham','$secured_password','Neehamk@gmail.com','5149655050','3')";
$result = $conn->query($sql);
**/

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


$sql = "SELECT uID, pwd, accesslvl FROM user WHERE uID = '$username'";
$result = $conn->query($sql);
if ($row = $result->fetch_assoc()){

	$DBPass = $row['pwd'];

 if (verify($password, $DBPass)){
	$_SESSION["session_user"]=$row['uID'];
	$_SESSION["session_access"]=$row['accesslvl'];
	header("Location: http://www.34rgc.com/dev-34/home/panel/activity");
	exit;

}
else {
$conn->close();
header("Location: http://www.34rgc.com/dev-34/home/login?errorPass");
}
}
else {
$conn->close();
header("Location: http://www.34rgc.com/dev-34/home/login?errorUser");
}
}

// ################################# Register an Account #################################

//Add another security measure here, verify that a person is in session and that they are either access level 2 or 3.

if(isset($_POST['register'])) {
$fName = $_POST['first'];
$lName = $_POST['last'];
$email = $_POST['email'];
$tele = $_POST['telephone'];
$username = $_POST['username'];
$pass = $_POST['password'];
$access = $_POST['access'];

$sql = "SELECT * FROM user WHERE uID = '$username'";
$result = $conn->query($sql);
$uidcheck = mysqli_num_rows($result);
if($uidcheck > 0) {
header("Location: http://www.34rgc.com/dev-34/home/panel/manage?error");
exit;
} else {
	$secured_password = generateHash($pass);
$sql = "INSERT INTO user (first,last,uID,pwd,email,telephone,accesslvl) VALUES ('$fName','$lName','$username','$secured_password','$email','$tele','$access')";
$result = $conn->query($sql);
header("Location: http://www.34rgc.com/dev-34/home/panel/manage?success");
exit;
}
}

// ################################# Update an Account #################################

// ################################# Delete an Account #################################
?>
