@extends('layouts.apphome')

@section('cards')

    @component('components.CardService', ['category' => $category, 'service' => $service])
    @endcomponent

@endsection
