<?php

if (isset($_GET['test'])) {
  if ($_GET['test'] == 'HoteModel') {
    require 'Tests/Modeles/testHotels.php';

  } else if ($_GET['test'] == 'RoomModel') {
    require 'Tests/Modeles/testRooms.php';



  } else if ($_GET['test'] == 'vueArticles') {
    require 'Tests/Vues/testVueArticles.php';

  } else if ($_GET['test'] == 'vueConfirmer') {
    require 'Tests/Vues/testVueConfirmer.php';

  } else if ($_GET['test'] == 'vueErreur') {
    require 'Tests/Vues/testVueErreur.php';
  } else {
    echo '<h3>Test inexistant!!!</h3>';
  }
}
?>
<h3>Models tests</h3>
<ul>
  <li>
    <a href="tests.php?test=HoteModel">Hotel</a>
  </li>
  <li>
    <a href="tests.php?test=RoomModel">room</a>
  </li>


</ul>
<h3>Views tests</h3>
<ul>
  <li>
    <a href="tests.php?test=vueArticles">Articles</a>
  </li>



</ul>