<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function category(){
    	return $this->belongsTo('Horsefly\Category');
    }
    public function posts(){
    	return $this->belongsTo('Horsefly\Post');
    }
}
