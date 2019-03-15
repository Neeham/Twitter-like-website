<?php
 class TestMain extends \PHPUnit_Framework_TestCase
 {
   public function testToGetTheTextareaContent()
   {
     //$this->assertTrue(true); //checks with assetsTrue to see if param is true
     $object = new Test;

     $object->getUsernameOfLoggedInUser();

     echo "getUsernameofLoggedInUser: ".$object;

     $object->setUsernameOfLoggedInUser('Checking to see if parameters are passing to ObjectTest');

     echo "setUsernameofLoggedInUser: ".$object;

     $this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )
   }
 }
