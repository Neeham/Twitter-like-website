<?php
session_start();
$_SESSION['sessionID']; //Session to store logged in user ID
$_SESSION['sessionUsername']; //Session to store logged in username
$_SESSION['sessionActivated']; //Session to check whether or not the user is has succes verified their account
$_SESSION['sessionLastLoggedIn']; //Session to store the last login time
$_SESSION['loggedInOrVisitingProfile']; //Stores either the ID of the logged in user or the visiting profile
require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';

// ################################# VERIFY LOGIN #################################
//The goal of this method is to verify whether or not the preson can log in.
if (isset($_POST['login'])) {
    $username = mysql_escape_string($_POST['username']);
    $password = mysql_escape_string($_POST['password']);
    $sql      = "SELECT userID, username, password, emailVerification, lastLogin FROM User WHERE username = '$username'";
    $result   = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $DBPass = $row['password'];
        $email  = $row['emailVerification'];
        if (verify($password, $DBPass)) { //Username found, checking if password matches
            if ($row['emailVerification'] == 0) { //Verifying email/activation
                header("Location: https://www.haxstar.com/?Alert=verifyEmail");
                exit;
            } else { //User has succesfully identify itself, therefore set lastLogin in database as the current date and time.
                $innerSQL    = "UPDATE User SET lastLogin = '{$GLOBALS['currentDateTime']}' WHERE userID = '{$row['userID']}'";
                $innerResult = $conn->query($innerSQL);
                $result      = $conn->query($sql);
                if ($row = $result->fetch_assoc()) { // select the fields from database again and set them as sessions.
                    $_SESSION['sessionID']           = $row['userID'];
                    $_SESSION['sessionUsername']     = $row['username'];
                    $_SESSION['sessionActivated']    = $row['emailVerification'];
                    $_SESSION['sessionLastLoggedIn'] = date_format(date_create($row['lastLogin']), 'd M y - H:i');
                    if (isset($_POST['remember'])) { //if remember me is checked, set cookie for 10 days so the user won't have to relogin.
                        setcookie("cookieID", $row['userID'], time() + (86400 * 10), "/");
                        setcookie("cookieUsername", $row['username'], time() + (86400 * 10), "/");
                        setcookie("cookieActivated", $row['emailVerification'], time() + (86400 * 10), "/");
                        setcookie("cookieLoggedIn", date_format(date_create($row['lastLogin']), 'd M y - H:i'), time() + (86400 * 10), "/");
                    }
                    header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION['sessionUsername']);
                    exit;
                }
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

// ################################# Register an Account #################################
//Before registering a user account, it checks whether or not the username and/or email already exists
if (isset($_POST['register'])) {
    $registration = true;
    if ($registration) {
        $fName    = mysql_escape_string($_POST['firstname']);
        $lName    = mysql_escape_string($_POST['lastname']);
        $username = mysql_escape_string($_POST['username']);
        $pass     = mysql_escape_string($_POST['password']);
        $email    = mysql_escape_string($_POST['email']);
        $hash     = md5(rand(0, 1000));
        $sql      = "SELECT * FROM User WHERE (username = '$username' or email = '$email')";
        $result   = $conn->query($sql);
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
            $sql              = "INSERT INTO User (firstName,lastName,username,password,email,hash) VALUES ('$fName','$lName','$username','$secured_password','$email', '$hash')";
            $result           = $conn->query($sql);
            $to               = $email; //Sending email to user
            $subject          = 'Quacker - Signup | Verification'; //subject of the email
            $message          = '



<html>
<head>
<title>Welcome to Quacker!</title>
</head>
<body>
<p>Hello ' . $fName . ',</p>
<table>
<tr>
<th>Email Adddress</th>
<th>Hash</th>
<th>Activation Link</th>
</tr>
<tr>
<td>' . $email . '</td>
<td>' . $hash . '</td>
<td>https://www.haxstar.com/assets/verify?Email=' . $email . '&Hash=' . $hash . '</td>
</tr>
</table>
</body>
</html>



            ';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: no-reply@haxstar.com' . "\r\n";
            mail($to, $subject, $message, $headers); //sending email
            header("Location: https://www.haxstar.com/?Alert=verifyEmail");
            exit;
        }
    } else {
        header("Location: https://www.haxstar.com/pages/register?Alert=disabled");
    }
}

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

// ################################# Searching a User #################################
//This method searches the database for all the registered user and let user click on it in order to redirect to their profile.
if (isset($_POST["searchUser"])) {
    $output = '';
    $sql    = "SELECT * FROM User WHERE username LIKE '%" . $_POST["searchUser"] . "%'";
    $result = mysqli_query($conn, $sql);
    $output = '<ul class="list-unstyled">';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<li>' . $row["username"] . '</li>';
    }
    $output .= '</ul>';
    echo $output;
}

