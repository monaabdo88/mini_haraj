<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','desc','tags','status','image','type'];
    public function posts(){
    	return $this->hasMany('Horsefly\Post');
    }
    public function images(){
    	return $this->hasMany('Horsefly\Images');
    }
}
