<?php

require_once 'Framework/View.php';
$hotels = [
  [
    'id' => '623',
    'hotel_name' => 'Imaginary name 1',
    'hotel_address' => 'Imaginary address 1',
    'image_repo' => './public/images/Imaginary1.png',
  ],
  [
    'id' => '324',
    'hotel_name' => 'titre Test 2',
    'hotel_address' => 'Imaginary address 2',
    'image_repo' => './public/images/Imaginary2.png',
  ]
];
$view = new View('Hotels', 'Hotels');
$view->generate(['hotels' => $hotels]);