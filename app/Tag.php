<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use softDeletes;
    protected $fillable=['tag'];
    protected $dates = ['deleted_at'];
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
