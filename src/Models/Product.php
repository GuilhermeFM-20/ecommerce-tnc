<?php

namespace Src\Models;

class Product extends Model{

    private $id;
    private $name;
    private $code;
    private $price;
    private $amount;
    private $image;
    private $description;
    private $category_fk;
    private $brand_fk;
    private $width;
    private $height;
    private $weight;
    private $color;
    private $created;
    private $updated;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getCode(){
        return $this->code;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getCategory(){
        return $this->category_fk;
    }

    public function setCategory($category_fk){
        $this->category_fk = $category_fk;
    }

    public function getBrand(){
        return $this->brand_fk;
    }

    public function setBrand($brand_fk){
        $this->brand_fk = $brand_fk;
    }

    public function getWidth(){
        return $this->width;
    }

    public function setWidth($width){
        $this->width = $width;
    }
    
    public function getHeight(){
        return $this->height;
    }

    public function setHeight($height){
        $this->height = $height;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function setWeight($weight){
        $this->weight = $weight;
    }

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getCreated(){
        return $this->created;
    }

    public function setCreated($created){
        $this->created = $created;
    }

    public function getUpdated(){
        return $this->updated;
    }

    public function setUpdated($updated){
        $this->updated = $updated;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}


