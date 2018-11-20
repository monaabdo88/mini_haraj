<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    protected $fillable = ['title', 'content', 'category_id', 'status', 'image', 'featured','slug'];
    public function category(){
    	return $this->belongsTo('Horsefly\Category');
    }
    public function images(){
    	return $this->hasMany('Horsefly\Images');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
