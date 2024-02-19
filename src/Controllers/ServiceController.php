<?php

namespace Src\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Src\Services\BrandService;
use Src\Services\CategoryService;
use Src\Services\UsersService;

class ServiceController extends Controller{

    public function loadCategories(ServerRequestInterface $request, ResponseInterface $response, array $args){

        $data = $request->getParsedBody();

        $categories = new CategoryService();

        $results = $categories->listAll($data);
        
        $response = ['status' => true,
                     'data' => $results];

        return json_encode($response);

    }

    public function loadBrand(ServerRequestInterface $request, ResponseInterface $response, array $args){
 
         $data = $request->getParsedBody();
 
         $brand = new BrandService();
 
         $results = $brand->listAll($data);
         
         $response = ['status' => true,
                      'data' => $results];
 
         return json_encode($response);
 
     }

    public function loadUnique(ServerRequestInterface $request, ResponseInterface $response, array $args){

        $categories = new CategoryService();

        $results = $categories->load($args['id']);
        
        $response = ['status' => true,
                     'data' => $results];

        return json_encode($response);

    }

}