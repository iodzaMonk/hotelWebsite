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
    $hotels = $this->hotel->getHotels()->fetchAll(PDO::FETCH_ASSOC);
    $view = new View("Hotels", "Hotels");
    $view->generate(['hotels' => $hotels, 'searchValue' => '', 'searchPerformed' => false]);
  }

  public function hotels($error = null, $created = null, $deleted = null)
  {
    $hotels = $this->hotel->getHotels()->fetchAll(PDO::FETCH_ASSOC);
    $view = new View("Hotels", "Hotels");
    $view->generate([
      'hotels' => $hotels,
      'created' => $created,
      'deleted' => $deleted,
      'error' => $error,
      'searchValue' => '',
      'searchPerformed' => false
    ]);
    exit;
  }

  public function search()
  {
    $request = $this->getRequest();
    $searchValue = '';
    if ($request->parameterExists('searchValue')) {
      $searchValue = trim($request->getParameter('searchValue'));
    }

    $resultsStmt = $searchValue === ''
      ? $this->hotel->getHotels()
      : $this->hotel->getHotelsByName($searchValue);
    $hotels = $resultsStmt->fetchAll(PDO::FETCH_ASSOC);

    $view = new View("Hotels", "Hotels");
    $view->generate([
      'hotels' => $hotels,
      'searchValue' => $searchValue,
      'searchPerformed' => true
    ]);
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
    $view->generate([
      'hotel' => $hotel,
      'rooms' => $rooms,
      'error' => $error,
      'id' => $idHotel,
      'created' => $created,
      'deleted' => $deleted
    ]);
    exit;
  }
}