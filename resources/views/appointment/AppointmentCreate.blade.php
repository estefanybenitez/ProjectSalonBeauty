@extends('layouts.app')

@section('content')


<form method="POST" action="/appointmentStore" class="mx-auto max-w-md">
    @csrf

    <p class="mt-1 text-4xl text-gray-900 dark:text-white text-center"><b>Crear Cita</b></p>

    {{-- Date --}}
    <div class="mt-4 mx-auto max-w-md">
        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
        <input id="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fecha" @error('date') is-invalid @enderror name="date" required autocomplete="date" autofocus>

        @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Time --}}
    <div class="mt-4 mx-auto max-w-md">
        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hora</label>
        <input id="time" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hora" @error('time') is-invalid @enderror name="time" required autocomplete="time">

        @error('time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- fk_user --}}
    <div class="mt-4 mx-auto max-w-md">
        <label for="fk_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
        <select name="fk_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($users as $item)
                <option value="{{ $item->user_id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('fk_user')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- fk_status --}}
    <div class="mt-4 mx-auto max-w-md">
        <label for="fk_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
        <select name="fk_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($status as $item)
                <option value="{{ $item->id_status }}">{{ $item->name_status }}</option>
            @endforeach
        </select>
        @error('fk_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- fk_service --}}
    <div class="mt-4 mx-auto max-w-md">
        <label for="fk_service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Servicio</label>
        <select name="fk_service" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($service as $item)
                <option value="{{ $item->id_service }}">{{ $item->name_service }}</option>
            @endforeach
        </select>
        @error('fk_service')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Button Save --}}
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <br>
            <button type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Guardar</button> 
        </div>
    </div>
</form>

@endsection