<?php

require_once 'Framework/View.php';
$hotel = (object) [
  'id' => '623',
  'hotel_name' => 'Imaginary name 1',
  'hotel_address' => 'Imaginary address 1',
  'image_repo' => './public/images/Imaginary1.png',
];

$rooms = [
  (object) [
    'id' => '634',
    'room_nb' => '54',
    'hotel_id' => '745',
    'room_type' => 'Single Deluxe',
  ],
  (object) [
    'id' => '635',
    'room_nb' => '55',
    'hotel_id' => '745',
    'room_type' => 'Double Deluxe',
  ],
];
$view = new View('Rooms', 'Rooms');
$view->generate(['rooms' => $rooms, 'hotel' => $hotel]);