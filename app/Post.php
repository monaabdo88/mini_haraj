<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
    	return $this->belongsTo('Horsefly\Category');
    }
    public function images(){
    	return $this->hasMany('Horsefly\Images');
    }
}
