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

        @slot('md4')
            @php
                $url = getYoutubeId($row->youtube);
            @endphp
            @if ($url)
                <iframe width="350" height="400" src="https://www.youtube.com/embed/{{ $url }}"
                    title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            @endif
        @endslot
    @endcomponent
@endsection
