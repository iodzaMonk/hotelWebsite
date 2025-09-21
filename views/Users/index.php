<?php $this->title = "Hotel Web Site Login" ?>

<form class="flex flex-col border border-white/30 bg-gray-800 rounded-2xl justify-center items-center p-10 mb-10"
  action="<?= Configuration::get('rootWeb','/') ?>Users/connect" method="post">
  <input
    class="border w-full p-5 m-5 bg-gray-700 text-white outline-0 rounded ring-0 hover:ring-2 transition-all duration-500 ease-in-out"
    name="login" type="text" placeholder="Username: 'John Doe'" required autofocus>
  <input
    class="rounded border w-full p-5 m-5 bg-gray-700 text-white outline-0 ring-0 hover:ring-2 transition-all duration-500 ease-in-out "
    name="password" type="password" placeholder="••••••••••" required>
  <button
    class=" ease-in-out bg-blue-700/60 p-5 my-5 border rounded-sm w-1/2 mx-auto hover:scale-110 hover:ring-2 transform-all duration-500 cursor-pointer hover:text-2xl"
    type="submit">Login</button>

  <?= ($error == 'password') ? '<span class="text-red-500 text-2xl">Login or password is incorrect</span>' : '' ?>
</form>
