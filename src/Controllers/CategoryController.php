<?php

namespace Src\Controllers;

use Src\Services\Page;
use Src\Services\CategoryService;
use Slim\Http\Request;

class CategoryController extends Controller{

    public function __invoke(){
        
        

        $pages = isset($_GET['page']) ? $_GET['page'] : 1;

        $category = new CategoryService();

        $category->setData($_POST);

        $pagination2 = $category->getPages($pages,6);

        $pagination = $this->verifyPages($pagination2);

        $page = new Page();

        $page->setTpl('category_search',[
            'category'=>$pagination2['data'],
            'pages'=>$pagination,
            'alert' => self::getMessage(),
            'filter' => $_POST,
        ]);

    }

    public function viewCreate(){

        $page = new Page();
    
        $page->setTpl('category',[
            'alert' => self::getMessage(),
            'link' => '/categoria/create',
        ]);

    }

    public function viewUpdate($request, $response, array $args){
        
        $category = new CategoryService();
        $page = new Page();

        $values = $category->load($args['id']);
    
        $page->setTpl('category',[
            'alert' => self::getMessage(),
            'category' => $values[0],
            'link' => "/categoria/update/$args[id]",
        ]);

    }

    public function update($request, $response, array $args){

        $category = new CategoryService();
        $page = new Page();

        $category->setData($_POST);

        $result = $category->update($args['id']);

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            $page->redirect('/categoria/create');
        }

        self::setMessage('Registro atualizado com sucesso.','success');

        $page->redirect('/categoria');

    }

    public function create(){

        $category = new CategoryService();
        $page = new Page();

        $category->setData($_POST);

        $result = $category->save();

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            $page->redirect('/categoria/create');
        }

        self::setMessage('Registro cadastrado com sucesso.','success');

        $page->redirect('/categoria');

    }

    public function delete($request, $response, array $args){

        $category = new CategoryService();
        $page = new Page();

        $result = $category->delete($args['id']);

        if(!$result){
            self::setMessage('Não foi possível excluir o registro!','warning');
            $page->redirect('/categoria/create');
        }

        self::setMessage('Registro excluído com sucesso.','success');

        $page->redirect('/categoria');

    }



}