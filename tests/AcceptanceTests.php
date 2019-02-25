<?php

class AcceptanceTests extends \PHPUnit_Framework_TestCase
{
  $this->assertTrue(true);

  $object = new \tests\ObjectTest;

  $object->getUsernameOfLoggedInUser();

  echo "getUsernameofLoggedInUser: ".$object;

  $object->setUsernameOfLoggedInUser('Testing 101');

  echo "setUsernameofLoggedInUser: " + $object;
}


?>
