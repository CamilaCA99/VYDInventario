@extends('layouts.app')
@section('title')
    Trabajadores
@endsection
@section('content')
<header class="p-5 flex gap-2 justify-between">
    <a class="bg-orange-500 rounded-xl hover:bg-orange-600 p-2 text-white drop-shadow-lg" href="{{ route('trabajador.create')}}">Agregar</a>
    {{-- <div class="flex gap-2">
        <input class="rounded-full bg-white p-2 drop-shadow-lg" placeholder="Buscar" type="text">
        <select class="rounded-full bg-white p-2 drop-shadow-lg" name="#" id="#">
            <option value="0">--Seleccione una opcion--</option>
        </select>
    </div> --}}
    
</header>
<main class="p-5">
    <div class="bg-white drop-shadow-lg rounded-lg p-2 w-[15%] flex flex-col items-center">
        <div class="rounded-full border-solid border-2 border-gray-500 p-2">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
            </svg>
        </div>
        <h1 class="text-base">Nombre Apellido</h1>
        <strong class="text-sm">correodetrabajador@gmail.com</strong>
        <button class="bg-orange-500 rounded-xl text-white hover:bg-orange-600 w-full">Ver</button>
    </div>
</main>
@endsection