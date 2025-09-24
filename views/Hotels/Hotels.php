<?php
$title = 'Hotels list';
$searchQuery = isset($searchValue) ? trim((string) $searchValue) : '';
$searchWasPerformed = !empty($searchPerformed);
$hasHotels = !empty($hotels);
?>

<div>

  <div class="flex flex-col justify-center items-center gap-4">
    <?php if (!empty($error)) { ?>
      <p class="p-10 text-3xl"><?= $error ?></p>
    <?php } ?>

    <?php if ($searchWasPerformed) { ?>
      <p class="text-sm text-gray-400">
        <?php if ($hasHotels) { ?>
          Showing <?= count($hotels) ?> result(s) for "<?= htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8') ?>"
        <?php } else { ?>
          No hotels found for "<?= htmlspecialchars($searchQuery, ENT_QUOTES, 'UTF-8') ?>"
        <?php } ?>
      </p>
    <?php } ?>

    <?php if ($hasHotels) { ?>
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
    <?php } elseif ($searchWasPerformed) { ?>
      <p class="text-lg text-gray-300">Try a different search term to find a hotel.</p>
    <?php } else { ?>
      <p class="text-5xl border p-5">There are no hotels yet</p>
    <?php } ?>
  </div>
</div>