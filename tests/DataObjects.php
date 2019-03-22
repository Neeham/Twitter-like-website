<?php

class DataObjects
{
  public $variableToCheck;

  // ####################################### Checks if the Input Registration Values are Valid #######################################
  public function testingRegistrationInput($firstName, $lastName, $username, $password, $email)
  {
    //if first and last names do not contain numbers and the others are strings
    if(ctype_alpha($firstName) && ctype_alpha($lastName) && is_string($username) && is_string($password) && is_string($email))
    {
      //checks the input email's format
      if (filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        $this->variableToCheck = 'true';
        return $this->variableToCheck;
      }
    }
    //*********TESTING
    //echo 'Firstname: '.gettype($firstName).'    Lastname: '.gettype($lastName).'    Username: '.gettype($username).'    Password: '.gettype($password).'    Email: '.gettype($email);

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  public function testingQuackPost($userID, $quackID, $quack, $date)
  {
    $formatDate = date_parse($date);
    if(is_int($userID) && is_int($quackID) && !empty($quack) && (strlen($quack) < 256) && checkdate($formatDate["year"], $formatDate["month"], $formatDate["day"]))
    {
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }

    echo 'Year: '.$formatDate["year"].' Month: '.$formatDate["month"].' Day: '.$formatDate["day"].'     ';

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  // ####################################### Object's toString to Print the Results #######################################
  public function __toString()
  {
    return (string) $this->variableToCheck;
  }
}
 ?>
