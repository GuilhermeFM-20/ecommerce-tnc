<?php

namespace Src\Controllers;

use Src\Models\Categories;
use Src\Services\Page;
use Src\Services\CategoriesService;

class CategorieController{

    public function __invoke(){
        
        $page = new Page();

        $categorie = new CategoriesService();

        $results = $categorie->listAll();

        $page->setTpl('categorie_search',[
            'categories' => $results,
            'alert' => Categories::getMessage()
        ]);

    }

    public function viewCreate(){

        $page = new Page();
    
        $page->setTpl('categorie_create',[
            'alert' => Categories::getMessage()
        ]);

    }

    public function create(){

        $categorie = new CategoriesService();
        $page = new Page();

        $categorie->setData($_POST);

        $result = $categorie->save();

        if(!$result){

            $categorie->setMessage('Preencha todos os campos.','warning');
            $page->redirect('/categoria/create');

        }

        $categorie->setMessage('Registro cadastrado com sucesso.','success');

        $page->redirect('/categoria');

    }



}