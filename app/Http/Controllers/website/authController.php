<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{

   


    public function Login()
    {
       if(Auth::check()){
        return  redirect()->route('dashboard');

       }
        return view("auth.login");
    }

    public function PostLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

             return redirect()->route('dashboard');;
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function Register(Request $request)
    {
        if(Auth::check()){
            return  redirect()->route('home');
    
           }

        return view('register');
    }

    public function PostRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users',
            
        ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }

       $user=new User();
       $user->username=$request->username;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);

       $user->save();
      
       return redirect()->route('users::login');
        
    }

    public function Logout(Request $request){

        Auth::logout();

        return redirect()->route('login');
    }
    //
}
