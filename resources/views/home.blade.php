@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')

<header class="px-5 pt-5 flex flex-col gap-2 justify-between xl:flex-row-reverse lg:flex-row-reverse md:flex-row-reverse">
    <div class="flex flex-col gap-2 w-full">
        <form action="{{ route('search') }}" method="POST" class="flex gap-2">
            @csrf
            <input autofocus class="w-full rounded-full bg-white p-2 drop-shadow-lg @error('name') border-red-500 @enderror" placeholder="Buscar" type="text" name="search" id="search">
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
            <div class="rounded-full border-solid p-2">
                <img class="max-w-full h-auto rounded-full" src="{{asset('posts').'/'.$product->image}}" alt="">
            </div>
            <h1 class="text-base">{{ $product->name }}</h1>
            <strong class="text-sm">Stock: {{ $product->stock }}</strong>
            <a href="{{ route('producto.show', $product->id) }}" class="bg-blue-500 p-2 rounded-xl text-white hover:bg-blue-600 w-full flex justify-center">Ver</a>
        </div>
    @endforeach
</main>
@endsection