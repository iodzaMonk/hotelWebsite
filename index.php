<?php

require __DIR__ . "/Controller/Controller.php";


try {
  $deleted = false;
  $created = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // DELETE HOTEL
    if ("delete_hotel" === $_POST['action']) {
      delete(isset($_POST['id']) ? intval($_POST['id']) : 0, $deleted);
    }

    // CREATE HOTEL
    if ("add_hotel" === $_POST['action']) {
      create($created, $_POST['name'] ?? null, $_POST['address'] ?? null);
    }
  }

  if (isset($_GET['search'])) {
    search($_GET['search']);
  }

  if (isset($_GET['new_hotel'])) {
    require __DIR__ . '/Views/NewHotel.php';
    exit;
  }

  if (isset($_GET['id'])) {
    if (intval($_GET['id']) != 0) {
      hotel(intval($_GET['id']));
      exit;
    }
  }

  home();
} catch (Exception $e) {
  error($e);
}