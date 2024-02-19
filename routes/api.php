<?php 

use Src\Controllers\ServiceController;

$app->group('/api', function ($app){

    $app->post('/load/categories', [ServiceController::class,'loadCategories']);
    $app->post('/load/brand', [ServiceController::class,'loadBrand']);
    $app->get('/load/{id}', [ServiceController::class,'loadUnique']);

});







