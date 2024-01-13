<?php

namespace Src\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Src\Services\CategoryService;

class ServiceController extends Controller{

    public function loadCategories(ServerRequestInterface $request, ResponseInterface $response, array $args){

        $data = $request->getParsedBody();

        $categories = new CategoryService();

        $results = $categories->listAll($data);
        
        $response = ['status' => true,
                     'data' => $results];

        echo json_encode($response);

    }

}