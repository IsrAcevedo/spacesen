
@extends('layouts.app');

@section('titulo')
 crea una nueva publicacion

@endsection
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endpush
@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
              <form action="{{route('imagenes.store')}}" id="dropzone" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96
              rounded flex flex-col justify-center items-center" method="POST">
              @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form  action="{{route ('posts.store')}}"  method="POST">
                {{-- solucion error para validar ataque --}}
                @csrf  
                <div class="mb-5">
                    <label for="titulo"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>

                    <input type="text" id="titulo" name="titulo" placeholder="titulo de la publicacion" 
                    class="border p-2 w-full rounded-lg @error('titulo') border-red-700 border-dashed 
                    @enderror" value="{{old('titulo')}}">
                    @error('titulo')
                        <p class=" text-red-500 my-2 rounded-lg 
                        text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion"  class="mb-2 block uppercase text-gray-500 font-bold">
                    Descripcion
                    </label>

                    <textarea value="{{old('descripcion')}}" placeholder="Descripcion de la publicacion" id="descripcion" 
                    name="descripcion" class="border p-2 w-full rounded-lg
                    @error('descripcion') border-red-700 border-dashed @enderror">
 
                    </textarea>
                    
                    @error('descripcion')
                        <p class=" text-red-500 my-2 rounded-lg 
                        text-sm  text-center ">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}">
                    @error('imagen')
                    <p class=" text-red-500 my-2 rounded-lg 
                    text-sm  text-center ">{{$message}}</p>
                @enderror
                </div> 


                <input type="submit" value="Publicar " class=" bg-lime-500 hover:bg-lime-600 transition-colors 
                 cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg" >
            
                
                </form>
        </div>
    </div>
@endsection