<?php
$roomsList = [];
if (isset($rooms)) {
  if (is_array($rooms)) {
    $roomsList = $rooms;
  } elseif ($rooms instanceof Traversable) {
    $roomsList = iterator_to_array($rooms);
  }
}

$hotelName = '';
$hotelAddress = '';
// needed because of tests, handles both forms :(
if (isset($hotel)) {
  if (is_array($hotel)) {
    $hotelName = $hotel['hotel_name'] ?? '';
    $hotelAddress = $hotel['hotel_address'] ?? '';
  } elseif (is_object($hotel)) {
    $hotelName = property_exists($hotel, 'hotel_name') ? $hotel->hotel_name : '';
    $hotelAddress = property_exists($hotel, 'hotel_address') ? $hotel->hotel_address : '';
  }
}
?>
<div
  class="relative  bg-gray-800/40 rounded-2xl p-4 flex flex-col items-center mb-10 border border-white/30 overflow-hidden shadow-2xl shadow-white/2">
  <h1 class="text-5xl"><?= $hotelName ?></h1>
  <p class="text-gray-400"><?= $hotelAddress ?></p>

</div>
<?php if (!empty($roomsList)): ?>
  <h1 class="text-5xl">Available rooms:</h1>
<?php else: ?>
  <h1 class="text-5xl">No available rooms</h1>
<?php endif; ?>
<div class="flex flex-col">
  <div class="grid grid-cols-3">
    <?php foreach ($roomsList as $room):
      $roomType = '';
      $roomNb = '';
      if (is_array($room)) {
        $roomType = $room['room_type'] ?? '';
        $roomNb = $room['room_nb'] ?? '';
      } elseif (is_object($room)) {
        $roomType = property_exists($room, 'room_type') ? $room->room_type : '';
        $roomNb = property_exists($room, 'room_nb') ? $room->room_nb : '';
      }
      $roomType = htmlspecialchars((string) $roomType, ENT_QUOTES, 'UTF-8');
      $roomNb = htmlspecialchars((string) $roomNb, ENT_QUOTES, 'UTF-8');
      ?>
      <a class="group block">
        <div
          class="relative bg-gray-800/40 rounded-2xl p-4 border border-white/15 m-5 w-4/5 mx-auto transition-all duration-500 ease-out transform-gpu group-hover:scale-110 group-hover:shadow-2xl shadow-cyan-500/10">
          <span
            class="absolute inset-0 rounded-2xl ring-0 ring-inset transition duration-500 group-hover:ring-2 group-hover:ring-cyan-500/60"></span>
          <span class="absolute inset-0 overflow-hidden rounded-2xl ">
            <span
              class="absolute -left-1/2 top-0 h-full w-1/5 -skew-x-12 bg-white/10 translate-x-[-120%] group-hover:translate-x-[680%] transition-transform duration-700 ease-out"></span>
          </span>
          <h1><?= $roomType ?></h1>
          <p>Room nb: <span class="font-bold italic text-cyan-600"><?= $roomNb ?></span></p>
        </div>

      </a>
    <?php endforeach ?>
  </div>
</div>