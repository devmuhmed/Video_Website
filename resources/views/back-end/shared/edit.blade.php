<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-0 pt-5 pb-3">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">{{ $title }}</span>
                    <span class="text-muted mt-1 fw-bold fs-7">{{ $pageDesc }}</span>
                </h3>
                <a href="{{ route($routeName . '.index') }}" class="btn btn-light btn-active-primary">
                    Home Page
                </a>
            </div>
            <div class="card-body pt-3">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                {{ isset($md4) ? $md4 : '' }}
            </div>
        </div>
    </div>
</div>
