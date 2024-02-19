<?php

namespace Src\Models;

class Brand extends Model{

    private $id;
    private $name;
    private $icon;
    private $created;
    private $updated;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setIcon(string $icon){
        $this->icon = $icon;
    }

    public function getIcon(){
        return $this->icon;
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