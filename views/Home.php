<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <div>

    <div>
      <?php $title = 'Hotels list'; ?>

      <?php ob_start(); ?>
      <?php foreach ($hotels as $hotel): ?>
      <a href="<?= 'index.php?id=' . $hotel['id'] ?>" class="group block">
        <div class="relative my-7 rounded-xl border border-gray-700 bg-gray-800 p-6 shadow-lg
                transition-all duration-500 ease-out transform-gpu
                group-hover:-translate-y-1 group-hover:shadow-2xl">

          <span class="pointer-events-none absolute inset-0 rounded-xl ring-0 ring-inset
                   transition duration-500 group-hover:ring-2 group-hover:ring-violet-500/60"></span>

          <span class="pointer-events-none absolute -inset-2 -z-10 rounded-2xl
                   bg-gradient-to-r from-violet-600/0 via-fuchsia-500/15 to-cyan-500/0
                   blur-2xl opacity-0 transition-opacity duration-500
                   group-hover:opacity-100"></span>

          <span class="pointer-events-none absolute inset-0 overflow-hidden rounded-xl">
            <span class="absolute -left-1/3 top-0 h-full w-1/2 -skew-x-12 bg-white/10
                     translate-x-[-120%] group-hover:translate-x-[220%]
                     transition-transform duration-700 ease-out"></span>
          </span>

          <h1 class="text-3xl font-semibold"><?= $hotel['hotel_name'] ?></h1>
          <p class="text-gray-300"><?= $hotel['hotel_address'] ?></p>
        </div>
      </a>
      <?php endforeach; ?>

      <a href="index.php?new_hotel=true" <button class="group relative rounded-lg px-5 py-3 font-medium bg-white/0 text-white border border-white/30
               transition-all duration-300 transform-gpu
               hover:scale-110 hover:ring-1 ease-out">
        Add new hotel?
        </button>></a>

      <?php $content = ob_get_clean(); ?>

      <?php require __DIR__ . '/../template.php'; ?>
    </div>
  </div>

</body>

</html>