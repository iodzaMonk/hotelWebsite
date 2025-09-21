<?php require "./Framework/Configuration.php" ?>
<?php $rootWeb = Configuration::get('rootWeb', '/'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?= $rootWeb ?>CSS/output.css">
  <title>Tests</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php


$testResult = '';
if (isset($_GET['test'])) {
  ob_start();
  if ($_GET['test'] == 'HotelModel') {
    require 'Tests/Modeles/Hotels.php';
  } else if ($_GET['test'] == 'RoomModel') {
    require 'Tests/Modeles/Rooms.php';
  } else if ($_GET['test'] == 'viewHotels') {
    require 'Tests/Vues/viewHotel.php';
  } else if ($_GET['test'] == 'viewRooms') {
    require 'Tests/Vues/viewRooms.php';
  } else {
    echo '<h3>Test inexistant!!!</h3>';
  }
  $testResult = ob_get_clean();
}
?>

<?php ob_start() ?>
<div class="flex flex-col justify-center items-center">
  <h3 class="text-5xl my-5">Models tests</h3>
  <ul class="flex gap-5">
    <li class="py-2 px-5 border rounded">
      <a href="tests.php?test=HotelModel">Hotel</a>
    </li>
    <li class="py-2 px-5 border rounded">
      <a href="tests.php?test=RoomModel">Room</a>
    </li>
  </ul>
  <h3 class="text-5xl my-5">Views tests</h3>
  <ul class="flex gap-5">
    <li class="py-2 px-5 border rounded">
      <a href="tests.php?test=viewHotels">Hotels</a>
    </li>
    <li class="py-2 px-5 border rounded">
      <a href="tests.php?test=viewRooms">Rooms</a>
    </li>
  </ul>
  <?php if ($testResult): ?>
    <div class="w-full max-w-3xl mt-10 p-6 rounded-xl bg-gray-900/80 border border-white/20 shadow-lg">
      <?= $testResult ?>
    </div>
  <?php endif; ?>
</div>
<?php $content = ob_get_clean() ?>
<?php require "./Views/Template.php" ?>

</html>