// ################################# Upload Profile Picture ######################################
if (isset($_POST["cropAndUpload"])) {
    $data          = $_POST["cropAndUpload"];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data          = base64_decode($image_array_2[1]);
    $imageName     = date("Y-m-d H-i-s_") . $_SESSION['sessionID'] . '.png'; //Generate a unique filename, format: Date Time_userIDOfUploader
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/resources/images/profilePic/' . $imageName, $data); //Upload picture to server
    $deleteFile;
    $shouldDelete = false;
    $sql          = "SELECT profilePicture FROM User WHERE userID = '{$_SESSION['sessionID']}'";
    $result       = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        if ($row["profilePicture"] !== "default.jpg") { //Ensuring the current profile picture is not the default picture.
            $deleteFile   = $row["profilePicture"];
            $shouldDelete = true;
        }
    }
    $sql    = "UPDATE User SET profilePicture = '$imageName' WHERE userID = '{$_SESSION['sessionID']}'"; //Update the uploaded file name onto the database.
    $result = $conn->query($sql);
    if ($shouldDelete = true) { //If the old profile picture was not the default picture, remove it from the server to save valuable resources.
        $path = $_SERVER['DOCUMENT_ROOT'] . '/resources/images/profilePic/' . $deleteFile;
        unlink($path);
    }
}

// ################################# Display Quack on Feed ######################################
function printFeed()
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT u.firstName AS displayName, u.userName AS username, u.profilePicture as profilePic, t.tweet as tweets, t.date as date, t.tweetID as tweetID FROM Tweet t INNER JOIN User u ON u.userID = t.userID WHERE u.userID = '{$_SESSION['sessionID']}' OR EXISTS (SELECT 1 FROM Follow f WHERE f.follower = '{$_SESSION['sessionID']}' AND f.following = t.userID) ORDER BY t.date DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
?>
        <li class="list-group-item quack">
        <div class="text-danger"><?php
        echo date_format(date_create($row['date']), 'd M y - g:i A');
?></div>
        <div class="media-body mx-2">
        <h5>
          <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['username']}";
?>"><img src="https://haxstar.com/resources/images/profilePic/<?php
        echo $row['profilePic'];
?>" class="rounded-circle" style="height: 40px; max-width: 40px; width: 100%;"></a>
          <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['username']}";
?>"><?php
        echo $row['displayName'];
?></a>
        </h5>
