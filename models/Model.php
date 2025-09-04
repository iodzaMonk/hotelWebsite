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

function addHotel($name, $address)
{
  $pdo = getBdd();
  $stmt = $pdo->prepare("INSERT INTO hotels (hotel_name, hotel_address) VALUES (?, ?)");
  $stmt->execute([$name, $address]);
  return $stmt->rowCount() === 1;
}

function deleteHotel($id)
{
  $pdo = getBdd();
  $stmt = $pdo->prepare("DELETE FROM hotels WHERE id=?");
  $stmt->execute([$id]);
  return $stmt->rowCount() === 1;
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

function getHotelsByName($name)
{
  $bdd = getBdd();
  $hotels = $bdd->prepare("SELECT id, hotel_name, hotel_address FROM hotels WHERE hotel_name LIKE ?");
  $hotels->execute(array($name));
  if ($hotels->rowCount() >= 1) {
    return $hotels;
  } else {
    throw new Exception("No hotel with the given name were found: '$name'");
  }
}

function getBdd()
{
  $bdd = new PDO('mysql:host=localhost;dbname=hotels;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $bdd;
}