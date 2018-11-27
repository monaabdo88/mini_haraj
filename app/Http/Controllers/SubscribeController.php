<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Newsletter;

class SubscribeController extends Controller
{
    public function index(){
        $email = request('email');
        Newsletter::subscribe($email);
        Session::flash('success','Successful Subscribe');
        return redirect()->back();
    }
}
