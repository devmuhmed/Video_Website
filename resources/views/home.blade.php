@extends('layouts.app')

@section('content')
    <div class="section section-button">
        <div class="container">
            <div class="title">
                <h2> latest video </h2>
            </div>
            @include('front-end.shared.video-row')
        </div>
    </div>
@endsection
