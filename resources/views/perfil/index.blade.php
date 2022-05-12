@extends('layouts.app');

@section('titulo')
    Edit Profile: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" method="POST" action="{{ route('perfil.store')}}" enctype="multipart/form-data">
                @csrf
                     
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>                    
                    <input 
                        id="username" name="username" type="text" placeholder="Tu Nombre" 
                        class="border p-3 w-full rounded-lg
                        @error('username') border-red-500 @enderror" value={{ auth()->user()->username }}
                    >
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                    @enderror

                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Profile Image</label>                    
                    <input 
                        id="imagen" name="imagen" type="file" accept=".png, .jpg, .jpeg"
                        class="border p-3 w-full rounded-lg"               
                    >             

                    <input type="submit" value="Save Changes" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                uppercase font-bod w-full p-3 text-white rounder-lg">

            </form>
        </div>
    </div>
@endsection