<?php

namespace Src\Models;

class Categories extends Model{

    private $id;
    private $name;
    private $status;
    private $created;
    private $updated;

    public function getId(){
        return $this->id;
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