<?php 

use Src\Controllers\LoginController;
use Src\Controllers\CategoryController;
use Src\Services\Page;
use Src\Services\UsersService;

$app->get('/login', LoginController::class);
$app->post('/login', [LoginController::class,'login']);
$app->get('/logout', [LoginController::class,'logout']);

//AuthMiddleware::verifyLogin();

$app->get('/',function(){
    UsersService::verifyLogin();
    $page = new Page();
    $page->setTpl('dashboard');
});

// Categories Group
$app->group('/categoria', function ($group){
    $group->map(['GET','POST'],'',CategoryController::class);
    $group->get('/create',[CategoryController::class,'viewCreate']);
    $group->post('/create',[CategoryController::class,'create']);
    $group->get('/update/{id}',[CategoryController::class,'viewUpdate']);
    $group->post('/update/{id}',[CategoryController::class,'update']);
    $group->get('/delete/{id}',[CategoryController::class,'delete']);
});






