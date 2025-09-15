<?php
require_once 'Framework/Model.php';
class Hotel extends Model
{
  public function getHotels()
  {
    $sql = "select id, hotel_name, hotel_address from hotels";
    $hotels = $this->executeRequest($sql);
    return $hotels;
  }


  public function addHotel($name, $address)
  {
    $sql = "INSERT INTO hotels (hotel_name, hotel_address) VALUES (?, ?)";
    $hotel = $this->executeRequest($sql, [$name, $address]);
    return $hotel;
  }

  public function deleteHotel($id)
  {
    $sql = "DELETE FROM hotels WHERE id=?";
    $result = $this->executeRequest($sql, [$id]);
    return $result->rowCount() === 1;
  }

  public function getHotel_by_id($id)
  {
    $sql = "SELECT id, hotel_name, hotel_address FROM hotels WHERE id=?";
    $hotel = $this->executeRequest($sql, [$id]);
    if ($hotel->rowCount() == 1) {
      return $hotel->fetch();
    } else {
      throw new Exception("No hotels match the given id: '$id'");
    }
  }



  public function getHotelsByName($name)
  {
    $sql = "SELECT id, hotel_name, hotel_address FROM hotels WHERE hotel_name LIKE ?";
    $hotels = $this->executeRequest($sql, ['%' . $name . '%']);
    return $hotels;
  }
}