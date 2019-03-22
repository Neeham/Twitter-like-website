<?php
$variableToCheck = '';
class DataObjects
{
  public function testingRegistrationInput($firstName, $lastName, $username, $password, $email)
  {
    global $variableToCheck;
    //check if first and last names do not contain numbers
    if(ctype_alpha($firstName) && ctype_alpha($lastName) && is_string($username) && is_string($password) && is_string($email))
    {
      $variableToCheck = true;
      return $this->variableToCheck;
    }
    echo 'Firstname: '.gettype($firstName).'    Lastname: '.gettype($lastName).'    Username: '.gettype($username).'    Password: '.gettype($password).'    Email: '.gettype($email);

    $variableToCheck = false;
    return $this->variableToCheck;
  }

  public function __toString()
  {
    global $variableToCheck;
    return $this->variableToCheck;
  }
}
 ?>
