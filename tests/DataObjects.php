<?php

class DataObjects
{
  public $variableToCheck;

  // ####################################### Checks if the 'Registration' Input Values are Valid #######################################
  public function register($firstName, $lastName, $username, $password, $email)
  {
    //checks if the first and last names do not contain numbers and the others are strings
    if(is_string($firstName) && is_string($lastName) && is_string($username) && is_string($password) && is_string($email))
    {
      //checks the input email's format
      if (filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        //return true -> all inputs are valid
        $this->variableToCheck = 'true';
        return $this->variableToCheck;
      }
      echo "\r\nProblem: the input email $email does not follow a valid format";
      $this->variableToCheck = 'false';
      return $this->variableToCheck;
    }
    //Print error message and return false
    echo "\r\nProblem: some 'Registration' inputs are not considered valid. Here are the following data types: ";
    echo "\r\nFirstname: ".gettype($firstName)."         Requires: String".
         "\r\nLastname: ".gettype($lastName)."          Requires: String".
         "\r\nUsername: ".gettype($username)."           Requires: String".
         "\r\nPassword: ".gettype($password)."           Requires: String".
         "\r\nEmail: ".gettype($email)."              Requires: String containing the email format";

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  // ####################################### Checks if the 'Posting a Quack' Input Values are Valid #######################################
  public function postQuack($userID, $quack, $date)
  {
    //set date and time to same format as the database
    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);

    //checks if user ID is int, quack isn't empty, character length is less than 256, and date is valid
    if(is_int($userID) && !empty($quack) && (strlen($quack) < 256) && ($dateTime instanceof DateTime && $dateTime->format('Y-m-d H:i:s') == $date))
    {
      //return true -> all inputs are valid
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }
    //if the date is invalid (example: there is 13th month) print error message
    if(!($dateTime instanceof DateTime && $dateTime->format('Y-m-d H:i:s') == $date))
    {
      echo "\r\nProblem: the input date and time $date is invalid";
      $this->variableToCheck = 'false';
      return $this->variableToCheck;
    }
    //Print error message and return false
    echo "\r\nProblem: some 'Post' inputs are not considered valid. Here are the following data types: ";
    echo "\r\nUser ID: ".gettype($userID)."               Requires: integer".
         "\r\nQuack: ".gettype($quack)."                  Requires: String with length between 1 to 255".
         "\r\nDate and Time: ".gettype($date)."          Requires: String containing the format Y-m-d H:i:s (YYYY-MM-DD HH:MM:SS)";

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  // ####################################### Checks if the 'Following a User' Input Values are Valid #######################################
  public function followUser($loggedInUser, $userThatWillBeFollowed)
  {
    //checks if the logged in user ID and the to be followed user ID are int
    if(is_int($loggedInUser) && is_int($userThatWillBeFollowed))
    {
      //return true -> all inputs are valid
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }
    //Print error message and return false
    echo "\r\nProblem: some 'Follow' inputs are not considered valid. Here are the following data types: ";
    echo "\r\nUser ID of Logged In User: ".gettype($loggedInUser)."               Requires: integer".
         "\r\nUser ID of The User To Be Followed: ".gettype($userThatWillBeFollowed)."      Requires: integer";

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  // ####################################### Checks if the 'Liking a Quack' Input Values are Valid #######################################
  public function likeQuack($quackID, $userID, $date)
  {
    //set date and time to same format as the database
    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);

    //checks if the quack ID and user ID are int and if the date is valid
    if(is_int($quackID) && is_int($userID) && ($dateTime instanceof DateTime && $dateTime->format('Y-m-d H:i:s') == $date))
    {
      //return true -> all inputs are valid
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }
    //if the date is invalid (example: there is 13th month) print error message
    if(!($dateTime instanceof DateTime && $dateTime->format('Y-m-d H:i:s') == $date))
    {
      echo "\r\nProblem: the input date and time $date is invalid";
      $this->variableToCheck = 'false';
      return $this->variableToCheck;
    }
    //Print error message and return false
    echo "\r\nProblem: some 'Like' inputs are not considered valid. Here are the following data types: ";
    echo "\r\nQuack ID: ".gettype($quackID)."              Requires: integer".
         "\r\nUser ID: ".gettype($userID)."               Requires: integer".
         "\r\nDate and Time: ".gettype($date)."         Requires: String containing the format Y-m-d H:i:s (YYYY-MM-DD HH:MM:SS)";

    $this->variableToCheck = 'false';
    return $this->variableToCheck;
  }

  // ####################################### Checks if the 'Search a User' Input Value is Valid #######################################
  public function searchUser($username)
  {
    //checks if the searched username is empty and that it is a string 
    if(!empty($username) && is_string($username))
    {
      //return true -> all inputs are valid
      $this->variableToCheck = 'true';
      return $this->variableToCheck;
    }
    //Print error message and return false
    echo "\r\nProblem: the 'Search User' input is not considered valid. Here is the following data type: ";
    echo "\r\nUsername: ".gettype($username)."           Requires: String";
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
