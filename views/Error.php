<?php $title = 'Hotel list'; ?>

<?php ob_start(); ?>
<p>An error appeared: <?= $msgError ?></p>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . '/../template.php'; ?>