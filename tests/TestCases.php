<?php
include 'DataObjects.php';
class TestCases extends \PHPUnit_Framework_TestCase
{
  public function testToCheckTheRegistrationValuesDataTypes()
  {
    $successfulRegistrationValues = new DataObjects;
    $failureRegistrationValues = new DataObjects;

    $successfulRegistrationValues->testingRegistrationInput('A', 'A', 'A', 'A', 'A@A.com');
    echo "Successful: ".$successfulRegistrationValues;

    $failureRegistrationValues->testingRegistrationInput('1234', '5678', 'A', 'A', 'A@A.com');
    echo "  Failure: ".$failureRegistrationValues;

    $this->assertEquals($successfulRegistrationValues, 'true');    //will check if the input text is empty or not (this will display through Travis CI )
    $this->assertEquals($failureRegistrationValues, 'false');
  }

  //core feature: post a Quack
  public function testToCheckIfASubmittedQuackIsEmpty()
  {

  }

  //core feature: follow a user
  public function test()
  {

  }

  //core feature: like a Quack
  public function testToCheckIfCountReturnsResult()
  {
    //call function countLikes($getFromDataObjects)
    //modify countLikes to return the number of likes
    //check if the return value is an integer number
  }

  //additional feature: search for a user
  public function testToCheckIfTheSearchIsEmpty()
  {

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
