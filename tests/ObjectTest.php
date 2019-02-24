<?php
namespace tests;
//include 'http://www.haxstar.com/pages/feed.php';  //worked but gave warning for not opening, need a better solution to link to feed without server

class ObjectTest
{

  $localVariable = 'Hello from the class!';
  echo $localVariable;

  public function getUsernameOfLoggedInUser()
  {
    $localVariable = 'Hello from the get!';
    return $localVariable;
  }

  public function setUsernameOfLoggedInUser($givenUsernameFromTextarea)
  {
      $localVariable = 'Hello from the set!';
      $this->$localVariable = $givenUsernameFromTextarea;

  }
}

 ?>
