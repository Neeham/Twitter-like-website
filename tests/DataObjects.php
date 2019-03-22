<?php

class DataObjects
{
  protected $localVariable = '';

  public function getUsernameOfLoggedInUser()
  {
    global $localVariable;

    $localVariable = (string)$loggedInUser;

    return $this->localVariable;
  }

  public function __toString()
  {
    global $localVariable;
    return $this->localVariable;
  }
}
 ?>
