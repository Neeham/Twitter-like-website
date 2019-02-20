<?php
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
                header("Location: https://www.haxstar.com/?Alert=verifyEmail");
                exit;
            } else {
                header("Location: https://www.haxstar.com/pages/feed?Login=".$_SESSION["session_user"]);
                exit;
            }
        } else { //password does not match
            header("Location: https://www.haxstar.com/?Alert=credentialError");
            exit;
        }
    } else { //username not found
        header("Location: https://www.haxstar.com/?Alert=credentialError");
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
            header("Location: https://www.haxstar.com/pages/register?Alert=errorNameExists");
            exit;
        } else if (strcasecmp($email, $row['email']) == 0) { //Checking if email already exists, case insensitive
            header("Location: https://www.haxstar.com/pages/register?Alert=errorEmailExists");
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
    https://www.haxstar.com/assets/verify?Email=' . $email . '&Hash=' . $hash . '
    ';
        $headers = 'From:no-reply@haxstar.com' . "\r\n"; //header
        mail($to, $subject, $message, $headers); //sending email
        header("Location: https://www.haxstar.com/?Alert=verifyEmail");
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
            header("Location: https://www.haxstar.com/pages/profile?Login=".$_SESSION["session_user"]."&Alert=errorInsert");
            exit;
        } else {
            //the Quack is inserted into the database
            header("Location: https://www.haxstar.com/pages/profile?Login=".$_SESSION["session_user"]."&Alert=successfulInsert");
            exit;
        }
    } else { //if database didn't return userID
        header("Location: https://www.haxstar.com/pages/profile?Login=".$_SESSION["session_user"]."&Alert=errorInsert");
        exit;
    }
}


// ################################# Display Logged In User's Quacks ######################################
function printQuacks($type) { //This function will take param and will do if else based on the following: name, email, post, follower count, following count
require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php'; //This is the issue (for some reason have to include config again)

  If (isset($_GET['Login']) && !empty($_GET['Login']) AND isset($_GET['Lookup']) && !empty($_GET['Lookup'])) {
    $following = mysql_escape_string($_GET['Lookup']);
    $sql = "SELECT userID FROM User WHERE username = '$following'";
    $result = $conn->query($sql);
      if ($row = $result->fetch_assoc()) {
        if ($type == 'name') {
          printName($row['userID']);
        }
        if ($type == 'email') {
          printEmail($row['userID']);
        }
        if ($type == 'post') {
            printPost($row['userID']);
          }
          if ($type == 'followerCount') {
            printFollowerCount($row['userID']);
          }
          if ($type == 'followingCount') {
            printFollowingCount($row['userID']);
          }
        } else {
          header("Location: https://www.haxstar.com/pages/profile?Login=".$_SESSION["session_user"]."&Alert=invalidURL");  //NEED TO FIX THIS
          exit;
        }
      } else {
          if ($type == 'name') {
            printName($GLOBALS['loggedInUserID']);
          }
          if ($type == 'email') {
            printEmail($GLOBALS['loggedInUserID']);
          }
          if ($type == 'post') {
            printPost($GLOBALS['loggedInUserID']);
          }
          if ($type == 'followerCount') {
            printFollowerCount($GLOBALS['loggedInUserID']);
          }
          if ($type == 'followingCount') {
            printFollowingCount($GLOBALS['loggedInUserID']);
          }
        }
      }

function printName($userID) {
  require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php'; //This is the issue (for some reason have to include config again)
  $sql = "SELECT firstName, lastName FROM User WHERE userID = '$userID'";
  $result = mysqli_query($conn, $sql);
  if ($row = $result->fetch_assoc()) {
    echo $row['firstName'];
    }
}

function printEmail($userID) {
  require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php'; //This is the issue (for some reason have to include config again)
  $sql = "SELECT email FROM User WHERE userID = '$userID'";
  $result = mysqli_query($conn, $sql);
  if ($row = $result->fetch_assoc()) {
    echo $row['email'];
    }
}

function printFollowerCount($userID) {
  require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php'; //This is the issue (for some reason have to include config again)
  $sql = "SELECT COUNT(follower) as Sum FROM Follow WHERE follower = '$userID'";
  $result = mysqli_query($conn, $sql);
  if ($row = $result->fetch_assoc()) {
    echo $row['Sum'];
    }
}

function printFollowingCount($userID) {
  require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php'; //This is the issue (for some reason have to include config again)
  $sql = "SELECT COUNT(following) as Sum FROM Follow WHERE following = '$userID'";
  $result = mysqli_query($conn, $sql);
  if ($row = $result->fetch_assoc()) {
    echo $row['Sum'];
    }
}

function printPost($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php'; //This is the issue (for some reason have to include config again)
    $sql    = "SELECT tweet FROM Tweet WHERE userID = '$userID' ORDER BY date DESC";
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
                //echo "<h5><span class=\"float-right\"><button class=\"btn btn-danger delete-button\"><i class=\"fas fa-times\"></i> Delete</button></span></h5>";
                echo "$value";
                echo "</div></li>";
            }
        }
        echo "</ul></div>";
    }
}



//last statement of the code which is to close the database.
mysqli_close($conn);
?>
