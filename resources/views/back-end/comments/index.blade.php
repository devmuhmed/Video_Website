<table class="table">
    @foreach ($comments as $comment)
        <tr>
            <td>
                <small>{{ $comment->user->name }}</small>
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            </td>
            <td class="d-flex justify-content-end">
                <a href="{{ route('comments.destroy', $comment) }}"
                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <form action="{{ route('comments.update', $comment) }}" method="post">
                    @csrf
                    @method('put')
                    @include('back-end.comments.form', ['row' => $comment])
                    <input type="hidden" value="{{ $row->id }}" name="video_id">
                    <button type="submit" class="btn btn-bg-primary">
                        <i class="fa fa-pen"></i> update comment
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
