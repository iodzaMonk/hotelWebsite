<?php

function getHotels()
{
  $bdd = getBdd();
  $hotels = $bdd->query('select id, hotel_name, hotel_address from hotels');
  return $hotels;
}

function getRooms($id_hotel)
{
  $bdd = getBdd();
  $stmt = $bdd->prepare('SELECT room_nb, room_type FROM rooms WHERE hotel_id=?');
  $stmt->execute(array($id_hotel));
  return $stmt;
}

function getHotels_by_id($id)
{
  $bdd = getBdd();
  $hotel = $bdd->prepare('select id, hotel_name, hotel_address from hotels where id=?');
  $hotel->execute(array($id));
  if ($hotel->rowCount() == 1) {
    return $hotel->fetch();
  } else {
    throw new Exception("No hotels match the given id: '$id'");
  }
}

function getBdd()
{
  $bdd = new PDO('mysql:host=localhost;dbname=hotels;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $bdd;
}