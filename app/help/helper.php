<?php
use App\Settings;
use App\Category;
function get_settings(){
    return Settings::findOrFail(1);
}
function get_cats(){
    return Category::where('type',0)->where('status',1)->take(5)->orderBy('id','DESC')->get();
}
