@extends('layouts.app')

@section('titulo')
    Bienvenido a DevsTagram
@endsection
@section('contenido')
    <div class="text-center mb-8 text-gray-500">
        Acá verás lo que publican las cuentas que sigues
    </div>

    @if($posts->count())
    <div class="flex flex-col items-center ">
        @foreach($posts as $post)
        <div class="space-y-4 pt-4 border px-4" >
            

                <h1 class="text-center text-2xl font-bold text-indigo-600">{{$post->title}}</h1>
                <a href="{{route('posts.index', $post->user->username)}}" class="text-sm font-semibold text-gray-600 inline-flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>
                      
                    
                    {{$post->user->username}}</a>
                
                    <div>
                        <a href="{{route('posts.show', ['user' => $post->user->username, 'post' => $post->id ])}}">

                            <img style="width:30rem " src="{{asset('uploads') . '/' . $post->imagen}}" alt="">
                        </a>

                    </div>
                
                <div class="flex items-center flex-row gap-2">
                    
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

                    <p class="font-bold text-md"> {{$post->likes->count()}}
                        <span class="font-normal text-md"> Likes</span>
                    </p>

                    @if($post->comentarios->count())
                @foreach($post->comentarios as $comentario)
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                          </svg>
                          
                        <p>{{$comentario->count()}}</p>
                    </div>
                @endforeach
            @else
                <p class="p-10 text-center font-bold">0</p>

            @endif

                </div>



                <span class="text-xs text-gray-700">{{$post->created_at->diffForHumans()}}</span>
            
        </div>
        @endforeach
    </div>
        @else
        <p>No hay posts</p>
    @endif

@endsection