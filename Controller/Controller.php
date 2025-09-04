<?php

require __DIR__ . "/../Models/Model.php";

function home(?bool $del = null, ?bool $created = null)
{
  $crea = null;
  $deleted = null;
  if ($del) {
    $deleted = true;
  }

  if ($created) {
    $crea = true;
  }
  $hotels = getHotels();
  require __DIR__ . '/../Views/Home.php';
}

function createHotel($name, $address){
  $created = addHotel($name, $address);
  if ($created) {
        $info = "Hotel added successfully!";
      } else {
        $info = "Something went wrong";
      }
}

function hotel($id)
{
  $hotel = getHotels_by_id($id);
  $rooms = getRooms($id);
  require __DIR__ . "/../Views/Rooms.php";
}

function error($errorMsg)
{
  $msgError = $errorMsg->getMessage();
  require __DIR__ . "/../Views/Error.php";
}