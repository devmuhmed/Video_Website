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
