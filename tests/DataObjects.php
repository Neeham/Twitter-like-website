<?php

class DataObjects
{
  protected $localVariable = '';

  public function testingRegistrationInput($firstName, $lastName, $username, $password, $email)
  {
    //check if first and last names do not contain numbers
    if(ctype_alpha($firstName) && ctype_alpha($lastName) && is_string($username) && is_string($password) && is_string($email))
    {
      return true;
    }

    return false;
  }

  public function __toString()
  {
    global $localVariable;
    return $this->localVariable;
  }
}
 ?>
