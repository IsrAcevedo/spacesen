{{-- heredamos layaut general --}}
@extends('layouts.app') 

{{-- llamamos secciones de la pagina principal --}}
@section('titulo')
    publicaciones de las personas que sigues
@endsection

@section('contenido')
   <x-Listar-post :posts="$posts"/>

@endsection



