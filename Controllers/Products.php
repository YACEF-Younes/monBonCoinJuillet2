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
}