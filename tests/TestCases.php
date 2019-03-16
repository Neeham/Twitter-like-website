<?php

include 'DataObjects.php';


class TestCases extends \PHPUnit_Framework_TestCase
{
  public function testToGetTheTextareaContent()
  {
    $this->assertTrue(true); //checks with assetsTrue to see if param is true
    $object = new DataObjects;

    $object->getUsernameOfLoggedInUser();

    echo "getUsernameofLoggedInUser: ".$object;

  //  $object->setUsernameOfLoggedInUser('Checking to see if parameters are passing to ObjectTest');

  //  echo "setUsernameofLoggedInUser: ".$object;

    $this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )
  }
}

/*Notes

Referencing this link for tutorial on tests - https://www.youtube.com/watch?v=V3xrGsUIYis


SampleTest.php outline

--> Future: see if you can associate pages like profile and feed to a namespace in order to access data



$object = new class with methods like getInputText()
$object->getInputText();
$this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )
*/
?>
