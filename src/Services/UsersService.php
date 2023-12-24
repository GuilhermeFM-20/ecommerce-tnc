<?php

namespace Src\Services;

use Src\Models\Users;
use Src\Controllers\Controller;


class UsersService extends Users{

    const SESSION = 'User';

    public static function getFromSession(){

        $user = new Users();

        if(isset( $_SESSION[UsersService::SESSION]) && (int)$_SESSION[UsersService::SESSION]['bibliotecario_id'] > 0){

            $user->setData($_SESSION[UsersService::SESSION]);

        }

        return $user;

    }

    public static function checkLogin($inadmin = true){

        if(!isset($_SESSION[UsersService::SESSION])||!$_SESSION[UsersService::SESSION]||!(int)$_SESSION[UsersService::SESSION]["id"] > 0){
            
            //Não está logado  
            return true;

        }else{
            
            //Verifica se o usuário é um Administrador ou um Visitante da página
            if($inadmin === true && (bool)$_SESSION[UsersService::SESSION]['id'] === true){
                return false;
                }else if($inadmin === false){
                    return true;
                    }else{
                        return false;   
                        }

        }

    }

    public static function login($email, $password){

        $user = new Users();

        $results = $user->select("SELECT id,name,email,password FROM users WHERE email = :email", array(
            ":email"=>$email
        ));

        if(!$results){
            return false;
        }

        $data = $results[0];

        if ( md5($password) === $data["password"] ){

            $user->setData($data);

            $_SESSION[UsersService::SESSION] = array(
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail(),
            );

            return true;

        }

        return false;

    }

    public static function  verifyLogin($inadmin = true){

        if(self::checkLogin($inadmin)){
            Controller::redirect('/login');
        }

    }

    public static function logout(){

        $_SESSION[UsersService::SESSION] = NULL;

    }

}
    

