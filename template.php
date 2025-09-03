<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="./output.css">
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
        <a href="/4205H6/MonBlog-sans-mvc/index.php" class="group inline-flex items-baseline gap-3">
          <svg class="w-6 h-6 text-indigo-400 group-hover:text-indigo-300" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10.707 1.293a1 1 0 00-1.414 0l-8 8 1.414 1.414L3 10.414V18a2 2 0 002 2h3a1 1 0 001-1v-4h2v4a1 1 0 001 1h3a2 2 0 002-2v-7.586l.293.293 1.414-1.414-8-8z" />
          </svg>
          <h1 class="text-2xl font-bold text-white tracking-tight">Hotel List</h1>
        </a>
        <!-- Search bar -->
        <form action="index.php" method="get" class="flex items-center gap-2">
          <input name="search" id="searching_bar" placeholder="Search hotel by id"
            class="bg-gray-800 border border-gray-600 rounded px-3 py-2 text-sm resize-none w-64 h-10 outline-0 focus:ring-2 focus:ring-cyan-500 transition-all ease-out duration-500 " />
        </form>
      </div>
      <p class="max-w-5xl mx-auto px-4 text-sm text-gray-400">Choose a hotel that you want to stay at.</p>
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
      </div>
    </footer>
  </div>
</body>

</html>