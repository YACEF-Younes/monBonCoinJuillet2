<div class="container">
    <?php var_dump($_POST) ?>
    <?php var_dump($_FILES) ?>
<?php if ($errMsg) : ?>
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Attention !</h4>
            <p class="mb-0"><?= $errMsg; ?></p>
        </div>
    <?php endif ?>
</div>
<form method="POST" enctype="multipart/form-data">
    <select name="idCategorie" id="categorie" class="form-select">
        <option value="">Selectionner une Categorie :</option>
        <?php foreach ($categories as $categorie) : ?>
            <option value="<?= $categorie['idCategory'] ?>" <?= isset($product) && $categorie['idCategory'] == $product['idCategory'] ? 'selected' : null ?>><?= ucfirst($categorie['title']) ?></option>
        <?php endforeach ?>
    </select>
    <div class="my-3">
        <label for="title" class="form-label">Nom de l'annonce</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="titre" <?php echo isset($product) ? "value = " . $product['productTitle'] : null ?>>
    </div>
    <div class="my-3 form-group">
        <label for="price" class="form-label">Prix</label>
        <div class="input-group">
            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="Prix" <?php echo isset($product) ? "value = " . $product['price'] : null ?>>
            <span class="input-group-text">€</span>
        </div>
    </div>
    <div class="form-group my-3">
      <label for="description" class="form-label mt-4">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3"><?php echo isset($product) ? $product['description'] : null ?></textarea>
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Photo : </label>
        <?= isset($product) ? '<br>si vide nous conservons l\'ancienne image <img src="/image/' . $product['image'] . '" width="50px"><br>': null ?>
        <input type="file" name="image" id="image" class="form-control">
        <small class="form-text text-muted">(max 3Mo, format accépté : jpg, jpeg, png, webp)</small>
    </div>
    <button type="submit" class="btn btn-primary mt-3"><?= isset($product) ? "Modifier" : "Ajouter" ?></button>
</form>