<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'facebook' => 'required|url',
            'twitter'  => 'required|url',
            'about'    => 'required|min:50',
            'avatar'   => 'image|mimes:jpg,png,jpeg,gif|max:1000',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $users =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user = Auth::user();
        if($data['avatar']) {
                $image = $data['avatar'];
                $img_new = time() . '_' . $image->getClientOriginalName();
                $image->move('uploads/avatar', $img_new);
        }
        $profile = Profile::create([
            'about'    => $data['about'],
            'twitter'  => $data['twitter'],
            'facebook' => $data['facebook'],
            'user_id'  => $user->id,
            'gender'   => $data['gender'],
            'avatar'   => $img_new
        ]);
        return $users;
    }
}
