@extends('layouts.apphome')

@section('cards')

    @component('components.CardCategory', ['category' => $category])
    @endcomponent

@endsection
