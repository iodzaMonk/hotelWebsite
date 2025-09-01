<?php

require __DIR__ . "/models/Model.php";

try {
  if (isset($_GET['search'])) {
    $id = $_GET['search'];
    $hotel = getHotels_by_id($id);
    $rooms = getRooms($id);
    require __DIR__ . '/views/Rooms.php';
  } else if (isset($_GET['new_hotel'])) {
    require __DIR__ . '/views/NewHotel.php';
  } else {
    $hotels = getHotels();
    require __DIR__ . '/views/Home.php';
  }
} catch (Exception $e) {
  $msgError = $e->getMessage();
  require __DIR__ . '/views/Error.php';
}