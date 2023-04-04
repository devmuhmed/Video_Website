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
            <div class="row mt-4" id="comments">
                <div class="col-md-12">
                    <div class="card text-left">
                        <div class="card-header card-header-rose">
                            @php
                                $comments = $video->comments;
                            @endphp
                            <h5> Comments ({{ count($comments) }})</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($comments as $comment)
                                <div class="row">
                                    <div class="col-md-8">
                                        <i class="nc-icon nc-single-02"></i> : {{ $comment->user->name }}
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <span>
                                            <i class="nc-icon nc-calendar-60"></i>
                                            : {{ $comment->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                                <p>{{ $comment->comment }}</p>
                                @auth
                                    @if (auth()->user()->group == 'admin' || auth()->id() == $comment->user_id)
                                        <a href="" onclick="$(this).next('div').slideToggle(1000);return false"> Edit
                                        </a>
                                        <div style="display:none;">
                                            <form action="{{ route('front.commentUpdate', $comment) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <textarea class="form-control" name="comment" id="comment" rows="4">{{ $comment->comment }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-info">Edit</button>
                                            </form>
                                        </div>
                                    @endif
                                    @if (!$loop->last)
                                        <hr>
                                    @endif
                                @endauth
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->user())
                <form action="{{ route('front.commentStore', $video) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Comment</label>
                        <textarea class="form-control" name="comment" id="comment" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            @endif
        </div>
    </div>
@endsection
