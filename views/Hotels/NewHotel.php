<?php $title = "Add new Hotel" ?>

<form action="index.php" method="post" class="flex flex-col">
  <input type="hidden" name="controller" value="hotel">
  <input type="hidden" name="action" value="create">
  <label for="name" class="text-2xl my-2">Name</label>
  <input type="text" name="name" id="name"
    class="rounded bg-white text-black p-2 focus:border-opacity-0 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400">
  <label for="address" class="text-2xl my-2">Address</label>
  <input type="text" name="address" id="address"
    class="rounded bg-white text-black p-2 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400">
  <input
    class="rounded bg-white text-black p-2 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400 mt-5"
    type="file" multiple>
  <button type="submit" class="bg-blue-500 w-1/2 mx-auto mt-10 py-5 rounded cursor-pointer">Create</button>
  <?php if (!empty($error)) { ?>
    <p class="text-red-400 mt-4 text-glow-red"><?= $error ?></p>
  <?php } ?>
</form>