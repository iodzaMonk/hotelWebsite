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
      <?php if (!empty($deleted) || !empty($created)) {

        $type = !empty($deleted) ? 'deleted' : 'created';

        $modal = [
          'deleted' => [
            'title' => 'Deleted successfully',
            'desc' => 'The hotel and its rooms are gone.',
            'icon' => 'text-red-500',
            'accent' => 'border-red-500/40'
          ],
          'created' => [
            'title' => 'Created successfully',
            'desc' => 'Your hotel was added to the list.',
            'icon' => 'text-cyan-500',
            'accent' => 'border-cyan-500/40'
          ],
        ][$type];
        ?>
      <div id="popup" class="fixed inset-0 z-50 flex items-center justify-center">
        <button type="button" onclick="closeModal()" class="absolute inset-0 bg-black/60"></button>
        <div
          class="relative w-[min(90vw,560px)] rounded-2xl border border-white/30 bg-gray-800/70 text-white p-6 backdrop-blur shadow-2xl">
          <button type="button" onclick="closeModal()"
            class="absolute right-3 top-3 inline-flex h-9 w-9 items-center justify-center rounded-lg border border-white/30 hover:bg-white/10 transition cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>

          <div class="flex items-start gap-4">
            <div
              class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-white/10 border <?= $modal['accent'] ?>">
              <?php if ($type === 'deleted'): ?>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 <?= $modal['icon'] ?>" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
              <?php else: ?>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 <?= $modal['icon'] ?>" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
              </svg>
              <?php endif; ?>
            </div>
            <div class="space-y-1">
              <h2 class="text-2xl font-semibold tracking-tight"><?= $modal['title'] ?></h2>
              <p class="text-gray-300 text-sm"><?= $modal['desc'] ?></p>
            </div>
          </div>

        </div>
      </div>
      <?php } ?>


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

      <a href="index.php?new_hotel=true" class="group relative rounded-lg px-5 py-3 font-medium bg-white/0 text-white border border-white/30
          transition-all duration-300 transform-gpu scale-100 hover:scale-110 hover:ring-1 ease-out">
        Add new hotel?
      </a>

      <?php $content = ob_get_clean(); ?>

      <?php require __DIR__ . '/../template.php'; ?>
    </div>
  </div>

  <script>
  function closeModal() {
    const root = document.getElementById('popup');
    if (!root) return;
    root.style.opacity = '0';
    root.style.transition = 'opacity 200ms ease';
    setTimeout(() => root.remove(), 200);
  }
  </script>

</body>

</html>