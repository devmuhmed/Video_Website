@extends('back-end.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('navTitle')
    {{ $title }}
@endsection

@section('content')
    @component('back-end.shared.create', ['title' => $title, 'pageDesc' => $pageDesc, 'routeName' => $routeName])
        <form action="{{ route($routeName . '.store') }}" method="post" enctype="multipart/form-data">
            @include('back-end.' . $routeName . '.form')
            <div class="row">
                <button type="submit" class="btn btn-primary pull-right align-center">Add {{ $moduleName }}</button>
            </div>
        </form>
    @endcomponent
    <!--end::Tables Widget 10-->
@endsection
