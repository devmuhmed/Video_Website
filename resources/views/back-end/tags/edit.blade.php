@extends('back-end.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('navTitle')
    {{ $title }}
@endsection

@section('content')
    @component('back-end.shared.edit', ['title' => $title, 'pageDesc' => $pageDesc, 'routeName' => $routeName])
        <form action="{{ route($routeName . '.update', $row) }}" method="post">
            @method('put')
            @include('back-end.' . $routeName . '.form')
            <div class="row">
                <button type="submit" class="btn btn-primary pull-right align-center">Update
                    {{ $moduleName }}</button>
            </div>
        </form>
    @endcomponent
@endsection
