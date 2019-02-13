<?php
include $_SERVER['DOCUMENT_ROOT'] . '/assets/config.php';

if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash  = mysql_escape_string($_GET['hash']); // Set hash variable

    $sql    = "SELECT email, hash, emailVerification FROM User WHERE (email = '$email' AND hash ='$hash' AND emailVerification = '0')";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        //update emailVerification to 1 and redirect to homepage with success
        $sql    = "UPDATE User SET emailVerification = '1' WHERE (email = '$email' AND hash ='$hash' AND emailVerification = '0')";
        $result = $conn->query($sql);
        header("Location: https://www.haxstar.com/?emailVerified");
        exit;
    } else {
        header("Location: https://www.haxstar.com/?activationError");
        exit;
    }
}
mysqli_close($conn);
?>
