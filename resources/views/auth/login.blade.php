@extends('layouts.app')

@section('titulo')
    Sign in to DevsTagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen Login de Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl ">
            <form action="{{ route('login')}}" method="POST">
                @csrf            
               
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ session('mensaje') }} </p>
                @endif
                 
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold"> Email: </label>
                    <input id="email" name="email" type="text" placeholder="Your registration email" class="border p-3 w-full rounded-lg
                    @error('email') border-red-500 @enderror" value={{ old('email') }}>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold"> Password: </label>
                    <input id="password" name="password" type="password" placeholder="Your registration password" class="border p-3 w-full rounded-lg
                    @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <input type="checkbox" name="remember"> <label class="uppercase text-gray-500 text-sm"> Keep my session open </label>   
                </div>

                <input type="submit" value="Log In" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                        uppercase font-bod w-full p-3 text-white rounder-lg">

            </form>
        </div>
    </div>

@endsection