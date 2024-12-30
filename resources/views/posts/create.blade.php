@extends('layouts.app')

@section('titulo')
    Publicar nuevo post
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">

            <form action="{{route('images.store')}}" method="POST" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="mb-5 space-y-4">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input type="text" id="title" name="title" placeholder="Ingresé su titulo" 
                           class="border p-3 w-full rounded-lg" value="{{ old('title') }}"/>
                   
                        @error('title')
                        <p class="text-red-500 my-2 font-bold text-sm px-2">{{ $message }}</p>
                @enderror
                
        </div>

            <div class="mb-5 space-y-4">
                <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>

                <textarea 
                id="description" 
                name="description" 
                class="border p-3 w-full rounded-lg" 
                placeholder="Ingresé su descripción"></textarea>
                @error('description')
                <p class="text-red-500 my-2 font-bold text-sm px-2">{{ $message }}</p>
                @enderror

                <input type="submit" value="publicar post" class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3 text-white"> </input>

                <div class="mb-5">
                    <input name="imagen" value="{{old('imagen')}}" type="hidden">
                </div>
                @error('image')
                <p class="text-red-500 my-2 font-bold text-sm px-2">{{ $message }}</p>
                @enderror

            </form>
    </div>
    </div>
@endsection