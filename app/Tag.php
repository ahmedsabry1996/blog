<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
    //
    
    use SoftDeletes;
    
    protected $fillable = ['tag'];
    
    protected $dates = ['deleted_at'];
    
    public function posts(){
        
       return $this->belongsToMany('App\Post');
    }
}
