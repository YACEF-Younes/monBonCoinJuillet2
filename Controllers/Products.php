<?php

namespace Controllers;


class Products extends Controller{
    public static function accueil(){
        // echo "vous êtes dans la méthode accueil";

        // On fait appelle à la méthode findAll du model Products pour récupérer les produits
        $products = \Models\Products::findAll("date DESC", 2);
        // On utlise la méthode render du controller principale pour afficher la bonne vue avec les bonnes infos
        self::render('products/accueil', [
            'title' => 'Les deux derniers produits',
            'products' => $products
        ]);
    }


    // Méthode pour récupérer un produit par son id et l'envoyer à la vue detailProduct
    public static function detailProduct()
    {
        // Je crée une variable pour stocker les erreurs potentielles
        $err = "";
        if (isset($_GET['id'])) {
            $idProduct = $_GET['id'];
            // echo $idProduct;
            $product = \Models\Products::findById($idProduct);
            $err = !$product ? "le produit demandé n'existe pas" : null;
            // echo $err;
            // Après avoir récupérer le produit je récupère le user propriétaire du produit
            // pour pouvoir utiliser son adresse 
            $idUser = $product['idUser'];
            $userProduct = \Models\Users::findById($idUser);

            //j'utilise le render
            self::render('products/detailProduct', [
                'title' => "détail du produit",
                'product' => $product,
                'user' => $userProduct,
                'erreur' => $err
            ]);
        }
        // else {
        //     echo "le produit demandé n'existe pas";
        // }
    }


    // Méthode qui gère la récupération et l'affichage de tous les produits
    public static function AffichageProducts()
    {
        // J'utilise render() pour envoyer ces produits à la bonne vue
        $categories = \Models\Categories::findAll();

        // Je récupère tous les produits avec ou sans filtre
        if(isset($_GET ['idCat']) && $_GET['idCat'] != ""){
            $idCat = $_GET['idCat'];
            $products = \Models\Products::findByCat($idCat);
        }else{
            $products = \Models\Products::findAll();
        }
        // J'utilise render() pour envoyer ces produits à la bonne vue
        self::render('products/accueil', [
            'title' => 'Tous les produits de Mon Bon Coin',
            'products' => $products,
            'categories' => $categories
        ]);
    }

    // Méthode pour ajouter un produit 
    public static function ajoutProduct(){
        $errMsg = "";
        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(empty($_POST['idCategory'])) {
                $errMsg .= "Merci de choisir une categorie<br>";
            }
            if(empty($_POST['title'])) {
                $errMsg .= "Merci de choisir un titre<br>";
            }
            if(empty($_POST['price'])) {
                $errMsg .= "Merci de choisir un prix<br>";
            }
            if(empty($_POST['description'])) {
                $errMsg .= "Merci de choisir une description<br>";
            }
            if(empty($_FILES['name'])) {
                $errMsg .= "Merci de choisir l'image de votre produit<br>";
            }
            // Les controles sur l'image
            if ($_FILES['image']['size'] < 3000000 && 
            ($_FILES['image']['type'] == 'image/jpeg' ||
            $_FILES['image']['type'] == 'image/jpg' ||
            $_FILES['image']['type'] == 'image/png' ||
            $_FILES['image']['type'] == 'image/webp')) {
                // On sécurise les saisies
                self::security();
                // On renommer l'image pour avoir un nom unique
                $photoName = uniqid() . $_FILES['image']['name'];
                echo $photoName;
                echo __DIR__;
                // on copie l'image sur le serveur
                copy($_FILES['image']['tmp_name'], "../public/image/" . $photoName);
                //  On peut maintenant enregistrer en BDD

            }else{
                $errMsg = "Votre image n'est pas au format demandé";
            }

            // Je crée un tableau qui contient les infos du produit
            $dataProduct = [
                $_POST['idCategorie'],
                $_SESSION['user']['id'],
                $_POST['title'],
                $_POST['description'],
                $_POST['price'], 
                $photoName
            ];



            // var_dump($dataUser);

            // On enregistre en BDD
            \Models\Products::create($dataProduct);
            $_SESSION['message']= "Votre compte est créé, vous pouvez vous connecter";
            header('Location: /');
        }else{
            $errMsg = 'Les deux mot de passe sont différents ou ne contiennent pas 8 caractères';
        }

        
        // Je récupère toute les catégories
        $categories = \Models\Categories::findAll();
        self::render('products/formProduct',[
            'title' => 'Formulaire de création d\'un produit',
            'categories' => $categories,
            'errMsg' => $errMsg
        ]);
    }
}



    

