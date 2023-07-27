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
}



    

