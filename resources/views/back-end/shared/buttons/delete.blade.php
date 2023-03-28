<form action="{{ route($routeName . '.destroy', $row) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
        <i class="fa fa-trash"></i>
    </button>
</form>
