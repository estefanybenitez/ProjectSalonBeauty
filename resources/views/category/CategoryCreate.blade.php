@extends('layouts.app')

@section('content')

<form action="/categoryStore" method="POST" class="mx-auto max-w-md"  enctype="multipart/form-data">
    @csrf
    <p class="mt-4 text-4xl text-gray-900 dark:text-white text-center"><b>Crear Categoria</b></p><br>

    <div class="mx-auto max-w-md">
        <label for="name_category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la Categoría</label>
        <input id="name_category" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de la Categoría" 
        @error('name_category') is-invalid @enderror name="name_category" required autocomplete="name_category" autofocus>

        @error('name_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mx-auto max-w-md">
        <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen Categoría</label>
        <input id="img" type="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        placeholder="Imagen de la Categoria" accept="image/*"
        @error('img') is-invalid @enderror name="img" required autocomplete="img" autofocus>

        @error('img')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    
    <div class="mx-auto max-w-md">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion de la Categoría</label>
        <input id="description" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description de la Categoría" @error('description') 
        is-invalid @enderror name="description" required autocomplete="description" autofocus>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    {{-- Button Save--}}
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <br>
            <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 
            dark:focus:ring-cyan-800 font-medium rounded-md text-md px-4 py-2 text-center me-2 mb-2" onclick="agregar(this)">
            Guardar</button> 
        </div>
    </div>
</form>

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- JS --}}
<script src="{{asset('js/cambio.js')}}"></script>


@endsection