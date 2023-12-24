<?php

namespace Src\Models;

class Users extends Model{

    private $id;
    private $name;
    private $email;
    private $password;
    private $created;
    private $updated;
    private $status;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setStatus(string $status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }


    public function setCreated(string $created){
        $this->created = $created;
    }

    public function getCreated(){
        return $this->created;
    }

    public function setUpdated(string $updated){
        $this->updated = $updated;
    }

    public function getUpdated(){
        return $this->updated;
    }


}