<?php
        echo $row['tweets'];
        $retrivedTweetID = $row['tweetID'];
        echo '<br>';
        $innerSQL    = "SELECT date FROM Liked WHERE tweetID = $retrivedTweetID AND userID = {$_SESSION['sessionID']}";
        $innerResult = $conn->query($innerSQL);
        if ($innerResult->fetch_assoc()) {
?>
          <form action="" method="post">   <!-- if you already liked the Quack, it will show unlikeQuack button -->
          <button class="btn float-right btn-danger like mx-1" name="<?php
            echo $retrivedTweetID . '_unlikeQuackbtn';
?>" type="submit" data-tippy-content="<?php
            echo countLikes($retrivedTweetID);
?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        } else {
?>
          <!-- THIS CAN BE ALTERED BASED ON FRONTEND'S DESIGN  -->
          <form action="" method="post">  <!-- if you want to like the Quack, it will show likeQuack button -->
          <button class="btn float-right btn-outline-danger like mx-1" name="<?php
            echo $retrivedTweetID . '_likeQuackbtn';
?>" type="submit" data-tippy-content="<?php
            echo countLikes($retrivedTweetID);
?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        }

        if (isset($_POST[$retrivedTweetID . '_likeQuackbtn'])) {
            $insertSQL    = "INSERT INTO Liked (tweetID,userID,date) VALUES ('$retrivedTweetID','{$_SESSION['sessionID']}','{$GLOBALS['currentDateTime']}')";
            $insertResult = $conn->query($insertSQL);
            if (!$insertResult) {
                //the Like is not inserted into the database therefore display the errorInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$_SESSION['sessionUsername']}&Alert=errorLike';</script>";
            } else {
                //the Quack is inserted into the database therefore display the successfulInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$_SESSION['sessionUsername']}&Alert=successLike';</script>";
            }
        }

        if (isset($_POST[$retrivedTweetID . '_unlikeQuackbtn'])) {
            $deletesql    = "DELETE FROM Liked WHERE tweetID = '$retrivedTweetID' AND userID = '{$_SESSION['sessionID']}'";
            $deleteResult = $conn->query($deletesql);
            if (!$deleteResult) {
                //the Quack is not inserted into the database therefore display the errorInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$_SESSION['sessionUsername']}&Alert=errorLike';</script>";
            } else {
                //the Quack is inserted into the database therefore display the successfulInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$_SESSION['sessionUsername']}&Alert=successUnlike';</script>";
            }
        }
?>
        </div>
        </li>
<?php
    } //end of while
}

// ####################################################### Displays Number of Users That Liked a Quack ######################################
function countLikes($givenTweetID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT COUNT(*) AS total FROM Liked WHERE tweetID = '$givenTweetID'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['total'] == 0) {
                echo 'Be the first to like this Quack!';
            } else if ($row['total'] == 1) {
                echo $row['total'] . ' user liked this Quack';
            } else {
                echo $row['total'] . ' users liked this Quack';
            }
        }
    }
}

// ########################################################## Post a Quack ##################################################################
//if the post button is clicked
if (isset($_POST['postQuackBtn'])) {
    //get the input from the textbox
    $inputText = mysql_escape_string($_POST['tweet']);
    //get the corresponding userID from the username
    $sql       = "SELECT userID FROM User WHERE username = '{$_SESSION['sessionUsername']}'";
    $result    = $conn->query($sql);
    //if the database returned a result (userID)
    if ($row = $result->fetch_assoc()) {
        //put the userID in a variable fetchedUserID
        $fetchedUserID = $row['userID'];
        //insert the logged in user's ID, the Quack, and the timestamp
        $sql           = "INSERT INTO Tweet (userID,tweet,date) VALUES ('$fetchedUserID','$inputText','{$GLOBALS['currentDateTime']}')";
        $result        = $conn->query($sql);
        //check if the Quack is inserted into the database
        if (!$result) {
            //the Quack is not inserted into the database therefore display the errorInsert alert
            header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION['sessionUsername'] . "&Alert=errorInsert");
            exit;
        } else {
            //the Quack is inserted into the database therefore display the successfulInsert alert
            header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION['sessionUsername'] . "&Alert=successfulInsert");
            exit;
        }
    } else { //if database didn't return userID, display the errorInsert alert
        header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION['sessionUsername'] . "&Alert=errorInsert");
        exit;
    }
}

