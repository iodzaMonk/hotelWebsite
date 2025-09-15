<?php

require_once 'Framework/View.php';
$room = [
  'id' => '634',
  'room_nb' => '54',
  'hotel_id' => '745',
  'room_type' => 'Single Deluxe',
];
$view = new View('Confirmer', 'Rooms');
$view->generate(['room' => $room]);

