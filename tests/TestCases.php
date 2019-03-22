<?php
include 'DataObjects.php';
class TestCases extends \PHPUnit_Framework_TestCase
{
  // ####################################### Test Case - Registration #######################################
  public function testTheRegistrationInputValuesDataTypes()
  {
    $successfulRegistrationValues = new DataObjects;
    $failureRegistrationValues = new DataObjects;

    $successfulRegistrationValues->register('A', 'A', 'A', 'A', 'A@A.com');
    //echo "Successful: ".$successfulRegistrationValues;
    $this->assertEquals($successfulRegistrationValues, 'true');

    $failureRegistrationValues->register('1234', '5678', 'A', 'A', 'A@.com');
    //echo "  Failure: ".$failureRegistrationValues;
    $this->assertEquals($failureRegistrationValues, 'false');
  }

  // ####################################### Test Case - Post a Quack #######################################
  public function testTheInputQuacksCharLimit()
  {
    $successfulQuackPost = new DataObjects;
    $failureQuackPost = new DataObjects;

    $successfulQuackPost->postQuack(1, 'Hello World', '2019-03-18 22:28:05');
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($successfulQuackPost, 'true');

    //Input a Quack with an invalid date
    $failureQuackPost->postQuack(1, 'Hello World', '2019-13-17 22:28:05');
    //echo "Failure: ".$failureQuackPost;
    $this->assertEquals($failureQuackPost, 'false');

    //Input an empty Quack
    $failureQuackPost->postQuack(1, '', '2019-03-17 22:28:05');
    //echo "Failure: ".$failureQuackPost;
    $this->assertEquals($failureQuackPost, 'false');

    //Input a Quack with a character length of 256
    $failureQuackPost->postQuack(1, 'g7cAs43CRVmyWIe16akYnVjVIXXF5QFNb8PKmZoswj8geGD849myKiNR31PW4g5Ho5at0ErYepAU2SiH92INITGDOGqZ31F390YYHaUr6FLiwGFBQQNybaI9V44G56pyr9EcykgHCGtMOtcGnyLf0RNV4C16W31Rkottj7aP1x4JvPT77NI6OaaJLlsE31wKB3pgLne4H8VWG5GGu4Y4gAB9XShWcOUh3qHUkuJzC0lf0QpW3V7bYDaKLAANFeWb', '2019-03-13 22:28:05');
    $this->assertEquals($failureQuackPost, 'false');
  }

  // ####################################### Test Case - Follow a User #######################################
  public function testUserWantsToFollowAnotherUser()
  {
    //check if the users involved in the following process both have userIDs as intergers

    $successfulFollow = new DataObjects;
    $failureFollow = new DataObjects;

    $successfulFollow->followUser(1, 5);
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($successfulFollow, 'true');

    $failureFollow->followUser('1', '5');
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($failureFollow, 'false');

  }

  // ####################################### Test Case - Like a Quack #######################################
  public function testToCheckIfCountReturnsResult()
  {
    //call function countLikes($getFromDataObjects)
    //modify countLikes to return the number of likes
    //check if the return value is an integer number

    //check if the users involved in the liking process have userIDs and tweetIDs as intergers
    //check if the date is in the proper format
  }

  // ####################################### Test Case - Search a User #######################################
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
