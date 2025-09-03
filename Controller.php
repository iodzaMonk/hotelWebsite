<?php

require __DIR__ . "/models/Model.php";

function home()
{
  $hotels = getHotels();
  require __DIR__ . '/views/Home.php';
}

function hotel($id)
{
  $hotel = getHotels_by_id($id);
  $rooms = getRooms($id);
  require __DIR__ . "/views/Rooms.php";
}

function error($errorMsg)
{
  $msgError = $errorMsg->getMessage();
  require __DIR__ . "/views/Error.php";
}