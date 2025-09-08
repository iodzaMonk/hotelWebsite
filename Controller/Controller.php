<?php

require __DIR__ . "/../Models/Model.php";

function home(?bool $del = null, ?bool $create = null)
{
  $created = null;
  $deleted = null;
  if ($del) {
    $deleted = true;
  }

  if ($create) {
    $created = true;
  }
  $hotels = getHotels();
  require __DIR__ . '/../Views/Home.php';
}

function createHotel($name, $address)
{
  $created = addHotel($name, $address);
  if ($created) {
    $info = "Hotel added successfully!";
  } else {
    $info = "Something went wrong";
  }
}

function deleteH($id, $deleted)
{
  if ($id > 0) {
    $deleted = deleteHotel($id);
    if ($deleted === true) {
      home($deleted);
      exit;
    }
  } else {
    error("Invalid ID for deletion form!");
    exit;
  }
}

function createH($created, $name, $address)
{
  if ($name && $address) {
    $created = addHotel($name, $address);
    if ($created) {
      $info = "Hotel added successfully!";
    }
  } else {
    $info = "Please fill out all fields.";
    require __DIR__ . "/../Views/NewHotel.php";
  }
  home(null, $created);
  exit;
}

function deleteR($idR, $idH, $deleted)
{
  if ($idR > 0) {
    $deleted = deleteRoom($idR);
    if ($deleted === true) {
      hotel($idH, $deleted);
      exit;
    }
  } else {
    error("Invalid ID for deletion form!");
    exit;
  }
}

function createR($created, $id, $roomNb, $roomType)
{
  if ($roomNb && $roomType) {
    $created = addRoom($id, $roomNb, $roomType);
    if (!$created) {
      $info = "Please fill out all fields.";
      require __DIR__ . "/../Views/NewRoom.php";
    }
  }

  hotel($id, null, $created);
  exit;
}

function search($name)
{
  $hotels = getHotelsByName($name);
  require __DIR__ . '/../Views/Home.php';
  exit;
}

function hotel($id, ?bool $del = null, ?bool $create = null)
{
  $created = null;
  $deleted = null;
  if ($del) {
    $deleted = true;
  }

  if ($create) {
    $created = true;
  }

  $hotel = getHotels_by_id($id);
  $rooms = getRooms($id);
  $id;
  require __DIR__ . "/../Views/Rooms.php";
}

function error($errorMsg)
{
  $msgError = $errorMsg->getMessage();
  require __DIR__ . "/../Views/Error.php";
}