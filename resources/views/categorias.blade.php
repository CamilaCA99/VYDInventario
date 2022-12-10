@extends('layouts.app')
@section('title')
    Categorias
@endsection
@section('content')
<header class="px-5 pt-5 flex flex-col justify-center align-center">
    {{-- <h1>Categorias
    </h1> --}}
    <button class="bg-blue-500 rounded-xl text-white p-1 mb-2 w-full" onclick="disable()" id="btn-form-add-category">Agregar</button>
    <div class="bg-white rounded-xl p-2 drop-shadow-lg flex flex-col hidden w-full" id="categories_form">
        <div class="border-b-2 flex justify-center"><h1 class="text-base">Crea una nueva categoria.</h1></div>
        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            <div class="mt-1 flex flex-col">
                <label class="text-sm" for="name">Nombre</label>
                <input class="rounded-lg h-6" placeholder="Ej: Limpieza" type="text" name="name" id="name">
            </div>
            <button class="bg-blue-500 rounded-xl text-white mt-2 p-1 w-full">Crear</button>
        </form>
    </div>
</header>
<main class="p-5 flex flex-col gap-2 xl:grid xl:grid-cols-4 lg:grid lg:grid-cols-4 md:grid md:grid-cols-3 sm:grid sm:grid-cols-2">
    @foreach ($categories->all() as $category)
    <div class="bg-white drop-shadow-lg rounded-lg p-2  flex flex-col items-center">
        <div class="rounded-full border-solid border-2 border-gray-500 p-2">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
            </svg>
        </div>
        <h1 class="text-2xl">{{ $category->name }}</h1>
        <button class="block text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button" data-modal-toggle="popup-modal">
            Eliminar
        </button>
    </div>
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de eliminar la categoria {{$category->name}}?</h3>
                    <div class="flex flex-row justify-center align-center">
                        <form method="post" action="{{ route('categoria.destroy', $category->id) }}">
                            @method('DELETE')
                            @csrf
                            <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Si
                            </button>
                        </form>
                        
                        <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">No, cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</main>
@endsection