<?php
namespace tests;
//include 'http://www.haxstar.com/pages/feed.php';  //worked but gave warning for not opening, need a better solution to link to feed without server

class ObjectTest
{

  protected $localUsernameFromTextarea;


  public function getInputText()
  {
    return 'Testing: ' + $localUsernameFromTextarea;
  }

  public function setUsernameOfLoggedInUser($givenUsernameFromTextarea)
  {
    $this->$localUsernameFromTextarea = $givenUsernameFromTextarea;

  }
}

 ?>