<?php 

use Src\Controllers\LoginController;
use Src\Controllers\TypeController;
use Src\Services\Page;
//use Slim\Routing\RouteCollectorProxy;

$app->get('/login', function(){
    $page = new Page('',[
        "header"=>false,
        "footer"=>false
    ]);

    $page->setTpl('sign-in');
});

  
$app->get('/tipo',TypeController::class);


$app->get('/',function(){
   $page = new Page();
   $page->setTpl('dashboard');
});

$app->get('/teste',function(){
    echo "Olá, mundo! Teste";
});


