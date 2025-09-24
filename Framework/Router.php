<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/View.php';

class Router
{

  public function routerRequest()
  {
    try {
      $parameters = array_merge($_GET, $_POST);
      $request = new Request($parameters);

      $controller = $this->createController($request); // specific controller like ControllerHotel.php
      $action = $this->createAction($request); // the method we want to use in the specific controller

      $controller->executeAction($action);

    } catch (Exception $e) {
      $this->errorControl($e);
    }
  }

  private function createController(Request $request)
  {
    $controller = "Hotel"; // default controller
    if ($request->getSession()->attributeExists("user")) {
      $controller = 'Admin' . $controller;
    }
    if ($request->parameterExists('controller')) {
      $controller = $request->getParameter('controller');
      // $controller = preg_replace('/[^A-Za-z0-9]/', '', $controller);
      if ($controller === '') {
        throw new Exception("Invalid controller name provided.");
      }
      $controller = ucfirst($controller);
    }
    $classController = "Controller" . $controller;
    $fileController = "Controller/" . $classController . ".php";
    if (file_exists($fileController)) {
      require($fileController); // Controller/ControllerHotel.php for example
      $controller = new $classController(); // create new object
      $controller->setRequest($request); // lets the controller know what action we need
      return $controller;
    } else {
      throw new Exception("File '$fileController' is not found.");
    }
  }

  private function createAction(Request $request)
  {
    $action = "index";  //default action
    if ($request->parameterExists('action')) {
      $action = $request->getParameter('action');
    }
    return $action;
  }

  private function errorControl(Exception $exception)
  {
    $view = new View('error');
    $error = $exception->getMessage();
    $view->generate(array('error' => $error));
  }
}