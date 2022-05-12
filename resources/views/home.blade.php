@extends('layouts.app');

@section('titulo')
    Your Wall
@endsection

@section('contenido')

    <x-listar-post :posts="$posts" />

   
@endsection