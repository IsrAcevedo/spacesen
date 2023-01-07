@extends('layouts.app')

@section('titulo')
    Editar Tu Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow-lg p-6">
            <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf  
                <div class="mb-5">
                    <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de Usuario
                    </label>

                    <input type="text" id="username" name="username" placeholder="Tu nombre de perfil" 
                    class="border p-2 w-full rounded-lg @error('username') border-red-700 border-dashed 
                    @enderror" value="{{auth()->user()->username}}">
                    @error('username')
                        <p class=" text-red-500 my-2 rounded-lg 
                        text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo Electronico
                    </label>

                    <input type="email" id="email" name="email" placeholder="correo@correo.com" 
                    class="border p-2 w-full rounded-lg @error('email') border-red-700 border-dashed 
                    @enderror" value="{{auth()->user()->email}}">
                    @error('email')
                        <p class=" text-red-500 my-2 rounded-lg 
                        text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>
                

                <div class="mb-5">
                    <label for="Imagen"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen Perfil
                    </label>

                    <input type="file" id="Imagen" name="Imagen"  
                    class="border p-2 w-full rounded-lg" accept=".jpg, .jpeg, .png">
                    
                </div>
                <input type="submit" value="Guardar Cambios " class=" bg-lime-500 hover:bg-lime-600 transition-colors 
                 cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg" >
            </form>
        </div>
    </div>
@endsection