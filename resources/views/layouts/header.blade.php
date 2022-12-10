<header class="px-5 pt-5 flex flex-col gap-2 justify-between xl:flex-row-reverse lg:flex-row-reverse md:flex-row-reverse">
    <div class="flex flex-col gap-2 w-full">
        <form action="{{ route('search') }}" method="POST" class="flex gap-2">
            @csrf
            <input class="w-full rounded-full bg-white p-2 drop-shadow-lg @error('name') border-red-500 @enderror" placeholder="Buscar" type="text" name="search" id="search">
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