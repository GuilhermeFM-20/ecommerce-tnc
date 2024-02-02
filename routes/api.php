<?php 

use Src\Controllers\ServiceController;

$app->group('/api', function ($app){

    $app->post('/load/categories', [ServiceController::class,'loadCategories']);
    $app->get('/load/{id}', [ServiceController::class,'loadUnique']);

});







