<?php

require_once __DIR__ . '/Configuration.php';

class View
{

  private $file;
  private $title;

  public function __construct($action, $controller = "")
  {
    $file = "Views/";
    if ($controller != "") {
      $file = $file . $controller . "/";
    }
    $this->file = $file . $action . ".php";
  }

  // generate view
  public function generate($data = null)
  {
    $content = $this->generateFile($this->file, $data);
    $rootWeb = Configuration::get("Installation.rootWeb", "/");
    $view = $this->generateFile('Views/Template.php', array('title' => $this->title, 'content' => $content, 'rootWeb' => $rootWeb));
    echo $view;
  }


  private function generateFile($file, $data)
  {
    if (file_exists($file)) {
      if (is_array($data)) {
        extract($data);
      }
      ob_start();
      require $file;
      // If the view defined $title, propagate to template via $this->title
      if (isset($title) && is_string($title)) {
        $this->title = $title;
      }
      return ob_get_clean();
    } else {
      throw new Exception("File '$file' not found!");
    }
  }

  private function clean($value)
  {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
  }
}