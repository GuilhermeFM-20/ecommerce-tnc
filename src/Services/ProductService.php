<?php

namespace Src\Services;

use Src\Models\Product;

class ProductService extends Product{

    public static function listAll($data){
        
        if($data['value'] != ''){
            $filter = " AND name LIKE '%$data[value]%' ";
        }

        if($data['limit'] != ''){
            $filter2 = " LIMIT $data[limit]";
        }

        $product = new Product();

        return $product->select("SELECT * FROM products WHERE status IS NULL $filter ORDER BY id DESC  $filter2");

    }

    public static function load($id){

        $product = new Product();

        return $product->select("SELECT * FROM products WHERE status IS NULL AND id = $id");

    }

    public function save(){

        $product = new Product();

        $date = new \DateTime();

        if (!$this->getName()) {
            return false;
        }
        
        $result = $product->query("INSERT INTO products VALUES(DEFAULT,:code,:name_prod,:price,:amount,:image_prod,:description_prod,:category,:brand,:width,:height,:weight_prod,:color,:created,:updated,NULL) ", array(
            ':code' => $this->getCode(),
            ':name_prod' => $this->getName(),
            ':price' => $this->getPrice(),
            ':amount' => $this->getAmount(),
            ':image_prod' => $this->getImage(),
            ':description_prod' => $this->getDescription(),
            ':category' => $this->getCategory(),
            ':brand' => $this->getBrand(),
            ':width' => $this->getWidth(),
            ':height' => $this->getHeight(),
            ':weight_prod' => $this->getWeight(),
            ':color' => $this->getColor(),
            ":created" => $date->format('Y-m-d H:i'),
            ":updated" => $date->format('Y-m-d H:i'),
        ));

        return $result;
        
    }

    public function update($id){

        $product = new Product();

        $result = $product->query("UPDATE products SET 
                code = :code,
                name = :name_prod,
                price = :price,
                amount = :amount,
                image = :image_prod,
                description = :description_prod,
                category_fk = :category,
                brand_fk = :brand,
                width = :width,
                height = :height,
                weight = :weight_prod,
                color = :color,
                updated_at = :updated WHERE id = :id", array(
                ':code' => $this->getCode(),
                ':name_prod' => $this->getName(),
                ':price' => $this->valueFormat($this->getPrice()),
                ':amount' => $this->valueFormat($this->getAmount()),
                ':image_prod' => $this->getImage(),
                ':description_prod' => $this->getDescription(),
                ':category' => (int)$this->getCategory(),
                ':brand' => $this->getBrand(),
                ':width' => $this->valueFormat($this->getWidth()),
                ':height' => $this->valueFormat($this->getHeight()),
                ':weight_prod' => $this->valueFormat($this->getWeight()),
                ':color' => $this->getColor(),
                ":updated" => $this->dateFormat('now',2),
                ":id" => $id
            ));
          
        return $result;

    }

    public function delete($id){

        $product = new Product();

        
        $result = $product->query(" UPDATE products SET status = NOW() WHERE id = :id", [
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

        if($this->getCategory()){
            $filter .= " AND category_fk = ".$this->getCategory();
        }

        $start = ($page - 1) * $itemsForPages;

        $product = new Product();


        $results = $product->select(" SELECT * FROM products WHERE status IS NULL $filter ORDER BY id DESC LIMIT $start, $itemsForPages ");

        $resultsTotal = $product->select(" SELECT COUNT(*) AS total FROM products WHERE status IS NULL $filter ");

        return [
            "data" => $results,
            "total" => (int)$resultsTotal[0]['total'],
            "pages" => ceil($resultsTotal[0]['total'] / $itemsForPages) + 1,
        ];

    }
    
}
