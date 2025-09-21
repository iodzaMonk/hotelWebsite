<?php

require_once 'Models/Hotel.php';
require_once 'Models/Room.php';
require_once 'Framework/View.php';

class ControllerHotel extends Controller
{

  private $hotel;
  private $room;

  public function __construct()
  {
    $this->hotel = new Hotel();
    $this->room = new Room();
  }

  public function index()
  {
    $hotels = $this->hotel->getHotels();
    $view = new View("Hotels", "Hotels");
    $view->generate(['hotels' => $hotels]);
  }

  public function hotels($error = null, $created = null, $deleted = null)
  {
    $hotels = $this->hotel->getHotels();
    $view = new View("Hotels", "Hotels");
    $view->generate(['hotels' => $hotels, 'created' => $created, 'deleted' => $deleted]);
    exit;
  }

  public function hotel($idHotel = null, $error = null, $created = null, $deleted = null)
  {
    if ($idHotel === null) {
      $req = $this->getRequest();
      $idHotel = $req->getParameterId('id');
    }
    $hotel = $this->hotel->getHotel_by_id($idHotel);
    $rooms = $this->room->getRooms($idHotel);
    $view = new View("Rooms", "Rooms");
    $view->generate(['hotel' => $hotel, 'rooms' => $rooms, 'error' => $error, 'id' => $idHotel, 'created' => $created, 'deleted' => $deleted]);
    exit;
  }


  public function search($name = null)
  {
    if ($name === null) {
      $req = $this->getRequest();
      $name = $req->parameterExists('search') ? $req->getParameter('search') : '';
    }
    $hotels = $this->hotel->getHotelsByName($name);
    $view = new View("Hotels", "Hotels");
    if ($hotels->rowCount() === 0) {
      $view->generate(['error' => 'There are no hotels with this name']);
      exit;
    } else {
      $view->generate(['hotels' => $hotels]);
      exit;
    }
  }

}