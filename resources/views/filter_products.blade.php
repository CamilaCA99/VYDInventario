@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<header class="px-5 pt-5 flex flex-col gap-2 justify-between xl:flex-row-reverse lg:flex-row-reverse md:flex-row-reverse">
    <div class="flex flex-col gap-2 w-full">
        <form action="{{ route('search') }}" method="POST" class="flex gap-2">
            @csrf
            <input autofocus class="w-full rounded-full bg-white p-2 drop-shadow-lg" placeholder="Buscar" type="text" name="search" id="search">
            <button type="submit" class="bg-white rounded-full p-3 drop-shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </form>
    </div>
    <div class="w-full flex gap-2 justify-between">
        <a class="bg-blue-500 text-center rounded-xl w-[25%] hover:bg-blue-600 p-3 text-white drop-shadow-lg" href="{{ route('producto')}}">Agregar</a>
        <form class="" action="{{ route('filter') }}" method="POST">
            @csrf
            <select class="rounded-full bg-white p-3 px-8 drop-shadow-lg w-full" name="filter" id="filter" onchange="this.form.submit()">
                <option selected="true" disabled="disabled">--seleccione una categoria--</option>
                @foreach ($categories->all() as $category )
                    <option value="{{$category->id}}">{{$category->name}}</option>    
                @endforeach
            </select>
        </form>
    </div>
</header>
<main class="p-5 flex flex-col gap-2 xl:grid xl:grid-cols-4 lg:grid lg:grid-cols-4 md:grid md:grid-cols-3 sm:grid sm:grid-cols-2">
    @foreach ($products->all() as $product )
        <div class="bg-white drop-shadow-lg rounded-lg p-2  flex flex-col items-center">
            <div class="rounded-full border-solid border-2 border-gray-500 p-2">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                </svg>
            </div>
            <h1 class="text-base">{{ $product->name }}</h1>
            <strong class="text-sm">Stock: {{ $product->stock }}</strong>
            <button class="bg-blue-500 p-2 rounded-xl text-white hover:bg-blue-600 w-full">Ver</button>
        </div>
    @endforeach
</main>
    
@endsection