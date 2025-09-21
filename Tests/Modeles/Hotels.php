<?php

require_once 'Models/Hotel.php';

$testHotel = new Hotel();
$hotelsStmt = $testHotel->getHotels();
$hotels = $hotelsStmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h3>Test getHotels : </h3>';
var_dump(count($hotels));

echo '<h3>Test getHotel_by_id : </h3>';
if (!empty($hotels) && isset($hotels[0]['id'])) {
  try {
    $hotel = $testHotel->getHotel_by_id((int) $hotels[0]['id']);
    var_dump($hotel);
  } catch (Exception $e) {
    echo 'Exception: ' . $e->getMessage();
  }
} else {
  echo 'No hotels found to test getHotel_by_id.';
}