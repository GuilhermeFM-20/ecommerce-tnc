<?php

namespace Src\Services;

use Src\Models\Brand;

class BrandService extends Brand{

    public static function listAll($data){
        
        if($data['value'] != ''){
            $filter = " AND name LIKE '%$data[value]%' ";
        }

        if($data['limit'] != ''){
            $filter2 = " LIMIT $data[limit]";
        }

        $brand = new Brand();

        return $brand->select("SELECT * FROM brands WHERE status IS NULL $filter ORDER BY id DESC  $filter2");

    }

    public static function load($id){

        $brand = new Brand();

        return $brand->select("SELECT * FROM brands WHERE status IS NULL AND id = $id");

    }

    public function save(){

        $brand = new Brand();

        if (!$this->getName()) {
            return false;
        }

        $result = $brand->query("INSERT INTO brands VALUES(DEFAULT,:nome,:icon,NULL,:created,:updated) ", array(
                ":nome" => $this->getName(),
                ":icon" => $this->getIcon(),
                ":created" => $this->dateFormat('now',2),
                ":updated" => $this->dateFormat('now',2),
            ));

        return $result;
        
    }

    public function update($id){

        $brand = new Brand();
        
        $result = $brand->query("UPDATE brands SET name = :nome, icon = :icon, updated_at = :updated WHERE id = :id", array(
                ":nome"=>$this->getName(),
                ":icon" => $this->getIcon(),
                ":updated" => $this->dateFormat('now',2),
                ":id"=>$id,
            ));
            
        return $result;
        
    }

    public function delete($id){

        $brand = new Brand();

        $result = $brand->query(" UPDATE brands SET status = NOW() WHERE id = :id", [
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

        $brand = new Brand();

        $results = $brand->select(" SELECT * FROM brands WHERE status IS NULL $filter ORDER BY id DESC LIMIT $start, $itemsForPages ");

        $resultsTotal = $brand->select(" SELECT COUNT(*) AS total FROM brands WHERE status IS NULL $filter ");

        return [
            "data" => $results,
            "total" => (int)$resultsTotal[0]['total'],
            "pages" => ceil($resultsTotal[0]['total'] / $itemsForPages) + 1,
        ];

    }
    
}
