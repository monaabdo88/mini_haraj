<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('site.index');
    }
    public function singleCat($id){
        $cat = Category::where('id',$id)->first();
        $subCat = Category::where('type',$id)->get();
        $tags = Tag::all();
        return view('site.cat')->with(['cat'=>$cat,'subCats'=>$subCat,'tags'=>$tags]);
    }
    public function singlePost($id){
        $post = Post::findOrFail($id);
        return view('site.single')->with('post',$post);
    }
}
