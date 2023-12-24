<?php

namespace Src\Controllers;

use Src\Services\Page;
use Src\Services\UsersService;

class LoginController extends Controller{

    public function __invoke(){
        
        $page = new Page([
            "header"=>false,
            "footer"=>false
        ]);

        $page->setTpl('login',[
            'alert' => self::getMessage()
        ]);

    }

    public function login(){

        $result = UsersService::login($_POST['email'],$_POST['password']);

        if(!$result){
            self::setMessage('Usuário inexistente ou senha inválida!','warning');
            Controller::redirect('/login');
        }

        Controller::redirect('/');

    }

    public function logout(){
            
        UsersService::logout();
        Controller::redirect('/login');

    }

}