<?php
session_start();
//get the user ID and username of the currently logged in user through session
$loggedInUserID = $_SESSION["session_id"];
$loggedInUser   = $_SESSION["session_user"];
include '../assets/config.php';

//Function to Encrypte a Password
function generateHash($password)
{
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

//Function to Decrypte a Password
function verify($password, $hashedPassword)
{
    return crypt($password, $hashedPassword) == $hashedPassword;
}

// ################################# VERIFY LOGIN #################################
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql    = "SELECT userID, username, password FROM User WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {

        $DBPass = $row['password'];

        if (verify($password, $DBPass)) { //Username found, checking if password matches
            $_SESSION["session_user"] = $row['username'];
            $_SESSION["session_id"]   = $row['userID'];
            header("Location: http://www.haxstar.com/pages/feed");
            exit;

        } else { //password does not match
            header("Location: http://www.haxstar.com/?error");
        }
    } else { //username not found
        header("Location: http://www.haxstar.com/?error");
    }
}

// ################################# Get UserID From Username ################################# (not working)

//function to return the userID of a logged in username
//function getUserID(){
//tried making it, kept getting sql error
//Could not run query: Access denied for user 'root'@'localhost' (using password: NO)

/*
//get the username of the currently logged in user through session

//get the corresponding userID from the username
$result = mysql_query("SELECT userID FROM User WHERE username = '$loggedInUser'");
if (!$result) {
echo 'Could not run query: ' . mysql_error();
exit;
}
$row = mysql_fetch_row($result);

echo $row[0]; //UserID
return $row[0];
*/
//}

// ################################# Register an Account #################################

if (isset($_POST['register'])) {
    $fName    = $_POST['firstname'];
    $lName    = $_POST['lastname'];
    $username = $_POST['username'];
    $pass     = $_POST['password'];
    $email    = $_POST['email'];

    $sql           = "SELECT * FROM User WHERE username = '$username'";
    $result        = $conn->query($sql);
    $usernamecheck = mysqli_num_rows($result);
    if ($usernamecheck > 0) { //Checking if username already exists
        header("Location: http://www.haxstar.com/pages/register?errorNameExists");
        exit;
    } else { //Uername does not exists therefore it will create a new account.
        $secured_password = generateHash($pass);
        $sql              = "INSERT INTO User (firstName,lastName,username,password,email) VALUES ('$fName','$lName','$username','$secured_password','$email')";
        $result           = $conn->query($sql);
        header("Location: http://www.haxstar.com/pages/feed");
        exit;
    }
}

// ################################# Update an Account #################################

// ################################# Delete an Account #################################



// ################################# Post a Quack ######################################

//if the post button is clicked
if (isset($_POST['postQuackBtn'])) {

    //get current date and time
    $currentDateTime = date('Y-m-d H:i:s');

    //get the input from the textbox
    $inputText = $_POST['tweet'];

    //get the corresponding userID from the username
    $sql    = "SELECT userID FROM User WHERE username = '$loggedInUser'";
    $result = $conn->query($sql);

    //if the database returned a result (userID)
    if ($row = $result->fetch_assoc()) {
        //put the userID in a variable fetchedUserID
        $fetchedUserID = $row['userID'];

        //insert the logged in user's ID, the Quack, and the timestamp
        $sql    = "INSERT INTO Tweet (userID,tweet,date) VALUES ('$fetchedUserID','$inputText','$currentDateTime')";
        $result = $conn->query($sql);

        //check if the Quack is inserted into the database
        if (!$result) {
            //the Quack is not inserted into the database (can elaborate on types of errors)
            header("Location: http://www.haxstar.com/pages/profile?errorInsert");
            exit;
        } else {
            //the Quack is inserted into the database
            header("Location: http://www.haxstar.com/pages/profile?successfulInsert");
            exit;
        }
    } else { //if database didn't return userID
        header("Location: http://www.haxstar.com/pages/profile?errorInsert");
        exit;
    }
}

// ################################# Display Logged In User's Quacks ###################################### (In Progress)

function printQuacks()
{
    //$sql = "SELECT tweet FROM Tweet WHERE userID = '$loggedInUserID' ORDER BY date DESC";
    $sql    = "SELECT tweet FROM Tweet WHERE userID = '1'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        echo 'PASS';
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row["tweet"]. "<br>";
        }
    } else {
        echo 'FAIL';
    }
}

//last statement of the code which is to close the database.
mysqli_close($conn);
?>
