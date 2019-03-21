<?php
class DataObjects
{
  protected $localVariable = '';

  public function getUsernameOfLoggedInUser()
  {
    require "/home/travis/build/Neeham/Twitter-like-website/pages/feed.php";
    require "/home/travis/build/Neeham/Twitter-like-website/pages/profile.php";

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

 ?>
