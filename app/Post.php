<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    protected $fillable = ['title', 'content', 'category_id', 'status', 'image', 'featured','slug','sub_id','user_id'];
    protected $dates = ['deleted_at'];
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function images(){
    	return $this->hasMany('App\Images');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
