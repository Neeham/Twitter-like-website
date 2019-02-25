<?php

class SampleTest extends \PHPUnit_Framework_TestCase
{
  $object = new \tests\ObjectTest;

  $object->whyWontYouFail();

}




/*Notes

Referencing this link for tutorial on tests - https://www.youtube.com/watch?v=V3xrGsUIYis

SampleTest.php outline

$object = new class with methods like getInputText()

$object->getInputText();

$this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )




*/



?>
