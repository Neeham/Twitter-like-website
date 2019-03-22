<?php

include 'DataObjects.php';
class TestCases extends \PHPUnit_Framework_TestCase
{
  public function testToCheckIfAUserIsLoggedIn()
  {
    $this->assertTrue(true); //TESTING - checks with assetsTrue to see if param is true

    $getLoggedInUser = new DataObjects;

    $getLoggedInUser->getUsernameOfLoggedInUser();

    echo "getUsernameofLoggedInUser: ".$getLoggedInUser;

    $this->assertNotNull($getLoggedInUser);    //will check if the input text is empty or not (this will display through Travis CI )
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
mysqli_close($conn);
?>
