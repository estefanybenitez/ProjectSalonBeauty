@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
    <body>
        <p class=" text-4xl text-gray-900 dark:text-white text-center"><b>Pagos de servicios</b></p>
        <a href="/payment/create">
            <button type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" >
                + Añadir Pago
            </button>
        </a>
    
        {{-- </button>  --}}
        <br><br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center rtl:text-right text-white-500 dark:text-white-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-teal-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 align-middle">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3 align-middle">
                            Costo
                        </th>
                        <th scope="col" class="px-6 py-3 align-middle">
                            Metodo
                        </th>
                        <th scope="col" class="px-6 py-3 align-middle">
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3 align-middle">
                            Servicio
                        </th>
                        <th scope="col" class="px-6 py-4 align-middle">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payment as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->id_payment}}
                        </td>
                        <td class="px-6 py-4">
                            $ {{$item->cost}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->paymentmethod}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->user}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->service}}
                        </td>
                        <td class="px-6 py-2 text-right">
                            @if(Auth::user())
                            {{-- Botón para modificar --}}
                            <a class="btn btn-primary btn-sm" href="/payment/edit/{{$item->id_payment}}">
                                <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                    Modificar
                                </button>
                            </a>
                            @endif
                            {{-- Botón para eliminar --}}
                            <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            onclick="destroy(this)" token="{{csrf_token()}}" url="/payment/destroy/{{$item->id_payment}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- JS --}}
        <script src="{{asset('js/alert.js')}}"></script>
    </html>

@endsection