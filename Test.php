<?php

// backward compatibility
if (!class_exists('\PHPUnit\Framework\TestCase'))
{
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}

//include 'index.php';

Class Test extends PHPUnit_Framework_TestCase
{
  echo "Made it into the Test class";
	public function basicTest()
  {
    echo "Made it into the Test.php file :D";
		$this->assertTrue(true);


    $object = "not null ;)";
    $this->assertNotNull($object);
    //echo "Made it into the Test.php file :D";
	}
}
