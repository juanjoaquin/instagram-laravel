@extends('layouts.app')

@section('titulo')
{{$post->title}}

@endsection

@section('contenido')
<div class="container mx-auto flex">
    <div class="md:w1-/2">
        
        <img src="{{asset('uploads' . '/' . $post->imagen)}}" alt="{{$post->title}}">

        <div class="p-3 flex items-center gap-4">
        @auth

        @if($post->validateLike(auth()->user()))
        <form action="{{route('posts.likes.destroy', $post)}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="my-4">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>                  
                </button>
            </div>
        </form>
        @else
        <form action="{{route('posts.likes.store', $post)}}" method="POST">
            @csrf
            <div class="my-4">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>                  
                </button>
            </div>
        </form>
        @endif
        
        @endauth
            <p class="font-bold"> {{$post->likes->count()}}
                <span class="font-normal"> Likes</span>
            </p>
        </div>

        <div>
            <p class="font-bold">{{$post->user->username}}</p>
            
            <p>{{$post->created_at->diffForHumans()}}</p>

            <h2 class="font-bold mt-2 text-3xl">{{$post->title}}</h2>

            <p class="mt-2">{{$post->description}} </p>
        </div>

        @auth
            @if($post->user_id === auth()->user()->id)
            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Eliminar publicación" 
                class="bg-red-500 hover:bg-red-600 px-4 p-2 mt-4 shadow rounded text-white font-bold cursor-pointer">
            </form>
            @endif
        </div>
        @endauth


    <div class="md:w-1/2 p-5">
        <div class="shadow bg-white p-5 mb-5">
            @auth
            <p class="text-xl font-bold text-center mb-4">Comentá la publicación</p>

            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">COMENTARIO</label>

            <form method="POST" 
            action="{{route('comentarios.store', ['user' => $user, 'post' => $post])}}">    
            @csrf
                <textarea 
                id="comentario" 
                name="comentario" 
                class="border p-3 w-full rounded-lg" 
                
                placeholder="Agregar un comentario"></textarea>
                @error('comentario')
                <p class="text-red-500 my-2 font-bold text-sm px-2">{{ $message }}</p>
                @enderror

                <input type="submit" value="publicar comentario" class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3 text-white"> </input>
            </form>
            @if(session('mensaje'))
            <div class="bg-green-500 mt-4 p-2 rounded-lg mb-6 text-white text-center font-bold ">
                {{session('mensaje')}}
            </div>
            @endif
        </div>
            @endauth

        @guest

        <div class="text-center">
            <h1 class="font-bold">Necesitas estar logueado o registrado para comentar</h1>
            <div class="flex justify-center gap-10 pt-4">
                <a href="{{route('login')}}" class="font-bold uppercase  shadow-lg px-4 p-2 bg-indigo-500  text-white hover:bg-indigo-600">
                    Login</a>
                <a href="{{route('register')}}" class="font-bold uppercase shadow-lg px-4 p-2 bg-indigo-500 text-white hover:bg-indigo-600">
                    Register</a>
            </div>
        </div>
        </div>

        @endguest

        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
            @if($post->comentarios->count())
                @foreach($post->comentarios as $comentario)
                    <div class="p-5 border-gray-300 border-b">
                        <div class="flex justify-between">
                            <a href="{{route('posts.index', $comentario->user)}}" 
                                class="text-sm font-bold">{{$comentario->user->username}}</a>
                            <span class="text-sm text-gray-600 pt-2">{{$comentario->created_at->diffForHumans()}}</span>
                        </div>
                        <p>{{$comentario->comentario}}</p>
                    </div>
                @endforeach
            @else
                <p class="p-10 text-center font-bold">No hay comentarios aún.</p>

            @endif
        </div>
    </div>
</div>
@endsection

