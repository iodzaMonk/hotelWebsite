<?php

require_once 'Controller/ControllerAdmin.php';
require_once 'Models/Hotel.php';
require_once 'Models/Room.php';

class ControllerAdminRoom extends ControllerAdmin
{

  private $room;
  private $hotel;

  public function __construct()
  {
    $this->room = new Room();
    $this->hotel = new Hotel();
  }

  public function index()
  {
    // $hotels = $this->room->getRooms();
    // $this->generateView(['hotels' => $hotels]);
  }

  public function delete($idR = null, $idH = null)
  {
    if ($idR === null || $idH === null) {
      $req = $this->getRequest();
      $idR = $idR ?? intval($req->getParameter('idR'));
      $idH = $idH ?? intval($req->getParameter('idH'));
    }
    if ($idR > 0) {
      $deleted = $this->room->deleteRoom($idR);
      if ($deleted === true) {
        $this->renderRoomsView($idH, null, null, $deleted);
      }
      $this->renderRoomsView($idH, 'Failed to delete the room.');
    }
  }

  public function add($id = null, $error = null)
  {
    if ($id === null) {
      $req = $this->getRequest();
      $id = $req->getParameterId('id');
    }
    $view = new View("NewRoom", "AdminRooms");
    $view->generate(['title' => 'Add a new room', 'id' => $id, 'error' => $error]);
    exit;
  }

  public function create($created = null, $id = null, $roomNb = null, $roomType = null)
  {
    $req = $this->getRequest();
    if ($id === null) {
      $id = $req->getParameterId('id');
    }
    if ($roomNb === null) {
      $roomNb = $req->parameterExists('roomNb') ? $req->getParameter('roomNb') : null;
    }
    if ($roomType === null) {
      $roomType = $req->parameterExists('roomType') ? $req->getParameter('roomType') : null;
    }
    if ($roomNb && $roomType) {
      $created = $this->room->addRoom($id, $roomNb, $roomType);
      if ($created === true) {
        $this->renderRoomsView($id, null, $created, null);
      }
      $this->add($id, 'Unable to create the room. Please try again.');
      return;
    }
    $this->add($id, 'Please fill up both fields!');
  }

  private function renderRoomsView($hotelId, $error = null, $created = null, $deleted = null)
  {
    $hotel = $this->hotel->getHotel_by_id($hotelId);
    $rooms = $this->room->getRooms($hotelId);
    $view = new View("Rooms", "AdminRooms");
    $view->generate(['hotel' => $hotel, 'rooms' => $rooms, 'error' => $error, 'id' => $hotelId, 'created' => $created, 'deleted' => $deleted]);
    exit;
  }

}