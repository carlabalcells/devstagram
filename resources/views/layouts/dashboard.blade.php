@extends('layouts.app')

@section('titulo') 
    Profile {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">    
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->imagen ? asset('perfiles').'/'.$user->imagen : asset('img/usuario.svg') }}" 
                    alt="Imagen Usuario">
            </div>
            
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl"> {{ $user->username }} </p>

                    @auth
                        @if(auth()->user()->id === $user->id)
                            <a 
                                href="{{ route('perfil.index', $user)}}"
                                class="text-gray-500 hover:text-gray-600 cursor-pointer"
                            > 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->followers->count() }}  <span class="font-normal"> @choice('Follower|Followers', $user->followers->count()) </span> 
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->following->count() }}  <span class="font-normal"> Following </span> 
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->posts->count() }} <span class="font-normal"> Posts </span>
                </p>

                @auth              
                @if($user->id !== auth()->user()->id)
                    @if( !$user->siguiendo( auth()->user() ) )
                        <form method="POST" action="{{ route('users.follow', $user) }}">
                            @csrf
                            <input type="submit" value="Seguir" 
                            class="bg-blue-600 text-white uppercase rounded-lg, px-3 py-1 text-xs font-bold cursor-pointer">
                        </form>
                    @else
                        <form method="POST" action="{{ route('users.unfollow', $user) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Dejar de Seguir" 
                            class="bg-blue-600 text-white uppercase rounded-lg, px-3 py-1 text-xs font-bold cursor-pointer">
                        </form>
                    @endif
                @endif
                @endauth

            </div>            
        </div>    
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10" > Posts </h2>
        <x-listar-post :posts="$posts" />
    </section>
@endsection