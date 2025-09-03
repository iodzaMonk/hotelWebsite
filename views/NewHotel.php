<?php $title = "Add new Hotel" ?>

<?php ob_start(); ?>
<form action="/4205H6/MonBlog-sans-mvc/add_hotel.php" method="post" class="flex flex-col">
  <label for="name" class="text-2xl my-2">Name</label>
  <input type="text" name="name" id="name"
    class="rounded bg-white text-black p-2 focus:border-opacity-0 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400">
  <label for="address" class="text-2xl my-2">Address</label>
  <input type="text" name="address" id="address"
    class="rounded bg-white text-black p-2 outline-none focus:ring-4 focus:border-transparent focus:ring-blue-400">
  <button type="submit" class="bg-blue-500 w-1/2 mx-auto mt-10 py-5 rounded">Create</button>
  <?php if (!empty($info)) { ?>
  <p class="text-red-400 mt-4 text-glow-red"><?= $info ?></p>
  <?php } ?>
</form>
<?php $content = ob_get_clean() ?>

<?php require __DIR__ . '/../template.php' ?>