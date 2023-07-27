<?php

namespace Controllers;

class Controller
{
    // Méthode render() qui permet d'envoyer les données à la bonne vue
    public static function render($views, $data = [])
    {
        // on utilise extract() pour créer autant de variables que de clé présentes dans le tableau data
        extract($data);

        // On commence à mettre en mémoire tampon
        ob_start();

        // on appelle la bonne vue
        require_once('../Views/' . $views . '.php');

        $content = ob_get_clean(); // la méthode ob_get_clean envoie tout ce qui est en memoire dans la varible et vide la mémoire

        require_once('../Views/layout.php');
    }

    // Méthode de sécurisation des champs de formulaire
    public static function security()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($_POST as $key => $value) {
                $_POST[$key] = htmlspecialchars(trim($value));
            }
        }
    }
}
