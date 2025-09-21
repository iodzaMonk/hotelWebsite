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



}
