@extends('layouts.app')

@section('content')
    <div class="section section-button">
        <div class="container">
            <div class="title">
                <h2> latest video </h2>
                <p class="mt-3">
                    @if (request()->has('search') && request()->get('search') != '')
                        you search on <b>: {{ request()->get('search') }}</b> | <a href="{{ route('home') }}">Reset</a>
                    @endif
                </p>
            </div>
            @include('front-end.shared.video-row')
        </div>
    </div>
@endsection
