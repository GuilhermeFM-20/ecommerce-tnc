<?php 

use Src\Controllers\LoginController;
use Src\Controllers\CategoryController;
use Src\Services\Page;
//use Slim\Routing\RouteCollectorProxy;

$app->get('/login', LoginController::class);

$app->get('/',function(){
    $page = new Page();
    $page->setTpl('dashboard');
 });
  
// Categories Group
$app->map(['GET','POST'],'/categoria',CategoryController::class);
$app->get('/categoria/create',[CategoryController::class,'viewCreate']);
$app->post('/categoria/create',[CategoryController::class,'create']);
$app->get('/categoria/update/{id}',[CategoryController::class,'viewUpdate']);
$app->post('/categoria/update/{id}',[CategoryController::class,'update']);
$app->get('/categoria/delete/{id}',[CategoryController::class,'delete']);






