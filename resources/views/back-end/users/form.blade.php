@csrf
<div class="row">
    <div class="col-md-6">
        <label for="name">{{ $moduleName }} Name</label>
        <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder="name" name="name" aria-label="name"
                value="{{ isset($row) ? $row->name : '' }}" aria-describedby="basic-addon1" id="name" />
        </div>
    </div>
    <div class="col-md-6">
        <label for="email">Email</label>
        <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder="email" name="email" aria-label="email"
                value="{{ isset($row) ? $row->email : '' }}" aria-describedby="basic-addon1" id="email" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label for="password">Password</label>
        <div class="input-group mb-5">
            <input type="password" class="form-control" placeholder="password" name="password" aria-label="password"
                aria-describedby="basic-addon1" id="password" />
        </div>
    </div>
</div>
<div class="col-md-6">
    @php
        $input = 'group';
    @endphp
    <label for="{{ $input }}">{{ $moduleName }} Group</label>
    <div class="input-group mb-5">
        <select name="{{ $input }}">
            <option value="admin" {{ isset($row) && $row->{$input} == 'admin' ? 'selected' : '' }}>admin</option>
            <option value="user" {{ isset($row) && $row->{$input} == 'user' ? 'selected' : '' }}>user</option>
        </select>
    </div>
    @error($input)
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
