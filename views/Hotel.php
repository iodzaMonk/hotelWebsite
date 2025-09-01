<?php $title = "Hotel - " . $hotel['hotel_name']; ?>

<?php ob_start(); ?>
<article>
  <header>
    <h1 class="text-5xl uppercase mb-5"><?= $hotel['hotel_name'] ?></h1>
  </header>
  <p><?= $hotel['hotel_address'] ?></p>
</article>
<hr>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/../template.php'; ?>