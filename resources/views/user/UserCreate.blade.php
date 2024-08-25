@extends('layouts.app')

@section('content')

<form method="POST" action="/userStore">
    @csrf
    <p class="mt-4 text-4xl text-gray-900 dark:text-white text-center"><b>Crear Usuario</b></p>

    <div class="mx-auto max-w-md">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
        <input id="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre" @error('name') is-invalid @enderror name="name" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mt-4 mx-auto max-w-md">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
        <input id="email" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo" @error('email') is-invalid @enderror name="email" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="flex justify-center items-center ">
        {{-- Role Dropdown --}}
        <div class="mt-4">
            <div class="relative inline-flex text-middle">
                <select name="fk_role" id="fk_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 appearance-none">
                    @foreach ($roles as $item)
                        <option value="{{ $item->id_role}}">{{ $item->role_name }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            @error('fk_role')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mx-3"></div>

        {{-- Button Save--}}
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <br>
                <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-md text-md px-4 py-2 text-center me-2 mb-2">Guardar</button> 
            </div>
        </div>
    </div>

</form>

@endsection