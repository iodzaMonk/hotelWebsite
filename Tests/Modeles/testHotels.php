<?php

require_once 'Models/Hotel.php';

$testHotel = new Hotel;
$hotels = $testHotel->getHotels();
echo '<h3>Test getHotels : </h3>';
var_dump($hotels->rowCount());

echo '<h3>Test getHotel_by_id : </h3>';
$hotel = $testHotel->getHotel_by_id(1);
var_dump($hotel);