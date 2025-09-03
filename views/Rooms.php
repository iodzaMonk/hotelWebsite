<?php ob_start(); ?>


<div
  class="relative  bg-gray-800/40 rounded-2xl p-4 flex flex-col items-center mb-10 border border-white/30 overflow-hidden shadow-2xl shadow-white/2">
  <h1 class="text-5xl"><?= $hotel['hotel_name'] ?></h1>
  <p class="text-gray-400"><?= $hotel['hotel_address'] ?></p>
</div>
<h1 class="text-5xl">Available rooms:</h1>
<div class="grid grid-cols-3">
  <?php foreach ($rooms as $room): ?>
  <a href="" class="group">
    <div
      class="relative bg-gray-800/40 rounded-2xl p-4 border border-white/15 m-5 w-4/5 mx-auto transition-all duration-500 ease-out transform-gpu group-hover:scale-110 group-hover:shadow-2xl shadow-cyan-500/10">
      <span
        class="absolute inset-0 rounded-2xl ring-0 ring-inset transition duration-500 group-hover:ring-2 group-hover:ring-cyan-500/60"></span>
      <span class="absolute inset-0 overflow-hidden rounded-2xl ">
        <span
          class="absolute -left-1/2 top-0 h-full w-1/5 -skew-x-12 bg-white/10 translate-x-[-120%] group-hover:translate-x-[680%] transition-transform duration-700 ease-out"></span>
      </span>
      <h1><?= $room['room_type'] ?></h1>
      <p>Room nb: <span class="font-bold italic text-cyan-600"><?= $room['room_nb'] ?></span></p>
    </div>
  </a>
  <?php endforeach ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/../template.php'; ?>