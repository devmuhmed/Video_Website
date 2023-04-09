@extends('back-end.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('navTitle')
    {{ $title }}
@endsection

@section('content')
    @component('back-end.shared.edit', ['title' => $title, 'pageDesc' => $pageDesc, 'routeName' => $routeName])
        @method('put')
        @include('back-end.' . $routeName . '.form')
    @endcomponent
@endsection
