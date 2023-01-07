@extends('layouts.app')

{{-- @section('titulo')
    Perfil: {{$user->username}}
@endsection --}}


@section('contenido')
    <div class="flex justify-start">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row" >
            <div class="w-8/12 lg:w-6/12 px-5">
               <img src="{{$user->imagen ? asset('perfiles').'/'.$user->imagen: asset('img/fotoperfil.jpg') }}" alt="foto perfil" class="rounded-full">
            </div>
            
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center py-10 md:py-10 md:justify-center md:items-start">
                <div class="flex gap-4 items-center">
                    <p class="text-red-600 text-4xl font-bold">{{$user->username}}</p>
                    @auth
                        @if ($user->id===auth()->user()->id)
                            <a href="{{route('perfil.index')}}" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="green" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                
                            </a> 

                        @else
                            
                            @if (!$user->siguiendo(auth()->user()))

                                <form action="{{route('users.follow',$user)}}" method="POST">
                                    @csrf
                                    <input type="submit" value="Seguir" class="bg-green-500 text-white rounded-lg
                                        px-3 py-1 text-xs font-bold cursor-pointer">
                                </form>

                            @else
                                <form action="{{route('users.unfollow', $user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Dejar de Seguir" class="bg-green-500 text-white rounded-lg
                                        px-3 py-1 text-xs font-bold cursor-pointer">
                                </form>
                            @endif

                            

                            
                       
                        @endif
                    @endauth

                 
                </div>

                <div class="md:flex gap-6 mt-5">
                    <p class="text-gray-800 text-sm mb-3 font-bold ">
                        {{$user->followers->count()}}
                        <span class=" font-normal">@choice('Seguidor | Seguidores',$user->followers->count())</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->followings->count()}}
                        <span class=" font-normal">Seguidos</span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        {{$user->posts->count()}}
                        <span class=" font-normal">Publicaciones</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

  <section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">
        PUBLICACIONES
    </h2>
   
   
    <x-Listar-post :posts="$posts"/>
  </section>
@endsection