<?php

namespace Src\Services;

use Src\Models\Category;

class CategoryService extends Category{

    public static function listAll(){

        $category = new Category();

        return $category->select("SELECT * FROM category WHERE status IS NULL ORDER BY id DESC");
    }

    public static function load($id){

        $category = new Category();

        return $category->select("SELECT * FROM category WHERE status IS NULL AND id = $id");

    }

    public function save(){

        $category = new Category();

        $date = new \DateTime();

        if (!$this->getName()) {
            return false;
        }

        try {

            $category->query("INSERT INTO category VALUES(DEFAULT,:nome,NULL,:created,:updated) ", array(
                ":nome" => $this->getName(),
                ":created" => $date->format('Y-m-d H:i'),
                ":updated" => $date->format('Y-m-d H:i'),
            ));

            return true;
        } catch (\Exception $e) {

            return false;
        }
    }

    public function update($id){

        $category = new Category();

        $date = new \DateTime();

        try {
            $category->query("UPDATE category SET name = :nome, updated_at = :updated WHERE id = :id", array(
                ":nome"=>$this->getName(),
                ":updated" => $date->format('Y-m-d H:i'),
                ":id"=>$id,
            ));
            return true;
        } catch (\Exception $e) {

            return false;
        }

    }

    public function delete($id){

        $category = new Category();

        try {

            $category->query(" UPDATE category SET status = NOW() WHERE id = :id", [
                ":id" => $id
            ]);

            return true;
        } catch (\Exception $e) {

            return false;
        }

    }

    public function getPages($page = 1, $itemsForPages = 5){

        $start = ($page - 1) * $itemsForPages;

        $category = new Category();

        $results = $category->select(" SELECT * FROM category WHERE status IS NULL ORDER BY id DESC LIMIT $start, $itemsForPages ");

        $resultsTotal = $category->select(" SELECT COUNT(*) AS total FROM category WHERE status IS NULL ");

        return [
            "data" => $results,
            "total" => (int)$resultsTotal[0]['total'],
            "pages" => ceil($resultsTotal[0]['total'] / $itemsForPages) + 1,
        ];

    }
}