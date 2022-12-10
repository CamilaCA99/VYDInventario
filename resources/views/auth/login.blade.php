@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
    <div class="w-screen h-screen flex items-center justify-center p-2" style='background-color: #eee;'>
        <div class="bg-white p-10 rounded-3xl shadow-xl lg:grid lg:grid-cols-2 lg:gap-5">
            <header class="mb-5 flex flex-col align-center">
                <h4 class="text-xl text-center font-bold">Bienvenido a tu sistema de inventario!</h4>
                <img class="mt-5" src="{{ asset('img/logoVYD.png') }}" alt="Logo institucional">
            </header>
            <div class="flex items-center row-span-2">
                <form class="w-full" action="{{route('login.store')}}" method="POST">
                    @csrf
                    <main class="grid gap-3">
                        <div class="flex flex-col">
                            <label class="font-bold" for="email">Correo electronico</label>
                            @error('email') {{$message}} @enderror
                            <input class="p-2 border-4 border-gray-300 border-l-blue-500" type="email" name="email" id="email" placeholder="Ingresa tu correo de registro">
                            
                        </div>
                        <div class="flex flex-col">
                            <label class="font-bold" for="password">Password</label>
                            <input class="p-2 border-4 border-gray-300 border-l-blue-500" type="password" name="password" id="password" placeholder="Ingresa tu password de registro">
                        </div>
                        <div class="flex item-center gap-3">
                            <input type="checkbox" name="remember" id="remember">
                            <label class="font-bold" for="remember">Recuerdame</label>
                        </div>
                        <div class="flex item-center justify-center">
                            <button class="bg-blue-500 w-full rounded-xl hover:bg-blue-600 p-2 text-white">Iniciar sesion</button>
                        </div>
                    </main>
                </form>
            </div>
        </div>
    </div>
@endsection