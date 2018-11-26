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
        $post = Post::where('slug',$id)->first();
        $cat = $post->category->where('id',$post->category->type)->first();
        $next_post = Post::where('id','>',$post->id)->min('id');
        $prev_post = Post::where('id','<',$post->id)->max('id');
        $tags = Tag::all();
        return view('site.single')->with(['post'=>$post,'cat'=>$cat,'tags'=>$tags,'next_post'=>Post::find($next_post),'prev_post'=>Post::find($prev_post)]);
    }
    public function singleTag($id){
        $tag = Tag::findOrFail($id);
        return view('site.tag')->with('tag',$tag);
    }
    public function search(){
        $results = Post::where('title','like','%'.request('query').'%')->where('status',1)->get();
        return view('site.results')->with('results',$results);
    }
}
