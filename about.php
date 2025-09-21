<?php require "./Framework/Configuration.php" ?>
<?php $rootWeb = Configuration::get('rootWeb', '/'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?= $rootWeb ?>CSS/output.css">
  <title>Tests</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>



<?php ob_start() ?>
<?php $content = ob_get_clean() ?>
<?php require "./Views/Template.php" ?>

</html>