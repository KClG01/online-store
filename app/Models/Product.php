<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'stock',
        'status',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // $this->attributes['id'];
    // $this->attributes['name'];
    // $this->attributes['description'];
    // $this->attributes['image'];
    // $this->attributes['price'];
    // $this->attributes['created_at'];
    // $this->attributes['updated_at'];

    public function getId(){
        return $this->attributes['id'];
    }
    public function setId($id){
        $this->attributes['id'] = $id;
    }
    public function getName(){
        return $this->attributes['name'];
    }
    public function setName($name){
        $this->attributes['name'] = $name;
    }
    public function getDescription(){
        return $this->attributes['description'];
    }
    public function setDescription($description){
        $this->attributes['description'] = $description;
    }
    public function getImage(){
        return $this->attributes['image'];
    }
    public function setImage($image){
        $this->attributes['image'] = $image;
    }
    public function getPrice(){
        return $this->attributes['price'];
    }
    public function setPrice($price){
        $this->attributes['price'] = $price;
    }
    public function getStock(){
        return $this->attributes['stock'];
    }
    public function setStock($stock){
        $this->attributes['stock'] = $stock;
    }
    // public function getStatus(){
    //     return $this->attributes['status'];
    // }
    // public function setStatus($status){
    //     $this->attributes['status'] = $status;
    // }
    public function getCreatedAt(){
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt){
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt(){
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt){
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function getCategoryId(){
        return $this->attributes['category_id'];
    }
    public function setCategoryId($categoryId){
        $this->attributes['category_id'] = $categoryId;
    }
    // public function getCategoryName(){
    //     return $this->attributes['category_name'];
    // }
    // public function setCategoryName($categoryName){
    //     $this->attributes['category_name'] = $categoryName;
    // }
    
}