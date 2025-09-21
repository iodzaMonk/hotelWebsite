<?php

require_once "Framework/Controller.php";

abstract class ControllerAdmin extends Controller
{
  private $user;

  public function executeAction($action = '')
  {
    if ($this->request->getSession()->attributeExists("user")) {
      $this->user = $this->request->getSession()->getAttribute("user");
      parent::executeAction($action);
    } else {
      $this->redirect('Users');
    }
  }

  public function generateView($viewData = array())
  {
    $viewData['user'] = $this->user;
    parent::generateView($viewData);
  }
}