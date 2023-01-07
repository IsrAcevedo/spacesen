<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>SpaceSen</title>
        {{-- vamos a utilizar framework tailwind --}}

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

        @livewireStyles()
          
    </head>
    <body class="bg-gray-100" >

        <header class="p-5 border-b bg-lime-500 shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{route('home')}}" class="text-3xl font-black text-white" >
                    SpaceSen
                </a>

                
           
                
                {{-- @guest permite ver si un usuario esta no esta autenticado
                        para mostrar ciertas opciones --}}
                @guest
                    <nav class="flex gap-2 items-center ">
                        <a class ="font-bold uppercase text-white text-sm" href="{{route('login')}}">Ingresar</a>
                        <a class ="font-bold uppercase text-white text-sm" href="{{route('register')}}" >Crear Cuenta</a>
                    </nav> 
                @endguest

                
                
                {{-- @auth  esta sintaxis permite saber si un usuario ha sido
                autenticado --}}
                @auth
                    <nav class="flex gap-4 items-center ">
                        <a href="{{route('posts-create')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-600
                        rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                          </svg>
                           Crear
                        </a>
                        <a class ="font-bold  text-white text-sm" href="{{route('posts.index', auth()->user()->username)}}"> SOY:&nbsp; <span class="font-normal bg-white p-2.5 rounded  text-red-500">{{auth()->user()->username}}</span></a>

                        <form action="{{route('logout')}}" method="POST"> 
                            @csrf
                            <button type="submit" class ="font-bold  text-white text-sm" href="{{route('logout')}}" >
                                Cerrar Sesion
                            </button>
                        </form>
                    </nav>
                @endauth 
                 

                     
                
                
            </div>   
            
            
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                {{-- @yield nos permite crear las secciones dinamicas
                    en otras paginas --}}
                @yield('titulo')
            </h2>
            @yield('contenido')

        </main>

        <footer class="mt-40 text-center p-5 text-gray-500 font-bold">

                SpaceSen-Todos los Derechos Reservados
                Israel Acevedo {{now()->year}} 
        </footer>
       
        
        @livewireScripts()
    </body>
</html>