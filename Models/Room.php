<?php

require_once 'Framework/Model.php';

class Room extends Model
{


  public function getRooms($id_hotel)
  {
    $sql = "SELECT id, room_nb, room_type FROM rooms WHERE hotel_id=?";
    $rooms = $this->executeRequest($sql, [$id_hotel]);
    return $rooms;
  }

  public function getRoom_by_id($id_room)
  {
    $sql = "SELECT * FROM rooms WHERE id=? ";
    $room = $this->executeRequest($sql, [$id_room]);
    return $room;
  }

  public function addRoom($id, $roomNb, $roomType)
  {
    $sql = "INSERT INTO rooms (hotel_id, room_nb, room_type) VALUES (?, ?, ?)";
    $stmt = $this->executeRequest($sql, [$id, $roomNb, $roomType]);
    return $stmt->rowCount() === 1;
  }

  public function deleteRoom($id)
  {
    $sql = "DELETE FROM rooms WHERE id=?";
    $stmt = $this->executeRequest($sql, [$id]);
    return $stmt->rowCount() === 1;
  }




}