<?php 

use Src\Controllers\LoginController;
use Src\Controllers\CategoryController;
use Src\Controllers\BrandController;
use Src\Controllers\ProductController;
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

// Produtos Group
$app->group('/produto', function ($group){
    $group->map(['GET','POST'],'',ProductController::class);
    $group->get('/create',[ProductController::class,'viewCreate']);
    $group->post('/create',[ProductController::class,'create']);
    $group->get('/update/{id}',[ProductController::class,'viewUpdate']);
    $group->post('/update/{id}',[ProductController::class,'update']);
    $group->get('/delete/{id}',[ProductController::class,'delete']);
});

// Brands Group
$app->group('/marca', function ($group){
    $group->map(['GET','POST'],'',BrandController::class);
    $group->get('/create',[BrandController::class,'viewCreate']);
    $group->post('/create',[BrandController::class,'create']);
    $group->get('/update/{id}',[BrandController::class,'viewUpdate']);
    $group->post('/update/{id}',[BrandController::class,'update']);
    $group->get('/delete/{id}',[BrandController::class,'delete']);
});






