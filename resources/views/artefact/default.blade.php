@extends('layouts.app')

@section('title', 'Artefacts')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Artefacts</li>
@endsection


@section('content')
    @component('components/books', ['artefacts' => $artefacts])
    @endcomponent
@endsection
