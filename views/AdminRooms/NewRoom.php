<?php $title = "Add new Room" ?>

<form action="<?= Configuration::get('rootWeb','/') ?>AdminRoom/create/<?= $id ?>" method="post" class="flex flex-col">
  <label for="roomNb" class="text-2xl my-2">Room number</label>
  <input type="text" name="roomNb"
    class="rounded bg-white text-black p-2 focus:border-opacity-0 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400">
  <label for="roomType" class="text-2xl my-2">Room type</label>
  <input type="text" name="roomType"
    class="rounded bg-white text-black p-2 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400">
  <input
    class="rounded bg-white text-black p-2 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400 mt-5"
    type="file" multiple>
  <button type="submit" class="bg-blue-500 w-1/2 mx-auto mt-10 py-5 rounded cursor-pointer">Create</button>
  <?php if (!empty($error)) { ?>
    <p class="text-red-400 mt-4 text-glow-red"><?= $error ?></p>
  <?php } ?>
</form>
