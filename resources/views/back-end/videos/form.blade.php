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
<div class="row">
    <div class="col-md-6">
        @php
            $input = 'youtube';
        @endphp
        <label for="{{ $input }}">{{ $input }} url</label>
        <div class="input-group mb-5">
            <input type="url" class="form-control" placeholder="{{ $input }}" name="{{ $input }}"
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
            $input = 'published';
        @endphp
        <label for="{{ $input }}">Video Status</label>
        <div class="input-group mb-5">
            <select name="{{ $input }}">
                <option value="1" {{ isset($row) && $row->{$input} == 1 ? 'selected' : '' }}>published</option>
                <option value="0" {{ isset($row) && $row->{$input} == 0 ? 'selected' : '' }}>hidden</option>
            </select>
        </div>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        @php
            $input = 'image';
        @endphp
        <label for="{{ $input }}">Video {{ $input }}</label>
        <div class="input-group mb-5">
            <input type="file" class="form-control" name="{{ $input }}" id="{{ $input }}" />
        </div>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        @php
            $input = 'category_id';
        @endphp
        <label for="{{ $input }}">Video Category</label>
        <div class="input-group mb-5">
            <select name="{{ $input }}">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ isset($row) && $row[$input] == $category->id ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                @endforeach
            </select>
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
<div class="row">
    <div class="col-md-6">
        @php
            $input = 'tags[]';
        @endphp
        <label for="{{ $input }}">Tags</label>
        <div class="input-group mb-5">
            <select name="{{ $input }}" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        @php
            $input = 'skills[]';
        @endphp
        <label for="{{ $input }}">Skills</label>
        <div class="input-group mb-5">
            <select name="{{ $input }}" multiple>
                @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}" {{ in_array($skill->id, $selectedSkills) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error($input)
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
