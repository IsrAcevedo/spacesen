<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        
      
       $this->validate($request,[
        'email'=>'required | email',
        'password'=> 'required'
       ]);

       

       if (!auth()->attempt($request->only('email','password'), $request->remember )) {
            return back()->with('mensaje','correo y/o contraseña incorrecta');
       }
       return redirect()->route('posts.index', auth()->user()->username);
    }

}
