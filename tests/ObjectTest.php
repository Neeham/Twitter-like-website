<?php
namespace tests;
//include 'http://www.haxstar.com/pages/feed.php';  //worked but gave warning for not opening, need a better solution to link to feed without server

class ObjectTest
{

  public $localVariable = 'Hello !';


  public function getUsernameOfLoggedInUser()
  {
    return $localVariable;
  }

  public function setUsernameOfLoggedInUser($givenUsernameFromTextarea)
  {
    $this->$localVariable = $givenUsernameFromTextarea;

  }
}

 ?>
