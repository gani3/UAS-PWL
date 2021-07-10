<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\LoginModel;
use Auth;
class LoginController extends Controller
{
    // public function __construct(Type $foo = null)
    // {
    //   $this->LoginModel = new LoginModel();
    // }

    public function index()
    {
      return view('loginadmin');
    }

    public function postlogin(Request $request)
    {
      Request()->validate([
        'username' => 'required',
        'password' => 'required',
      ],[
        'username.required'  => 'wajib diisi !!!',
        'password.required'  => 'wajib diisi !!!',
      ]);

      if(Auth::attempt($request->only('username','password'))){
        return redirect('/dashboard');
      }
      return redirect('/admin');
    }


    public function postloginuser(Request $request)
    {
      Request()->validate([
        'username' => 'required',
        'password' => 'required',
      ],[
        'username.required'  => 'wajib diisi !!!',
        'password.required'  => 'wajib diisi !!!',
      ]);

      if(Auth::attempt($request->only('username','password'))){
        return redirect('/home');
      }
      return redirect('/');
    }
}
