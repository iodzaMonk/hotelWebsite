<?php

require __DIR__ . "/Controller.php";


try {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // DELETE HOTEL
    if (isset($_POST['action']) && "delete_hotel" === $_POST['action']) {
      $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
      if ($id > 0) {
        $deleted = deleteHotel($id);
        if ($deleted === true) {
          home($deleted);
          exit;
        }
      } else {
        error("Invalid ID for deletion form!");
        exit;
      }
    }


    // CREATE HOTEL
    $name = $_POST['name'] ?? null;
    $address = $_POST['address'] ?? null;
    $deleted = false;
    $created = false;

    if ($name && $address) {
      $created = addHotel($name, $address);
      if ($created) {
        $info = "Hotel added successfully!";
      }
    } else {
      $info = "Please fill out all fields.";
    }
    home(null, $created);
    exit;
  }

  if (isset($_GET['search'])) {
    $id = (int) $_GET['search'];
    $hotel = getHotels_by_id($id);
    $rooms = getRooms($id);
    require __DIR__ . '/views/Rooms.php';
    exit;
  }

  if (isset($_GET['new_hotel'])) {
    require __DIR__ . '/views/NewHotel.php';
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