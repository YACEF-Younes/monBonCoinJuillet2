<div class="container">
    <a href="/ajoutProduct" class="btn btn-primary">Créer un produit</a>
</div>

<div class="container">
    <?php var_dump($products) ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Photo</th>
                <th scope="col">Date</th>
                <th scope="col">Titre</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ici je boucle sur $products pour créer une ligne par produit -->
            <?php foreach ($products as $key => $product) : ?>

                <tr>
                    <?php foreach ($product as $key => $info) : ?>  <!-- Ici je boucle pour créer les cellules avec les clé du tableau -->
                        <?php if ($key != 'idCategory' && $key != 'idUser' && $key != 'idProduct' && $key != 'title') : ?> <!-- Ici je conditionne pour enlever de la boucle les infos inutiles -->
                            <?php if ($key == 'image') : ?> <!-- Ici je conditionne que l'image est une image on peut pas faire un echo -->
                                <td><img src="/image/<?= $info ?>" alt="<?= $info ?>" width="50px"></td>
                            <?php else : ?>
                                <td><?= $info ?></td> <!-- Ici je fais un echo des infos -->
                            <?php endif ?>
                        <?php endif ?>

                    <?php endforeach ?>
                    <td>
                        <a href="/detailProduct?id=<?= $product['idProduct']?>" class="btn btn-info m-2">Détail</a> <!-- Ici il faut préciser de quel produit on veut le détail -->
                        <a href="/modifProduct?id=<?= $product['idProduct']?>" class="btn btn-warning m-2">Modifier</a>
                        <a href="/suppProduct?id=<?= $product['idProduct']?>" class="btn btn-danger m-2">Supprimer</a>
                    </td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
</div>