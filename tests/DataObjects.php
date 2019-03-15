<?php

require __DIR__ . "/pages/feed.php";

//include 'http://www.haxstar.com/pages/feed.php';  //worked but gave warning for not opening, need a better solution to link to feed without server
class DataObjects
{
  protected $localVariable = '';
  public function getUsernameOfLoggedInUser()
  {
    global $localVariable;
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
