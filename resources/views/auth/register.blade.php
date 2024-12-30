@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('images/registrar.jpg')}}" class="shadow-lg" alt="">
        </div>

        <div class="md:w-4/12 bg-white rounded-lg shadow-lg p-6">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-5 space-y-4">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Ingresé su nombre" 
                           class="border p-3 w-full rounded-lg" value="{{ old('name') }}"/>
                    @error('name')
                        <p class="text-red-500 my-2 font-bold text-sm px-2">{{ $message }}</p>
                    @enderror

                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Nombre de usuario" class="border p-3 w-full rounded-lg" value="{{old('username')}}"/>
                    @error('username')
                    <p class="text-red-500 my-2 font-bold text-sm px-2">{{$message}}</p>
                    @enderror

                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Ingresé su email" class="border p-3 w-full rounded-lg" value="{{old('email')}}"/>
                    @error('email')
                    <p class="text-red-500 my-2 font-bold text-sm px-2">{{$message}}</p>
                    @enderror

                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Ingresé su contraseña" class="border p-3 w-full rounded-lg"/>
                    @error('password')
                    <p class="text-red-500 my-2 font-bold text-sm px-2">{{$message}}</p>
                    @enderror

                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repitá su password" class="border p-3 w-full rounded-lg"/>
                    
                

                </div>
                <input type="submit" value="Crear Cuenta" class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3 text-white"> </input>
            </form>
        </div>  
    </div>
@endsection