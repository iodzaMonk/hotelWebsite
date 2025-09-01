<?php
require __DIR__ . '/models/Model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // grab form data
  $name = $_POST['name'] ?? null;
  $address = $_POST['address'] ?? null;

  if ($name && $address) {
    $pdo = getBdd();
    $stmt = $pdo->prepare("INSERT INTO hotels (hotel_name, hotel_address) VALUES (?, ?)");
    $stmt->execute([$name, $address]);

    $info = "Hotel added successfully!";
    require __DIR__ . '/views/NewHotel.php';
  } else {
    $info = "Please fill out all fields.";
    require __DIR__ . '/views/NewHotel.php';
  }
}