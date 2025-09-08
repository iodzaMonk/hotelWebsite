<?php

require __DIR__ . "/Controller/Controller.php";


try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $deleted = false;
    $created = false;
    // DELETE HOTEL
    if ("delete_hotel" === $_POST['action']) {
      deleteH(isset($_POST['id']) ? intval($_POST['id']) : 0, $deleted);
    }
    // DELETE ROOM
    if ("delete_room" === $_POST['action']) {
      deleteR(isset($_POST['idR']) ? intval($_POST['idR']) : 0, isset($_POST['idH']) ? intval($_POST['idH']) : 0, $deleted);
    }


    // CREATE HOTEL
    if ("add_hotel" === $_POST['action']) {
      createH($created, $_POST['name'] ?? null, $_POST['address'] ?? null);
    }
    // CREATE ROOM
    if ("add_room" === $_POST['action']) {
      createR($created, (int) $_GET['id'], (int) $_POST['roomNb'] ?? null, $_POST['roomType'] ?? null);
    }
  }

  if (isset($_GET['search'])) {
    search($_GET['search']);
  }

  if (isset($_GET['new_hotel'])) {
    require __DIR__ . '/Views/NewHotel.php';
    exit;
  }

  if (isset($_GET['new_room'])) {
    $id = $_GET['id'];
    require __DIR__ . '/Views/NewRoom.php';
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