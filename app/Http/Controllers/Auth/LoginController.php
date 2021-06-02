<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data,
         [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],
        [
            'email.required' => 'Please enter Email',
            'email.email' => 'Email address is not properly formatted ',
            'email.max' => 'Email address up to 255 charactersd',
            'email.unique' => 'Email address already exists ',
            'password.required' => 'Please enter the password ',
            'password.min' => 'Password at least 6 characters ',

        ]);
    }

}
