<?php

require_once 'Controller/ControllerAdmin.php';
require_once 'Models/Hotel.php';
require_once 'Models/Room.php';

class ControllerAdminRoom extends ControllerAdmin
{

  private $room;
  private $hotel;
  private const UNDO = 300; // seconds

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
    $req = $this->getRequest();
    if ($idR === null || $idH === null) {
      $idR = $idR ?? intval($req->getParameter('idR'));
      $idH = $idH ?? intval($req->getParameter('idH'));
    }

    if ($idR <= 0) {
      $this->renderRoomsView($idH, 'Missing or invalid room identifier.');
    }

    $roomStmt = $this->room->getRoom_by_id($idR);
    $roomData = $roomStmt ? $roomStmt->fetch(\PDO::FETCH_ASSOC) : false;
    if (!$roomData) {
      $this->renderRoomsView($idH, 'Unable to locate the room to delete.');
    }

    $deleted = $this->room->deleteRoom($idR);
    if ($deleted === true) {
      $req->getSession()->setAttribute('lastDeletedRoom', [
        'room' => [
          'room_nb' => $roomData['room_nb'],
          'room_type' => $roomData['room_type'],
          'hotel_id' => (int) $roomData['hotel_id'],
        ],
        'deleted_at' => time(),
      ]);
      $this->renderRoomsView($idH, null, null, true);
    }

    $this->renderRoomsView($idH, 'Failed to delete the room.');
  }

  public function restore()
  {
    $session = $this->getRequest()->getSession();
    $hotelId = $this->getRequest()->parameterExists('id') ? $this->getRequest()->getParameterId('id') : null;

    if (!$session->attributeExists('lastDeletedRoom')) {
      $this->renderRoomsView($hotelId, 'There is no room to restore.');
    }

    $payload = $session->getAttribute('lastDeletedRoom');
    if (!is_array($payload) || empty($payload['room'])) {
      $session->setAttribute('lastDeletedRoom', null);
      $this->renderRoomsView($hotelId, 'There is no room to restore.');
    }

    $roomInfo = $payload['room'];
    $hotelId = $hotelId ?? (int) $roomInfo['hotel_id'];

    if (!empty($payload['deleted_at']) && (time() - $payload['deleted_at']) > self::UNDO) {
      $session->setAttribute('lastDeletedRoom', null);
      $this->renderRoomsView($hotelId, 'The undo window has expired.');
    }

    $restored = $this->room->addRoom($hotelId, $roomInfo['room_nb'], $roomInfo['room_type']);
    if ($restored) {
      $session->setAttribute('lastDeletedRoom', null);
      $this->renderRoomsView($hotelId, null, null, null, true);
    }

    $this->renderRoomsView($hotelId, 'Unable to restore the room.');
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

  private function renderRoomsView($hotelId, $error = null, $created = null, $deleted = null, $restored = null)
  {
    $hotel = $this->hotel->getHotel_by_id($hotelId);
    $rooms = $this->room->getRooms($hotelId);

    $undo = null;
    if ($this->getRequest()->getSession()->attributeExists('lastDeletedRoom')) {
      $payload = $this->getRequest()->getSession()->getAttribute('lastDeletedRoom');
      if (is_array($payload) && !empty($payload['room']) && (int) $payload['room']['hotel_id'] === (int) $hotelId) {
        $undo = $payload['room'];
      }
    }

    $view = new View("Rooms", "AdminRooms");
    $view->generate([
      'hotel' => $hotel,
      'rooms' => $rooms,
      'error' => $error,
      'id' => $hotelId,
      'created' => $created,
      'deleted' => $deleted,
      'restored' => $restored,
      'undo' => $undo,
    ]);
    exit;
  }
}
