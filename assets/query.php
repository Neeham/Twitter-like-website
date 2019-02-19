<?php

/*
Here is the plan for future, these query will run based on what is sent to the query of the url
ex: here is the 2 possible types of URL that will exists:
https://haxstar.com/pages/profile?profile=Neeham  //This means I am only on my profile where profile = session name of the logged in user
https://haxstar.com/pages/profile?profile=Neeham&lookup=Amanda //This means I am looking at someone elses profile ex: Amanda
If the user does not exist an error will be displayed: Page does not exist or invalid URL.

Situation: When you click on my profile if Lookup is not in the URL then it will show the logged in session profile
if Lookup exist then it will check if Amanda exists on the DB if it does it will show their profile
If ot an appropriate error will be displayed (Profile not found or invalid URL)

DEMO:

I log in: https://haxstar.com/pages/profile/?profile=Neeham, I go under my profile it shows my Quacks
If I click on the name of someone who I am following ex: I am following Loujan then this is what the URL looking like:
https://haxstar.com/pages/profile/?profile=Neeham&Lookup=Loujan

The way this page will run:
If (Profile & lookup exists in the URL) {
  if (Lookup user exists in DB) {
    then display quack of the user Loujan
  }
  else {
  Display appropriate error.
  }
}
else {
display quack of the user profile
}
*/
session_start();
//get the user ID and username of the currently logged in user through session
$loggedInUserID = $_SESSION["session_id"];
$loggedInUser = $_SESSION["session_user"];
require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
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
    $username = mysql_escape_string($_POST['username']);
    $password = mysql_escape_string($_POST['password']);
    $sql = "SELECT userID, username, password, emailVerification FROM User WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $DBPass = $row['password'];
        $email = $row['emailVerification'];
        if (verify($password, $DBPass)) { //Username found, checking if password matches
            $_SESSION["session_user"] = $row['username'];
            $_SESSION["session_id"] = $row['userID'];
            $_SESSION["session_activated"] = $row['emailVerification'];
            if ($row['emailVerification'] == 0) { //Verifying email/activation
                header("Location: https://www.haxstar.com/?verifyEmail");
                exit;
            } else {
                header("Location: https://www.haxstar.com/pages/feed");
                exit;
            }
        } else { //password does not match
            header("Location: https://www.haxstar.com/?error");
            exit;
        }
    } else { //username not found
        header("Location: https://www.haxstar.com/?error");
        exit;
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
    $fName = mysql_escape_string($_POST['firstname']);
    $lName = mysql_escape_string($_POST['lastname']);
    $username = mysql_escape_string($_POST['username']);
    $pass = mysql_escape_string($_POST['password']);
    $email = mysql_escape_string($_POST['email']);
    $hash = md5(rand(0, 1000));
    $sql = "SELECT * FROM User WHERE (username = '$username' or email = '$email')";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        if (strcasecmp($username, $row['username']) == 0) { //Checking if username already exists, case insensitive
            header("Location: https://www.haxstar.com/pages/register?errorNameExists");
            exit;
        } else if (strcasecmp($email, $row['email']) == 0) { //Checking if email already exists, case insensitive
            header("Location: https://www.haxstar.com/pages/register?errorEmailExists");
            exit;
        }
    } else { //Uername does not exists therefore it will create a new account.
        $secured_password = generateHash($pass);
        $sql = "INSERT INTO User (firstName,lastName,username,password,email,hash) VALUES ('$fName','$lName','$username','$secured_password','$email', '$hash')";
        $result = $conn->query($sql);
        $to = $email; //Sending email to user
        $subject = 'Quacker - Signup | Verification'; //subject of the email
        $message = '
    Hello ' . $fName . ',
    Thank you for signing up with Quacker!
    Your account has been created! Please activate your account by pressing the url below.
    Please click this link to activate your account:
    https://www.haxstar.com/assets/verify.php?email=' . $email . '&hash=' . $hash . '
    ';
        $headers = 'From:no-reply@haxstar.com' . "\r\n"; //header
        mail($to, $subject, $message, $headers); //sending email
        header("Location: https://www.haxstar.com/?verifyEmail");
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
    $inputText = mysql_escape_string($_POST['tweet']);
    //get the corresponding userID from the username
    $sql = "SELECT userID FROM User WHERE username = '$loggedInUser'";
    $result = $conn->query($sql);
    //if the database returned a result (userID)
    if ($row = $result->fetch_assoc()) {
        //put the userID in a variable fetchedUserID
        $fetchedUserID = $row['userID'];
        //insert the logged in user's ID, the Quack, and the timestamp
        $sql = "INSERT INTO Tweet (userID,tweet,date) VALUES ('$fetchedUserID','$inputText','$currentDateTime')";
        $result = $conn->query($sql);
        //check if the Quack is inserted into the database
        if (!$result) {
            //the Quack is not inserted into the database (can elaborate on types of errors)
            header("Location: https://www.haxstar.com/pages/profile?errorInsert");
            exit;
        } else {
            //the Quack is inserted into the database
            header("Location: https://www.haxstar.com/pages/profile?successfulInsert");
            exit;
        }
    } else { //if database didn't return userID
        header("Location: https://www.haxstar.com/pages/profile?errorInsert");
        exit;
    }
}
// ################################# Display Logged In User's Quacks ######################################
function printQuacks() {
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php'; //This is the issue (for some reason have to include config again)
    $sql = "SELECT tweet FROM Tweet WHERE userID = '{$GLOBALS['loggedInUserID']}' ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        ?>
      <!-- <table class="table table-striped"> !-->
      <div class="card my-3">
          <div class="card-header text-center">Your Feed</div>
          <ul class="list-group" id="quack-list">

    <?php
while ($row = $result->fetch_assoc()) {
            echo "<li class=\"list-group-item quack\">";
            foreach ($row as $value) {
                echo "<div class=\"mx-2 \">";
                echo "<h5><a href=\"#\">@{$GLOBALS['loggedInUser']}</a></h5>";

                echo "$value";
                echo "</div></li>";
            }

            ?>  <?php
}
        echo "</ul></div>";
    } else {
        echo 'FAIL - Nothing to show here: Query failed from the Database';
    }
}
//last statement of the code which is to close the database.
mysqli_close($conn);
?>
