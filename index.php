<?php

require __DIR__ . "/Controller.php";

try {
  if (isset($_GET['search'])) {
    $id = $_GET['search'];
    $hotel = getHotels_by_id($id);
    $rooms = getRooms($id);
    require __DIR__ . '/views/Rooms.php';
  } else if (isset($_GET['new_hotel'])) {
    require __DIR__ . '/views/NewHotel.php';
  } else if (isset($_GET['id'])) {
    if (intval($_GET['id'] != 0)) {
      hotel(intval($_GET['id']));
    }
  } else {
    home();
  }
} catch (Exception $e) {
  error($e);
}