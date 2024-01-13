<?php

namespace Src\Controllers;

use Src\Services\Page;
use Src\Services\CategoryService;
use Src\Services\UsersService;

class CategoryController extends Controller{
    
    public function __invoke(){

        //print_r($_POST);exit;

        UsersService::verifyLogin();

        $pages = isset($_GET['page']) ? $_GET['page'] : 1;

        $category = new CategoryService();

        $category->setData($_POST);

        $pagination = $category->getPages($pages,8);

        $result = $this->verifyPages($pagination,$pages);

        $page = new Page();

        $page->setTpl('category_search',[
            'category'=>$pagination['data'],
            'pages'=>$result['pages'],
            'more'=>$result['more'],
            'alert' => self::getMessage(),
            'filter' => $_POST,
        ]);

    }

    public function viewCreate(){

        UsersService::verifyLogin();

        $page = new Page();
    
        $page->setTpl('category',[
            'alert' => self::getMessage(),
            'link' => '/categoria/create',
        ]);

    }

    public function viewUpdate($request, $response, array $args){

        UsersService::verifyLogin();
        
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

        UsersService::verifyLogin();

        $category = new CategoryService();

        $category->setData($_POST);

        $result = $category->update($args['id']);

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            Controller::redirect('/categoria/create');
        }

        self::setMessage('Registro atualizado com sucesso.','success');
        Controller::redirect('/categoria');

    }

    public function create(){
        
        UsersService::verifyLogin();

        $category = new CategoryService();

        $category->setData($_POST);

        $result = $category->save();

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            Controller::redirect('/categoria/create');
        }

        self::setMessage('Registro cadastrado com sucesso.','success');
        Controller::redirect('/categoria');

    }

    public function delete($request, $response, array $args){

        UsersService::verifyLogin();

        $category = new CategoryService();

        $result = $category->delete($args['id']);

        if(!$result){
            self::setMessage('Não foi possível excluir o registro!','warning');
            Controller::redirect('/categoria/create');
        }

        self::setMessage('Registro excluído com sucesso.','success');
        Controller::redirect('/categoria');

    }



}