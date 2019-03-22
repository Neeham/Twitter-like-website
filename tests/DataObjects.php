<?php

class DataObjects
{
  public function testingRegistrationInput($firstName, $lastName, $username, $password, $email)
  {
    //check if first and last names do not contain numbers
    if(ctype_alpha($firstName) && ctype_alpha($lastName) && is_string($username) && is_string($password) && is_string($email))
    {
      return true;
    }
    echo 'Firstname: '.gettype($firstName).'    Lastname: '.gettype($lastName).'    Username: '.gettype($username).'    Password: '.gettype($password).'    Email: '.gettype($email);

    return false;
  }

  public function __toString()
  {
    return "Testing";
  }
}
 ?>
