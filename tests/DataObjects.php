<?php
require "/home/travis/build/Neeham/Twitter-like-website/assets/config.php";
require "/home/travis/build/Neeham/Twitter-like-website/assets/query.php";

//include 'http://www.haxstar.com/pages/feed.php';  //worked but gave warning for not opening, need a better solution to link to feed without server
class DataObjects
{
  protected $localVariable = '';

  public function getUsernameOfLoggedInUser()
  {
    global $localVariable;

    $localVariable = $testing;

    return $this->localVariable;
  }
  public function setUsernameOfLoggedInUser($givenUsernameFromTextarea)
  {
      global $localVariable;
      $this->localVariable = $givenUsernameFromTextarea;
      return $this->localVariable;
  }
  public function __toString()
  {
    global $localVariable;
    return $this->localVariable;
  }
}
 ?>
