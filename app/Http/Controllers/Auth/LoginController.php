<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Session;
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
//    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        if (Auth::user()->usertype == 'admin'){
            Session::flash('success','You login succesfly !');

            return 'admin';
        }else{

            Session::flash('success','You login succesfly !');
            return 'Deliverer-Dash';
        }
    }
    public function save(){

        $admin = new App\User();
        $admin->name ="ADMIN";
        $admin->usertype ="admin";
        $admin->email ="admin@firsst.com";
        $admin->phone ="0658597780";
        $admin->city ="El-Hajeb";
        $admin->gender ="male";
        $admin->password ="123456789";
        $admin -> save();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}

