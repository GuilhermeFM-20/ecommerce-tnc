<?php

namespace Src\Controllers;

use Src\Services\Page;
use Src\Services\BrandService;
use Src\Services\UsersService;

class BrandController extends Controller{
    
    public function __invoke(){

        UsersService::verifyLogin();

        $pages = isset($_GET['page']) ? $_GET['page'] : 1;

        $brand = new BrandService();

        $brand->setData($_POST);

        $pagination = $brand->getPages($pages,8);

        $result = $this->verifyPages($pagination,$pages);

        $page = new Page();

        $page->setTpl('brand_search',[
            'brand'=>$pagination['data'],
            'pages'=>$result['pages'],
            'more'=>$result['more'],
            'alert' => self::getMessage(),
            'filter' => $_POST,
        ]);

    }

    public function viewCreate(){

        UsersService::verifyLogin();

        $page = new Page();
    
        $page->setTpl('brand',[
            'alert' => self::getMessage(),
            'link' => '/marca/create',
        ]);

    }

    public function viewUpdate($request, $response, array $args){

        UsersService::verifyLogin();
        
        $brand = new BrandService();
        $page = new Page();

        $values = $brand->load($args['id']);
    
        $page->setTpl('brand',[
            'alert' => self::getMessage(),
            'brand' => $values[0],
            'link' => "/marca/update/$args[id]",
        ]);

    }

    public function update($request, $response, array $args){

        UsersService::verifyLogin();

        $brand = new BrandService();

        $brand->setData($_POST);

        $result = $brand->update($args['id']);

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            Controller::redirect('/marca/create');
        }

        self::setMessage('Registro atualizado com sucesso.','success');
        Controller::redirect('/marca');

    }

    public function create(){
        
        UsersService::verifyLogin();

        $brand = new BrandService();

        $brand->setData($_POST);

        $result = $brand->save();

        if(!$result){
            self::setMessage('Preencha todos os campos.','warning');
            Controller::redirect('/marca/create');
        }

        self::setMessage('Registro cadastrado com sucesso.','success');
        Controller::redirect('/marca');

    }

    public function delete($request, $response, array $args){

        UsersService::verifyLogin();

        $brand = new BrandService();

        $result = $brand->delete($args['id']);

        if(!$result){
            self::setMessage('Não foi possível excluir o registro!','warning');
            Controller::redirect('/marca/create');
        }

        self::setMessage('Registro excluído com sucesso.','success');
        Controller::redirect('/marca');

    }



}