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
                            <i class="nc-icon nc-single-02"></i> :
                            <a
                                href="{{ route('front.profile', ['user' => $comment->user, 'slug' => slug($comment->user->name)]) }}">
                                {{ $comment->user->name }}
                            </a>
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
