<?php

use App\Routeur;
// ce fichier est le point d'entrée de notre site

// echo "point d'entrée";
// pour rester sur le fichier index.php quoi qu'il arrive, je doit faire une réecriture d'url
// Une des possibilités est d'utiliser un fichier de config du serveur apache qui s'appelle
// .htaccess
// Nous allons créer ce fichier dans le repertoire "public"
// Nous allons aussi créer un virtualHost

// on importe l'autoloader
require_once('../autoloader.php');

// On crée un routeur pour gérer les routes
// On appelle la méthode app()
define('ROOT', dirname(__DIR__));
// echo ROOT;

$routeur = new Routeur;
$routeur->app();