// ################################# Display Quacks and everything that displays under profile page ######################################
function printProfilePage($type) //This function will take param and will do if else based on the following: name, email, post, follower count, following count
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    if (isset($_GET['Login']) && !empty($_GET['Login']) AND isset($_GET['Lookup']) && !empty($_GET['Lookup'])) {
        $following = mysql_escape_string($_GET['Lookup']);
        $sql       = "SELECT userID FROM User WHERE username = '$following'";
        $result    = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            if ($following == $_SESSION['sessionUsername']) { //If the lookup user is the person itself, redirect to their profile without lookup in url
                echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}';</script>";
            }
            $_SESSION['loggedInOrVisitingProfile'] = $row['userID'];
            if ($type == 'button') {
                followButton($row['userID']);
            }
            if ($type == 'followUser') {
                followUser($row['userID']);
            }
            if ($type == 'unfollowUser') {
                unfollowUser($row['userID']);
            }
        } else {
            echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Alert=invalidURL';</script>";
        }
    } else {
        $_SESSION['loggedInOrVisitingProfile'] = $_SESSION['sessionID'];
        if ($type == 'upload') {
            printUpload();
        }
    }

    if ($type == 'profilepic') {
        printProfile($_SESSION['loggedInOrVisitingProfile']);
    }
    if ($type == 'name') {
        printName($_SESSION['loggedInOrVisitingProfile']);
    }
    if ($type == 'email') {
        printEmail($_SESSION['loggedInOrVisitingProfile']);
    }
    if ($type == 'post') {
        printPost($_SESSION['loggedInOrVisitingProfile']);
    }
    if ($type == 'followerCount') {
        printFollowerCount($_SESSION['loggedInOrVisitingProfile']);
    }
    if ($type == 'followingCount') {
        printFollowingCount($_SESSION['loggedInOrVisitingProfile']);
    }
    if ($type == 'following') {
        following($_SESSION['loggedInOrVisitingProfile']);
    }
    if ($type == 'followers') {
        followers($_SESSION['loggedInOrVisitingProfile']);
    }
}

function printProfile($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT profilePicture FROM User WHERE userID = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($row = $result->fetch_assoc()) {
        echo $row['profilePicture'];
    }
}

function printUpload()
{
?>
    <input type="file" name="imageUpload" class="btn btn-info" style="width: 120px; color:transparent;" id="imageUpload" />
<?php
}

function printName($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT firstName, lastName FROM User WHERE userID = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($row = $result->fetch_assoc()) {
        echo $row['firstName'] . " " . $row['lastName'];
    }
}

function printEmail($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT email FROM User WHERE userID = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($row = $result->fetch_assoc()) {
        echo $row['email'];
    }
}

function printFollowerCount($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT COUNT(following) as Sum FROM Follow WHERE following = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($row = $result->fetch_assoc()) {
        echo $row['Sum'];
    }
}

function printFollowingCount($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT COUNT(follower) as Sum FROM Follow WHERE follower = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($row = $result->fetch_assoc()) {
        echo $row['Sum'];
    }
}

function followButton($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT follower, following FROM Follow WHERE follower = {$_SESSION['sessionID']} AND following = '$userID'";
    $result = mysqli_query($conn, $sql);
    if ($row = $result->fetch_assoc()) {
?>
      <form action="" method="post">
      <button class="btn btn-danger" name="unfollowUser" type="submit">Unfollow</button>
      </form>
<?php
    } else {
?>
      <form action="" method="post">
      <button class="btn btn-success" name="followUser" type="submit">Follow</button>
      </form>
<?php
    }
}

function following($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT Follow.following as followingID, User.username as user, User.profilePicture as profilePic FROM Follow INNER JOIN User ON Follow.following = User.userID WHERE follower = '$userID' ORDER BY RAND() ASC LIMIT 2";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
?>
      <li class="list-group-item profile-card-bg">
        <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['user']}";
?>"><img src="https://haxstar.com/resources/images/profilePic/<?php
        echo $row['profilePic'];
?>" class="rounded-circle" style="height: 40px; max-width: 40px; width: 100%;"></a>
        <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['user']}";
?>"><?php
        echo $row['user'];
?></a>
      </li>
