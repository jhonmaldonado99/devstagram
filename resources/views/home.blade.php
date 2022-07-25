@extends('layouts.app')

@section('titulo')
    Principal
@endsection

@section('contenido')
    {{-- `:posts="$posts"` es la sintaxis para pasar variables de la vista al controlador del componente --}}
    <x-listar-post :posts="$posts" />

@endsection
