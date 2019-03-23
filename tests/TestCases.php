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

    $failureRegistrationValues->register('1234', 5678, 'A', 'A', 'A@.com');
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
    $successfulFollowUser = new DataObjects;
    $failureFollowUser = new DataObjects;

    $successfulFollowUser->followUser(1, 5);
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($successfulFollowUser, 'true');

    $failureFollowUser->followUser('1', '5');
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($failureFollowUser, 'false');

  }

  // ####################################### Test Case - Like a Quack #######################################
  public function testUserWantsToLikeQuack()
  {
    $successfulLikeQuack = new DataObjects;
    $failureLikeQuack = new DataObjects;

    $successfulLikeQuack->likeQuack(10, 1, '2019-03-18 22:28:05');
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($successfulLikeQuack, 'true');

    //Liking a Quack with an invalid date
    $failureLikeQuack->likeQuack(10, 1, '2019-44-18 22:28:05');
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($failureLikeQuack, 'false');

    //Liking a Quack with invalid input for IDs (strings not ints)
    $failureLikeQuack->likeQuack('10', '1', '2019-03-18 22:28:05');
    //echo "Successful: ".$successfulQuackPost;
    $this->assertEquals($failureLikeQuack, 'false');
  }

  // ####################################### Test Case - Search a User #######################################
  public function testTheSearchInputIsEmpty()
  {
      //check if the input is a string and not empty
      $successfulSearchUser = new DataObjects;
      $failureSearchUser = new DataObjects;

      $successfulSearchUser->searchUser('Oussama');
      //echo "Successful: ".$successfulQuackPost;
      $this->assertEquals($successfulSearchUser, 'true');

      //Inputting an empty search
      $failureSearchUser->searchUser('');
      //echo "Successful: ".$successfulQuackPost;
      $this->assertEquals($failureSearchUser, 'false');

      //Inputting an invalid username
      $failureSearchUser->searchUser(23);
      //echo "Successful: ".$successfulQuackPost;
      $this->assertEquals($failureSearchUser, 'false');
  }
}
?>
