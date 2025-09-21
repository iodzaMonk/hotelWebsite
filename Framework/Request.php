<?php

require_once __DIR__ . '/Configuration.php';
require_once __DIR__ . '/Session.php';

class Request
{
  private $parameters;
  private $session;

  public function __construct($parameters)
  {
    $this->parameters = $parameters;
    $this->session = new Session();
  }

  public function getSession()
  {
    return $this->session;
  }



  public function parameterExists($name)
  {
    return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
  }

  public function getParameter($name)
  {
    if ($this->parameterExists($name)) {
      return $this->parameters[$name];
    } else {
      throw new Exception("Parameter '$name' doesnt exist");
    }
  }

  public function getParameterId($name)
  {
    $id = intval($this->getParameter($name));
    if ($id != 0) {
      return $id;
    } else {
      throw new Exception("Parameter '$name' not valid");
    }
  }

  public function setParameter($name, $value)
  {
    $this->parameters[$name] = $value;
  }
}