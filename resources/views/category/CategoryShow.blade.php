@extends('layouts.app')

@section('content')
    <p class=" text-4xl text-gray-900 dark:text-white text-center"><b>Categorias</b></p>
    <a href="/category/create">
    <button type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" >
        + Añadir Categoria
    </button>
    </a>
        
<br><br>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center rtl:text-right text-white-500 dark:text-white-400">
        <thead  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-teal-400">
            <tr>
                <td scope="col" class="px-6 py-3 align-middle">
                    C&oacute;digo
                </td>
                <td scope="col" class="px-6 py-3 align-middle">
                    Category
                </td>        
                <td scope="col" class="px-6 py-3 align-middle">
                    Imagen
                </td>    
                <td scope="col" class="px-6 py-3 align-middle">
                    Descripcion
                </td>    
                <td scope="col" class="px-6 py-3 align-middle">
                    Acciones
                </td>
            </tr>
        </thead>
            {{-- Category List --}}
        <tbody>
       
        @foreach ($category as $item)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">
                {{$item->id_category}}
            </td>
            <td class="px-6 py-4 ">
                {{$item->name_category}}
            </td>                       
            <td class="px-6 py-4 ">
                <img height="60px" width="80px" src="{{asset($item->img)}}" alt="{{asset($item->name_category)}}">
            </td>            
            <td class="px-6 py-4 ">
                {{$item->description}}
            </td>            
            <td class="px-6 py-3 text-middle">
                @if(Auth::user())
                {{-- boton para modificar --}}
                <a class="btn btn-primary btn-sm" href="/category/edit/{{$item->id_category}}">
                    <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        Modificar
                    </button>
                </a>
                @endif
                {{-- boton para eliminar --}}
                <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                url="/category/destroy/{{$item->id_category}}" onclick="destroy(this)" token="{{csrf_token()}}">
                Eliminar
                </button> 
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{asset('js/alert.js')}}"></script>

@endsection
