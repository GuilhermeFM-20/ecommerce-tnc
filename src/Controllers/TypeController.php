<?php 

namespace Src\Controllers;

use Src\Services\Page;

class TypeController {
    
    public function __invoke(){
        $page = new Page();
        $page->setTpl('tipo_view_search');
    }

}