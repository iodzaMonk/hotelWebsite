<?php require "./Framework/Configuration.php"; ?>
<?php $rootWeb = Configuration::get('rootWeb', '/'); ?>
<?php $title = 'Testing Toolkit'; ?>

<?php ob_start(); ?>
<section class="max-w-4xl mx-auto px-6 py-12 space-y-12">
  <header class="space-y-4 border-b border-gray-800 pb-6">
    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-gray-500">Testing</p>
    <h1 class="text-3xl font-semibold text-white">Testing resources for the hotel project</h1>
    <a href="<?= $rootWeb ?>tests.php"
      class="inline-flex items-center gap-2 text-sm font-medium text-cyan-300 hover:text-cyan-200">
      <span>Open the test index</span>
      <span aria-hidden="true">&rarr;</span>
    </a>
  </header>

  <div class="grid gap-6 md:grid-cols-2">
    <article class="rounded-xl border border-gray-800 bg-gray-900/60 p-6">
      <h2 class="text-lg font-semibold text-white">Model checks</h2>
      <p class="mt-3 text-sm text-gray-300"> The hotels models tests have two tests. The first one gets the total number
        of hotels, while the second one allows you to get a specific hotel by its ID. To use the second function, the
        requirement will be to replace the number inside the getHotel_by_id(number) method with the ID of an existing
        hotel
      <p class="mt-3 text-sm text-gray-300">The rooms models tests have two tests. The first one gets the total number
        of ,ooms while the second one allows you to get a specific room by its ID. To use the second function, the
        requirement will be to replace the number inside the getRoom_by_id(number) method with the ID of an existing
        hotel</p>
      </p>
    </article>

    <article class="rounded-xl border border-gray-800 bg-gray-900/60 p-6">
      <h2 class="text-lg font-semibold text-white">View checks</h2>
      <p class="mt-3 text-sm text-gray-300">The testVueHotels.php will have an object list that contains hardcoded hotel
        objects inside. The test will take the objects inside the list and show them on the test web page. New hotel
        objects can be added inside the list.

      <p class="mt-3 text-sm text-gray-300">
        The testVueRooms.php will have an object list that contains hardcoded room
        objects inside. The test will take the objects inside the list and show them on the test web page. New room
        objects can be added inside the list.</p>
    </article>

    <article class="rounded-xl border border-gray-800 bg-gray-900/60 p-6">
      <h1 class="text-base font-semibold text-white">Relation between phases</h1>
      <p class="mt-3 text-sm text-gray-300">The two tables are related by ids, a hotel can have multiple rooms, a room
        can only have one hotel. The room
        table stores the hotel_id</p>
    </article>

    <article class="rounded-xl border border-gray-800 bg-gray-900/60 p-6">
      <h1 class="text-base font-semibold text-white">How to start a session</h1>
      <p class="mt-3 text-sm text-gray-300">To start a session, a user must enter the login page by clicking on the
        admin button. Then the user has to fill in the email and password fields.</p>
    </article>

    <article class="rounded-xl border border-gray-800 bg-gray-900/60 p-6">
      <h1 class="text-base font-semibold text-white">Accessible permissions when a user is logged in. </h1>
      <p class="mt-3 text-sm text-gray-300">When connected to a session, the user is able to create and delete hotels
        and rooms compared</p>
    </article>
  </div>

  <section class="space-y-3 rounded-xl border border-emerald-600 bg-emerald-900/60 p-6">
    <h3 class="text-base font-semibold text-white">Tip</h3>
    <p class="text-sm text-gray-300">
      When a user is logged in, he is allowed to create new hotels and add new rooms inside them.
    </p>
  </section>


</section>

<img class="rounded mx-auto" src="Public\Images\DiagrammeBaseDonner.png" alt="Database Diagram">
<?php $content = ob_get_clean(); ?>
<?php require "./Views/Template.php"; ?>