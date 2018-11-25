<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        return view('admin.categories.index')->with('cats',$cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_cats = Category::where('type',0)->get();
        return view('admin.categories.create')->with('main_cats',$main_cats);
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
            'name'    => 'required|min:3'
        ]);
        $data = [
            'name'      => $request->name,
            'status'    => $request->status,
            'type'      => $request->type,
            'slug'      => str_slug($request->name)
        ];
        $cats = Category::create($data);
        Session::flash('success','Category Added Successfully');
        return redirect('/admin/categories');
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
        $main_cats = Category::where('type',0)->where('id','!=',$id)->get();
        $cat = Category::findOrFail($id);
        return view('admin.categories.edit')->with(['cat'=>$cat,'main_cats'=>$main_cats]);
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
            'name'    => 'required|min:3'
        ]);
        $data = [
            'name'      => $request->name,
            'type'      => $request->type,
            'status'    => $request->status,
            'slug'      => str_slug($request->name)
        ];
        $setting = Category::where('id',$id)->update($data);
        Session::flash('success','Category Updated Successfully');
        return redirect('/admin/categories/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        foreach ($cat->posts as $post){
            $post->delete();
        }
        $cat->delete();
        Session::flash('success','Category Deleted Successfully');
        return redirect('/admin/categories/');
    }
    public function catsTrash(){
        $cats = Category::onlyTrashed()->get();
        return view('admin.categories.trashed')->with('cats',$cats);
    }
    public function kill($id){
        $cat = Category::withTrashed()->where('id',$id)->first();
        foreach ($cat->posts as $post){
            $post->forceDelete();
        }
        $cat->forceDelete();
        Session::flash('success','Category Deleted Successfully');
        return redirect()->back();
    }
    public function restore($id){
        $cat = Category::withTrashed()->where('id',$id)->first();
        foreach ($cat->posts as $post){
            $post->restore();
        }
        $cat->restore();
        Session::flash('success','Category Had been restore Successfully');
        return redirect()->back();
    }
}
