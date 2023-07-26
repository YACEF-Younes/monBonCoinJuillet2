<?php

namespace App;

use Controllers\Controller;


class Routeur
{
    private $routes = [
        '/' => ['controller' => 'Products', 'action' => 'accueil'],
        '/products' => ['controller' => 'Products', 'action' => 'AffichageProducts'],
        '/detailProduct' => ['controller' => 'Products', 'action' => 'detailProduct'],
        '/inscription' => ['controller' => 'Users', 'action' => 'inscription'],
        '/connexion' => ['controller' => 'Users', 'action' => 'connexion'],
        '/deconnexion' => ['controller' => 'Users', 'action' => 'deconnexion'],
        '/ajoutProduct' => ['controller' => 'Products', 'action' => 'ajoutProduct'],
        '/modifProduct' => ['controller' => 'Products', 'action' => 'modifProduct'],
        '/suppProduct' => ['controller' => 'Products', 'action' => 'suppProduct'],
        '/panier' => ['controller' => 'Panier', 'action' => 'gestionPanier']
    ];

    // je créer une méthode app qui est le méthode centrale de mon site le fichier index.php ne fera qu'une seule chose: exécuter cette méthode
    public function app()
    {
        // echo "le routeur fonctionne";
        // On doit récupérer l'url
        $request = $_SERVER['REQUEST_URI'];
        // echo $request;
        // Je ne veux pas récupérer les paramètres dans mes routes
        // donc je casse la chaine de caractère en prenant "?" comme séparateur
        $request = explode("?", $request);
        // var_dump($request);
        $request = $request[0];
        // echo $request;

        // On vérifi si la route ($request) est bien présente dans le tableau de routes
        if (array_key_exists($request, $this->routes)) {
            $controller = "Controllers\\" . $this->routes[$request]['controller'];
            // echo $controller;
            $action = $this->routes[$request]['action'];
            $controller::$action();
        }else{
            echo "la page que vous demandez n'existe pas";
        }
     
    }
}
