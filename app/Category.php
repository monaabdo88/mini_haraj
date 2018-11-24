<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;
    protected $fillable = ['name','desc','tags','status','image','type','slug'];
    protected $dates = ['deleted_at'];
    public function posts(){
    	return $this->hasMany('App\Post');
    }
    public function images(){
    	return $this->hasMany('App\Images');
    }
}
