@csrf
<div class="row">
    <div class="col-md-6">
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
    <div class="col-md-6">
        @php
            $input = 'meta_keywords';
        @endphp
        <label for="{{ $input }}">Meta Keywords</label>
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
<div class="row mb-5">
    <div class="col-md-6">
        @php
            $input = 'meta_des';
        @endphp
        <label for="{{ $input }}">Meta Description</label>
        <textarea name="{{ $input }}" id="" cols="30" rows="10">
            {{ isset($row) ? $row->{$input} : '' }}
        </textarea>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        @php
            $input = 'des';
        @endphp
        <label for="{{ $input }}">Description</label>
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
