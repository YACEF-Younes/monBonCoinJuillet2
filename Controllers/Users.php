<?php
namespace Controllers;

class Users extends Controller{
    public static function connexion(){
        $errMsg = "";
        // Pour vérifier si le formulaire a été soumis nous pouvons utiliser la super globale $_SERVER (cette méthode ne fonctionne qu'avec un formulaire en POST)
        // var_dump($_SERVER);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // echo 'le formulaire est soumis';
            // Il faut toujours sécuriser les saisies utilisateurs
            // https://www.php.net/manual/fr/function.htmlspecialchars.php
            $login = htmlspecialchars(trim($_POST['login']));
            // On vérifi si le login est présent en BDD
            $user = \Models\Users::findByLogin($login);
            // var_dump($user);
            if (!$user) {
                $errMsg = "Le login et / ou le mot de passe est incorrect";
            }else{
                $pass = htmlspecialchars(trim($_POST['password']));
                if(password_verify($pass, $user['password'])){
                    // L'utilisateur est correcte
                    $_SESSION['message'] = "Salut, content de vous revoir";
                    $_SESSION['user'] = [
                        'role' => $user['role'],
                        'id' => $user['idUser'],
                        'firstName' => $user['firstName']
                    ];
                    // Quand l'utilisateur est connecté on le redirige ver la route de notre choix
                    header('Location: /');
                }else{
                    $errMsg = "Le login et / ou le mot de passe est incorrect";
                }

            }
        }

        self::render('users/connexion',[
            'title' => 'Vous pouvez vous connecter',
            'messageErreur' => $errMsg
        ]);
    }

    public static function deconnexion(){
        unset($_SESSION['user']);
        $_SESSION['message'] = "A bientôt";
        header('Location: /');
    }
}