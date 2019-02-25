<?php
require(dirname(__FILE__)."/../assets/feed.php");
echo $testingGetVariable;

//require "vendor/autoload.php";

class SampleTest extends \PHPUnit_Framework_TestCase
{
  $object = new \tests\ObjectTest;

  $object->getUsernameOfLoggedInUser();

  echo "getUsernameofLoggedInUser: ".$object;

  $object->setUsernameOfLoggedInUser("Changed from SampleTest");

  echo "setUsernameofLoggedInUser: ".$object;

  $this->assertNotNull($object);
  $this->assertTrue(true);

  /*

  public function SampleTest()
  {
    global $object;
    $this->object = new \tests\ObjectTest;
  }

  public function testGetTheContentFromFeed()
  {
    //$this->assertTrue(true); //checks with assetsTrue to see if param is true

     //$object = new \tests\ObjectTest;


     $object->getUsernameOfLoggedInUser();

     echo "getUsernameofLoggedInUser: ".$object;

     $object->setUsernameOfLoggedInUser('$testingGetVariable;');

     echo "setUsernameofLoggedInUser: ".$object;

     $this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )
  }
}




/*Notes

Referencing this link for tutorial on tests - https://www.youtube.com/watch?v=V3xrGsUIYis

SampleTest.php outline

$object = new class with methods like getInputText()

$object->getInputText();

$this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )




*/



?>