<?php
    }
    $secondSQL    = "SELECT Follow.following as followingID, User.username as user, User.profilePicture as profilePic FROM Follow INNER JOIN User ON Follow.following = User.userID WHERE follower = '$userID' ORDER BY user ASC";
    $secondResult = mysqli_query($conn, $secondSQL);
    $totalResult  = 0;
    while ($row = $secondResult->fetch_assoc()) {
        $totalResult++;
    }
    if ($totalResult > 2) {
?>
      <li class="list-group-item profile-card-bg text-center">
          <button type="button" class="btn btn-info btn-sm" id="viewAllFollowing">View All</button>
      </li>
<?php
    }
}

function followers($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT Follow.follower as followingID, User.username as user, User.profilePicture as profilePic FROM Follow INNER JOIN User ON Follow.follower = User.userID WHERE following = '$userID' ORDER BY RAND() ASC LIMIT 2";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
?>
      <li class="list-group-item profile-card-bg">
        <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['user']}";
?>"><img src="https://haxstar.com/resources/images/profilePic/<?php
        echo $row['profilePic'];
?>" class="rounded-circle" style="height: 40px; max-width: 40px; width: 100%;"></a>
        <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['user']}";
?>"><?php
        echo $row['user'];
?></a>
      </li>
<?php
    }
    $secondSQL    = "SELECT Follow.follower as followingID, User.username as user, User.profilePicture as profilePic FROM Follow INNER JOIN User ON Follow.follower = User.userID WHERE following = '$userID' ORDER BY user ASC";
    $secondResult = mysqli_query($conn, $secondSQL);
    $totalResult  = 0;
    while ($row = $secondResult->fetch_assoc()) {
        $totalResult++;
    }
    if ($totalResult > 2) {
?>
      <li class="list-group-item profile-card-bg text-center">
          <button type="button" class="btn btn-info btn-sm" id="viewAllFollower">View All</button>
      </li>
<?php
    }
}

function printPost($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT * FROM Tweet WHERE userID = '$userID' ORDER BY date DESC";
    $result = mysqli_query($conn, $sql);
?>
<?php
    while ($row = $result->fetch_assoc()) {
?>
      <li class="list-group-item quack profile-quack-card-bg p-4">
      <div class="text-danger"><?php
        echo date_format(date_create($row['date']), 'd M y - g:i A');
?></div>
<?php
        echo "<div class=\"mx-2\">";
        echo $row['tweet'];
        $retrivedTweetID = $row['tweetID'];
        $innerSQL        = "SELECT date FROM Liked WHERE tweetID = $retrivedTweetID AND userID = {$_SESSION['sessionID']}";
        $innerResult     = $conn->query($innerSQL);
        if ($innerResult->fetch_assoc()) {
?>
          <!-- THIS CAN BE ALTERED BASED ON FRONTEND'S DESIGN  -->
          <form action="" method="post" class="d-inline">   <!-- if you already liked the Quack, it will show unlikeQuack button -->
          <button class="btn float-right btn-danger like mx-1" name="<?php
            echo $retrivedTweetID . '_unlikeQuackbtn';
?>" type="submit" data-tippy-content="<?php
            echo countLikes($retrivedTweetID);
?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        } else {
?>
          <!-- THIS CAN BE ALTERED BASED ON FRONTEND'S DESIGN  -->
          <form action="" method="post" class="d-inline">  <!-- if you want to like the Quack, it will show likeQuack button -->
          <button class="btn float-right btn-outline-danger like mx-1" name="<?php
            echo $retrivedTweetID . '_likeQuackbtn';
?>" type="submit" data-tippy-content="<?php
            echo countLikes($retrivedTweetID);
?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        }
        $currentLookup = mysql_escape_string($_GET['Lookup']);
        if (isset($_POST[$retrivedTweetID . '_likeQuackbtn'])) {
            $currentDateTime = date('Y-m-d H:i:s');
            $insertSQL       = "INSERT INTO Liked (tweetID,userID,date) VALUES ('$retrivedTweetID','{$_SESSION['sessionID']}','$currentDateTime')";
            $insertResult    = $conn->query($insertSQL);
            if (!$insertResult) {
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$currentLookup}&Alert=errorLike';</script>";
                    exit;
                } else {
                    //the Like is not inserted into the database therefore display the errorLike alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Alert=errorLike';</script>";
                    exit;
                }
            } else {
                //the Quack is inserted into the database therefore display the successfulLike alert
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$currentLookup}&Alert=successLike';</script>";
                    exit;
                } else {
                    //the Like is not inserted into the database therefore display the errorInsert alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Alert=successLike';</script>";
                    exit;
                }
            }
        }
        if (isset($_POST[$retrivedTweetID . '_unlikeQuackbtn'])) {
            $deletesql    = "DELETE FROM Liked WHERE tweetID = '$retrivedTweetID' AND userID = '{$_SESSION['sessionID']}'";
            $deleteResult = $conn->query($deletesql);
            if (!$deleteResult) {
                //the Quack is not inserted into the database therefore display the errorLike alert
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$currentLookup}&Alert=errorLike';</script>";
                    exit;
                } else {
                    //the Like is not inserted into the database therefore display the errorInsert alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Alert=errorLike';</script>";
                    exit;
                }
            } else {
                //the Quack is inserted into the database therefore display the successfulUnlike alert
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$currentLookup}&Alert=successUnlike';</script>";
                    exit;
                } else {
                    //the Like is not inserted into the database therefore display the errorInsert alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Alert=successUnlike';</script>";
                    exit;
                }
            }
        }
        echo "</div></li>";
    }
    echo "</ul>";
}

