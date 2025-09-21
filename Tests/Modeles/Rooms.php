<?php

require_once 'Models/Room.php';

$testRoom = new Room();
$roomsStmt = $testRoom->getRooms(2);
$rooms = [];

echo '<h3>Test  getRooms : </h3>';
var_dump(count($rooms));

echo '<h3>Test  getRoom_by_id : </h3>';
if (!empty($rooms) && isset($rooms[0]['id'])) {
  $roomId = (int) $rooms[0]['id'];
  $roomStmt = $testRoom->getRoom_by_id($roomId);
  if ($roomStmt->rowCount() > 0) {
    $roomData = $roomStmt->fetch(PDO::FETCH_ASSOC);
    var_dump($roomData);
  } else {
    echo 'No room found with id ' . $roomId;
  }
} else {
  echo 'No rooms found to test getRoom_by_id.';
}