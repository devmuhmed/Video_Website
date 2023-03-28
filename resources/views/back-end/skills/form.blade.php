@csrf
<div class="row">
    <div class="col-md-12">
        @php
            $input = 'name';
        @endphp
        <label for="{{ $input }}">{{ $moduleName }} Name</label>
        <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder="{{ $input }}" name="{{ $input }}"
                aria-label="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                aria-describedby="basic-addon1" id="{{ $input }}" />
        </div>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
