<?php
class AcceptanceTests extends \PHPUnit_Framework_TestCase
{
  public function SampleTest()
  {
    global $object;
    $this->object = new \tests\ObjectTest;
  }
  public function testGetTheContentFromFeed()
  {
    //$this->assertTrue(true); //checks with assetsTrue to see if param is true
     $object = new \tests\ObjectTest;
     $object->setUsernameOfLoggedInUser('Updated');
     echo "setUsernameofLoggedInUser: ".$object;
     $object->getUsernameOfLoggedInUser();
     echo "getUsernameofLoggedInUser: ".$object;
     $object->setUsernameOfLoggedInUser('Updated Again');
     echo "setUsernameofLoggedInUser: ".$object;
     $this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )
  }
}
?>
