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

    public static function inscription(){
        $errMsg = "";
        // Regex du mot de passe (minimum 8 caractères)
        $pattern = '/^.{8}$/';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // On verifie que tt les champs soit remplit
            if(empty($_POST['login'])) {
                $errMsg .= "Merci de saisir votre email<br>";
            }
            if(empty($_POST['firstName'])) {
                $errMsg .= "Merci de saisir votre firstName<br>";
            }
            if(empty($_POST['lastName'])) {
                $errMsg .= "Merci de saisir votre lastName<br>";
            }
            if(empty($_POST['address'])) {
                $errMsg .= "Merci de saisir votre address<br>";
            }
            if(empty($_POST['cp'])) {
                $errMsg .= "Merci de saisir votre cp<br>";
            }
            if(empty($_POST['city'])) {
                $errMsg .= "Merci de saisir votre city<br>";
            }
            if(empty($_POST['password'])) {
                $errMsg .= "Merci de saisir votre password<br>";
            }
            if(empty($_POST['confirm'])) {
                $errMsg .= "Merci de saisir votre confirm<br>";
            }
            // on vérifie que les deux password correspondent
            if($_POST['password'] == $_POST['confirm']) {

            }else{
                $errMsg = 'Les deux mot de passe sont diffférents';
            }

        }

        self::render('users/inscription',[
            'title' => 'Merci de remplir le formulaire pour vous inscrire',
            'erreurMessage' => $errMsg
        ]);
    }        
}