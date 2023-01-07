<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class perfilController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    
        
    
    public function index()
    {
        
        return view('perfil.index');
    }
    public function store( Request $request)
    {   //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ["required",  "unique:users,username,".auth()->user()->id, "min:5"," max:20", 
            "not_in:twitter, facebook, marica, gonorrea"],
            'email' => ["required" ,"email", " min:3" ," max:25" , "unique:users,email,".auth()->user()->id]
            
        ]);

        if ($request->Imagen) {
            
            $imagen = $request->file('Imagen');
       
            $nombreImagen = Str::uuid() . "." . $imagen->extension(); 
      
            $imagenServidor = Image::make($imagen);
      
            $imagenServidor->fit(1000,1000);
      
            $imagenPath = public_path('perfiles').'/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        } 

        //guardar cambios

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->Imagen= $nombreImagen ?? auth()->user()->imagen ?? null;

        $usuario->save();

        //redireccionar al usuario

        return redirect()->route('posts.index',$usuario->username);
        
    }

}
