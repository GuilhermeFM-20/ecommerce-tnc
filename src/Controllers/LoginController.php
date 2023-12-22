<?php

namespace Src\Controllers;

use Src\Services\Page;

class LoginController extends Controller{

    public function __invoke(){
        
        $page = new Page('',[
            "header"=>false,
            "footer"=>false
        ]);

        $page->setTpl('login');

    }

}