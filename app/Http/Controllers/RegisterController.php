<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function index() 
    {
        return view('auth.registro');
    }

    public function store(Request $request) 
    {
        /*modificamos el request para que no le aparezca el error 
        del correo ya registrado al usuario, asi que antes de eso
        interceptamos el request y lo validamos en  el formulario*/
        $request->request->add(['username' => Str::slug($request->username)]);
        //para acceder  a los datos que se envian en el formulario
        //dd($request);
        /* para acceder a un valor en especifico usamos 
        dd($request->get('username'));*/

        $this->validate($request, [
           'name' => 'required | min:3 | max:30',
           'username' => 'required | min:3 | max:15 |unique:users',
           'email' => 'required|email | min:3 | max:25 ',
           'password' => 'required | min:6 | confirmed'

        ]);

    // importamos el modelo user de la carpeta modelo
    //usamos metodo estatico create que equivale a insert into en sql
       User::create([
        // agregamos los campos, omitiendo el id q es un autoincrement
        // agregamos la informacion con el objeto de request
        'name' => $request->name, 
        'username' =>$request->username, //str::slug convierte el campo en url eliminando acentos convierte a miniscula y agrega un guion en los espacios
        'email' => $request->email,                    
        'password' => Hash::make($request->password) //hash:make es para encriptar los passwords
       ]);

       //funcion de laravel para autenticar un usuario

    //    auth()->attempt([
    //     'email' =>$request->email,
    //     'password' => $request->password
    //    ]);
       //

       //otra forma de autenticar un usuario con funciones de laravel

       auth()->attempt($request->only('email','password'));
       //redireccionamos desde el controlador PostController
       return redirect()->route('posts.index');
    }
}
