<?php

require_once 'Framework/Model.php';

class User extends Model
{

  public function connect($login, $password)
  {
    $sql = "SELECT name, password FROM users WHERE name = ? AND password = ?";
    $user = $this->executeRequest($sql, array($login, $password));
    return ($user->rowCount() === 1);
  }

  public function getUser($login, $password)
  {
    $sql = "SELECT id, name, password FROM users WHERE name = ? AND password = ?";
    $user = $this->executeRequest($sql, array($login, $password));
    if ($user->rowCount() == 1)
      return $user->fetch();
    else
      throw new Exception("No user corresponds to the given information.");
  }
}