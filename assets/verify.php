<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/config.php';

if (isset($_GET['Email']) && !empty($_GET['Email']) AND isset($_GET['Hash']) && !empty($_GET['Hash'])) {
    // Verify data
    $email = mysql_escape_string($_GET['Email']); // Set email variable
    $hash  = mysql_escape_string($_GET['Hash']); // Set hash variable

    $sql    = "SELECT email, hash, emailVerification FROM User WHERE (email = '$email' AND hash ='$hash' AND emailVerification = '0')";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        //update emailVerification to 1 and redirect to homepage with success
        $sql    = "UPDATE User SET emailVerification = '1' WHERE (email = '$email' AND hash ='$hash' AND emailVerification = '0')";
        $result = $conn->query($sql);
        header("Location: https://www.haxstar.com/?Alert=emailVerified");
        exit;
    } else {
        header("Location: https://www.haxstar.com/?Alert=activationError");
        exit;
    }
}
mysqli_close($conn);
?>
