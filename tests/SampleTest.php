<?php

class SampleTest extends \PHPUnit_Framework_TestCase
{
  public function testToGetTheTextareaContent()
  {
    $this->assertTrue(true); //checks with assetsTrue to see if param is true

    $object = new \tests\ObjectTest;

    $object->setInputText('Testing 101');

    $object->getInputText();

    $this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )
  }
}




/*Notes

Referencing this link for tutorial on tests - https://www.youtube.com/watch?v=V3xrGsUIYis

SampleTest.php outline

$object = new class with methods like getInputText()

$object->getInputText();

$this->assertNotNull($object);    //will check if the input text is empty or not (this will display through Travis CI )




*/



?>
