<?php

//This is the page that Travis CI reference for success or fail

namespace tests;
//include 'http://www.haxstar.com/pages/feed.php';  //worked but gave warning for not opening, need a better solution to link to feed without server

class ObjectTest
{
  public $localVariable = '';

  public function getUsernameOfLoggedInUser()
  {
    global $localVariable;

    return $this->$localVariable;
  }

  public function setUsernameOfLoggedInUser($givenUsernameFromTextarea)
  {
      global $localVariable;
      $this->$localVariable = $givenUsernameFromTextarea;
      return $this->$localVariable;

  }

  public function __toString()
  {
    global $localVariable;
    return $this->$localVariable;
  }
}

 ?>
