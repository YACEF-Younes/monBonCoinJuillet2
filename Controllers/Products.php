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

    // Méthode pour récupérer un produit par son id et l'envoyer à la vue détailproduct
    public static function detailProduct(){
        // Je crée une variable pour stocker les erreurs potentielles
        $err = "";
        if(isset($_GET['id'])){
            $idProduct = $_GET['id'];
            // echo $idProduct;
            $product = \Models\Products::findById($idProduct);
            $err = !$product ? "le produit n'existe pas" : null;
            // echo $err;
            // Après avoir récupéré le produit je récupère le user propriétaire du produit
            // pour pouvoir utiliser son adresse
            $idUser = $product['idUser'];
            $userProduct = \Models\Users::findById($idUser);

            // j'utilise le render
            self::render('products/detailProduct', [
                'title' => "détail du produit",
                'product' => $product,
                'user' => $userProduct,
                'erreur' => $err
            ]);
        }
    }
}