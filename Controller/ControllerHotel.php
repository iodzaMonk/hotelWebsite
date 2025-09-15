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

  public function create($name = null, $address = null)
  {
    $req = $this->getRequest();
    if ($name === null)
      $name = $req->parameterExists('name') ? $req->getParameter('name') : null;
    if ($address === null)
      $address = $req->parameterExists('address') ? $req->getParameter('address') : null;
    $created = null;
    if ($name && $address) {
      $created = $this->hotel->addHotel($name, $address);
      $this->hotels(null, $created);
      exit;
    } else {
      $this->add('Please fill up both fields!');
    }
  }

  public function add($error = null)
  {
    $view = new View("NewHotel", "Hotels");
    $view->generate(['title' => 'Add a new hotel', 'error' => $error]);
    exit;
  }

  public function delete($id = null)
  {
    if ($id === null) {
      $req = $this->getRequest();
      $id = $req->getParameterId('id');
    }
    $deleted = $this->hotel->deleteHotel($id);
    $this->hotels(null, null, $deleted);
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