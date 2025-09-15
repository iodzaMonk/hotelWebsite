<?php

require_once 'Models/Room.php';

$testRoom = new Room;
$rooms = $testRoom->getRooms(1);
echo '<h3>Test  getRooms : </h3>';
var_dump($rooms->rowCount());

$room = $testRoom->getRoom_by_id(1);
echo '<h3>Test  getRoom_by_id : </h3>';
var_dump($room);