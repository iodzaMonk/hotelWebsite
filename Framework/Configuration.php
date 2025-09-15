<?php


class Configuration
{
  private static $parameters;

  public static function get($name, $defaultValue = null)
  {
    $params = self::getParameters(); // dev.ini params


    // // Direct top-level lookup
    if (array_key_exists($name, $params)) {
      return $params[$name];
    }

    // Search within sections for a matching key - currently not useful
    foreach ($params as $section) {
      if (is_array($section) && array_key_exists($name, $section)) {
        return $section[$name];
      }
    }

  }

  public static function getParameters()
  {
    if (self::$parameters == null) {
      $filePath = "Config/dev.ini";
      if (!file_exists($filePath)) {
        $filePath = "Config/prod.ini";
      }
      if (!file_exists($filePath)) {
        throw new Exception("No configuration files found.");
      }

      self::$parameters = parse_ini_file($filePath, true);
    }
    return self::$parameters; // array of params
  }
}