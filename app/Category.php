<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     //relation between categories and posts one 2 many

public function posts(){
    
    return $this->hasMany('App\Post');

}
}
