<?php
use App\Settings;
use App\Category;
use App\Post;
function get_settings(){
    return Settings::findOrFail(1);
}
function get_cats($num){
    return Category::where('type',0)->where('status',1)->take($num)->orderBy('id','DESC')->get();
}
function first_post(){
    return Post::where('status',1)->orderBy('id','desc')->first();
}
function get_subCat($id){
    return Category::where(['type'=>$id,'status'=>1])->take(5)->orderBy('id','DESC')->get();
}
function getSubCount($id){
    return count(Category::where(['type'=>$id,'status'=>1])->get());
}
function get_posts_index(){
    return Post::where('status',1)->orderBy('id','desc')->skip(1)->take(2)->get();
}
function getCount($model){
    return count($model::all());
}