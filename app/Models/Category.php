<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

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
}