<div class="row mb-5">
    <div class="col-md-6">
        @php
            $input = 'comment';
        @endphp
        <label for="{{ $input }}">Comment</label>
        <textarea name="{{ $input }}" id="" cols="30" rows="10">
            {{ isset($row) ? $row->{$input} : '' }}
        </textarea>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
