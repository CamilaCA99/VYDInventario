@extends('layouts.app')
@section('title')
Crea tu cuenta!
@endsection
@section('content')
<div class="w-screen h-screen flex items-center justify-center p-2">
    <div class="bg-white p-10 rounded-3xl shadow-xl lg:grid lg:grid-cols-2 lg:gap-5">
        <header class="mb-5">
            <h4 class="text-xl font-bold">Bienvenido rellena este formulario para crear una cuenta!</h4>
        </header>
        <div class="flex items-center row-span-2">
            <form action="{{route('register.store')}}" method="POST" class="w-full">

                @csrf

                <main class="grid gap-3">
                    <div class="flex flex-col">
                        <div>
                            <label class="font-bold" for="rut">Rut</label>
                            @error('id')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('id') border-l-red-700 @enderror" type="text" name="id" id="id" placeholder="Ingresa el rut" value="{{old('id')}}">
                    </div>

                    <div class="flex flex-col">
                        <div>
                            <label class="font-bold" for="name">Nombre</label>
                            @error('name')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('name') border-l-red-700 @enderror" type="text" name="name" id="name" placeholder="De la empresa si!" value="{{old('name')}}">
                    </div>

                    <div class="flex flex-col">
                        <div>
                            <label class="font-bold" for="email">Correo electronico</label>
                            @error('email')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('email') border-l-red-700 @enderror" type="email" name="email" id="email" placeholder="ejemplo@empresa.com" value="{{old('email')}}">
                    </div>

                    <div class="flex flex-col">
                        <div>
                            <label class="font-bold" for="password">Password</label>
                            @error('password')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('password') border-l-red-700 @enderror" type="password" name="password" id="password">
                    </div>

                    <div class="flex flex-col">
                        <div>
                            <label class="font-bold" for="password_confirmation">Re-password</label>
                            @error('password_confirmation')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('password_confirmation') border-l-red-700 @enderror" type="password" name="password_confirmation" id="password_confirmation">

                        

                    </div>
                    <div class="flex item-center justify-center">
                        <button class="bg-orange-500 w-full rounded-xl hover:bg-orange-600 p-2 text-white" type='submit'>Registrar</button>
                    </div>

                </main>
            </form>

        </div>

        <footer class="flex flex-col justify-center items-center mt-5">
            <p>si ya estas registrado</p>
            <p><a href="{{ route('login') }}" class="hover:pointer hover:text-blue-600 hover:underline">pincha aqui para iniciar sesion!</a></p>
        </footer>
    </div>
</div>
@endsection