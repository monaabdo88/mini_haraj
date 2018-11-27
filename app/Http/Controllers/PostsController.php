<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('type',0)->get();
        $tags = Tag::all();
        return view('admin.posts.create')->with(['cats'=>$cats,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $cat = Category::where('id',$request->category)->first();
        if($cat->type == 0){
            $sub_cat = 0;
            $cat_id = $request->category;
        }else{
            $sub = Category::where('id',$cat->type)->first();
            $cat_id = $sub->id;
            $sub_cat = $request->category;
        }
        $data = [
            'title'      => $request->name,
            'content'    => $request->desc,
            'status'     => $request->status,
            'category_id'=> $cat_id,
            'featured'   => $img_new,
            'slug'       => str_slug($request->name),
            'user_id'    => 1,
            'sub_id'     => $sub_cat,
        ];
        $post = Post::create($data);
        $post->tags()->attach($request->tags);
        Session::flash('success','Post Added Successfully');
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cats = Category::where('type',0)->get();
        $tags = Tag::all();
        return view('admin.posts.edit')->with(['post'=>$post,'cats'=>$cats,'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'      => 'required|min:3',
            'desc'      => 'required',
            'featured'  => 'image|mimes:jpg,png,jpeg,gif|max:1000'
        ]);
        $cat = Category::where('id',$request->category)->first();
        if($cat->type == 0){
            $sub_cat = 0;
            $cat_id = $request->category;
        }else{
            $sub = Category::where('id',$cat->type)->first();
            $cat_id = $sub->id;
            $sub_cat = $request->category;
        }
        $data = [
            'title'       => $request->name,
            'content'     => $request->desc,
            'category_id' => $cat_id,
            'status'      => $request->status,
            'slug'        => str_slug($request->name),
            'user_id'     => 1,
            'sub_id'      => $sub_cat
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
        return redirect('/admin/posts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('success','Post Deleted Successfully');
        return redirect('/admin/posts/');
    }
    public function postsTrash(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Deleted Successfully');
        return redirect()->back();
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Had been restore Successfully');
        return redirect()->back();
    }
}
