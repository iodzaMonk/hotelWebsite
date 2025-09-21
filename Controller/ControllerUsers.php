<?php

require_once 'Framework/Controller.php';
require_once 'Models/User.php';

class ControllerUsers extends Controller
{

  private $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function index()
  {
    $error = $this->request->getSession()->attributeExists("error") ? $this->request->getSession()->getAttribute("error") : '';
    $this->generateView(['error' => $error]);
  }

  public function connect()
  {
    if ($this->request->parameterExists("login") && $this->request->parameterExists("password")) {
      $login = $this->request->getParameter("login");
      $password = $this->request->getParameter("password");
      if ($this->user->connect($login, $password)) {
        $user = $this->user->getUser($login, $password);
        $this->request->getSession()->setAttribute("user", $user);
        if ($this->request->getSession()->attributeExists("error")) {
          $this->request->getSession()->setAttribute("error", '');
        }
        $this->redirect("AdminHotel", "index");
      } else {
        $this->request->getSession()->setAttribute("error", "password");
        $this->redirect("Users", "index");
      }
    } else
      throw new Exception("Action impossible: login or password is not defined");
  }

  public function disconnect()
  {
    $this->request->getSession()->destroy();
    $this->redirect("Hotel", "index");
  }
}