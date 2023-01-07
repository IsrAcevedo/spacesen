@extends('layouts.app')

@section('titulo')

    Registrate en SpaceSen
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-7/12">
            
            <img src="{{ asset('img/perfil.png') }}" alt="imagen registro de usuarios">

        </div>  
        <div class="md:w-5/12 bg-white p-6 rounded-lg shadow-xl">
            <form  action="/crear-cuenta" method="POST">
                {{-- solucion error para validar ataque --}}
                @csrf  
                <div class="mb-5">
                    <label for="name"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>

                    <input type="text" id="name" name="name" placeholder="Ingrese su Nombre" 
                    class="border p-2 w-full rounded-lg @error('name') border-red-700 border-dashed 
                    @enderror" value="{{old('name')}}">
                    @error('name')
                        <p class=" text-red-500 my-2 rounded-lg 
                        text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Usuario
                    </label>

                    <input type="text" id="username" name="username" placeholder="Ingrese su Usuario" 
                    class=" border p-2 w-full rounded-lg @error('username') border-red-700 border-dashed 
                    @enderror" >
                    @error('username')
                    <p class=" text-red-500 my-2 rounded-lg 
                    text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo
                    </label>

                    <input type="email" id="email" name="email" placeholder="example@correo.com" 
                    class=" border p-2 w-full rounded-lg @error('email') border-red-700 border-dashed 
                    @enderror" value="{{old('email')}} ">
                    @error('email')
                    <p class=" text-red-500 my-2 rounded-lg 
                    text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>

                    <input type="password" id="password" name="password" placeholder="Digite Contraseña" 
                    class=" border p-2 w-full rounded-lg @error('password') border-red-700 border-dashed 
                    @enderror" >
                    @error('password')
                    <p class=" text-red-500 my-2 rounded-lg 
                    text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>

                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme su Contraseña" 
                    class=" border p-2 w-full rounded-lg  ">
                </div>

                <input type="submit" value="Crear Cuenta " class=" bg-lime-500 hover:bg-lime-600 transition-colors 
                 cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg" >
            </form>

        </div>
    </div>   

@endsection