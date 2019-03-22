<?php
include 'DataObjects.php';
class TestCases extends \PHPUnit_Framework_TestCase
{
  public function testToCheckTheRegistrationValuesDataTypes()
  {
    $successfulRegistrationValues = new DataObjects;
    $failureRegistrationValues = new DataObjects;

    $successfulRegistrationValues->testingRegistrationInput('A', 'A', 'A', 'A', 'A@A.com');
    //echo "Successful: ".$successfulRegistrationValues;
    $this->assertEquals($successfulRegistrationValues, 'true');

    $failureRegistrationValues->testingRegistrationInput('1234', '5678', 'A', 'A', 'A@.com');
    //echo "  Failure: ".$failureRegistrationValues;
    $this->assertEquals($failureRegistrationValues, 'false');
  }

  //core feature: post a Quack
  public function testToCheckTheSubmittedQuacksCharLimit()
  {
    //check if the input is empty (return true is not empty)
    //check the character count is 255 or less

    $successfulQuackPost = new DataObjects;
    $failureQuackPost = new DataObjects;

    $successfulQuackPost->testingQuackPost(1, 10, 'Hello World', '2019-13-18 22:28:05');
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($successfulQuackPost, 'true');

    //Input an empty Quack
    $failureQuackPost->testingQuackPost('1', '2', '', '2019-13-17 22:28:05');
    //echo "Failure: ".$failureQuackPost;
    $this->assertEquals($failureQuackPost, 'false');

    //Input a Quack with a character length of 256
    $failureQuackPost->testingQuackPost(1, 10, 'g7cAs43CRVmyWIe16akYnVjVIXXF5QFNb8PKmZoswj8geGD849myKiNR31PW4g5Ho5at0ErYepAU2SiH92INITGDOGqZ31F390YYHaUr6FLiwGFBQQNybaI9V44G56pyr9EcykgHCGtMOtcGnyLf0RNV4C16W31Rkottj7aP1x4JvPT77NI6OaaJLlsE31wKB3pgLne4H8VWG5GGu4Y4gAB9XShWcOUh3qHUkuJzC0lf0QpW3V7bYDaKLAANFeWb', '2019-03-13 22:28:05');
    $this->assertEquals($failureQuackPost, 'false');
  }

  //core feature: follow a user
  public function test()
  {
    //check if the users involved in the following process both have userIDs as intergers
  }

  //core feature: like a Quack
  public function testToCheckIfCountReturnsResult()
  {
    //call function countLikes($getFromDataObjects)
    //modify countLikes to return the number of likes
    //check if the return value is an integer number

    //check if the users involved in the liking process have userIDs and tweetIDs as intergers
    //check if the date is in the proper format
  }

  //additional feature: search for a user
  public function testToCheckIfTheSearchIsEmpty()
  {
      //check if the input is a string and not empty
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
