<?php
//require "/home/travis/build/Neeham/Twitter-like-website/assets/config.php";
require "/home/travis/build/Neeham/Twitter-like-website/assets/query.php";

class DataObjects
{
  protected $localVariable = '';

  public function getUsernameOfLoggedInUser()
  {
    require "/home/travis/build/Neeham/Twitter-like-website/assets/config.php";
    require "/home/travis/build/Neeham/Twitter-like-website/assets/query.php";

    global $localVariable;

    $localVariable = (string)$loggedInUser;

    return $this->localVariable;
  }

  public function __toString()
  {
    global $localVariable;
    return $this->localVariable;
  }
}

mysqli_close($conn);
 ?>
