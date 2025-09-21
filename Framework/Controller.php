<?php

require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/View.php';

abstract class Controller
{
  private $action;
  protected $request;

  public function setRequest(Request $request)
  {
    $this->request = $request;
  }

  public function executeAction($action = "")
  {
    if (method_exists($this, $action)) {
      $this->action = $action;
      $this->{$this->action}();
    } else {
      $classController = get_class($this);
      throw new Exception("Action '$action' is not defined inside the class $classController");
    }
  }

  public abstract function index();

  protected function generateView($viewData = array())
  {
    if ($this->request->getSession()->attributeExists('user')) {
      $viewData['user'] = $this->request->getSession()->getAttribute('user');
    }
    $classController = get_class($this);
    $controller = str_replace("Controller", "", $classController);
    $message = '';
    if ($this->request->getSession()->attributeExists("message")) {
      $message = $this->request->getSession()->getAttribute("message");
      $this->request->getSession()->setAttribute("message", "");
    }
    $viewData['message'] = $message;

    $view = new View($this->action, $controller);
    $view->generate($viewData);
  }

  protected function redirect($controller = null, $action = null, array $extraSegments = [])
  {
    $rootWeb = Configuration::get("Installation.rootWeb");
    if (empty($rootWeb)) {
      $rootWeb = Configuration::get('rootWeb', '/');
    }

    if ($controller != null) {
      header('Location: ' . $rootWeb . $controller . "/" . $action);
    } else {
      header('Location: ' . $rootWeb);
    }
  }

  protected function getRequest()
  {
    return $this->request;
  }
}