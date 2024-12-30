@extends('layouts.app')

@section('titulo')
    Editar perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" class="mt-10 md:mt-10" action="{{route('perfil.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5 space-y-4">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Ingresé su username" 
                           class="border p-3 w-full rounded-lg" value="{{ auth()->user()->username }}"/>
                    @error('username')
                        <p class="text-red-500 my-2 font-bold text-sm px-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 space-y-4">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input 
                    type="file" id="imagen" name="imagen"
                    class="border p-3 w-full rounded-lg"
                    accept=".jpg, .jpeg, .png"
                    />

                </div>
                <input type="submit" value="Modificar perfil" class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3 text-white"> </input>
            </form>
        </div>
    </div>

@endsection