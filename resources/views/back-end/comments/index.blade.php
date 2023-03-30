<table class="table" id="comments">
    @foreach ($comments as $comment)
        <tr>
            <td>
                <small>{{ $comment->user->name }}</small>
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            </td>
            <td class="d-flex justify-content-end">
                <button type="button" onclick="$(this).closest('tr').next('tr').slideToggle()"
                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <i class="fa fa-pen"></i>
                </button>
                <a href="{{ route('comments.destroy', $comment) }}"
                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <tr style="display: none;">
            <td colspan="4">
                <form action="{{ route('comments.update', $comment) }}" method="post">
                    @csrf
                    @method('put')
                    @include('back-end.comments.form', ['row' => $comment])
                    <input type="hidden" value="{{ $row->id }}" name="video_id">
                    <button type="submit" class="btn btn-primary" style="width: 40%">
                        update comment
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
