<?php $title = 'Hotels list'; ?>

<div>

  <div class="flex flex-col justify-center items-center">
    <?php if (!empty($error)) { ?>
      <p class="p-10 text-3xl"><?= $error ?></p>
    <?php } ?>

    <?php if (!empty($hotels)) { ?>
      <?php foreach ($hotels as $hotel): ?>
        <a href="<?= Configuration::get('rootWeb', '/') ?>Hotel/hotel/<?= $hotel['id'] ?>" class="group block w-full">
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
    <?php } else { ?>
      <p class="text-5xl border p-5">There are no hotels yet</p>
    <?php } ?>
  </div>
</div>