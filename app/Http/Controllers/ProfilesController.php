<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('site.profile')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id != Auth::user()->id) {
            Session::flash('error_msg','you do not have permission to log to this page');
            return redirect('/');
        }
        $user = User::findOrFail(Auth::user()->id);
        return view('site.profile')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('site.profile')->with('user',$user);
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
            'name'     => 'required|min:3',
            'email'    => 'required|email',
            'facebook' => 'required|url',
            'twitter'  => 'required|url',
            'about'    => 'required|min:50',
            'avatar'   => 'image|mimes:jpg,png,jpeg,gif|max:1000'
        ]);
        $user = Auth::user();
        if($request->avatar) {
            if ($request->hasFile('avatar')) {
                $image = $request->avatar;
                $img_new = time() . '_' . $image->getClientOriginalName();
                $image->move('uploads/avatar', $img_new);
            }
            $user->profile->avatar = $img_new;
            $user->profile->save();
        }
        $user->name              = $request->name;
        $user->email             = $request->email;
        $user->profile->about    = $request->about;
        $user->profile->twitter  = $request->twitter;
        $user->profile->facebook = $request->facebook;
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $user->profile->save();

        Session::flash('success','Profile Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
