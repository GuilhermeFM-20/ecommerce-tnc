<?php

namespace Src\Services;

use Src\Models\Categories;

class CategoriesService extends Categories{

    public static function listAll(){

        $sql = new Categories();

        return $sql->select("SELECT * FROM categories WHERE status IS NULL ORDER BY NAME");

    }

    // public function save(){
    

    //     $sql = new Sql();
        
    //     $num = $this->verifyMatricula($this->getmatricula());

    //     if($num > 0){
    //         return false;
    //     }

    //     try{
    //         $results = $sql->query("INSERT INTO leitor VALUES(DEFAULT,:nome,:matricula,:email,:sexo,:status_leitor,:turma,:telefone) ", array(
    //             ":nome"=>$this->getnome(),
    //             ":matricula"=>$this->getmatricula(),
    //             ":email"=>$this->getemail(),
    //             ":sexo"=>$this->getsexo(),
    //             ":status_leitor"=>'1',
    //             ":turma"=>$this->getturma(),
    //             ":telefone"=>$this->gettelefone()
    //         ));
    //         return true;
    //     }catch(\Exception $e){

    //         return false;
            
    //     }
        
    //     //$this->setData($results[0]);

    // }

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