@extends('layouts.app')

@section('content')
    <p class=" text-4xl text-gray-900 dark:text-white text-center"><b>Servicios</b></p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-6 py-5">
        @foreach ($service as $item)
            <div
                class="max-w-xs mx-auto rounded overflow-hidden shadow-lg bg-slate-950 text-white transform transition-transform hover:scale-105">
                {{-- <a href="{{ route('service.search', ['id_category' => $item->id_category]) }}"> --}}
                <img class="w-full h-48 object-cover" src="{{ $item->img }}" alt="{{ $item->name_service }}">
                <div class="p-4 flex flex-col items-center">
                    <div class="text-gray-400 text-base">
                        <span class="block mb-2">Servicio: {{ $item->name_service }}</span>
                        <span class="block mb-2">Precio: ${{ $item->precio }}</span>
                        {{-- create appointment --}}
                        <a href="#">
                            <button type="button"
                                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mb-2 w-full">
                                Agendar
                            </button>
                        </a>
                    </div>
                    <p class="text-gray-400 text-base text-center">
                        Reserva con nosotros
                    </p>
                </div>
                {{-- end --}}
            </div>
        @endforeach
    </div>
    {{-- end --}}
@endsection
