@extends('layouts.app')

@section('titulo')
    Inicia Sesión
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('images/login.jpg')}}" class="shadow-lg" alt="img login">
        </div>

        <div class="md:w-4/12 bg-white rounded-lg shadow-lg p-6">
            <form method="POST" action="{{route('login')}}">
                @csrf

                @if(session('mensaje'))
                <p class="text-red-500 my-2 font-bold text-sm px-2">{{session('mensaje')}}</p>
                @endif
                <div class="mb-5 space-y-4">


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

                    <div class="mb-5">
                        <input type="checkbox" name="remember"> <label class="text-sm text-gray-500">Mantener mi sesión abierta</label> </input>
                    </div>
                

                </div>
                <input type="submit" value="iniciar sesión" class="bg-indigo-600 hover:bg-indigo-700 transition-colors cursor-pointer uppercase font-bold w-full rounded-lg p-3 text-white"> </input>
            </form>
        </div>  
    </div>
@endsection