<?php $rootWeb = $rootWeb ?: Configuration::get('rootWeb', '/'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?= $rootWeb ?>CSS/output.css">
  <title><?= $title ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    @layer utilities {
      .text-glow-red {
        text-shadow:
          0 0 5px rgba(239, 68, 68, 0.8),
          0 0 10px rgba(239, 68, 68, 0.6),
          0 0 20px rgba(239, 68, 68, 0.4);
      }
    }
  </style>
</head>

<body class="relative bg-gray-900 text-gray-200 antialiased">
  <div class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-gray-800/80 backdrop-filter backdrop-blur border-b border-gray-700">
      <div class="max-w-5xl mx-auto px-4 py-6 flex items-center justify-between">
        <!-- Logo + Title -->
        <div class="flex flex-col">
          <a href="<?= $rootWeb ?>" class="group inline-flex items-baseline gap-3">
            <svg viewBox="-1.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" stroke="currentColor"
              class="h-[25px] text-white my-auto">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <title>9gag [#152]</title>
                <desc>Created with Sketch.</desc>
                <defs> </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Dribbble-Light-Preview" transform="translate(-141.000000, -7519.000000)" fill="#FFFFFF">
                    <g id="icons" transform="translate(56.000000, 160.000000)">
                      <path
                        d="M90.0540541,7365.004 C91.202215,7365.695 92.3620818,7366.367 93.5131692,7367.053 C94.6720606,7366.371 95.8299765,7365.688 96.9917943,7365.008 C95.8299765,7364.331 94.6740116,7363.645 93.5131692,7362.966 C92.3591553,7363.643 91.2109944,7364.331 90.0540541,7365.004 M85.0292649,7364.001 C87.857233,7362.331 90.6852011,7360.664 93.5151202,7359 C96.3430883,7360.665 99.1749584,7362.325 101.999025,7363.996 C101.995123,7367.335 101.994147,7370.674 102,7374.014 C99.1769094,7375.688 96.3411373,7377.336 93.5131692,7379 C90.6773971,7377.322 87.8269926,7375.671 85,7373.979 C86.1276754,7373.32 87.2543754,7372.66 88.3849773,7372.006 C90.0940495,7373.016 91.8079991,7374.02 93.5131692,7375.037 C95.2154129,7374.012 96.9391175,7373.028 98.6345326,7371.993 C98.6199002,7370.657 98.6335571,7369.321 98.6267286,7367.985 C96.924485,7368.998 95.2183394,7370.008 93.5131692,7371.017 C90.6832501,7369.366 87.861135,7367.698 85.0302404,7366.045 C85.0302404,7365.363 85.0312159,7364.682 85.0292649,7364.001"
                        id="9gag-[#152]"> </path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
            <h1 class="text-2xl font-bold text-white tracking-tight">Hotel List</h1>
          </a>
          <p class="max-w-5xl mx-auto px-4 text-sm text-gray-400">Choose a hotel that you want to stay at.</p>
        </div>

        <?php
        $userName = 'Guest';
        if (isset($user)) {
          if (is_array($user) && isset($user['name']) && $user['name'] !== '') {
            $userName = $user['name'];
          } elseif (is_string($user) && $user !== '') {
            $userName = $user;
          }
        }
        ?>
        <h1>Welcome <?= $userName ?></h1>

        <div class="flex gap-5 items-center">
          <?php
          $isLoggedIn = isset($_SESSION['user']) && !empty($_SESSION['user']);
          $adminHref = $isLoggedIn
            ? $rootWeb . "Users/disconnect"
            : $rootWeb . "Users/index";
          $adminLabel = $isLoggedIn ? "Disconnect" : "Admin";
          ?>
          <a href="<?= $adminHref ?>"
            class="px-5 bg-blue-800 border py-2 border-white/20 rounded cursor-pointer hover:scale-110 hover:bg-blue-700 shadow-none shadow-blue-700 hover:shadow-xl/15 transition-all duration-500 ease-in-out"><?= $adminLabel ?></a>
          <form action="<?= $rootWeb ?>Hotel/search" method="get" class="flex items-center gap-2">
            <label for="searching_bar" class="sr-only">Search hotels</label>
            <input type="search" name="searchValue" id="searching_bar" placeholder="Search hotel by name"
              value="<?= htmlspecialchars($searchValue ?? '', ENT_QUOTES, 'UTF-8') ?>"
              class="bg-gray-800 border border-gray-600 rounded px-3 py-2 text-sm resize-none w-64 h-10 outline-0 focus:ring-2 focus:ring-cyan-500 transition-all ease-out duration-500" />
            <button type="submit"
              class="px-3 py-2 h-10 bg-cyan-700 hover:bg-cyan-600 text-sm rounded border border-cyan-500/40 transition duration-300">Search</button>
          </form>
        </div>
        <!-- Search bar -->
      </div>
    </header>


    <!-- Main -->
    <main class="flex-1">
      <div class="max-w-5xl mx-auto px-4 py-8">
        <div>
          <?= $content ?>
        </div>

      </div>


    </main>

    <!-- Footer -->
    <footer class="mt-auto border-t border-gray-800 bg-gray-900">
      <div class="max-w-5xl mx-auto px-4 py-6 text-center text-xs text-gray-500">
        Website made with <span class="text-gray-300">PHP</span>, <span class="text-gray-300">HTML5</span>, and <span
          class="text-indigo-300">Tailwind CSS</span>.
        <a class="py-2 px-5 border text-white border-white ml-5" href="<?= $rootWeb ?>about.php">About this website</a>
      </div>
    </footer>
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