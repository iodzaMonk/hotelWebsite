<?php

class Session
{
  public function __construct()
  {
    session_start();
  }

  public function destroy()
  {
    session_destroy();
  }

  public function setAttribute($name, $value)
  {
    $_SESSION[$name] = $value;
  }

  public function attributeExists($name)
  {
    return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
  }

  public function getAttribute($name)
  {
    if ($this->attributeExists($name)) {
      return $_SESSION[$name];
    } else {
      throw new Exception("Attribute `$name` is missing from the session");
    }
  }

}