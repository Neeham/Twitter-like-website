<?php
include 'DataObjects.php';
class TestCases extends \PHPUnit_Framework_TestCase
{
  // ####################################### Test Case - Registration #######################################
  public function testTheRegistrationInputValuesDataTypes()
  {
    $successfulRegistrationValues = new DataObjects;
    $failureRegistrationValues = new DataObjects;

    //Successful Input
    $successfulRegistrationValues->register('A', 'A', 'A', 'A', 'A@A.com');
    $this->assertEquals($successfulRegistrationValues, 'true');

    //Failure Input: invalid email address
    $failureRegistrationValues->register('1234', '5678', 'A', 'A', 'A@.com');
    $this->assertEquals($failureRegistrationValues, 'false');

    //Failure Input: first and last name are int
    $failureRegistrationValues->register(1234, 5678, 'A', 'A', 'A@.com');
    $this->assertEquals($failureRegistrationValues, 'false');
  }

  // ####################################### Test Case - Post a Quack #######################################
  public function testTheInputQuacksCharLimit()
  {
    $successfulQuackPost = new DataObjects;
    $failureQuackPost = new DataObjects;

    //Successful Input
    $successfulQuackPost->postQuack(1, 'Hello World', '2019-03-18 22:28:05');
    $this->assertEquals($successfulQuackPost, 'true');

    //Failure Input: Quack with an invalid date
    $failureQuackPost->postQuack(1, 'Hello World', '2019-13-17 22:28:05');
    $this->assertEquals($failureQuackPost, 'false');

    //Failure Input: an empty Quack
    $failureQuackPost->postQuack(1, '', '2019-03-17 22:28:05');
    $this->assertEquals($failureQuackPost, 'false');

    //Failure Input: a Quack with a character length of 256
    $failureQuackPost->postQuack(1, 'g7cAs43CRVmyWIe16akYnVjVIXXF5QFNb8PKmZoswj8geGD849myKiNR31PW4g5Ho5at0ErYepAU2SiH92INITGDOGqZ31F390YYHaUr6FLiwGFBQQNybaI9V44G56pyr9EcykgHCGtMOtcGnyLf0RNV4C16W31Rkottj7aP1x4JvPT77NI6OaaJLlsE31wKB3pgLne4H8VWG5GGu4Y4gAB9XShWcOUh3qHUkuJzC0lf0QpW3V7bYDaKLAANFeWb', '2019-03-13 22:28:05');
    $this->assertEquals($failureQuackPost, 'false');
  }

  // ####################################### Test Case - Follow a User #######################################
  public function testUserWantsToFollowAnotherUser()
  {
    $successfulFollowUser = new DataObjects;
    $failureFollowUser = new DataObjects;

    //Successful Input
    $successfulFollowUser->followUser(1, 5);
    $this->assertEquals($successfulFollowUser, 'true');

    //Failure Input: user IDs are strings
    $failureFollowUser->followUser('1', '5');
    $this->assertEquals($failureFollowUser, 'false');

  }

  // ####################################### Test Case - Like a Quack #######################################
  public function testUserWantsToLikeQuack()
  {
    $successfulLikeQuack = new DataObjects;
    $failureLikeQuack = new DataObjects;

    //Successful Input
    $successfulLikeQuack->likeQuack(10, 1, '2019-03-18 22:28:05');
    $this->assertEquals($successfulLikeQuack, 'true');

    //Failure Input: liking a Quack with an invalid date
    $failureLikeQuack->likeQuack(10, 1, '2019-44-18 22:28:05');
    $this->assertEquals($failureLikeQuack, 'false');

    //Failure Input: liking a Quack with user ID and tweet ID as strings
    $failureLikeQuack->likeQuack('10', '1', '2019-03-18 22:28:05');
    $this->assertEquals($failureLikeQuack, 'false');
  }

  // ####################################### Test Case - Search a User #######################################
  public function testTheSearchInputIsEmpty()
  {
      $successfulSearchUser = new DataObjects;
      $failureSearchUser = new DataObjects;

      //Successful Input
      $successfulSearchUser->searchUser('Oussama');
      $this->assertEquals($successfulSearchUser, 'true');

      //Failure Input: search with an empty value
      $failureSearchUser->searchUser('');
      $this->assertEquals($failureSearchUser, 'false');

      //Failure Input: search a username as an int
      $failureSearchUser->searchUser(23);
      $this->assertEquals($failureSearchUser, 'false');
  }
}
?>
