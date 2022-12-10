@extends('layouts.app')
@section('title')
    Producto
@endsection
@section('content')


<header class=" p-5 flex justify-center">
    <h1 class="text-2xl">Producto</h1>
</header>

{{-- class="grid grid-cols-1 justify-center xl:grid-cols-2 p-5"> --}}
<main class="grid grid-cols-1 p-5 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
    <div class="p-5 flex items-center">
        <form for="image" action="{{route('image.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="bg-white drop-shadow-lg dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>
    </div>
    <div class="bg-white rounded-lg p-5 drop-shadow-lg">
        <form action="{{route('producto.store')}}" method="POST" class="w-full">
            @csrf
            <div class="flex flex-col">
                <div>
                    <label for="name">Nombre</label>
                    @error('name')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-blue-500 @error('name') border-l-red-700 @enderror" type="text" name="name" id="name" placeholder="Ingresa el nombre del producto" value="{{old('name')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="price">Precio</label>
                    @error('price')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-blue-500 @error('price') border-l-red-700 @enderror" type="number" name="price" id="price" placeholder="$1000" value="{{old('price')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="brand">Marca</label>
                    @error('brand')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-blue-500 @error('brand') border-l-red-700 @enderror" type="text" name="brand" id="brand" placeholder="Marca del producto" value="{{old('brand')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="stock">Stock</label>
                    @error('stock')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-blue-500 @error('stock') border-l-red-700 @enderror" type="number" name="stock" id="stock" placeholder="999" value="{{old('stock')}}">
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="category">Categoria</label>
                    @error('category')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <select class="p-2 border-4 border-gray-300 border-l-blue-500 @error('category') border-l-red-700 @enderror" name="category" id="category">
                    <option selected="true" disabled="disabled">--seleccione una categoria--</option>
                    @foreach ($categories->all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <div>
                    <label for="id">Codigo</label>
                    @error('id')
                    <span class="text-red-600"><small>*{{$message}}</small></span>
                    @enderror
                </div>
                <input class="p-2 border-4 border-gray-300 border-l-blue-500 @error('id') border-l-red-700 @enderror" type="number" name="id" id="id" placeholder="4589612354" value="{{old('id')}}">
            </div>

            <div>
                <input type="hidden" name="image" value="{{ old('image') }}">
            </div>

            <div class="pt-5 flex gap-3">
                <button class="bg-blue-500 w-full rounded-xl hover:bg-blue-600 p-2 text-white" type="submit">Registrar</button>
                <button class="bg-red-500 w-full rounded-xl hover:bg-red-600 p-2 text-white" type="reset">cancelar</button>
                <button class="bg-green-500 w-full rounded-xl hover:bg-green-600 p-2 text-white" type="submit">Registrar y siguiente</button>
            </div>
        </form>
        
    </div>
</main>
    
@endsection