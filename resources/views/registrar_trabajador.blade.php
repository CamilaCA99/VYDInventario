@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<header class=" p-5 flex justify-center">
    <h1 class="text-3xl">Trabajadores</h1>
</header>
<main class="flex justify-center p-5">
    <div class="bg-white rounded-lg w-[40%] p-5 drop-shadow-lg">
        <form action="{{ route('trabajador.store') }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <div>
                    <label for="id">Rut</label>
                    @error('id')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('id') border-l-red-700 @enderror" type="text" name="id" id="id" placeholder="Ingresa el rut del trabajador" value="{{old('id')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="name">Nombre</label>
                    @error('name')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('name') border-l-red-700 @enderror" type="text" name="name" id="name" placeholder="Ingresa nombre del trabajador" value="{{old('name')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="last_name">Apellidos</label>
                    @error('last_name')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('last_name') border-l-red-700 @enderror" type="text" name="last_name" id="last_name" placeholder="Ingresa apellidos del trabajador" value="{{old('last_name')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="email">Email</label>
                    @error('email')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('email') border-l-red-700 @enderror" type="email" name="email" id="email" placeholder="ejemplo@correo.com" value="{{old('email')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="password">password</label>
                    @error('password')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('password') border-l-red-700 @enderror" type="password" name="password" id="password" placeholder="password" value="{{old('password')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="password_confirmation">password confirmation</label>
                    @error('password_confirmation')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-orange-500 @error('password_confirmation') border-l-red-700 @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
            </div>
            <div class="pt-5 flex gap-3">
                <button class="bg-orange-500 w-full rounded-xl hover:bg-orange-600 p-2 text-white" type="submit">Registrar</button>
                <button class="bg-red-500 w-full rounded-xl hover:bg-red-600 p-2 text-white" type="reset">cancelar</button>
            </div>
        </form>
        
    </div>
</main>
@endsection