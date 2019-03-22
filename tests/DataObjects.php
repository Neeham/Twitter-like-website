<?php

class DataObjects
{
  public $variableToCheck;

  public function testingRegistrationInput($firstName, $lastName, $username, $password, $email)
  {
    //check if first and last names do not contain numbers
    if(ctype_alpha($firstName) && ctype_alpha($lastName) && is_string($username) && is_string($password) && is_string($email))
    {
      $this->variableToCheck = true;
      return $this->variableToCheck;
    }
    echo 'Firstname: '.gettype($firstName).'    Lastname: '.gettype($lastName).'    Username: '.gettype($username).'    Password: '.gettype($password).'    Email: '.gettype($email);

    $this->variableToCheck = false;
    return $this->variableToCheck;
  }

  public function __toString()
  {
    return (string) $this->variableToCheck;
  }
}
 ?>
