<?php
session_start();
//get the user ID and username of the currently logged in user through session
$loggedInUserID = $_SESSION["session_id"];
$loggedInUser   = $_SESSION["session_user"];
require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';

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

// ################################# VERIFY LOGIN #################################
//The goal of this method is to verify whether or not the preson can log in.
if (isset($_POST['login'])) {
    $username = mysql_escape_string($_POST['username']);
    $password = mysql_escape_string($_POST['password']);
    $sql      = "SELECT userID, username, password, emailVerification FROM User WHERE username = '$username'";
    $result   = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $DBPass = $row['password'];
        $email  = $row['emailVerification'];
        if (verify($password, $DBPass)) { //Username found, checking if password matches
            $_SESSION["session_user"]      = $row['username'];
            $_SESSION["session_id"]        = $row['userID'];
            $_SESSION["session_activated"] = $row['emailVerification'];
            if ($row['emailVerification'] == 0) { //Verifying email/activation
                header("Location: https://www.haxstar.com/?Alert=verifyEmail");
                exit;
            } else {
                header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION["session_user"]);
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

// ################################# Register an Account #################################
//Before registering a user account, it checks whether or not the username and/or email already exists
if (isset($_POST['register'])) {
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
        Hello ' . $fName . ',
        Thank you for signing up with Quacker!
        Your account has been created! Please activate your account by pressing the url below.
        Please click this link to activate your account:
        https://www.haxstar.com/assets/verify?Email=' . $email . '&Hash=' . $hash . '
        ';
        $headers          = 'From:no-reply@haxstar.com' . "\r\n"; //header
        mail($to, $subject, $message, $headers); //sending email
        header("Location: https://www.haxstar.com/?Alert=verifyEmail");
        exit;
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

// ################################# Display Quack on Feed ######################################
function printFeed()
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT u.firstName AS displayName, u.userName AS username, t.tweet as tweets, t.date as date, t.tweetID as tweetID FROM Tweet t INNER JOIN User u ON u.userID = t.userID WHERE u.userID = '{$GLOBALS['loggedInUserID']}' OR EXISTS (SELECT 1 FROM Follow f WHERE f.follower = '{$GLOBALS['loggedInUserID']}' AND f.following = t.userID) ORDER BY t.date DESC";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
?>
        <li class="list-group-item quack">
        <div class="text-danger"><?php echo date_format(date_create($row['date']), 'd M y - g:i A'); ?></div>
        <div class="media-body mx-2">
        <h5><a href="<?php echo "https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$row['username']}"; ?>"><?php echo $row['displayName']; ?></a></h5>
<?php
        echo $row['tweets'];
        $retrivedTweetID = $row['tweetID'];
        echo '<br/>';
        $getLoggedinUserID = mysql_escape_string($_SESSION["session_id"]);
        $innersql          = "SELECT date FROM Liked WHERE tweetID = $retrivedTweetID AND userID = $getLoggedinUserID";
        $innerResult       = $conn->query($innersql);
        if ($rowInner = $innerResult->fetch_assoc()) {
?>
          <!-- THIS CAN BE ALTERED BASED ON FRONTEND'S DESIGN  -->
          <form action="" method="post">   <!-- if you already liked the Quack, it will show unlikeQuack button -->
          <button class="btn float-right btn-danger like mx-1" name="<?php echo $retrivedTweetID . '_unlikeQuackbtn'; ?>" type="submit" data-tippy-content="<?php echo countLikes($retrivedTweetID); ?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        } else {
?>

          <!-- THIS CAN BE ALTERED BASED ON FRONTEND'S DESIGN  -->
          <form action="" method="post">  <!-- if you want to like the Quack, it will show likeQuack button -->
          <button class="btn float-right btn-outline-danger like mx-1" name="<?php echo $retrivedTweetID . '_likeQuackbtn'; ?>" type="submit" data-tippy-content="<?php echo countLikes($retrivedTweetID); ?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        }

        if (isset($_POST[$retrivedTweetID . '_likeQuackbtn'])) {

            $currentDateTime = date('Y-m-d H:i:s');
            $insertsql       = "INSERT INTO Liked (tweetID,userID,date) VALUES ('$retrivedTweetID','$getLoggedinUserID','$currentDateTime')";
            $insertResult    = $conn->query($insertsql);
            if (!$insertResult) {
                //the Like is not inserted into the database therefore display the errorInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$GLOBALS['loggedInUser']}&Alert=errorLike';</script>"; //UPDATE TO DISPLAY AN ERROR THAT NO LIKEY THE POST
            } else {
                //the Quack is inserted into the database therefore display the successfulInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$GLOBALS['loggedInUser']}&Alert=successLike';</script>";
            }
        }

        if (isset($_POST[$retrivedTweetID . '_unlikeQuackbtn'])) {
            $deletesql    = "DELETE FROM Liked WHERE tweetID = '$retrivedTweetID' AND userID = '$getLoggedinUserID'";
            $deleteResult = $conn->query($deletesql);
            if (!$deleteResult) {
                //the Quack is not inserted into the database therefore display the errorInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$GLOBALS['loggedInUser']}&Alert=errorLike';</script>"; //UPDATE TO DISPLAY AN ERROR THAT NO UNLIKEY THE POST
            } else {
                //the Quack is inserted into the database therefore display the successfulInsert alert
                echo "<script>window.location = 'https://www.haxstar.com/pages/feed?Login={$GLOBALS['loggedInUser']}&Alert=successUnlike';</script>";
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

// ****If time - update since userID is in session****

//if the post button is clicked
if (isset($_POST['postQuackBtn'])) {
    //get current date and time
    $currentDateTime = date('Y-m-d H:i:s');
    //get the input from the textbox
    $inputText       = mysql_escape_string($_POST['tweet']);
    //get the corresponding userID from the username
    $sql             = "SELECT userID FROM User WHERE username = '$loggedInUser'";
    $result          = $conn->query($sql);
    //if the database returned a result (userID)
    if ($row = $result->fetch_assoc()) {
        //put the userID in a variable fetchedUserID
        $fetchedUserID = $row['userID'];
        //insert the logged in user's ID, the Quack, and the timestamp
        $sql           = "INSERT INTO Tweet (userID,tweet,date) VALUES ('$fetchedUserID','$inputText','$currentDateTime')";
        $result        = $conn->query($sql);
        //check if the Quack is inserted into the database
        if (!$result) {
            //the Quack is not inserted into the database therefore display the errorInsert alert
            header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION["session_user"] . "&Alert=errorInsert");
            exit;
        } else {
            //the Quack is inserted into the database therefore display the successfulInsert alert
            header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION["session_user"] . "&Alert=successfulInsert");
            exit;
        }
    } else { //if database didn't return userID, display the errorInsert alert
        header("Location: https://www.haxstar.com/pages/feed?Login=" . $_SESSION["session_user"] . "&Alert=errorInsert");
        exit;
    }
}


// ################################# Display Quacks and everything that displays under profile page ######################################
function printProfilePage($type) //This function will take param and will do if else based on the following: name, email, post, follower count, following count
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    If (isset($_GET['Login']) && !empty($_GET['Login']) AND isset($_GET['Lookup']) && !empty($_GET['Lookup'])) {
        $following = mysql_escape_string($_GET['Lookup']);
        $sql       = "SELECT userID FROM User WHERE username = '$following'";
        $result    = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            if ($following == $GLOBALS['loggedInUser']) { //If the lookup user is the person itself, redirect to their profile without lookup in url
                echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}';</script>";
            }
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
            if ($type == 'button') {
                followButton($row['userID']);
            }
            if ($type == 'followUser') {
                followUser($row['userID']);
            }
            if ($type == 'unfollowUser') {
                unfollowUser($row['userID']);
            }
            if ($type == 'following') {
                following($row['userID']);
            }
            if ($type == 'followers') {
                followers($row['userID']);
            }
        } else {
            echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Alert=invalidURL';</script>";
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
        if ($type == 'following') {
            following($GLOBALS['loggedInUserID']);
        }
        if ($type == 'followers') {
            followers($GLOBALS['loggedInUserID']);
        }
    }
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
    $sql    = "SELECT follower, following FROM Follow WHERE follower = {$GLOBALS['loggedInUserID']} AND following = '$userID'";
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
    $sql    = "SELECT Follow.following as followingID, User.username as user FROM Follow INNER JOIN User ON Follow.following = User.userID WHERE follower = '$userID'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
?>
      <li class="list-group-item follow-suggestion">
      <h6><a href="<?php echo "https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$row['user']}"; ?>"><?php echo $row['user']; ?></a></h6>
<?php
        /* NOT A PRIORITY but basically have the folllow/unfollow button beside every user being displayed
        $sql = "SELECT follower, following FROM Follow WHERE follower = {$GLOBALS['loggedInUserID']} AND following = '$userID'";
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
        }*/
?>
      </li>
<?php
    }
}

