<?php

namespace Src\Controllers;

use Src\Models\Category;
use Src\Models\Product;
use Src\Services\Page;
use Src\Services\CategoryService;
use Src\Services\ProductService;
use Src\Services\UsersService;

class ProductController extends Controller{
    
    public function __invoke(){

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
        $category = new CategoryService();

        $page = new Page();

        $values = $product->load($args['id']);

        $values_category = $category->load($values[0]['category_fk']);
    
        $page->setTpl('product',[
            'alert' => self::getMessage(),
            'product' => $values[0],
            'category' => $values_category[0],
            'link' => "/produto/update/$args[id]",
        ]);

    }

    public function update($request, $response, array $args){

        UsersService::verifyLogin();

        $product = new ProductService();

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

        $product = new ProductService();

        $result = $product->delete($args['id']);

        if(!$result){
            self::setMessage('Não foi possível excluir o registro!','warning');
            Controller::redirect('/produto');
        }

        self::setMessage('Registro excluído com sucesso.','success');
        Controller::redirect('/produto');

    }



}