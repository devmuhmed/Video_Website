@extends('layouts.app')
@section('title', $video->name)
@section('content')
    <div class="section section-button">
        <div class="container">
            <div class="title">
                <h1> {{ $video->name }} </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php
                        $url = getYoutubeId($video->youtube);
                    @endphp
                    @if ($url)
                        <iframe width="100%" height="450" src="https://www.youtube.com/embed/{{ $url }}"
                            title="YouTube video player" frameborder="0" allowfullscreen class="mb-5"></iframe>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <i class="nc-icon nc-single-02"></i>
                    {{ $video->user->name }}
                </div>
                <div class="col-md-2">
                    <i class="nc-icon nc-calendar-60"></i>
                    {{ $video->created_at }}
                </div>
                <div class="col-md-2">
                    <i class="nc-icon nc-single-copy-04"></i>
                    {{ $video->des }}
                </div>
                <div class="col-md-3">
                    <p><b>Skills</b></p>
                    @foreach ($video->skills as $skill)
                        <a href="{{ route('front.skill', $skill) }}">
                            <span class="badge badge-pill badge-info">{{ $skill->name }}</span>
                        </a>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <p><b>Tags</b></p>
                    @foreach ($video->tags as $tag)
                        <a href="{{ route('front.tags', $tag) }}">
                            <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('front.category', $video->category) }}">
                        {{ $video->category->name }}
                    </a>
                </div>
            </div>
            @include('front-end.video.comments')
            @include('front-end.video.create-comment')
        </div>
    </div>
@endsection
