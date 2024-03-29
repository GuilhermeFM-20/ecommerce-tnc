<?php

namespace Src\Services;

use Src\Models\Category;

class CategoryService extends Category{

    public static function listAll($data){
        
        if($data['value'] != ''){
            $filter = " AND name LIKE '%$data[value]%' ";
        }

        if($data['limit'] != ''){
            $filter2 = " LIMIT $data[limit]";
        }

        $category = new Category();

        return $category->select("SELECT * FROM categories WHERE status IS NULL $filter ORDER BY id DESC  $filter2");

    }

    public static function load($id){

        $category = new Category();

        return $category->select("SELECT * FROM categories WHERE status IS NULL AND id = $id");

    }

    public function save(){

        $category = new Category();

        if (!$this->getName()) {
            return false;
        }

        $result = $category->query("INSERT INTO categories VALUES(DEFAULT,:nome,NULL,:created,:updated) ", array(
                ":nome" => $this->getName(),
                ":created" => $this->dateFormat('now',2),
                ":updated" => $this->dateFormat('now',2),
            ));

         

        return $result;
        
    }

    public function update($id){

        $category = new Category();
        
        $result = $category->query("UPDATE categories SET name = :nome, updated_at = :updated WHERE id = :id", array(
                ":nome"=>$this->getName(),
                ":updated" => $this->dateFormat('now',2),
                ":id"=>$id,
            ));
            

        return $result;
        
    }

    public function delete($id){

        $category = new Category();

      

        $result = $category->query(" UPDATE categories SET status = NOW() WHERE id = :id", [
                ":id" => $id
            ]);

    

        return $result;

    }

    public function getPages($page = 1, $itemsForPages = 5,$filter = ''){

        if($this->getId()){
            $filter .= " AND id = ".$this->getId();
        }

        if($this->getName()){
            $filter .= " AND name LIKE '%".$this->getName()."%'";
        }

        $start = ($page - 1) * $itemsForPages;

        $category = new Category();

        $results = $category->select(" SELECT * FROM categories WHERE status IS NULL $filter ORDER BY id DESC LIMIT $start, $itemsForPages ");

        $resultsTotal = $category->select(" SELECT COUNT(*) AS total FROM categories WHERE status IS NULL $filter ");

        return [
            "data" => $results,
            "total" => (int)$resultsTotal[0]['total'],
            "pages" => ceil($resultsTotal[0]['total'] / $itemsForPages) + 1,
        ];

    }
    
}
