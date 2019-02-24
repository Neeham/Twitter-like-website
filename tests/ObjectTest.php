<?php
namespace tests;
//include 'http://www.haxstar.com/pages/feed.php';  //worked but gave warning for not opening, need a better solution to link to feed without server

class ObjectTest
{
  //public $localVariable;

  public function getUsernameOfLoggedInUser()
  {
    return 'Hi from get';
  }

  public function setUsernameOfLoggedInUser($givenUsernameFromTextarea)
  {
      //$this->$localVariable = $givenUsernameFromTextarea;
      return 'Hi from set';

  }
}

 ?>
