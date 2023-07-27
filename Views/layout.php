<?php require_once('header.php') ?>


<h1 class="text-center m-5"><?= $title ?></h1>

<!-- Affichage des messages flashs -->
<?php if(isset($_SESSION['message'])) : ?>
<?php $message = $_SESSION['message'];
unset($_SESSION['message']);
?>
<div class="alert alert-dismissible alert-info w75 m-5">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong><?= $message ?></strong>
</div>
<?php endif ?>
<div class="container">
    <?= $content // Affichage dynamique des données  ?> 
</div>


<?php require_once('footer.php') ?>

