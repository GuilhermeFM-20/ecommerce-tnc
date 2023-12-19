<?php 

use Src\Controllers\LoginController;
use Src\Controllers\CategorieController;
use Src\Services\Page;
//use Slim\Routing\RouteCollectorProxy;

$app->get('/login', LoginController::class);

$app->get('/',function(){
    $page = new Page();
    $page->setTpl('dashboard');
 });
  
// Categories Group
$app->get('/categoria',CategorieController::class);
$app->get('/categoria/create',[CategorieController::class,'viewCreate']);
$app->post('/categoria/create',[CategorieController::class,'create']);
$app->get('/categoria/update',CategorieController::class);
$app->get('/categoria/delete',CategorieController::class);






