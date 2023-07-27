<<<<<<< HEAD
<!-- <?php var_dump($_POST) ?> -->
<!-- <?php var_dump($categories) ?> -->


<?php if(isset($_SESSION['message'])) : ?>
<?php $message = $_SESSION['message'];
unset($_SESSION['message']);
?>
<div class="alert alert-dismissible alert-info">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong><?= $message ?></strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
</div>
<?php endif ?>

<div class="container border border-secondary p-5">
    <?php if(isset($categories)) : ?>
    <div class="container m-3 p-2">
=======
<!-- <?php var_dump($products) ?> -->


<div class="container border border-secondary p-5">
    <?php if(isset($categories)) : ?>
        <div class="container m-3 p-2">
>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
        <form action="" method="GET">
            <div class="form-group">
                <label for="cat" class="form-label mt-4">Catégorie</label>
                <select class="form-select" id="cat" name="idCat">
<<<<<<< HEAD
                    <option value="">Toutes les catégories</option>
                    <?php foreach($categories as $category) : ?>
=======
                    
                <option value="">Toutes les catégories</option>
                    <?php foreach ($categories as $category) : ?>
>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
                        <option value="<?= $category['idCategory'] ?>" <?= isset($_GET['idCat']) && $_GET['idCat'] == $category['idCategory'] ? "selected" : null ?>><?= $category['title'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="text-center m-2">
<<<<<<< HEAD
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
=======
                <button type="submit" class="btn btn-primary">
                    Valider
                </button>
            </div>

>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
        </form>
    </div>
    <?php endif ?>
    
    <div class="row justify-content-around">
        <?php foreach ($products as $product) : ?>
            <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                <div class="card-header">Catégorie : <?= $product['catTitle'] ?></div>
                <div class="card-body">
                    <h4 class="card-title"><?= $product['productTitle'] ?></h4>
                    <img src="image/<?= $product['image'] ?>" alt="<?= $product['productTitle'] ?>" class="img-fluid">
                    <p class="card-text"><?= $product['description'] ?></p>
                    <p><span class="text-black"> <?= $product['price'] ?> €</span></p>
                </div>
<<<<<<< HEAD
                <div class="card-footer text-center">
                    <a href="/detailProduct?id=<?= $product['idProduct'] ?>" class="btn btn-secondary">Détail</a>
=======
                <div class="card-footer">
                    <a href="/detailProduct?id=<?= $product['idProduct'] ?>" class="btn btn-secondary">Détails</a>
>>>>>>> 805954216430445a6a57de8e1b69b75291fd0d46
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>