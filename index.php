<?php

require __DIR__ . "/Controller/Controller.php";


try {
  $deleted = false;
  $created = false;
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
    $name = $_GET['search'];
    $hotels = getHotelsByName($name);
    require __DIR__ . '/Views/Home.php';
    exit;
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