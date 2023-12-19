<?php

namespace Src\Services;

use Src\Models\Categories;

class CategoriesService extends Categories{

    public static function listAll(){

        $categorie = new Categories();

        return $categorie->select("SELECT * FROM categories WHERE status IS NULL ORDER BY NAME");

    }

    public function save(){
    
        $categorie = new Categories();

        $date = new \DateTime();

        if(!$this->getName()){
            return false;
        }

        try{

            $categorie->query("INSERT INTO categories VALUES(DEFAULT,:nome,:created,:updated) ", array(
                ":nome" =>$this->getName(),
                ":created" => $date->format('Y-m-d H:i'),
                ":updated" => $date->format('Y-m-d H:i'),
            ));

            return true;

        }catch(\Exception $e){

            return false;
            
        }
        


    }

    // public function update($id_leitor){
    

    //     $sql = new Sql();
        
    //     $results = $sql->query("UPDATE leitor  SET nome_leitor = :nome, matricula_leitor = :matricula, email_leitor = :email
    //     , sexo = :sexo, turma = :turma, telefone_leitor = :telefone WHERE leitor_id = :id", array(
    //         ":nome"=>$this->getnome(),
    //         ":matricula"=>$this->getmatricula(),
    //         ":email"=>$this->getemail(),
    //         ":sexo"=>$this->getsexo(),
    //         ":turma"=>$this->getturma(),
    //         ":telefone"=>$this->gettelefone(),
    //         ":id"=>$id_leitor
    //     ));
        
    //     //$this->setData($results[0]);

    // }

    // public function delete($id_leitor){

    //     $sql = new Sql();

    //     $sql->query(" UPDATE leitor SET status_leitor = 0 WHERE leitor_id = :id",[
    //         ":id"=>$id_leitor
    //     ]);

    // }


}