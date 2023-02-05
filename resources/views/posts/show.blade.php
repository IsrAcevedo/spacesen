@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex gap-5">
        <div class="md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->imagen}}" 
            alt="imagen de publicacion {{$post->titulo}}">
            <div class="p-3 flex items-center gap-4">
            
                  @auth
                        <livewire:like-post :post="$post"/>
                    
                  @endauth
               
                
            </div>
            <div class="mt-5">
                <p class="font-bold text-2xl">{{$post->user->username}}</p>
                <p class="text-sm text-red-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt5">{{$post->descripcion}}</p>
            </div>

           @auth
               @if ($post->user_id === auth()->user()->id)
                    <form action="{{route('posts.destroy',$post)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar Publicacion"
                            class="bg-red-500 hover:bg-red-700 p-2 rounded
                            text-white font-bold mt-4 cursor-pointer">
                    </form>
               @endif
           @endauth

            

        </div>
        <div class="md:w-1/2 p-5">
        
            <div class="shadow bg-white p-5 mb-5">
                   
                @auth
                <p class="text-xl font-bold text-center mb-4">
                        Agrega un nuevo comentario!!!
                    </p>
                    @if (session('mensaje'))
                        
                        <div class="bg-emerald-300 p-3 text-center rounded-lg mb-6
                        uppercase font-bold text-black">
                            {{session('mensaje')}}
                        </div>
                        
                    @endif
                <form action="{{route('comentarios.store',['post'=>$post, 'user' =>$user])}}" method="POST">
                   @csrf
                    <div class="mb-5">
                    <label for="comentario"  class="mb-2 block uppercase text-gray-500 font-bold">
                    añadir comentario
                    </label>

                    <textarea  placeholder="comentario aqui" id="comentario" 
                    name="comentario" class="border p-2 w-full rounded-lg
                    @error('comentario') border-red-700 border-dashed @enderror">
 
                    </textarea>
                    
                    @error('comentario')
                        <p class=" text-red-500 my-2 rounded-lg 
                        text-sm  text-center ">{{$message}}</p>
                    @enderror
                    </div>
                    <input type="submit" value="Comentar " class=" bg-lime-500 hover:bg-lime-600 transition-colors 
                    cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg" >
                
                </form>
                @endauth 

                <div class="bg-white shadow mb-5  max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ( $post -> comentarios as $comentario )

                        <div class="p-5 border-gray-300 border-b">
                            <a href="{{route('posts.index',$comentario->user)}}" class="font-bold">
                                {{$comentario->user->username}}
                            </a>
                            <p>{{$comentario->comentario}}</p>
                            <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                        </div>
                            
                        @endforeach
                    @else
                        <p class="p-10 text-center mt-10">
                            Se el primero en comentar!!!
                        </p>
                    @endif
                </div>
            </div>
                
             
           
        </div>

    </div>
@endsection
