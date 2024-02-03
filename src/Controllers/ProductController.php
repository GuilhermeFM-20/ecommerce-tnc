<?php

namespace Src\Controllers;

use Src\Models\Product;
use Src\Services\Page;
use Src\Services\CategoryService;
use Src\Services\ProductService;
use Src\Services\UsersService;

class ProductController extends Controller{
    
    public function __invoke(){

        //print_r($_POST);exit;

        UsersService::verifyLogin();

        $pages = isset($_GET['page']) ? $_GET['page'] : 1;

        $product = new ProductService();

        $product->setData($_POST);

        $pagination = $product->getPages($pages,8);

        $result = $this->verifyPages($pagination,$pages);

        $page = new Page();

        $page->setTpl('product_search',[
            'product'=>$pagination['data'],
            'pages'=>$result['pages'],
            'more'=>$result['more'],
            'alert' => self::getMessage(),
            'filter' => $_POST,
        ]);

    }

    public function viewCreate(){

        UsersService::verifyLogin();

        $page = new Page();
    
        $page->setTpl('product',[
            'alert' => self::getMessage(),
            'link' => '/produto/create',
        ]);

    }

    public function viewUpdate($request, $response, array $args){

        UsersService::verifyLogin();
        
        $product = new ProductService();
        $page = new Page();

        $values = $product->load($args['id']);

       //print_r($values);exit;
    
        $page->setTpl('product',[
            'alert' => self::getMessage(),
            'product' => $values[0],
            'link' => "/produto/update/$args[id]",
        ]);

    }

    public function update($request, $response, array $args){

        UsersService::verifyLogin();

        $product = new ProductService();

        //print_r($_POST);exit;

        $product->setData($_POST);

        $result = $product->update($args['id']);

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            Controller::redirect('/produto/update/'.$args['id']);
        }

        self::setMessage('Registro atualizado com sucesso.','success');
        Controller::redirect('/produto');

    }

    public function create(){
        
        //print_r($_POST);exit;

        UsersService::verifyLogin();

        $product = new ProductService();

        $product->setData($_POST);

        $result = $product->save();

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            Controller::redirect('/produto/create');
        }

        self::setMessage('Registro cadastrado com sucesso.','success');
        Controller::redirect('/produto');

    }

    public function delete($request, $response, array $args){

        UsersService::verifyLogin();

        $product = new CategoryService();

        $result = $product->delete($args['id']);

        if(!$result){
            self::setMessage('Não foi possível excluir o registro!','warning');
            Controller::redirect('/produto');
        }

        self::setMessage('Registro excluído com sucesso.','success');
        Controller::redirect('/produto');

    }



}