function followers($userID)
{
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT Follow.follower as followingID, User.username as user FROM Follow INNER JOIN User ON Follow.follower = User.userID WHERE following = '$userID'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
?>
      <li class="list-group-item follow-suggestion">
      <h6><a href="<?php echo "https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$row['user']}"; ?>"><?php echo $row['user']; ?></a></h6>

<?php
        /* NOT A PRIORITY but basically have the folllow/unfollow button beside every user being displayed
        $sql = "SELECT follower, following FROM Follow WHERE follower = {$GLOBALS['loggedInUserID']} AND following = '$userID'";
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
        }*/
?>

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
      <li class="list-group-item quack">
      <div class="text-danger"><?php echo date_format(date_create($row['date']), 'd M y - g:i A'); ?></div>
<?php
        //    foreach ($row as $value) {
        echo "<div class=\"mx-2\">";
        //echo "<h5><span class=\"float-right\"><button class=\"btn btn-danger delete-button\"><i class=\"fas fa-times\"></i> Delete</button></span></h5>";
        echo $row['tweet'];
        $retrivedTweetID = $row['tweetID'];
        $getLoggedinUserID = mysql_escape_string($_SESSION["session_id"]);
        $innersql          = "SELECT date FROM Liked WHERE tweetID = $retrivedTweetID AND userID = $getLoggedinUserID";
        $innerResult       = $conn->query($innersql);
        if ($rowInner = $innerResult->fetch_assoc()) {
?>

          <!-- THIS CAN BE ALTERED BASED ON FRONTEND'S DESIGN  -->
          <form action="" method="post">   <!-- if you already liked the Quack, it will show unlikeQuack button -->
          <button class="btn float-right btn-danger like mx-1" name="<?php echo $retrivedTweetID . '_unlikeQuackbtn'; ?>" type="submit" data-tippy-content="<?php echo countLikes($retrivedTweetID); ?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        } else {
?>

          <!-- THIS CAN BE ALTERED BASED ON FRONTEND'S DESIGN  -->
          <form action="" method="post">  <!-- if you want to like the Quack, it will show likeQuack button -->
          <button class="btn float-right btn-outline-danger like mx-1" name="<?php echo $retrivedTweetID . '_likeQuackbtn'; ?>" type="submit" data-tippy-content="<?php echo countLikes($retrivedTweetID); ?>">
          <i class="fas fa-heart" ></i>
          </button>
          </form>
<?php
        }

        $currentLookup = mysql_escape_string($_GET['Lookup']);
        if (isset($_POST[$retrivedTweetID . '_likeQuackbtn'])) {

            $currentDateTime = date('Y-m-d H:i:s');
            $insertsql       = "INSERT INTO Liked (tweetID,userID,date) VALUES ('$retrivedTweetID','$getLoggedinUserID','$currentDateTime')";
            $insertResult    = $conn->query($insertsql);

            if (!$insertResult) {
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$currentLookup}&Alert=errorLike';</script>";
                } else {
                    //the Like is not inserted into the database therefore display the errorLike alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Alert=errorLike';</script>";
                }
            } else {
                //the Quack is inserted into the database therefore display the successfulLike alert
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$currentLookup}&Alert=successLike';</script>";
                } else {
                    //the Like is not inserted into the database therefore display the errorInsert alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Alert=successLike';</script>";
                }
            }
        }

        if (isset($_POST[$retrivedTweetID . '_unlikeQuackbtn'])) {
            $deletesql    = "DELETE FROM Liked WHERE tweetID = '$retrivedTweetID' AND userID = '$getLoggedinUserID'";
            $deleteResult = $conn->query($deletesql);
            if (!$deleteResult) {
                //the Quack is not inserted into the database therefore display the errorLike alert
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$currentLookup}&Alert=errorLike';</script>";
                } else {
                    //the Like is not inserted into the database therefore display the errorInsert alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Alert=errorLike';</script>";
                }
            } else {
                //the Quack is inserted into the database therefore display the successfulUnlike alert
                if ($currentLookup != '') {
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$currentLookup}&Alert=successUnlike';</script>";
                } else {
                    //the Like is not inserted into the database therefore display the errorInsert alert
                    echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Alert=successUnlike';</script>";
                }
            }
        }
?>
<?php
        echo "</div></li>";
    }
    echo "</ul>";
}

// ################################# Follow/Unfollow button under profile page, action #################################
if (isset($_POST['followUser'])) {
    $following = mysql_escape_string($_GET['Lookup']);
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT userID FROM User WHERE username = '$following'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $userID = $row['userID'];
        $sql    = "INSERT INTO Follow (follower,following) VALUES ('{$GLOBALS['loggedInUserID']}','$userID')";
        $result = $conn->query($sql);
        echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$following}';</script>";
    }
}

if (isset($_POST['unfollowUser'])) {
    $following = mysql_escape_string($_GET['Lookup']);
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';
    $sql    = "SELECT userID FROM User WHERE username = '$following'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $userID = $row['userID'];
        $sql    = "DELETE FROM Follow WHERE follower = '{$GLOBALS['loggedInUserID']}' AND following = '$userID'";
        $result = $conn->query($sql);
        echo "<script>window.location = 'https://www.haxstar.com/pages/profile?Login={$GLOBALS['loggedInUser']}&Lookup={$following}';</script>";
    }
}

//last statement of the code which is to close the database.
mysqli_close($conn);
?>