// ################################# Follow/Unfollow and viewAllFollowing/viewAllFollower button under profile page #################################
if (isset($_POST['viewAllFollowing'])) {
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $secondSQL    = "SELECT Follow.following as followingID, User.username as user, User.profilePicture as profilePic FROM Follow INNER JOIN User ON Follow.following = User.userID WHERE follower = '{$_SESSION['loggedInOrVisitingProfile']}' ORDER BY user ASC";
    $secondResult = mysqli_query($conn, $secondSQL);
    while ($secondRow = $secondResult->fetch_assoc()) {
?>
    <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$secondRow['user']}";
?>"><img src="https://haxstar.com/resources/images/profilePic/<?php
        echo $secondRow['profilePic'];
?>" class="rounded-circle" style="height: 40px; max-width: 40px; width: 100%;"></a>
    <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$secondRow['user']}";
?>"><?php
        echo $secondRow['user'];
?></a><br><br>
<?
    }
}

if (isset($_POST['viewAllFollower'])) {
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT Follow.follower as followingID, User.username as user, User.profilePicture as profilePic FROM Follow INNER JOIN User ON Follow.follower = User.userID WHERE following = '{$_SESSION['loggedInOrVisitingProfile']}' ORDER BY user ASC";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
?>
  <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['user']}";
?>"><img src="https://haxstar.com/resources/images/profilePic/<?php
        echo $row['profilePic'];
?>" class="rounded-circle" style="height: 40px; max-width: 40px; width: 100%;"></a>
  <a href="<?php
        echo "https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$row['user']}";
?>"><?php
        echo $row['user'];
?></a><br><br>
<?
    }
}

if (isset($_POST['followUser'])) {
    $following = mysql_escape_string($_GET['Lookup']);
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT userID FROM User WHERE username = '$following'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $userID = $row['userID'];
        $sql    = "INSERT INTO Follow (follower,following) VALUES ('{$_SESSION['sessionID']}','$userID')";
        $result = $conn->query($sql);
        echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$following}';</script>";
    }
}

if (isset($_POST['unfollowUser'])) {
    $following = mysql_escape_string($_GET['Lookup']);
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT userID FROM User WHERE username = '$following'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $userID = $row['userID'];
        $sql    = "DELETE FROM Follow WHERE follower = '{$_SESSION['sessionID']}' AND following = '$userID'";
        $result = $conn->query($sql);
        echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$_SESSION['sessionUsername']}&Lookup={$following}';</script>";
    }
}

//last statement of the code which is to close the database.
mysqli_close($conn);
?>
