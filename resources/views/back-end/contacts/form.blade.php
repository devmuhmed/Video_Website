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
            $input = 'email';
        @endphp
        <label for="{{ $input }}">{{ $moduleName }} Name</label>
        <div class="input-group mb-5">
            <input type="email" class="form-control" placeholder="{{ $input }}" name="{{ $input }}"
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
<div class="row">
    <div class="col-md-12">
        <label>Message</label>
        @php $input = 'message'; @endphp
        <textarea class="form-control @error($input)is-invalid @enderror" name="{{ $input }}" required rows="4"
            placeholder="Tell us your thoughts and feelings...">{{ $row->{$input} }}</textarea>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
