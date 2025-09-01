<?php

require __DIR__ . '/models/Model.php';

try {
  if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id != 0) {
      $hotel = getHotels_by_id($id);
      $rooms = getRooms($id);
      require 'views/Rooms.php';
    } else {
      throw new Exception("ID of hotel is incorrect");
    }
  } else {
    throw new Exception("NO ID of hotel");
  }
} catch (Exception $e) {
  $msgError = $e->getMessage();
  require __DIR__ . '/views/Error.php';
}