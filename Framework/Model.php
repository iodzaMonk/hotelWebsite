<?php

abstract class Model
{
  private static $bdd;


  protected function executeRequest($sql, $params = null)
  {
    if ($params == null) {
      $stmt = self::getBdd()->query($sql);
    } else {
      $stmt = self::getBdd()->prepare($sql);
      $stmt->execute($params);
    }
    return $stmt;
  }

  private function getBdd()
  {
    if (self::$bdd == null) {
      $dsn = Configuration::get("dsn");
      $login = Configuration::get("login");
      $password = Configuration::get("password");
      // create bd connection
      try {
        self::$bdd = new PDO($dsn, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (PDOException $e) {
        throw new RuntimeException("PDO connect failed: " . $e->getMessage());
      }
    }
    return self::$bdd;
  }
}