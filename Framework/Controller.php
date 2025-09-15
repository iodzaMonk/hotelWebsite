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
    $classController = get_class($this);
    $controller = str_replace("Controller", "", $classController);

    $view = new View($this->action, $controller);
    $view->generate($viewData);
  }

  protected function redirect($controller = null, $action = null)
  {
    $rootWeb = Configuration::get("Installation.rootWeb", "/");
    if ($controller != null) {
      header("Location:" . $rootWeb . $controller . "/" . $action);
    } else {
      header("Location" . $rootWeb);
    }
  }

  protected function getRequest()
  {
    return $this->request;
  }
}
