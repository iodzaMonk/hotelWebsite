<?php

require_once 'Framework/Model.php';
require_once 'Models/Room.php';
require_once 'Models/Hotel.php';
require_once 'Framework/View.php';
require_once 'Controller/ControllerHotel.php';

class ControllerRoom extends Controller
{

  private $room;
  private $hotel;
  private $ctrlHotel;
  public function __construct()
  {
    $this->room = new Room();
    $this->hotel = new Hotel();
    $this->ctrlHotel = new ControllerHotel();
  }

  public function index()
  {
    // $hotels = $this->room->getRooms();
    // $this->generateView(['hotels' => $hotels]);
  }


  public function delete($idR = null, $idH = null, $deleted = null)
  {
    if ($idR === null || $idH === null) {
      $req = $this->getRequest();
      $idR = $idR ?? intval($req->getParameter('idR'));
      $idH = $idH ?? intval($req->getParameter('idH'));
    }
    if ($idR > 0) {
      $deleted = $this->room->deleteRoom($idR);
      if ($deleted === true) {
        $this->ctrlHotel->hotel($idH, null, null, $deleted);
        exit;
      } else {
        exit;
      }
    }
  }

  public function add($id = null, $error = null)
  {
    if ($id === null) {
      $req = $this->getRequest();
      $id = $req->getParameterId('id');
    }
    $view = new View("NewRoom", "Rooms");
    $view->generate(['title' => 'Add a new room', 'id' => $id, 'error' => $error]);
    exit;
  }

  public function create($created = null, $id = null, $roomNb = null, $roomType = null)
  {
    $req = $this->getRequest();
    if ($id === null) $id = $req->getParameterId('id');
    if ($roomNb === null) $roomNb = $req->parameterExists('roomNb') ? $req->getParameter('roomNb') : null;
    if ($roomType === null) $roomType = $req->parameterExists('roomType') ? $req->getParameter('roomType') : null;
    if ($roomNb && $roomType) {
      $created = $this->room->addRoom($id, $roomNb, $roomType);
      $this->ctrlHotel->hotel($id, null, $created, null);
    } else {
      $this->add($id, 'Please fill up both fields!');
    }
  }

}
