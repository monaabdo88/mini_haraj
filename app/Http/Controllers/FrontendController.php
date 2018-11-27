<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function create_post(){
        $cats = Category::all();
        $tags = Tag::all();
        return view('site.posts.create')->with(['cats'=>$cats,'tags'=>$tags]);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'     => 'required|min:3',
            'desc'     => 'required',
            'featured' => 'required|image|mimes:jpg,png,jpeg,gif|max:1000',
        ]);
        if($request->hasFile('featured')) {
            $image = $request->featured;
            $img_new = time() . '_' . $image->getClientOriginalName();
            $image->move('uploads', $img_new);
        }
        $data = [
            'title'      => $request->name,
            'content'    => $request->desc,
            'status'     => $request->status,
            'category_id'=> $request->type,
            'featured'   => $img_new,
            'slug'       => str_slug($request->name),
            'user_id'    => $request->user_id
        ];
        $post = Post::create($data);
        $post->tags()->attach($request->tags);
        Session::flash('success','Post Added Successfully');
        return redirect()->back();
    }
    public function UserPosts($id){
        $posts = Post::where('user_id',$id)->get();
        return view('site.posts.index')->with('posts',$posts);
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id != Auth::user()->id) {
            Session::flash('error_msg','you do not have permission to log to this page');
            return redirect('/');
        }
        $cats = Category::all();
        $tags = Tag::all();
        return view('site.posts.edit')->with(['post'=>$post,'cats'=>$cats,'tags'=>$tags]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'      => 'required|min:3',
            'desc'      => 'required',
            'featured'  => 'image|mimes:jpg,png,jpeg,gif|max:1000'
        ]);
        $data = [
            'title'       => $request->name,
            'content'     => $request->desc,
            'category_id' => $request->type,
            'status'      => $request->status,
            'slug'        => str_slug($request->name),
            'user_id'     => $request->user_id
        ];
        if($request->featured) {
            if ($request->hasFile('featured')) {
                $image = $request->featured;
                $img_new = time() . '_' . $image->getClientOriginalName();
                $image->move('uploads', $img_new);
            }
            $data['featured'] = $img_new;
        }
        Post::where('id',$id)->update($data);
        $post = Post::findOrFail($id);
        $post->tags()->sync($request->tags);
        Session::flash('success','Post Updated Successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->id != Auth::user()->id) {
            Session::flash('error_msg','you do not have permission to log to this page');
            return redirect('/');
        }
        $post->delete();
        Session::flash('success','Post Deleted Successfully');
        return redirect()->back();
    }
}
