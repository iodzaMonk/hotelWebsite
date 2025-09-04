<?php ob_start(); ?>


<div
  class="relative  bg-gray-800/40 rounded-2xl p-4 flex flex-col items-center mb-10 border border-white/30 overflow-hidden shadow-2xl shadow-white/2">
  <h1 class="text-5xl"><?= $hotel['hotel_name'] ?></h1>
  <p class="text-gray-400"><?= $hotel['hotel_address'] ?></p>

  <form action="index.php" method="post">
    <button type="submit" class="group cursor-pointer">
      <input type="hidden" name="action" value="delete_hotel">
      <input type="hidden" name="id" value="<?= $hotel['id'] ?>">
      <svg
        class="absolute inset-0 h-1/2 w-[50px] my-auto left-9/10 scale-50 text-red-500 group-hover:scale-100 transition-all duration-700 ease-out"
        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
      </svg>


      <span
        class="absolute inset-0 h-1/2 my-auto left-9/10 w-[50px] opacity-0 scale-50 bg-red-500 z-20 blur-md group-hover:opacity-40 group-hover:scale-100 transition-all duration-700 ease-out"></span>
    </button>
  </form>

  <img src="./Public/Images/image.webp" alt="image" class="h-[500] border rounded-2xl">

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

<?php require __DIR__ . '/template.php'; ?>