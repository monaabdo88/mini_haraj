<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag'=>'required|min:3'
        ]);
        Tag::create([
            'tag' => $request->tag
        ]);
        Session::flash('success','Tag Added Successfully');
        return redirect('/admin/tags');
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
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit')->with('tag',$tag);
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
            'tag' => 'required|min:3'
        ]);
        $data =  [
            'tag' => $request->tag
        ];
        Tag::where('id',$id)->update($data);
        Session::flash('success','Tag Updated Successfully');
        return redirect('/admin/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        Session::flash('success','Tag Deleted Successfully');
        return redirect('/admin/tags');
    }
    public function tagsTrash(){
        $tags = Tag::onlyTrashed()->get();
        return view('admin.tags.trashed')->with('tags',$tags);
    }
    public function kill($id){
        $tag = Tag::withTrashed()->where('id',$id)->first();
        $tag->forceDelete();
        Session::flash('success','Tag Deleted Successfully');
        return redirect()->back();
    }
    public function restore($id){
        $tag = Tag::withTrashed()->where('id',$id)->first();
        $tag->restore();
        Session::flash('success','Tag Had been restore Successfully');
        return redirect()->back();
    }
}
