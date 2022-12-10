@extends('layouts.app')
@section('title')
    
@endsection
@section('content')
<header class=" p-5 flex justify-center">
    <h1 class="text-3xl">{{$product->name}}</h1>
</header>
<main class="grid justify-center p-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
    <div class="p-5 flex items-center justify-center">
        <img class="max-w-full h-auto rounded-full" src="{{asset('posts').'/'.$product->image}}" alt="">
    </div>
    <div class="bg-white rounded-lg p-5 drop-shadow-lg">
        <div class="flex flex-col p-3">
            <h1 class="text-3xl">Precio.</h1>
            <h2 class="text-2xl">${{$product->price}}</h2>
        </div>
        <div class="flex flex-col p-3">
            <h1 class="text-3xl">Marca.</h1>
            <h2 class="text-2xl">{{$product->brand}}</h2>
        </div>
        <div class="flex flex-col p-3">
            <h1 class="text-3xl">Stock.</h1>
            <h2 class="text-2xl">{{$product->stock}}</h2>
        </div>
        <div class="flex flex-col p-3">
            <h1 class="text-3xl">Codigo.</h1>
            <h2 class="text-2xl">{{$product->id}}</h2>
        </div>
        <div class="pt-5 flex gap-3">
            <button class="bg-yellow-500 w-full rounded-xl hover:bg-yellow-600 p-2 text-white" type="button" data-modal-toggle="medium-modal">Modificar</button>
            <button class="bg-red-500 w-full rounded-xl hover:bg-red-600 p-2 text-white" data-modal-toggle="popup-modal">Eliminar</button>
        </div>
    </div>
</main>
  
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de eliminar este producto?</h3>
                <form action="{{ route('producto.destroy', $product->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Si, seguro
                    </button>
                    <button data-modal-toggle="popup-modal" type="reset" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        No
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="medium-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h1 class="text-2xl">Completa el formulario con los datos que deseas modificar</h1>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="medium-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span> 
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="p-5 flex items-center">
                    <form for="image" action="{{route('image.update', $product->id)}}" method="POST" enctype="multipart/form-data" id="dropzone" class="bg-white drop-shadow-lg dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                        @csrf
                        @method('PATCH')
                    </form>
                </div>
                
                <form action="{{ route('producto.update', $product->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col">
                        <div>
                            <label for="name">Nombre</label>
                            @error('name')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input value="{{$product->name}}" class="p-2 border-4 border-gray-300 border-l-blue-500 @error('name') border-l-red-700 @enderror" type="text" name="name" id="name" placeholder="Ingresa el nombre del producto" value="{{old('name')}}">
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <label for="price">Precio</label>
                            @error('price')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input value="{{$product->price}}" class="p-2 border-4 border-gray-300 border-l-blue-500 @error('price') border-l-red-700 @enderror" type="number" name="price" id="price" placeholder="$1000" value="{{old('price')}}">
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <label for="brand">Marca</label>
                            @error('brand')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input value="{{$product->brand}}" class="p-2 border-4 border-gray-300 border-l-blue-500 @error('brand') border-l-red-700 @enderror" type="text" name="brand" id="brand" placeholder="Marca del producto" value="{{old('brand')}}">
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <label for="stock">stock</label>
                            @error('stock')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input value="{{$product->stock}}" class="p-2 border-4 border-gray-300 border-l-blue-500 @error('stock') border-l-red-700 @enderror" type="number" name="stock" id="stock" placeholder="999" value="{{old('stock')}}">
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <label for="category">Categoria</label>
                            @error('category')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <select class="p-2 border-4 border-gray-300 border-l-blue-500 @error('category') border-l-red-700 @enderror" name="category" id="category">
                            <option selected="true" value="{{$product->category_id}}"></option>
                            @foreach ($categories->all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <input type="hidden" name="image" value="{{ old('image') }}">
                    </div>

                    <div class="flex flex-col">
                        <div>
                            <label for="code">Codigo</label>
                            @error('code')
                            <span class="text-red-600"><small>*{{$message}}</small></span>
                            @enderror
                        </div>
                        <input value="{{$product->id}}" class="p-2 border-4 border-gray-300 border-l-blue-500 @error('code') border-l-red-700 @enderror" type="number" name="code" id="code" placeholder="4589612354" value="{{old('code')}}">
                    </div>
                    <div class="flex items-center pt-5 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="medium-modal" type="submit" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                        <button data-modal-toggle="medium-modal" type="reset" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection