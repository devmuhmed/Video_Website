<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 class="title">Latest videos</h2>
                <p class="description">Keep Learning , latest video based on published day</p>
            </div>
        </div>
        @include('front-end.shared.video-row')
        <a href="{{ route('home') }}" class="btn btn-danger btn-round">More Videos</a>
    </div>
</div>
