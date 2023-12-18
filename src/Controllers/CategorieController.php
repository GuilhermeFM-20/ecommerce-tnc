<?php

namespace Src\Controllers;

use Src\Services\Page;
use Src\Services\CategoriesService;

class CategorieController{

    public function __invoke(){
        
        $page = new Page();

        $categorie = new CategoriesService();

        $results = $categorie->listAll();

        $page->setTpl('categorie_search',['categories' => $results]);

    }

    public function viewCreate(){

        $page = new Page();
    
        $page->setTpl('categorie_create');

    }

    public function create(){

        print_r($_POST);exit;

        $page = new Page();
    
        $page->redirect('/categoria');

    }



}