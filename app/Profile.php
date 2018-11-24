<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use softDeletes;
    protected $fillable = ['about','gender','avatar','facebook','twitter','user_id'];
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
