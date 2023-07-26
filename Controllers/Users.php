<?php
namespace Controllers;

class Users extends Controller{
    public static function connexion(){

        self::render('users/connexion',[
            'title' => 'Vous pouvez vous connecter'
        ]);
    }
}